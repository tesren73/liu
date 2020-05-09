<?php

namespace addons\XyStore\merchant\modules\order\controllers;

use addons\XyStore\common\components\PreviewHandler;
use addons\XyStore\common\enums\DecimalReservationEnum;
use addons\XyStore\common\models\order\Action;
use addons\XyStore\common\models\product\Spec;
use addons\XyStore\common\models\product\SpecValue;
use addons\XyStore\common\models\order\OrderProduct;
use addons\XyStore\common\models\product\Product;
use addons\XyStore\common\models\product\AttributeValue;
use addons\XyStore\common\models\SettingForm;
use addons\XyStore\merchant\forms\ProductForm;
use function GuzzleHttp\Promise\all;
use Yii;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\web\NotFoundHttpException;
use common\enums\StatusEnum;
use common\helpers\ArrayHelper;
use common\helpers\ResultHelper;
use common\enums\PayTypeEnum;
use addons\XyStore\common\models\order\Order;
use addons\XyStore\common\enums\OrderStatusEnum;
use addons\XyStore\common\enums\RefundStatusEnum;
use addons\XyStore\merchant\controllers\BaseController;

/**
 * Class OrderController
 * @package addons\XyStore\merchant\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class OrderController extends BaseController
{
    /**
     * @var Order
     */
    public $modelClass = Order::class;

    /**
     * @var array
     */
    protected $handlers = [
        FullMailHandler::class,// 满包邮
        FeeHandler::class,// 运费计算
        CouponHandler::class,// 优惠券
        UsePointHandler::class,// 积分抵现
        AfterHandler::class,// 统一处理
    ];

    /**
     * 执行外部营销
     *
     * @var PreviewHandler
     */
    protected $previewHandler;

    /**
     * 订单预览
     *
     * @var \addons\XyStore\common\models\forms\PreviewForm
     */
    protected $previewForm;

    /**
     * 首页
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $order_status = Yii::$app->request->get('order_status', '');
        $order_sn = Yii::$app->request->get('order_sn');

        $data = Order::find()
            ->alias('o')
            ->where(['>=', 'o.status', StatusEnum::DISABLED])
            ->andFilterWhere(['like', 'order_sn', $order_sn])
            ->andFilterWhere(['o.merchant_id' => $this->getMerchantId()]);

        if ($order_status != RefundStatusEnum::CANCEL) {
            $data = $data->with(['member', 'product'])->andFilterWhere(['o.order_status' => $order_status]);
        } else {
            // 退款中
            $data = $data->with(['member'])->joinWith([
                'product p' => function (ActiveQuery $query) {
                    return $query->andWhere(['in', 'refund_status', RefundStatusEnum::refund()]);
                },
            ]);
        }

        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $this->pageSize]);
        $models = $data->offset($pages->offset)
            ->orderBy('id desc')
            ->limit($pages->limit)
            ->all();

        return $this->render($this->action->id, [
            'models' => $models,
            'pages' => $pages,
            'order_status' => $order_status,
            'order_sn' => $order_sn,
            'total' => Yii::$app->xyStoreService->order->getCount(),
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        $model = Order::find()
            ->where(['>=', 'status', StatusEnum::DISABLED])
            ->andWhere(['id' => $id])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->with(['member', 'product', 'company', 'invoice', 'pickup', 'productExpress'])
            ->one();

        $product = ArrayHelper::toArray($model->product);
        $productExpress = ArrayHelper::toArray($model->productExpress);

        // 重组发货
        foreach ($productExpress as &$express) {
            $express['product'] = [];

            foreach ($product as $key => $item) {
                if (in_array($item['id'], $express['order_product_ids'])) {
                    $express['product'][] = $item;
                    unset($product[$key]);
                }
            }
        }

        return $this->render($this->action->id, [
            'model' => $model,
            'product' => $product,
            'productExpress' => $productExpress,
            'orderAction' => Yii::$app->xyStoreService->orderAction->findByOrderId($id),
        ]);
    }

    /**
     * 备注
     *
     * @param $id
     * @return mixed|string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     */
    public function actionSellerMemo($id)
    {
        $model = $this->findModel($id);

        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            return $model->save()
                ? $this->message('修改成功', $this->redirect(Yii::$app->request->referrer))
                : $this->message($this->getError($model), $this->redirect(Yii::$app->request->referrer), 'error');
        }

        return $this->renderAjax($this->action->id, [
            'model' => $model,
        ]);
    }

    /**
     * 收货地址
     *
     * @param $id
     * @return mixed|string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     */
    public function actionAddress($id)
    {
        $model = $this->findModel($id);

        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            $model->receiver_region_name = Yii::$app->services->provinces->getCityListName([
                $model->receiver_province,
                $model->receiver_city,
                $model->receiver_area,
            ]);

            return $model->save()
                ? $this->message('修改成功', $this->redirect(Yii::$app->request->referrer))
                : $this->message($this->getError($model), $this->redirect(Yii::$app->request->referrer), 'error');
        }

        return $this->renderAjax($this->action->id, [
            'model' => $model,
        ]);
    }

    /**
     * 线下支付
     *
     * @param $id
     * @return mixed
     */
    public function actionPay($id)
    {
        try {
            $order = $this->findModel($id);
            Yii::$app->xyStoreService->order->pay($order, PayTypeEnum::OFFLINE);

            // 记录操作
            Yii::$app->xyStoreService->orderAction->create(
                '订单支付',
                $order->id,
                $order->order_status,
                Yii::$app->user->identity->id,
                Yii::$app->user->identity->username
            );

            return $this->message('线下支付成功', $this->redirect(Yii::$app->request->referrer));
        } catch (\Exception $e) {
            return $this->message($e->getMessage(), $this->redirect(Yii::$app->request->referrer), 'error');
        }
    }

    /**
     * 关闭订单
     *
     * @param $id
     * @return array
     */
    public function actionClose($id)
    {
        try {
            Yii::$app->xyStoreService->order->close($id);

            // 记录操作
            Yii::$app->xyStoreService->orderAction->create(
                '关闭订单',
                $id,
                OrderStatusEnum::NOT_PAY,
                Yii::$app->user->identity->id,
                Yii::$app->user->identity->username
            );

            return ResultHelper::json(200, '操作成功');
        } catch (\Exception $e) {
            return ResultHelper::json(422, $e->getMessage());
        }
    }

    /**
     * 确认收货
     *
     * @param $id
     * @return array
     */
    public function actionTakeDelivery($id)
    {
        try {
            Yii::$app->xyStoreService->order->takeDelivery($id);

            // 记录操作
            Yii::$app->xyStoreService->orderAction->create(
                '确认收货',
                $id,
                OrderStatusEnum::SHIPMENTS,
                Yii::$app->user->identity->id,
                Yii::$app->user->identity->username
            );

            return ResultHelper::json(200, '操作成功');
        } catch (\Exception $e) {
            return ResultHelper::json(422, $e->getMessage());
        }
    }


    /**
     * 提货
     *
     * @param $id
     * @return mixed|string
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     */
    public function actionPickup($id)
    {
        $order = $this->findModel($id);
        $model = PickupForm::findOne(['order_id' => $order->id]);

        // ajax校验
        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            // 进行无物流状态
            $deliverProduct = new DeliverProductForm();
            $deliverProduct->order = $order;
            $deliverProduct->member_id = Yii::$app->user->identity->id;
            $deliverProduct->member_username = Yii::$app->user->identity->username;
            $deliverProduct->shipping_type = DeliverProductForm::SHIPPING_TYPE_NOT_LOGISTICS;
            $deliverProduct->order_product_ids = ArrayHelper::getColumn($order->product, 'id');

            // 事务
            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$model->save()) {
                    throw new NotFoundHttpException($this->getError($model));
                }

                if (!$deliverProduct->save()) {
                    throw new NotFoundHttpException($this->getError($deliverProduct));
                }

                // 进行收货
                Yii::$app->xyStoreService->order->takeDelivery($id);
                // 记录操作
                Yii::$app->xyStoreService->orderAction->create(
                    '确认收货',
                    $id,
                    OrderStatusEnum::SHIPMENTS,
                    Yii::$app->user->identity->id,
                    Yii::$app->user->identity->username
                );

                $transaction->commit();

                return $this->message('提货成功', $this->redirect(Yii::$app->request->referrer));
            } catch (\Exception $e) {
                $transaction->rollBack();

                return $this->message($e->getMessage(), $this->redirect(Yii::$app->request->referrer), 'error');
            }
        }

        return $this->renderAjax($this->action->id, [
            'model' => $model,
        ]);
    }

    /**
     * 伪删除
     *
     * @param $id
     * @return mixed
     */
    public function actionDestroy($id)
    {
        if (!($model = $this->modelClass::findOne($id))) {
            return $this->message("找不到订单", $this->redirect(['index']), 'error');
        }

        // 非关闭订单不可删除
        if ($model->order_status != OrderStatusEnum::REPEAL) {
            return $this->message("删除失败", $this->redirect(['index']), 'error');
        }

        $model->status = StatusEnum::DELETE;
        if ($model->save()) {
            return $this->message("删除成功", $this->redirect(['index']));
        }

        return $this->message("删除失败", $this->redirect(['index']), 'error');
    }
    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        $model->merchant_id = $this->getMerchantId();
        $modelProduct = new OrderProduct();
        $order_sn = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        if(!(Order::find()->where(['order_sn' => $order_sn])->exists())){
             $model->order_sn = 'XS'.$order_sn;
        }
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
            // 开启事务
            $transaction = Yii::$app->db->beginTransaction();
            try {
                // 载入数据并验证
            $model->order_type = 1;
            $model->payment_type = 1; //支付类型
            $model->shipping_type = 1; //配送方式
            $model->order_from = 1;
            $model->buyer_id = $data['buyer'] ?? [];
            $model->user_name = $data['user_name'] ?? [];
            $model->product_money = $data['Order']['order_money'] ?? [];
            $model->order_money = $data['Order']['order_money'] ?? [];
            $model->user_platform_money = $data['Order']['user_money'] ?? [];
            $model->shipping_money = $data['Order']['shipping_money'] ?? [];
            $model->pay_money = $data['Order']['pay_money'] ?? [];
            $model->order_status = $data['order_status'] ?? [];
            $model->pay_status = $data['pay_status'] ?? [];
            $model->pay_time = $data['Order']['pay_money'] ? time() : '';
            $model->finish_time = $data['Order']['pay_money'] ? time() : '';
            $model->product_count = count($data['Order']['products']) ?? [];
            $model->operator_id = Yii::$app->user->identity->id;
            $model->status = 1;
            $model->created_at = time();
            $model->updated_at = time();
            $model->save(false);
            //得到上次插入的Insert id
            $order_id = $model->attributes['id'];
            //order_product
            foreach($data['Order']['products'] as $products)
            {
                $modelProduct->order_id = $order_id;
                $modelProduct->member_id = $data['buyer'] ?? [];
                $modelProduct->merchant_id = $model->merchant_id;
                $modelProduct->product_id = $products['product_id'] ?? [];
                $modelProduct->product_name = $products['product_name'] ?? [];
                $modelProduct->sku_id = $products['degrees'] ?? [];
                $modelProduct->sku_name = $products['sku_name'] ?? [];
                $modelProduct->price = $products['price'] ?? [];
                $modelProduct->num = $products['qty'] ?? [];
                $modelProduct->product_money = $data['Order']['order_money'] ?? [];
                $modelProduct->buyer_id = $data['buyer'] ?? [];
                $modelProduct->order_type = 1;
                $modelProduct->order_status = 1;
                $modelProduct->refund_type = 0;
                $modelProduct->status = 1;
                $modelProduct->created_at = time();
                $modelProduct->updated_at = time();
                $modelProduct->save(false);
                //order_action
                $modelAction = new Action();
                $orderAction['order_id'] = $order_id;
                $orderAction['action'] = '门店订单';
                $orderAction['member_id'] = $data['buyer'] ?? [];
                $orderAction['member_name'] = $data['user_name'] ?? [];
                $orderAction['order_status'] = 1;
                $orderAction['status'] = 1;
                $orderAction['created_at'] = time();
                $orderAction['updated_at'] = time();
                $modelAction->attributes = $orderAction;
                $modelAction->save(false);
            }
                $transaction->commit();
                return ResultHelper::json(200, '操作成功');
            } catch (\Exception $e) {
                $transaction->rollBack();

                return ResultHelper::json(422, $e->getMessage());
            }
        }
         // 获取参数、规格和规格值、已选规格值
//        list($attributeValue, $specValue, $specValuejsData) = Yii::$app->xyStoreService->product->getSpecValueAttribute($model);
        // 阶梯折扣
        return $this->render('create', [
             'model' => $model,
            'product' => Yii::$app->xyStoreService->product->getMapList(),
        ]);
    }

    public function actionGetmember()
    {
        $request = Yii::$app->request;
        $mobile = $request->post('mobile');
        if ($mobile)
        {
//            $memberData = Member::findOne(['mobile'=>$mobile]);
            $memberData = Yii::$app->xyStoreService->member->findByQuary($mobile);
            $memberID = $memberData->id;
            $memberAcount['id'] = $memberID;
            $memberAcount['mobile'] = $memberData->mobile;
            $memberAcount['username'] = $memberData->username;
            $memberAcount['nickname'] = $memberData->nickname;
            $memberAcount['created_at'] = $memberData->created_at;
            $memberAcount['current_level'] = $memberData->current_level;
            $memberAcount['gender'] = $memberData->gender;
            $accountData = Yii::$app->xyStoreService->member->findAccount($memberID);
//            $accountData = Account::findOne(['member_id'=>$memberID]);
            $memberAcount['user_integral'] = $accountData->user_integral;
            $memberAcount['user_money'] = $accountData->user_money;
            $memberAcount['arrears'] = $accountData->arrears;
            $data = json_encode($memberAcount,true);
            return $data;
        }
    }

    /**
     * @param $id
     * @return Order
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        /* @var $model Order */
        if (empty($id) || empty($model = $this->modelClass::find()->where(['id' => $id])->andFilterWhere(['merchant_id' => $this->getMerchantId()])->one())) {
            throw new NotFoundHttpException('找不到订单');
        }

        return $model;
    }

    public function actionAttribute()
    {
        $id = Yii::$app->request->post('product_id');
        if($id)
        {
            $temp = AttributeValue::find()->select(['title','value'])->andWhere('product_id = :id',[':id'=>$id])->asArray()->all();
            $tempAttr='';
            foreach($temp as $item)
            {
                $tempAttr .= $item['title'] .'-'. $item['value'];
            }
            $data['attribute'] = $tempAttr;
            $data['degrees'] = SpecValue::find()->select(['id','title'])->andWhere('base_spec_id = 1 and product_id = :id',[':id'=>$id])->asArray()->all();
            $data['astigmia'] = SpecValue::find()->select(['id','title'])->andWhere('base_spec_id = 2 and product_id = :id',[':id'=>$id])->asArray()->all();
            return json_encode($data,true);
        }
    }
}
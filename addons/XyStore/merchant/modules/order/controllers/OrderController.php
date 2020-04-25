<?php

namespace addons\XyStore\merchant\modules\order\controllers;

use addons\XyStore\common\components\marketing\AfterHandler;
use addons\XyStore\common\components\marketing\CouponHandler;
use addons\XyStore\common\components\marketing\FeeHandler;
use addons\XyStore\common\components\marketing\FullMailHandler;
use addons\XyStore\common\components\marketing\UsePointHandler;
use addons\XyStore\common\components\PreviewHandler;
use addons\XyStore\common\models\product\Product;
use common\helpers\AddonHelper;
use common\models\api\AccessToken;
use common\models\forms\CreditsLogForm;
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
use addons\XyStore\merchant\forms\DeliverProductForm;
use addons\XyStore\merchant\forms\PickupForm;
use addons\XyStore\common\components\InitOrderData;
use addons\XyStore\common\models\forms\PreviewForm;
use addons\XyStore\merchant\controllers\BaseController;

/**
 * Class OrderController
 * @package addons\XyStore\merchant\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class OrderController extends BaseController
{
    /**
     * @var \addons\XyStore\common\models\order\Order
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
     * @param $action
     * @return bool
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\BadRequestHttpException
     * @throws \yii\web\ForbiddenHttpException
     * @throws \yii\web\NotFoundHttpException
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->previewHandler = new \addons\XyStore\common\components\PreviewHandler($this->handlers);

        $config = AddonHelper::getConfig();
        /** @var AccessToken $identity */
        $identity = Yii::$app->user->identity;

        $model = new \addons\XyStore\common\models\forms\PreviewForm();
        $model = $model->loadDefaultValues();
        $model->buyer_id = $identity->member_id;
        $model->is_logistics = $config['is_logistics'] ?? 0; // 物流可选
        $model->buyer_self_lifting = $config['buyer_self_lifting'] ?? 0; // 开启自提
        $model->pickup_point_is_open = $config['pickup_point_is_open'] ?? 0; // 自提运费开启
        $model->pickup_point_fee = $config['pickup_point_fee'] ?? 0;
        $model->pickup_point_freight = $config['pickup_point_freight'] ?? 0;
        $model->order_invoice_tax = $config['order_invoice_tax'] ?? 0; // 税率
        $model->invoice_content_default = isset($config['order_invoice_content']) ? explode(',', $config['order_invoice_content']) : [];

        $this->previewForm = $model;

        return true;
    }
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
    * Creates a new Order model.
    * If creation is successful, the browser will be redirected to the 'view' page.
    * @return mixed
    */
    public function actionCreate()
    {
        /** @var AccessToken $identity */
        /** @var PreviewForm $model */
        $identity = Yii::$app->user->identity;
        $model = $this->previewForm;
        $model->setScenario('create');
        $model->attributes = Yii::$app->request->post();
        $model->member = Yii::$app->xyStoreService->member->findById($identity->member_id);

        // 触发 - 初始化数据
        $initOrderData = new InitOrderData();
        $initOrderData->isNewRecord = true;
        $model = $initOrderData->execute($model, $model->type);
        $model->address_id && $model->address = Yii::$app->services->memberAddress->findById($model->address_id, $identity->member_id);

        // 触发 - 营销
        $model = $this->previewHandler->start($model, true);
        if ($model->getErrors() || !$model->validate()) {
            return ResultHelper::json(422, $this->getError($model));
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {
            // 订单来源
            $model->order_from = Yii::$app->user->identity->group;
            $order = Yii::$app->xyStoreService->order->create($model);
            // 消耗积分
            if ($order->point > 0) {
                Yii::$app->services->memberCreditsLog->decrInt(new CreditsLogForm([
                    'member' => $model->member,
                    'num' => $order->point,
                    'credit_group' => 'orderCreate',
                    'map_id' => $order->id,
                    'remark' => '【微商城】订单支付',
                ]));
            }

            // 支付金额为0 直接支付
            $order->pay_money == 0 && Yii::$app->xyStoreService->order->pay($order, $order->payment_type);

            // 删除购物车
            if ($model->type == PreviewTypeEnum::CART) {
                $sku_ids = ArrayHelper::getColumn($model->orderProducts, 'sku_id');
                !empty($sku_ids) && Yii::$app->xyStoreService->memberCartItem->deleteBySkuIds($sku_ids, $order->buyer_id);
            }

            $transaction->commit();

            return $order;
        } catch (\Exception $e) {
            $transaction->rollBack();

            return ResultHelper::json(422, $e->getMessage());
        }
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
            Yii::$app->tinyShopService->order->close($id);

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
     * @param $id
     * @return Order
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        /* @var $model Order */
        if (empty($id) || empty(($model = $this->modelClass::findOne([
                'id' => $id,
                'merchant_id' => $this->getMerchantId()
            ])))) {
            throw new NotFoundHttpException('找不到订单');
        }

        return $model;
    }
}
<?php

namespace addons\XyStore\merchant\controllers;

use Yii;
use common\helpers\DateHelper;
use common\helpers\ResultHelper;

/**
 * Class ConsoleController
 * @package addons\XyStore\merchant\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class ConsoleController extends BaseController
{
    /**
     * 首页
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        return $this->render('index',[

        ]);
    }

    /**
     * 运营报告
     *
     * 24小时/周/月下单商品数
     * 24小时/周/月下单金额
     */
    public function actionSusRes($type = '')
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->tinyShopService->order->getBetweenProductMoneyAndCountStatToEchant($type);

            return ResultHelper::json(200, '获取成功', $data);
        }

        return $this->render($this->action->id, [
            'total' => Yii::$app->tinyShopService->order->getStatByTime(0),
        ]);
    }

    /**
     * 订单指定时间内数量
     *
     * @param $type
     * @return array
     */
    public function actionOrderBetweenCount($type)
    {
        $data = Yii::$app->tinyShopService->order->getBetweenCountStatToEchant($type);

        return ResultHelper::json(200, '获取成功', $data);
    }
}
<?php

namespace addons\XyStore\common\components;

use common\helpers\AddonHelper;
use Yii;
use common\interfaces\AddonWidget;

/**
 * Bootstrap
 *
 * Class Bootstrap
 * @package addons\XyStore\common\config
 */
class Bootstrap implements AddonWidget
{
    /**
    * @param $addon
    * @return mixed|void
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function run($addon)
    {
        Yii::$app->services->merchant->setId(1);

        // TODO 临时测试
        $config = AddonHelper::getBackendConfig();
        $merchant_id = Yii::$app->services->merchant->getId();
        Yii::$app->xyStoreService->order->signAll($config, $merchant_id); // 自动收货
        Yii::$app->xyStoreService->order->finalizeAll($config, $merchant_id); // 完成订单
        Yii::$app->xyStoreService->order->closeAll($config, $merchant_id); // 关闭订单
        // 关闭优惠券
        Yii::$app->xyStoreService->marketingCoupon->closeAll();
        // 关闭失效的虚拟商品卡卷
        // Yii::$app->xyStoreService->orderProductVirtual->closeAll();
    }
}
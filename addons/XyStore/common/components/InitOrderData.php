<?php

namespace addons\XyStore\common\components;

use yii\web\UnprocessableEntityHttpException;
use addons\XyStore\common\enums\PreviewTypeEnum;
use addons\XyStore\common\models\forms\PreviewForm;
use addons\XyStore\common\components\purchase\CartPurchase;
use addons\XyStore\common\components\purchase\BuyNowPurchase;
use addons\XyStore\common\components\purchase\PointExchangePurchase;
use addons\XyStore\common\components\purchase\WholesalePurchase;
use addons\XyStore\common\components\purchase\GroupBuyPurchase;
use addons\XyStore\common\components\purchase\VirtualPurchase;
use addons\XyStore\common\components\purchase\PresellBuyPackage;
use addons\XyStore\common\components\purchase\CombinationPackage;
use addons\XyStore\common\components\purchase\DiscountPurchase;

/**
 * 初始化订单数据
 *
 * Class InitOrderData
 * @package addons\XyStore\common\components\purchase
 * @author jianyan74 <751393839@qq.com>
 */
class InitOrderData
{
    /**
     * 创建记录
     *
     * @var bool
     */
    public $isNewRecord = false;

    /**
     * 下单方式
     *
     * @var array
     */
    protected $handlers = [
        PreviewTypeEnum::CART => CartPurchase::class, // 购物车
        PreviewTypeEnum::BUY_NOW => BuyNowPurchase::class, // 立即下单
        PreviewTypeEnum::POINT_EXCHANGE => PointExchangePurchase::class, // 积分
        PreviewTypeEnum::VIRTUAL => VirtualPurchase::class, // 虚拟商品下单
    ];

    /**
     * 必须保证返回有产品信息不然报错
     *
     * @param PreviewForm $previewForm
     * @param $type
     * @return PreviewForm|mixed
     * @throws \yii\web\NotFoundHttpException
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function execute(PreviewForm $previewForm, $type): PreviewForm
    {
        if (!isset($this->handlers[$type])) {
            throw new UnprocessableEntityHttpException('下单类型错误');
        }

        /** @var InitOrderDataInterface $class */
        $class = new $this->handlers[$type]();
        $class->isNewRecord = $this->isNewRecord;
        $previewForm = $class->execute($previewForm);
        if (!$previewForm->orderProducts || !$previewForm->sku) {
            throw new UnprocessableEntityHttpException('找不到可用的产品');
        }

        $previewForm = $class->afterExecute($previewForm, $class::getType());

        return $previewForm;
    }
}
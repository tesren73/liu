<?php

namespace addons\XyStore\services;

use common\components\Service;

/**
 * Class Application
 *
 * @package addons\XyStore\services
 * @property \addons\XyStore\services\common\CollectService $collect 收藏
 * @property \addons\XyStore\services\common\TransmitService $transmit 分享
 * @property \addons\XyStore\services\common\NiceService $nice 点赞
 * @property \addons\XyStore\services\common\HelperService $helper 站点帮助
 * @property \addons\XyStore\services\common\AdvService $adv 广告
 * @property \addons\XyStore\services\express\CompanyService $expressCompany 快递物流
 * @property \addons\XyStore\services\express\FeeService $expressFee 物流模版
 * @property \addons\XyStore\services\product\ProductService $product 产品
 * @property \addons\XyStore\services\product\CateService $productCate 产品分类
 * @property \addons\XyStore\services\product\BrandService $productBrand 产品品牌
 * @property \addons\XyStore\services\product\TagService $productTag 产品标签
 * @property \addons\XyStore\services\product\SpecService $productSpec 产品规格
 * @property \addons\XyStore\services\product\SpecValueService $productSpecValue 产品规格值
 * @property \addons\XyStore\services\product\SkuService $productSku 产品sku
 * @property \addons\XyStore\services\product\EvaluateService $productEvaluate 产品评价
 * @property \addons\XyStore\services\product\EvaluateStatService $productEvaluateStat 产品评价统计
 * @property \addons\XyStore\services\product\LadderPreferentialService $productLadderPreferential 产品阶梯优惠
 * @property \addons\XyStore\services\member\MemberService $member 用户
 * @property \addons\XyStore\services\member\FootprintService $memberFootprint 足迹
 * @property \addons\XyStore\services\member\AddressService $memberAddress 收货地址
 * @property \addons\XyStore\services\member\InvoiceService $memberInvoice 发票
 * @property \addons\XyStore\services\member\CartItemService $memberCartItem 购物车
 * @property \addons\XyStore\services\base\SpecService $baseSpec 系统规格
 * @property \addons\XyStore\services\base\SpecValueService $baseSpecValue 系统规格值
 * @property \addons\XyStore\services\base\SupplierService $baseSupplier 供货商
 * @property \addons\XyStore\services\base\AttributeService $baseAttribute 系统产品类型
 * @property \addons\XyStore\services\base\AttributeValueService $baseAttributeValue 系统产品类型属性
 * @property \addons\XyStore\services\order\OrderService $order 订单
 * @property \addons\XyStore\services\order\ActionService $orderAction 订单操作记录
 * @property \addons\XyStore\services\order\InvoiceService $orderInvoice 订单发票记录
 * @property \addons\XyStore\services\order\ProductService $orderProduct 订单产品
 * @property \addons\XyStore\services\order\CustomerService $orderCustomer 订单产品售后
* @property \addons\XyStore\services\order\ProductExpressService $orderProductExpress 订单发货记录
 * @property \addons\XyStore\services\order\PickupService $orderPickup 订单自提
 * @property \addons\XyStore\services\marketing\PointConfigService $marketingPointConfig 营销积分
 * @property \addons\XyStore\services\marketing\FullMailService $marketingFullMail 营销包邮
 * @property \addons\XyStore\services\marketing\CouponService $marketingCoupon 优惠券
 * @property \addons\XyStore\services\marketing\CouponTypeService $marketingCouponType 优惠券类型
 * @property \addons\XyStore\services\marketing\CouponProductService $marketingCouponProduct 优惠券关联产品
 * @property \addons\XyStore\services\pickup\PointService $pickupPoint 自提点
 * @property \addons\XyStore\services\pickup\AuditorService $pickupAuditor 自提审核用户
 * @property \addons\XyStore\services\optometry\OptometryService $baseOptometry 验光列表
 * @property \addons\XyStore\services\member\MerchantMemberService $merchantMember 内部用户
 *
 * @author jianyan74 <751393839@qq.com>
 */
class Application extends Service
{
    /**
     * @var array
     */
    public $childService = [
        'product' => 'addons\XyStore\services\product\ProductService',
        'productCate' => 'addons\XyStore\services\product\CateService',
        'productBrand' => 'addons\XyStore\services\product\BrandService',
        'productTag' => 'addons\XyStore\services\product\TagService',
        'productSku' => 'addons\XyStore\services\product\SkuService',
        'productSpec' => 'addons\XyStore\services\product\SpecService',
        'productSpecValue' => 'addons\XyStore\services\product\SpecValueService',
        'productEvaluate' => 'addons\XyStore\services\product\EvaluateService',
        'productEvaluateStat' => 'addons\XyStore\services\product\EvaluateStatService',
        'productLadderPreferential' => 'addons\XyStore\services\product\LadderPreferentialService',
        'order' => 'addons\XyStore\services\order\OrderService',
        'orderAction' => 'addons\XyStore\services\order\ActionService',
        'orderInvoice' => 'addons\XyStore\services\order\InvoiceService',
        'orderProduct' => 'addons\XyStore\services\order\ProductService',
        'orderCustomer' => 'addons\XyStore\services\order\CustomerService',
        'orderProductExpress' => 'addons\XyStore\services\order\ProductExpressService',
        'orderPickup' => 'addons\XyStore\services\order\PickupService',
        'baseSpec' => 'addons\XyStore\services\base\SpecService',
        'baseSpecValue' => 'addons\XyStore\services\base\SpecValueService',
        'baseAttribute' => 'addons\XyStore\services\base\AttributeService',
        'baseSupplier' => 'addons\XyStore\services\base\SupplierService',
        'baseAttributeValue' => 'addons\XyStore\services\base\AttributeValueService',
        'expressCompany' => 'addons\XyStore\services\express\CompanyService',
        'expressFee' => 'addons\XyStore\services\express\FeeService',
        'member' => 'addons\XyStore\services\member\MemberService',
        'memberAddress' => 'addons\XyStore\services\member\AddressService',
        'memberInvoice' => 'addons\XyStore\services\member\InvoiceService',
        'memberFootprint' => 'addons\XyStore\services\member\FootprintService',
        'memberCartItem' => [
            'class' => 'addons\XyStore\services\member\CartItemService',
            'drive' => 'mysql',
        ],
        'marketingPointConfig' => 'addons\XyStore\services\marketing\PointConfigService',
        'marketingFullMail' => 'addons\XyStore\services\marketing\FullMailService',
        'marketingCoupon' => 'addons\XyStore\services\marketing\CouponService',
        'marketingCouponType' => 'addons\XyStore\services\marketing\CouponTypeService',
        'marketingCouponProduct' => 'addons\XyStore\services\marketing\CouponProductService',
        'pickupPoint' => 'addons\XyStore\services\pickup\PointService',
        'pickupAuditor' => 'addons\XyStore\services\pickup\AuditorService',
        // 公用
        'collect' => 'addons\XyStore\services\common\CollectService',
        'transmit' => 'addons\XyStore\services\common\TransmitService',
        'nice' => 'addons\XyStore\services\common\NiceService',
        'helper' => 'addons\XyStore\services\common\HelperService',
        'adv' => 'addons\XyStore\services\common\AdvService',
        'optometry' => 'addons\XyStore\services\optometry\OptometryService',
        'merchantMember' => 'addons\XyStore\services\member\MerchantMemberService',
    ];
}
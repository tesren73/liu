<?php

namespace addons\XyStore\common\enums;

use common\enums\BaseEnum;

/**
 * Class ProductShippingTypeEnum
 * @package addons\XyStore\common\enums
 * @author jianyan74 <751393839@qq.com>
 */
class ProductShippingTypeEnum extends BaseEnum
{
    const FULL_MAIL = 1;
    const USER_PAY = 2;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::FULL_MAIL => '包邮',
            self::USER_PAY => '买家承担运费',
        ];
    }
}
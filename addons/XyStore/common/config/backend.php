<?php

return [

    // ----------------------- 菜单配置 ----------------------- //
    'config' => [
        // 菜单配置
        'menu' => [
            'location' => 'default', // default:系统顶部菜单;addons:应用中心菜单
            'icon' => 'fa fa-puzzle-piece',
        ],
        // 子模块配置
        'modules' => [
            // 公共
            'common' => [
                'class' => 'addons\XyStore\backend\modules\common\Module',
            ],
            // 基础
            'base' => [
                'class' => 'addons\XyStore\merchant\modules\base\Module',
            ],
            // 验光
            'optometry' => [
                'class' => 'addons\XyStore\merchant\modules\optometry\Module',
            ],
            // 订单
            'order' => [
                'class' => 'addons\XyStore\merchant\modules\order\Module',
            ],
            // 产品
            'product' => [
                'class' => 'addons\XyStore\merchant\modules\product\Module',
            ],
            // 营销
            'marketing' => [
                'class' => 'addons\XyStore\merchant\modules\marketing\Module',
            ],
            // 统计
            'statistics' => [
                'class' => 'addons\XyStore\merchant\modules\statistics\Module',
            ],
        ],
    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [

    ],

    // ----------------------- 菜单配置 ----------------------- //

    'menu' => [
        [
            'title' => '运营中心',
            'route' => 'console/index',
            'icon' => 'fa fa-desktop'
        ],
        [
            'title' => '验光管理',
            'route' => 'optometry',
            'icon' => 'fa fa-fire-extinguisher',
            'child' => [
                [
                    'title' => '验光管理',
                    'route' => 'optometry/optometry/index',
                ],
                [
                    'title' => '新验光单',
                    'route' => 'optometry/optometry/edit',
                ],
            ],
        ],
        [
            'title' => '产品管理',
            'route' => 'productManage',
            'icon' => 'fa fa-shopping-basket',
            'child' => [
                [
                    'title' => '产品管理',
                    'route' => 'product/product/index',
                ],
                [
                    'title' => '产品分类',
                    'route' => 'product/cate/index',
                ],
                [
                    'title' => '产品规格',
                    'route' => 'base/spec/index',
                ],
                [
                    'title' => '产品类型',
                    'route' => 'base/attribute/index',
                ],
                [
                    'title' => '产品品牌',
                    'route' => 'product/brand/index',
                    'icon' => 'fa fa-tags'
                ],
                [
                    'title' => '供货商',
                    'route' => 'base/supplier/index',
                ],
            ],
        ],
        [
            'title' => '订单管理',
            'route' => 'orders',
            'icon' => 'fa fa-sticky-note',
            'child' => [
                [
                    'title' => '订单管理',
                    'route' => 'order/order/index',
                ],
                [
                    'title' => '新销售单',
                    'route' => 'order/order/create',
                ],
                [
                    'title' => '销售退单',
                    'route' => 'marketing/point-config/index',
                ],
            ],
        ],
        [
            'title' => '营销管理',
            'route' => 'marketing',
            'icon' => 'fa fa-ticket',
            'child' => [
                [
                    'title' => '电话营销',
                    'route' => 'marketing/coupon-type/index',
                ],
                [
                    'title' => '营销活动',
                    'route' => 'marketing/point-config/index',
                ],
                [
                    'title' => '生日祝福',
                    'route' => 'marketing/full-mail/index',
                ],
                [
                    'title' => '售后服务',
                    'route' => 'order/customer/index',
                ],
                [
                    'title' => '物流配送',
                    'route' => 'express-company/index',
                ],

            ]
        ],
        [
            'title' => '财务运营',
            'route' => 'commonOperating',
            'icon' => 'fa fa-share-alt',
            'child' => [
                [
                    'title' => '财务收款',
                    'route' => 'common/opinion/index',
                ],
                [
                    'title' => '公告管理',
                    'route' => 'common/notify-announce/index',
                ],
                [
                    'title' => '财务付款',
                    'route' => 'common/adv/index',
                ],
                [
                    'title' => '发票管理',
                    'route' => 'order/invoice/index',
                ],
                [
                    'title' => '账务报表',
                    'route' => 'common/helper/index',
                ],
                [
                    'title' => '报价表',
                    'route' => 'common/helper/index',
                ],
            ]
        ],
        [
            'title' => '数据统计',
            'route' => 'statistics',
            'icon' => 'fa fa-bar-chart',
            'child' => [
                [
                    'title' => '销售分析',
                    'route' => 'statistics/general/index',
                ],
                [
                    'title' => '商品分析',
                    'route' => 'statistics/product-analyze/index',
                ],
                [
                    'title' => '会员分析',
                    'route' => 'statistics/product-hot/index',
                ],
                [
                    'title' => '运营报告',
                    'route' => 'statistics/sus-res/index',
                ],
                [
                    'title' => '销售排行',
                    'route' => 'statistics/sales-ranking/index',
                ],
            ]
        ],
        [
            'title' => '基础设置',
            'route' => 'setting/display',
            'icon' => 'fa fa fa-gear'
        ],
    ],

    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [
        [
            'title' => '所有权限',
            'name' => '*',
        ],
    ],
];
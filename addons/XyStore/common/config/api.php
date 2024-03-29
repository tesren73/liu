<?php

return [

    // ----------------------- 菜单配置 ----------------------- //
    'config' => [
        // 菜单配置
        'menu' => [
            'location' => 'addons', // default:系统顶部菜单;addons:应用中心菜单
            'icon' => 'fa fa-puzzle-piece',
        ],
        // 子模块配置
        'modules' => [
            'v1' => [
                'class' => 'addons\XyStore\api\modules\v1\Module',
            ],
            'v2' => [
                'class' => 'addons\XyStore\api\modules\v2\Module',
            ],
        ],
    ],

    // ----------------------- 快捷入口 ----------------------- //

    'cover' => [
        [
            'title' => '门店管理',
            'route' => 'xystore/index',
            'icon' => '',
            'params' => [
            
            ],
        ],
    
    ],

    // ----------------------- 菜单配置 ----------------------- //

    'menu' => [

    ],

    // ----------------------- 权限配置 ----------------------- //

    'authItem' => [
    ],
];
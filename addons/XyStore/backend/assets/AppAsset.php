<?php

namespace addons\XyStore\backend\assets;

use yii\web\AssetBundle;

/**
 * 静态资源管理
 *
 * Class AppAsset
 * @package addons\XyStore\backend\assets
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@addons/XyStore/backend/resources/';

    public $css = [
        'css/tinyshop.css',
    ];

    public $js = [
        'js/tinyshop.js',
    ];

    public $depends = [
    ];
}
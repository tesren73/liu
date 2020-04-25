<?php

namespace addons\XyStore\merchant\assets;

use yii\web\AssetBundle;

/**
 * 静态资源管理
 *
 * Class AppAsset
 * @package addons\XyStore\merchant\assets
 */
class AppAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@addons/XyStore/merchant/resources/';

    public $css = [
        'css/tinyshop.css',
    ];

    public $js = [
        'js/tinyshop.js',
    ];

    public $depends = [
    ];
}
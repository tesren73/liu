<?php

namespace addons\XyStore\backend\controllers;

use common\helpers\AddonHelper;
use Yii;
use common\controllers\AddonsController;

/**
 * 默认控制器
 *
 * Class DefaultController
 * @package addons\XyStore\backend\controllers
 */
class BaseController extends AddonsController
{
    /**
    * @var string
    **/
     //public $layout = "@addons/XyStore/backend/views/layouts/main";

    public function init()
    {
        // 注册资源
        AddonHelper::filePath();

        $bundles = Yii::$app->assetManager->bundles;
        foreach ($bundles as $bundle) {
            if (YII_DEBUG && isset($bundle->baseUrl)) {
                $path = Yii::getAlias('@root') . '/web' . $bundle->baseUrl;
                //  FileHelper::removeDirectory($path);
            }
        }

        parent::init();
    }
}
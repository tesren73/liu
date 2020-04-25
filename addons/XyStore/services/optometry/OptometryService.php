<?php

namespace addons\XyStore\services\optometry;

use Yii;
use common\enums\StatusEnum;
use common\helpers\ArrayHelper;
use common\components\Service;
use addons\XyStore\common\models\optometry\Optometry;

/**
 * Class OptometryService
 * @package addons\XyStore\services\optometry
 * @author jianyan74 <751393839@qq.com>
 */
class OptometryService extends Service
{
    /**
     * @return array
     */
    public function getMapList()
    {
        return ArrayHelper::map($this->getList(), 'id', 'user_id');
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getList()
    {
        return Supplier::find()
            ->where(['status' => StatusEnum::ENABLED])
            ->andWhere(['merchant_id' => Yii::$app->services->merchant->getId()])
            ->orderBy('sort asc, id desc')
            ->asArray()
            ->all();
    }
}
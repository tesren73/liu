<?php

namespace addons\XyStore\services\member;

use common\models\member\Account;
use Yii;
use common\enums\StatusEnum;
use common\helpers\ArrayHelper;
use common\helpers\EchantsHelper;
use common\models\member\Member;
use common\components\Service;

/**
 * Class MemberService
 * @package addons\XyStore\services\member
 * @author jianyan74 <751393839@qq.com>
 */
class MemberService extends Service
{
    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public function findById($id, $select = ['*'])
    {
        return Member::find()
            ->select($select)
            ->where(['id' => $id, 'status' => StatusEnum::ENABLED])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->one();
    }

    /**
     * @return array
     */
    public function getMapList()
    {
        return ArrayHelper::map($this->getList(), 'id', 'username');
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getList()
    {
        return Member::find()
            ->where(['status' => StatusEnum::ENABLED])
            ->andWhere(['merchant_id' => Yii::$app->services->merchant->getId()])
            ->orderBy('id desc')
            ->asArray()
            ->all();
    }
    /**
     * @param $quary
     * @return array|\yii\db\ActiveRecord|null
     */
    public function findByQuary($quary, $select = ['*'])
    {
        return Member::find()
            ->select($select)
            ->where("status=:status and (username like :keyword or `mobile` like :keyword )")
            ->addParams([':status'=>StatusEnum::ENABLED,':keyword'=>$quary])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()])
            ->one();
    }
    public function findAccount($id, $select = ['*'])
    {
        return Account::find()
            ->select($select)
            ->where(['member_id' => $id, 'status' => StatusEnum::ENABLED])
            ->one();
    }
}
<?php

namespace addons\XyStore\common\models\optometry;

use common\behaviors\MerchantBehavior;
use Yii;
use common\models\member\Member;

/**
 * This is the model class for table "{{%addon_store_optometry}}".
 *
 * @property int $id id
 * @property string $temp_name 临时字段
 * @property int $user_id 客户编号
 * @property string $bill_number 订单编号
 * @property string $optometry_name 被检人名称
 * @property string $option_type 验光类型
 * @property string $right_sph 右眼球光
 * @property string $right_cyl 右眼散光
 * @property string $right_tax 右眼轴向
 * @property string $right_prism 右眼棱镜
 * @property string $right_basal 右眼基底
 * @property string $right_naked 右眼裸视
 * @property string $right_add 右眼ADD
 * @property string $right_pupil_height 右眼瞳高
 * @property string $right_arc 右眼基弧
 * @property string $right_pd 右眼PD
 * @property string $left_sph 左眼球光
 * @property string $left_cyl 左眼散光
 * @property string $left_tax 左眼轴向
 * @property string $left_prism 左眼棱镜
 * @property string $left_basal 左眼基底
 * @property string $left_corrected 左眼矫正
 * @property string $left_naked 左眼裸视
 * @property string $left_add 左眼ADD
 * @property string $left_pupil_height 左眼瞳高
 * @property string $left_arc 左眼基弧
 * @property string $left_pd 左眼PD
 * @property string $pd 瞳距
 * @property string $remark 备注
 * @property string $optometrist 验光师
 * @property string $right_corrected 右眼矫正
 * @property int $salers_id 导购员
 * @property int $merchant_id 商户id
 * @property int $updated_at 更新日期
 * @property int $created_at 单据日期
 * @property int $status 1正常 -1删除
 * @property int $created_user 制单员
 */
class Optometry extends \common\models\base\BaseModel
{
    use MerchantBehavior;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%addon_store_optometry}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['user_id', 'salers_id', 'merchant_id', 'updated_at', 'created_at', 'status', 'created_user'], 'integer'],
            [['temp_name', 'optometrist'], 'string', 'max' => 20],
            [['optometry_name', 'option_type', 'right_sph', 'right_cyl', 'right_tax', 'left_sph', 'left_cyl', 'left_tax', 'pd'], 'string', 'max' => 50],
            [['right_prism', 'right_basal', 'right_naked', 'right_add', 'right_pupil_height', 'right_arc', 'right_pd', 'left_prism', 'left_basal', 'left_corrected', 'left_naked', 'left_add', 'left_pupil_height', 'left_arc', 'left_pd', 'right_corrected'], 'string', 'max' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'temp_name' => '临时字段',
            'user_id' => '客户编号',
            'bill_number' => '订单编号',
            'optometry_name' => '被检人名称',
            'option_type' => '验光类型',
            'right_sph' => '右眼球光',
            'right_cyl' => '右眼散光',
            'right_tax' => '右眼轴向',
            'right_prism' => '右眼棱镜',
            'right_basal' => '右眼基底',
            'right_naked' => '右眼裸视',
            'right_add' => '右眼ADD',
            'right_pupil_height' => '右眼瞳高',
            'right_arc' => '右眼基弧',
            'right_pd' => '右眼PD',
            'left_sph' => '左眼球光',
            'left_cyl' => '左眼散光',
            'left_tax' => '左眼轴向',
            'left_prism' => '左眼棱镜',
            'left_basal' => '左眼基底',
            'left_corrected' => '左眼矫正',
            'left_naked' => '左眼裸视',
            'left_add' => '左眼ADD',
            'left_pupil_height' => '左眼瞳高',
            'left_arc' => '左眼基弧',
            'left_pd' => '左眼PD',
            'pd' => '瞳距',
            'remark' => '备注',
            'optometrist' => '验光师',
            'right_corrected' => '右眼矫正',
            'salers_id' => '导购员',
            'merchant_id' => '商户id',
            'updated_at' => '更新日期',
            'created_at' => '单据日期',
            'status' => '1正常 -1删除',
            'created_user' => '制单员',
        ];
    }
    public function getAccount()
    {
        return $this->hasOne(Member::className(), ['id' => 'user_id']);
    }
}
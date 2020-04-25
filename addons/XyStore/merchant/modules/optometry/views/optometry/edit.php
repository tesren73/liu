<?php

use common\enums\StatusEnum;
use common\helpers\Html;
use kartik\datetime\DateTimePicker;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model addons\XyStore\common\models\optometry\Optometry */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Optometry';
$this->params['breadcrumbs'][] = ['label' => 'Optometries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">基本信息</h3>
            </div>
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                    ],
                ]); ?>
                <div class="col-sm-12">
                    <?= $form->field($model, 'temp_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'user_id')->dropDownList($member, ['prompt' => '请选择']) ?>
                    <?= $form->field($model, 'bill_number')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'optometry_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'option_type')->dropDownList(['0'=>'远用','1'=>'近用']) ?>
                    <?= $form->field($model, 'right_sph')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_cyl')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_tax')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_prism')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_basal')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_naked')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_add')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_pupil_height')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_arc')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'right_pd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_sph')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_cyl')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_tax')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_prism')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_basal')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_corrected')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_naked')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_add')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_pupil_height')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_arc')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'left_pd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'pd')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>
                    <?= $form->field($model, 'optometrist')->dropDownList($merchantMember, ['prompt' => '请选择']) ?>
                    <?= $form->field($model, 'right_corrected')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'salers_id')->dropDownList($merchantMember, ['prompt' => '请选择']) ?>
                    <?= $form->field($model, 'updated_at')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->updated_at),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'created_at')->widget(kartik\datetime\DateTimePicker::class, [
                        'language' => 'zh-CN',
                        'options' => [
                            'value' => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->updated_at),
                        ],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd hh:ii',
                            'todayHighlight' => true, // 今日高亮
                            'autoclose' => true, // 选择后自动关闭
                            'todayBtn' => true, // 今日按钮显示
                        ]
                    ]) ?>
                    <?= $form->field($model, 'status')->radioList(StatusEnum::getMap()); ?>
                    <?= $form->field($model, 'created_user')->dropDownList($merchantMember, ['prompt' => '请选择']) ?>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary" type="submit">保存</button>
                        <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

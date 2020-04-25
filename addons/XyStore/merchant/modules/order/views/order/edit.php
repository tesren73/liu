<?php

use common\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model addons\XyStore\common\models\order\Order */
/* @var $form yii\widgets\ActiveForm */

$this->title = '销售单';
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
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
                    <?= $form->field($model, 'merchant_id')->textInput() ?>
                    <?= $form->field($model, 'merchant_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'order_sn')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'out_trade_no')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'order_type')->textInput() ?>
                    <?= $form->field($model, 'wholesale_id')->textInput() ?>
                    <?= $form->field($model, 'payment_type')->textInput() ?>
                    <?= $form->field($model, 'shipping_type')->textInput() ?>
                    <?= $form->field($model, 'order_from')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'buyer_id')->textInput() ?>
                    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'buyer_ip')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'buyer_message')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'buyer_invoice')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'receiver_mobile')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'receiver_province')->textInput() ?>
                    <?= $form->field($model, 'receiver_city')->textInput() ?>
                    <?= $form->field($model, 'receiver_area')->textInput() ?>
                    <?= $form->field($model, 'receiver_address')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'receiver_region_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'receiver_zip')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'receiver_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'seller_star')->textInput() ?>
                    <?= $form->field($model, 'seller_memo')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'consign_time_adjust')->textInput() ?>
                    <?= $form->field($model, 'product_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'product_virtual_group')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'order_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'point')->textInput() ?>
                    <?= $form->field($model, 'point_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'coupon_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'coupon_id')->textInput() ?>
                    <?= $form->field($model, 'user_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'user_platform_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'promotion_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'shipping_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'pay_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'refund_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'coin_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'give_point')->textInput() ?>
                    <?= $form->field($model, 'give_coin')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'order_status')->textInput() ?>
                    <?= $form->field($model, 'pay_status')->textInput() ?>
                    <?= $form->field($model, 'shipping_status')->textInput() ?>
                    <?= $form->field($model, 'review_status')->textInput() ?>
                    <?= $form->field($model, 'feedback_status')->textInput() ?>
                    <?= $form->field($model, 'is_evaluate')->textInput() ?>
                    <?= $form->field($model, 'tax_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'invoice_id')->textInput() ?>
                    <?= $form->field($model, 'company_id')->textInput() ?>
                    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'give_point_type')->textInput() ?>
                    <?= $form->field($model, 'pay_time')->textInput() ?>
                    <?= $form->field($model, 'shipping_time')->textInput() ?>
                    <?= $form->field($model, 'sign_time')->textInput() ?>
                    <?= $form->field($model, 'consign_time')->textInput() ?>
                    <?= $form->field($model, 'finish_time')->textInput() ?>
                    <?= $form->field($model, 'operator_type')->textInput() ?>
                    <?= $form->field($model, 'operator_id')->textInput() ?>
                    <?= $form->field($model, 'refund_balance_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'fixed_telephone')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'distribution_time_out')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'product_count')->textInput() ?>
                    <?= $form->field($model, 'is_virtual')->textInput() ?>
                    <?= $form->field($model, 'status')->textInput() ?>
                    <?= $form->field($model, 'created_at')->textInput() ?>
                    <?= $form->field($model, 'updated_at')->textInput() ?>
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
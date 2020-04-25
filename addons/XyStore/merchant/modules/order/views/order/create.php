<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model addons\XyStore\common\models\order\Order */

$this->title = '新订单';
$this->params['breadcrumbs'][] = ['label' => '订单列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">订单信息</h3>
            </div>
            <div class="box-body">

                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                    ],
                ]); ?>
                <div class="col-sm-12">

        <?= $form->field($model, 'merchant_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'order_sn')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'out_trade_no')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'order_type')->textInput() ?>

        <?= $form->field($model, 'wholesale_id')->textInput() ?>

        <?= $form->field($model, 'payment_type')->textInput() ?>

        <?= $form->field($model, 'shipping_type')->textInput()->label('配送方式') ?>

        <?= $form->field($model, 'order_from')->textInput(['maxlength' => true])->label('订单来源') ?>

        <?= $form->field($model, 'buyer_id')->textInput()->label('买家id') ?>

        <?= $form->field($model, 'user_name')->textInput(['maxlength' => true])->label('会员名称') ?>

        <?= $form->field($model, 'buyer_ip')->textInput(['maxlength' => true])->label('买家ip') ?>

        <?= $form->field($model, 'buyer_message')->textInput(['maxlength' => true])->label('买家附言') ?>

        <?= $form->field($model, 'buyer_invoice')->textInput(['maxlength' => true])->label('发票信息') ?>

        <?= $form->field($model, 'receiver_mobile')->textInput(['maxlength' => true])->label('收货人手机') ?>

        <?= $form->field($model, 'receiver_province')->textInput()->label('省') ?>

        <?= $form->field($model, 'receiver_city')->textInput()->label('市') ?>

        <?= $form->field($model, 'receiver_area')->textInput()->label('地区') ?>

        <?= $form->field($model, 'receiver_address')->textInput(['maxlength' => true])->label('街道') ?>

        <?= $form->field($model, 'receiver_region_name')->textInput(['maxlength' => true])->label('详址') ?>

        <?= $form->field($model, 'receiver_zip')->textInput(['maxlength' => true])->label('邮编') ?>

        <?= $form->field($model, 'receiver_name')->textInput(['maxlength' => true])->label('收货人姓名') ?>

        <?= $form->field($model, 'seller_star')->textInput()->label('卖家星级') ?>

        <?= $form->field($model, 'seller_memo')->textInput(['maxlength' => true])->label('买家备注') ?>

        <?= $form->field($model, 'consign_time_adjust')->textInput()->label('延迟发货') ?>

        <?= $form->field($model, 'product_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'product_virtual_group')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'order_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'point')->textInput() ?>

        <?= $form->field($model, 'point_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'coupon_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'coupon_id')->textInput() ?>

        <?= $form->field($model, 'user_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'user_platform_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'promotion_money')->textInput(['maxlength' => true])->label('优惠金额') ?>

        <?= $form->field($model, 'shipping_money')->textInput(['maxlength' => true])->label('运费') ?>

        <?= $form->field($model, 'pay_money')->textInput(['maxlength' => true])->label('实付金额') ?>

        <?= $form->field($model, 'refund_money')->textInput(['maxlength' => true])->label('退款金额') ?>

        <?= $form->field($model, 'coin_money')->textInput(['maxlength' => true])->label('购物币金额') ?>

        <?= $form->field($model, 'give_point')->textInput()->label('赠送积分') ?>

        <?= $form->field($model, 'give_coin')->textInput(['maxlength' => true])->label('返购物币') ?>

        <?= $form->field($model, 'order_status')->textInput() ?>

        <?= $form->field($model, 'pay_status')->textInput() ?>

        <?= $form->field($model, 'shipping_status')->textInput() ?>

        <?= $form->field($model, 'review_status')->textInput()->label('评价状态') ?>

        <?= $form->field($model, 'feedback_status')->textInput()->label('维权状态') ?>

        <?= $form->field($model, 'is_evaluate')->textInput()->label('是否评价') ?>

        <?= $form->field($model, 'tax_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'invoice_id')->textInput()->label('发票id') ?>

        <?= $form->field($model, 'company_id')->textInput() ?>

        <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'give_point_type')->textInput() ?>

        <?= $form->field($model, 'pay_time')->textInput() ?>

        <?= $form->field($model, 'shipping_time')->textInput() ?>

        <?= $form->field($model, 'sign_time')->textInput() ?>

        <?= $form->field($model, 'consign_time')->textInput() ?>

        <?= $form->field($model, 'finish_time')->textInput() ?>

        <?= $form->field($model, 'operator_type')->textInput()->label('操作人类型') ?>

        <?= $form->field($model, 'operator_id')->textInput()->label('操作人id') ?>

        <?= $form->field($model, 'refund_balance_money')->textInput(['maxlength' => true])->label('退款余额') ?>

        <?= $form->field($model, 'fixed_telephone')->textInput(['maxlength' => true])->label('固定电话') ?>

        <?= $form->field($model, 'distribution_time_out')->textInput(['maxlength' => true])->label('配送时间段') ?>

        <?= $form->field($model, 'product_count')->textInput() ?>

        <?= $form->field($model, 'is_virtual')->textInput()->label('是否虚拟') ?>

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
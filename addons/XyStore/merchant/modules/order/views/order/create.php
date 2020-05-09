<?php

use common\helpers\ArrayHelper;
use common\helpers\Html;
use common\helpers\Url;
use unclead\multipleinput\MultipleInput;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

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
            <div class="box-body">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{input}\n{hint}\n{error}</div>",
                    ],
                ]); ?>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <td colspan="3">
                            <input type="text" style="width:350px" class="form-control pull-left" id="cardnumber" placeholder="请输入会员卡或者手机号">
                            &nbsp;
                            <input class="btn btn-success" type="button" id="query" value="搜索">
                        </td>
                        <td>订单编号</td>
                        <td colspan="2"><?= $form->field($model, 'order_sn')->textInput(['maxlength' => true])->label(false);?></td>
                    </tr>
                    <tr>
                        <th >会员ID:</th>
                        <td colspan="5"><?= Html::textInput('buyer', '', [
                                'class' => 'form-control buyer',
                                'style' => 'width:100px',
                                'readonly' => true,
                            ]) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>姓名</th>
                        <td><?= Html::textInput('user_name', '', [
                                'class' => 'form-control user_name',
                                'readonly' => true,
                            ]) ?></td>
                        <th>性别</th>
                        <td><?= Html::textInput('gender', '', [
                                'class' => 'form-control gender',
                                'readonly' => true,
                            ]) ?></td>
                        <th>积分</th>
                        <td ><?= Html::textInput('user_integral', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                    </tr>
                    <tr>
                        <th>昵称</th>
                        <td><?= Html::textInput('nickname', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                        <th>会员级别</th>
                        <td><?= Html::textInput('current_level', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                        <th>登记日期</th>
                        <td><?= Html::textInput('created_at', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                    </tr>
                    <tr>
                        <th>账户金额(元)</th>
                        <td><?= Html::textInput('user_money', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                        <th>手机号</th>
                        <td><?= Html::textInput('mobile', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                        <th>欠款金额(元)</th>
                        <td><?= Html::textInput('arrears', '', [
                                'class' => 'form-control attribute',
                                'readonly' => true,
                            ]) ?></td>
                    </tr>
                </table>
            </div>
                <div class="col-md-12">
                    <h4>商品信息</h4>
                    <?= $form->field($model, 'products')->widget(MultipleInput::class, [
                        'max' => 10,
                        'cloneButton' => true,
                        'columns' => [
                            [
                                'name'  => 'product_id',
                                'type'  => 'dropDownList',
                                'title' => '商品分类',
                                'items' => $product,
                                'options' => [
                                    'class' => 'form-control',
                                    'style' => 'width:100px',
                                ]
                            ],
                            [
                                'name'  => 'attribute',
                                'title' => '商品属性',
                                'enableError' => true,
                                'options' => [
                                    'readonly' => true,
                                    'style' => 'width:200px',
                                ]
                            ],
                            [
                                'name'  => 'degrees',
                                'title' => '度数',
                                'type'  => 'dropDownList',
                                'items' => [],
                                'options' => [
                                    'class' => 'form-degrees',
                                    'style' => 'width:80px',
                                ]
                            ],
                            [
                                'name'  => 'astigmia',
                                'title' => '散光',
                                'type'  => 'dropDownList',
                                'items' => [],
                                'options' => [
                                    'class' => 'form-astigmia',
                                    'style' => 'width:80px',
                                ]
                            ],
                            [
                                'name'  => 'qty',
                                'title' => '数量',
                                'defaultValue' => 1,
                                'enableError' => true,
                                'options' => [
                                ]
                            ],
                            [
                                'name'  => 'price',
                                'title' => '单价',
                                'defaultValue' => 0.00,
                                'enableError' => true,
                                'options' => [
                                ]
                            ]
                        ]
                    ])->label(false); ?>
                </div>

                <div class="col-md-12">
                    <h4>收款信息</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>总金额：</th>
                            <td><?= $form->field($model, 'order_money')->textInput(['maxlength' => true,'value' => 0])->label(false);?></td>
                            <th>消耗积分：</th>
                            <td><?= $form->field($model, 'point')->textInput(['maxlength' => true,'value' => 0])->label(false);?></td>
                            <th>承担费用：</th>
                            <td><?= $form->field($model, 'shipping_money')->textInput(['maxlength' => true,'value' => 0])->label(false);?></td>
                        </tr>
                        <tr>
                            <th>结算账户：</th>
                            <td><?= $form->field($model, 'payment_type')->dropDownList([
                                    '1' => '1',
                                ])->label(false);?></td>
                            <th>付款金额：</th>
                            <td><?= $form->field($model, 'pay_money')->textInput(['maxlength' => true,'value' => 0])->label(false);?></td>
                            <th>余额支付：</th>
                            <td><?= $form->field($model, 'user_money')->textInput(['value' => 0])->label(false);?></td>
                        </tr>
                        <tr>
                            <th>制单人：</th>
                            <td></td>
                            <th>订单状态</th>
                            <td><?= $form->field($model, 'order_status')->dropDownList(['1'=>'1'
                                ])->label(false);?></td>
                            <th>审核人：</th>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <button class="btn btn-primary" type="button" onclick="beforSubmit()">保存</button>
                        <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<<JS

$(document).on('change', 'select', function(){
    var selectnum = $("#w1 option:selected").text();//监听select改变，获取下拉选项值
    var string_id=$(this).attr('id');  //order-products-0-product_id
    var sid=string_id.split("-");
    var number = document.getElementById(string_id).value;
    if(string_id.indexOf("product_id") != -1){
        var url = '/merchant/xy-store/order/order/attribute';
    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
            url:url,
            dataType : 'json',
    		data:{'product_id':number},   //传值到控制器，获取相应数据
    		success : function(data){
    	        //alert (JSON.stringify(data['degrees']['id']));
                $("#order-products-"+sid[2]+"-attribute").val(data['attribute']);
                for (var i = 0; i < data['degrees'].length; i++) {
                    $("#order-products-"+sid[2]+"-degrees").append("<option value=" + data['degrees'][i].id + ">" + data['degrees'][i].title + "</option>");
                }
                // 缺一不可  
                $("#order-products-"+sid[2]+"-degrees").selectpicker('refresh');
                $("#order-products-"+sid[2]+"-degrees").selectpicker('render');
                for (var i = 0; i < data['astigmia'].length; i++) {
                    $("#order-products-"+sid[2]+"-astigmia").append("<option value=" + data['astigmia'][i].id + ">" + data['astigmia'][i].title + "</option>");
                }
                // 缺一不可  
                $("#order-products-"+sid[2]+"-astigmia").selectpicker('refresh');
                $("#order-products-"+sid[2]+"-astigmia").selectpicker('render');
    		},
    	    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                   //alert (errorThrown);
                                  	//alert(XMLHttpRequest.status);
      					},
    	});
    }
});
 
$("#order-order_money").click(function () {
    var toutelamou = 0;
    for (var i = 0; i < 10; i++) {
    //alert($("#invoiceinfo-invoiceinfo-"+i+"-saleprice").val());
        if($("#order-products-"+i+"-price").length>0){
           toutelamou += $("#order-products-"+i+"-price").val()*$("#order-products-"+i+"-qty").val();
        }
    }
    $("#order-order_money").val(toutelamou);
   // $("#invoices-rp_amount").val(toutelamou);
});
$("#order-shipping_money").change(function () {
    var disamount = 0;
    //alert($("#invoices-dis_amount").val());
           disamount = parseInt($("#order-order_money").val())+parseInt($("#order-shipping_money").val());
    //alert(toutelamou);
    $("#order-pay_money").val(disamount);
});
$("#order-pay_money").click(function () {
    var disamount = 0;
    //alert($("#invoices-dis_amount").val());
           disamount = parseInt($("#order-order_money").val())+parseInt($("#order-shipping_money").val());
    //alert(toutelamou);
    $("#order-pay_money").val(disamount);
});
$("#order-user_money").change(function () {
            //var url = 'http://localhost/backend/yanpei/getgoods';
        var pay_money = document.getElementById("order-pay_money").value;
        var user_money = document.getElementById("user_money").value;
            if(parseInt(user_money) < parseInt(pay_money)){
                alert("用户余额不足！");
                $("#order-user_money").val('0');
    		}
});

        function queryMember() {
            var cardnumber = $("#cardnumber").val();
            // alert(cardnumber);
            var url = '/merchant/xy-store/order/order/getmember';  
            $.ajax({
                async:false,
                type : 'post',
                cache:false,
                url:url,
                dataType : 'json',
                data:{'mobile':cardnumber},
                success: function(ret) {
                    // alert (ret['id']);
                    //bind data to page
                    $("input[name='buyer']").val(ret['id']);
                    $("input[name='user_name']").val(ret['username']);
                    $("input[name='user_integral']").val(ret['user_integral']);
                    $("input[name='nickname']").val(ret['nickname']);
                    $("input[name='current_level']").val(ret['current_level']);
                    $("input[name='created_at']").val(ret['created_at']);
                    $("input[name='gender']").val(ret['gender']);
                    $("input[name='mobile']").val(ret['mobile']);
                    $("input[name='user_money']").val(ret['user_money']);
                    $("input[name='arrears']").val(ret['arrears']);
                },
                error: function() {
                    alert('查询会员信息失败。');
                }
            });
        }
        $('#cardnumber').bind('keydown', function(event) {
            if (event.keyCode == "13") {
                queryMember();
            }
        });
        $('#query').click(function() {
            queryMember();
        });
        
    // 防止重复提交
    var submitStatus = true;
    // 验证并提交表单
    function beforSubmit() {
        if (submitStatus === false) {
          // rfWarning('正在提交中...');
          // return;
        }

        // 启用
        if ($("input[name='buyer']").val() == ''){
            rfWarning('请搜索新订单的会员信息');
            return;
        }
        submitStatus = false;
        $.ajax({
            type : "post",
            url : "<?= Url::to(['create', 'id' => $model->id]); ?>",
            dataType : "json",
            data : data,
            success: function(data) {
                submitStatus = true;
                if (parseInt(data.code) === 200) {
                    swal("操作成功", "小手一抖就打开了一个框", "success").then((value) => {
                        window.location = '<?= Url::to(['index']); ?>';
                    });
                } else {
                    rfWarning(data.message);
                }
            }
        });
    }
JS;
$this->registerJs($js);
?>
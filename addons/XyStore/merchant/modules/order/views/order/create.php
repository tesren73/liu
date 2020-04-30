<?php

use common\helpers\Html;
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
                        <td colspan="6">
                            <h4>会员信息</h4>
                        </td>
                    </tr>
                    <tr>
                        <th>姓名</th>
                        <td id="username">-</td>
                        <th>性别</th>
                        <td id="gender">-</td>
                        <th>积分</th>
                        <td id="user_integral">-</td>
                    </tr>
                    <tr>
                        <th>昵称</th>
                        <td id="nickname">-</td>
                        <th>会员级别</th>
                        <td id="current_level">-</td>
                        <th>登记日期</th>
                        <td id="created_at">-</td>
                    </tr>
                    <tr>
                        <th>账户金额(元)</th>
                        <td id="user_money">-</td>
                        <th>手机号</th>
                        <td id="mobile">-</td>
                        <th>欠款金额(元)</th>
                        <td id="arrears">-</tdarea_id>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <?= $form->field($model, 'modelProduct')->widget(MultipleInput::className(), [
                                    'max' => 10,
                                    'cloneButton' => true,
                                    'columns' => [
                                        [
                                            'name'  => 'name',
                                            'type'  => 'dropDownList',
                                            'title' => '商品名称',
                                            'enableError' => true,
                                            'items'  => '',
                                            'options' => [
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'attribute',
                                            'title' => '商品属性',
                                            'type'  => 'dropDownList',
                                            'enableError' => true,
                                            'items'  => '',
                                            'options' => [
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'attribute_value',
                                            'title' => '商品属性值',
                                            'type'  => 'dropDownList',
                                            'enableError' => true,
                                            'options' => [
                                                'readonly' => true,
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'spec',
                                            'title' => '度数',
                                            'defaultValue' => 0,
                                            'enableError' => true,
                                            'options' => [
                                                'readonly' => true,
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'spec_value',
                                            'title' => '散光',
                                            'defaultValue' => 0,
                                            'enableError' => true,
                                            'options' => [
                                                'readonly' => true,
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'qty',
                                            'title' => '数量',
                                            'defaultValue' => 1,
                                            'enableError' => true,
                                            'options' => [
                                                'class' => 'input-priority'
                                            ]
                                        ],
                                        [
                                            'name'  => 'price',
                                            'title' => '单价',
                                            'defaultValue' => 0.00,
                                            'enableError' => true,
                                            'options' => [
                                                'class' => 'input-priority'
                                            ]
                                        ]
                                    ]
                                ])->label(false); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-md-12">
                    <h4>收款信息</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>总金额：</th>
                            <td><?= $form->field($model, 'order_money')->textInput(['maxlength' => true])->label(false);?></td>
                            <th>消耗积分：</th>
                            <td><?= $form->field($model, 'point')->textInput(['maxlength' => true])->label(false);?></td>
                            <th>承担费用：</th>
                            <td><?= $form->field($model, 'shipping_money')->textInput(['maxlength' => true])->label(false);?></td>
                        </tr>
                        <tr>
                            <th>结算账户：</th>
                            <td><?= $form->field($model, 'payment_type')->dropDownList([
                                    'data' => '',
                                ])->label(false);?></td>
                            <th>付款金额：</th>
                            <td><?= $form->field($model, 'pay_money')->textInput(['maxlength' => true])->label(false);?></td>
                            <th>余额支付：</th>
                            <td><?= $form->field($model, 'user_money')->textInput()->label(false);?></td>
                        </tr>
                        <tr>
                            <th>制单人：</th>
                            <td><?= $form->field($model, 'operator_id')->textInput(['maxlength' => true,'value' => Yii::$app->user->identity->username,'readonly' => true])->label(false);?></td>
                            <th>订单状态</th>
                            <td><?= $form->field($model, 'order_status')->dropDownList([
                                    'data' => '',
                                ])->label(false);?></td>
                            <th>审核人：</th>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
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

<!--添加模板-->

<?php
$js = <<<JS
$(document).on('change', 'select', function(){
    var selectnum = $("#w1 option:selected").text();//监听select改变，获取下拉选项值

   var string_id=$(this).attr('id');  //order-modelproduct-0-name
    var number = document.getElementById(string_id).value;
    if(string_id.indexOf("name") != -1){

        var url = '/merchant/order/order/getattribute';
    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
            url:url,
            dataType : 'json',
    		data:{'product_id':number},   //传值到控制器，获取相应数据
    		success : function(data){
                 $("#user_integral").val(data['user_integral']);
                $("#user_money").val(data['user_money']);
                $("#mobile").val(data['mobile']);
                $("#current_level").val(data['current_level']);
    		},
    	    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                   //alert (errorThrown);
                                  	//alert(XMLHttpRequest.status);
      					},
    		});
    }
    if(string_id.indexOf("invoiceinfo") != -1){
        var messagediv = document.getElementById("message-tip");
        messagediv.innerHTML="";
       var sid=string_id.split("-");
       var url = '/backend/yanpei/getgoods';
       //var url = 'http://localhost/backend/yanpei/getgoods';

    	$.ajax({
    	    async:false,
    		type : 'post',
    		cache:false,
           url:url,
           dataType : 'json',
    		data:{'number':number},   //传值到控制器，获取相应数据
    		success : function(data){
                if('0'==data[0]['quantity']){
                    messagediv.innerHTML="<font color='red'>您选择的商品库存不足！请重新选择。</font>";
    		    }else{
                   //var obj = JSON.parse(data);    //解析从控制器传来的数据（此时是数组）
                   $("#invoiceinfo-invoiceinfo-"+sid[2]+"-name").val(data[0]['name']);
                   //document.getElementById("invoiceinfo-goodsinfo-"+sid[2]+"-degrees").value = data[0]['degrees'];
                   //$("#input-degrees").val(obj[0]['degrees']);//解析后的数据相应值放到对应ID的文本框中
                   $("#invoiceinfo-invoiceinfo-"+sid[2]+"-degrees").val(data[0]['degrees']);
                    $("#invoiceinfo-invoiceinfo-"+sid[2]+"-astigmia").val(data[0]['astigmia']);
                    $("#invoiceinfo-invoiceinfo-"+sid[2]+"-price").val(data[0]['saleprice']);
                }
    		},
    	       error: function(XMLHttpRequest, textStatus, errorThrown) {
                                   //alert (errorThrown);
                                  	//alert(XMLHttpRequest.status);
      					},
    		});
   }
});

$("#invoices-total_amount").click(function () {
    var toutelamou = 0;
    for (var i = 0; i < 10; i++) {
    //alert($("#invoiceinfo-invoiceinfo-"+i+"-saleprice").val());
        if($("#invoiceinfo-invoiceinfo-"+i+"-price").length>0){
           toutelamou += $("#invoiceinfo-invoiceinfo-"+i+"-price").val()*$("#invoiceinfo-invoiceinfo-"+i+"-qty").val();
        }
    }
    //alert(toutelamou);
    $("#invoices-total_amount").val(toutelamou);
   // $("#invoices-rp_amount").val(toutelamou);
});
$("#invoices-rp_amount").change(function () {
    var disamount = 0;
    //alert($("#invoices-dis_amount").val());
           disamount = $("#invoices-total_amount").val()-$("#invoices-rp_amount").val()-$("#invoices-customer_free").val();
    //alert(toutelamou);
    $("#invoices-dis_amount").val(disamount);
});

$("#invoices-hx_amount").change(function () {

    if($("#invoices-hx_amount").val() == 1){
            //var url = 'http://localhost/backend/yanpei/getgoods';
        var pay_money = document.getElementById("invoices-rp_amount").value;
        var user_money = document.getElementById("user_money").value;
        if (user_money == "") user_money = 0;
            if(parseInt(user_money) < parseInt(pay_money)){
                alert("用户余额不足！");
                $("#invoices-hx_amount").val('0');
    		}
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
                    // alert (JSON.stringify(ret));
                        //bind data to page
                        $("#username").html(ret['username']);
                        $("#user_integral").html(ret['user_integral']);
                        $("#nickname").html(ret['nickname']);
                        $("#current_level").html(ret['current_level']);
                        $("#created_at").html(ret['created_at']);
                        $("#gender").html(ret['gender']);
                        $("#arrears").html(ret['arrears']);
                        $("#user_money").html(ret['user_money']);
                        $("#mobile").html(ret['mobile']);
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
JS;
$this->registerJs($js);
?>
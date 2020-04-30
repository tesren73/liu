<?php

use common\enums\StatusEnum;
use common\helpers\AddonHelper;
use common\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model addons\XyStore\common\models\order\Order */

$this->title = '新订单';
$this->params['breadcrumbs'][] = ['label' => '订单列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <?php $form = ActiveForm::begin([
            'id' => 'productForm',
        ]); ?>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">基本</a></li>
                <li><a href="#tab_2" data-toggle="tab">库存规格</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active p-xs" id="tab_1">
                    <?= $this->render('_specification', [
                        'model' => $model,
                        'form' => $form,
                        'specValue' => $specValue,
                        'attributeValue' => $attributeValue,
                        'baseAttribute' => $baseAttribute,
                    ]) ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane p-xs" id="tab_2">

                </div>
                <!-- /.tab-pane -->
                <div class="box-footer text-center">
                    <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>
                    <div class="hide" id="specValue"></div>
                    <button class="btn btn-primary" type="button" onclick="beforSubmit()">保存</button>
                    <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <?php ActiveForm::end(); ?>
        <!-- nav-tabs-custom -->
    </div>
</div>

<script>
    // 默认sku
    var defaultSku = JSON.parse('<?= json_encode($skus); ?>');
    // 默认规格属性
    var defaultSpecValue = JSON.parse('<?= json_encode($specValuejsData); ?>');
    let batchType = 1;
    // 所有选中数据
    var allData = [];
    // 所有重组sku数据
    var allSku = [];
    // sku值存储的数据
    var skusDataArr = [];
    var defaultAddImg = "<?= AddonHelper::file('img/sku-add.png') ?>";

    // 初始化渲染
    $(document).ready(function () {
            // 禁用输入
            if($("#productform-stock").attr("readonly") != "readonly"){
                $("#productform-stock").val(0).attr("readonly","readonly");
            }
            if($("#productform-price").attr("readonly") != "readonly"){
                $("#productform-price").val(0).attr("readonly","readonly");
            }
            if($("#productform-market_price").attr("readonly") != "readonly"){
                $("#productform-market_price").val(0).attr("readonly","readonly");
            }
            if($("#productform-cost_price").attr("readonly") != "readonly"){
                $("#productform-cost_price").val(0).attr("readonly","readonly");
            }

            // 写入sku
            for (let i = 0; i < defaultSku.length; i++) {
                let skuId = defaultSku[i]['data'];
                let data = [];
                data['sku'] = defaultSku[i]['data'];
                data['price'] = defaultSku[i]['price'];
                data['picture'] = defaultSku[i]['picture'];
                data['marketPrice'] = defaultSku[i]['market_price'];
                data['costPrice'] = defaultSku[i]['cost_price'];
                data['stock'] = defaultSku[i]['stock'];
                data['code'] = defaultSku[i]['code'];

                skusDataArr[skuId] = [];
                skusDataArr[skuId] = data;
            }

            // 写入规格属性
            for (let i = 0; i < defaultSpecValue.length; i++) {
                $("#option-" + defaultSpecValue[i]['id']).removeClass('btn-white');
                $("#option-" + defaultSpecValue[i]['id']).addClass('btn-primary');
                addAttributes (defaultSpecValue[i]['id'], defaultSpecValue[i]['title'], defaultSpecValue[i]['pid'], defaultSpecValue[i]['ptitle'], false)
            }

            if (allData.length > 0) {
                // 创建表头
                createTableHeader();
                // 创建内容
                createTableBody();
                // 创建表格底部
                createTableFoot();
                // 写入表格内的sku数据
                setSkusDataArr();
                $('.js-spec-table').removeClass('hide');
            }
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
        if ($("input[name='ProductForm[is_attribute]']:checked").val() == '1' && allData.length == 0){
            rfWarning('请选择填写商品规格信息');
            return;
        }

        // 设置规格属性
        var html = '';
        for (let i = 0; i < allData.length; i++) {
            var spec_id = allData[i]['id'];

            var inputOptionStr = '';
            var child = allData[i]['child'];
            for (let j = 0; j < child.length; j++) {
                let str = inputOptionStr ? '-' : '';
                inputOptionStr += str + child[j]['id'];
            }

            html += '<input type="text" name="specValue[' + spec_id + ']" value="' + inputOptionStr + '">';
        }

        $('#specValue').html(html);

        // 序列化数据
        var data = $('#productForm').serializeArray();
        // console.log(data);

        submitStatus = false;
        $.ajax({
            type : "post",
            url : "<?= Url::to(['create', 'id' => $model->id, 'virtual_group' => $virtual_group]); ?>",
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

    // 包邮
    $("input[name='ProductForm[shipping_type]']").click(function () {
        var val = $(this).val();
        if (val == '2'){
            $('.shipping').removeClass('hide');
            // $('.shipping').find('.form-group').addClass('required');
            // $('.field-product-shipping_fee_type').removeClass('required');
        }else{
            $('.shipping').addClass('hide');
        }
    });

    // 积分
    $("input[name='ProductForm[point_exchange_type]']").click(function () {
        var val = $(this).val();
        if (val == '1'){
            $('.shipping-point-for-now').removeClass('hide');
            $('.shipping-point').addClass('hide');
        }else{
            $('.shipping-point').removeClass('hide');
            $('.shipping-point-for-now').addClass('hide');
        }
    });

    // 选择商品模型
    $("select[name='ProductForm[base_attribute_id]']").change(function () {
        var base_attribute_id = $(this).val();

        // 所有选中数据
        allData = [];
        // 所有重组sku数据
        allSku = [];
        // sku值存储的数据
        skusDataArr = [];
        createTable();

        if (!base_attribute_id || parseInt(base_attribute_id) === 0) {
            $('.control-group').addClass('hide');
            return;
        }

        $.ajax({
            type : "get",
            url : "<?= Url::to(['/product/product/base-spec-attribute']); ?>",
            dataType : "json",
            data : {base_attribute_id: base_attribute_id},
            success: function(data){
                if (parseInt(data.code) === 200) {
                    $('.control-group').removeClass('hide');
                    // 规格和规格值
                    var attributeHtml = template('spec', data.data);
                    $('.js-goods-sku').html(attributeHtml);
                    // 参数
                    var paramsHtml = template('attributeValue', data.data);
                    $('.js-goods-sku-attribute').html(paramsHtml);
                } else {
                    rfWarning(data.message);
                }
            }
        });
    });

    // 属性点击
    $(document).on("click",".js-goods-sku span",function(){
        var title = $(this).data('title');
        var id = $(this).data('id');
        var pid = $(this).data('pid');
        var ptitle = $(this).data('ptitle');
        if (parseInt($(this).data('type')) > 0) {
            if ($(this).hasClass('btn-white')) {
                $(this).removeClass('btn-white');
                $(this).addClass('btn-primary');

                // 加入规格总数组
                addAttributes (id, title, pid, ptitle);
            } else {
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-white');

                // 删除规格总数组
                delAttributes (id, title, pid, ptitle);
            }
        }
    });

    // 批量设置
    function batch(type) {
        let batchText = [];
        batchText[1] = '销售价';
        batchText[2] = '市场价';
        batchText[3] = '成本价 ';
        batchText[4] = '库存 ';
        batchText[5] = '商家编码 ';

        $('.js-batch-form').removeClass('hide');
        $('.js-batch-type').addClass('hide');
        $('.js-batch-txt').attr('placeholder', '请输入' + batchText[type]);
        $('.js-batch-txt').focus();
        batchType = type;
    }

    // 报错批量设置
    $(document).on("click",".js-batch-save",function(){
        let batch_txt = $('.js-batch-txt');
        let val = parseFloat(batch_txt.val());
        if (batchType === 1 || batchType === 2 || batchType === 2) {
            if (val > 9999999.99) {
                rfWarning('价格最大为 9999999.99');
                batch_txt.focus();
                return false;
            } else if (!/^\d+(\.\d+)?$/.test(batch_txt.val())) {
                rfWarning('请输入合法的价格');
                batch_txt.focus();
                return false;
            } else {
                batch_txt.val(val.toFixed(2));
            }
        }

        if (batchType === 1) {
            $('.js-price').val(val)
        }

        if (batchType === 2) {
            $('.js-market-price').val(val)
        }

        if (batchType === 3) {
            $('.js-cost-price').val(val)
        }

        if (batchType === 4) {
            if (!/^\d+$/.test(batch_txt.val())) {
                rfWarning('请输入合法的数字');
                batch_txt.focus();
                return false;
            }

            $('.js-stock-num').val(val)
        }

        if (batchType === 5) {
            $('.js-code').val(val)
        }

        $('.js-batch-txt').val('');
        $('.js-batch-form').addClass('hide');
        $('.js-batch-type').removeClass('hide');
    });

    // 取消批量设置
    $(document).on("click",".js-batch-cancel",function(){
        $('.js-batch-txt').val('');
        $('.js-batch-form').addClass('hide');
        $('.js-batch-type').removeClass('hide');
    });

    // 增加规格属性
    function addAttributes (id, title, pid, ptitle, create = true) {

        var set = false;
        // 判断是否已经存在父类
        for (let i = 0; i < allData.length; i++) {
            if (parseInt(allData[i]['id']) === parseInt(pid)) {
                set = true;
            }
        }

        // 设置父类
        if (set === false) {
            var parent = [];
            parent['id'] = pid;
            parent['title'] = ptitle;
            parent['child'] = [];

            allData.push(parent);
        }

        // 写入子集
        for (let i = 0; i < allData.length; i++) {
            if (parseInt(allData[i]['id']) === parseInt(pid)) {
                var child = [];
                child['id'] = id;
                child['title'] = title;
                allData[i]['child'].push(child);
            }
        }

        if (create === true) {
            createTable();
        }
    }

    // 删除规格属性
    function delAttributes (id, title, pid, ptitle) {
        // 查找父级
        for (let i = 0; i < allData.length; i++) {
            if (parseInt(allData[i]['id']) === parseInt(pid)) {
                // 查找子级
                for (let j = 0; j < allData[i]['child'].length; j++) {
                    if (parseInt(allData[i]['child'][j]['id']) === parseInt(id)) {
                        allData[i]['child'].splice(j, 1);
                    }
                }

                // 判断是否所有子级为空则全删除
                if (allData[i]['child'].length === 0) {
                    allData.splice(i, 1);
                }
            }
        }

        console.log(allData)

        createTable();
    }

    // 创建表格
    function createTable() {
        skusDataArr = [];
        if (allData.length > 0) {
            // 获取表格内的sku数据
            getSkusDataArr();
            // 创建表头
            createTableHeader();
            // 创建内容
            createTableBody();
            // 创建表格底部
            createTableFoot();
            // 写入表格内的sku数据
            setSkusDataArr();
            $('.js-spec-table').removeClass('hide');
        } else {
            $('.js-spec-table').addClass('hide');
        }
    }

    // 创建表格头
    function createTableHeader() {
        let header = [];
        header["data"] = [];
        for (let i = 0; i < allData.length; i++) {
            header["data"][i] = allData[i]['title'];
        }

        let headerHtml = template('header', header);
        $(".js-spec-table table thead").html(headerHtml);
    }

    // 创建表格内容
    function createTableBody() {
        allSku = [];
        var allNum = 1;
        for (let i = 0; i < allData.length; i++) {
            allNum *= allData[i]['child'].length
        }

        // 总sku
        for (let i = 0; i < allNum; i++) {
            allSku[i] = [];
            allSku[i]['sku'] = '';
            allSku[i]['child'] = [];
        }

        // 重新排序sku
        var allLen = 1;
        for (let i = 0; i < allData.length; i++) {
            var nowLen = 0;
            var child = allData[i]['child'];
            // 每个循环次数
            var childCirculationNum = (allNum / allLen) / child.length;

            for (let j = 0; j < allLen; j++) {
                // 子级每次循环
                for (let k = 0; k < child.length; k++) {
                    for (let z = 0; z < childCirculationNum; z++) {
                        // 设置sku
                        let str = allSku[nowLen]['sku'].length > 0 ? '-' : '';
                        allSku[nowLen]['sku'] = allSku[nowLen]['sku'] + str + child[k]['id'];
                        // 设置属性名称
                        allSku[nowLen]['child'].push(child[k]);

                        nowLen++;
                    }
                }
            }

            allLen *= child.length;
        }

        // 渲染
        let body = [];
        body["data"] = allSku;
        $(".js-spec-table table tbody").html(template('body', body));
    }

    // 创建表格底部
    function createTableFoot() {
        let data = [];
        data['colspan']  = allData.length + 5;

        let html = template('foot', data);
        $(".js-spec-table table tfoot").html(html);
    }

    // 获取sku存储的数据
    function getSkusDataArr() {
        $(".js-spec-table table tbody tr").each(function () {
            let skuId = $(this).attr('id');
            let data = [];
            data['sku'] = skuId;
            data['picture'] = $(this).find('.js-picture').val();
            data['price'] = $(this).find('.js-price').val();
            data['marketPrice'] = $(this).find('.js-market-price').val();
            data['costPrice'] = $(this).find('.js-cost-price').val();
            data['stock'] = $(this).find('.js-stock-num').val();
            data['code'] = $(this).find('.js-code').val();

            skusDataArr[skuId] = [];
            skusDataArr[skuId] = data;
        });

        return skusDataArr;
    }

    // 写入sku存储的数据
    function setSkusDataArr() {
        $(".js-spec-table table tbody tr").each(function () {
            let skuId = $(this).attr('id');
            if (skusDataArr.hasOwnProperty(skuId)) {
                $(this).find('.js-picture').val(skusDataArr[skuId]['picture']);
                if (skusDataArr[skuId]['picture'].length > 0) {
                    $(this).find('.selectImage').attr('src', skusDataArr[skuId]['picture']);
                } else {
                    $(this).find('.selectImage').attr('src', defaultAddImg);
                }

                $(this).find('.js-price').val(skusDataArr[skuId]['price']);
                $(this).find('.js-market-price').val(skusDataArr[skuId]['marketPrice']);
                $(this).find('.js-cost-price').val(skusDataArr[skuId]['costPrice']);
                $(this).find('.js-stock-num').val(skusDataArr[skuId]['stock']);
                $(this).find('.js-code').val(skusDataArr[skuId]['code']);
            } else {
                $(this).find('.selectImage').attr('src', defaultAddImg);
            }
        });
    }
</script>
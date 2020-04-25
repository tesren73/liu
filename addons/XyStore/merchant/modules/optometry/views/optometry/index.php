<?php

use common\helpers\Html;
use common\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '验光列表';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="box-tools">
                    <?= Html::create(['edit']) ?>
                </div>
            </div>
            <div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover'],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'visible' => false,
            ],

            //'id',
            //'temp_name',
            [
                'attribute'=>'user_id',
                'label'=>'会员姓名',
//                'value'=>'account.username',
            ],
            'bill_number',
            'optometry_name',
            'option_type',
//                'filter' => false, //不显示搜索框
//                'value' => function ($model) {
//                    return InvoiceTypeEnum::getValue($model->type);
//                },
//            ],
            [
                'attribute' => 'right_sph',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'right_cyl',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'right_tax',
                'filter' => false, //不显示搜索框
            ],
            //'right_prism',
            //'right_basal',
            //'right_naked',
            //'right_add',
            //'right_pupil_height',
            //'right_arc',
            //'right_pd',
            [
                'attribute' => 'left_sph',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'left_cyl',
                'filter' => false, //不显示搜索框
            ],
            [
                'attribute' => 'left_tax',
                'filter' => false, //不显示搜索框
            ],
            //'left_prism',
            //'left_basal',
            //'left_corrected',
            //'left_naked',
            //'left_add',
            //'left_pupil_height',
            //'left_arc',
            //'left_pd',
            //'pd',
            //'remark:text',
            //'optometrist',
            //'right_corrected',
            //'salers_id',
            //'merchant_id',
            //'updated_at',
            [
                'label' => '创建时间',
                'attribute' => 'created_at',
                //'filter' => false, //不显示搜索框
                'format' => ['date', 'php:Y-m-d H:i:s'],
            ],
            //'status',
            //'created_user',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{edit} {status} {delete}',
                'buttons' => [
                'edit' => function($url, $model, $key){
                        return Html::edit(['edit', 'id' => $model->id]);
                },
               'status' => function($url, $model, $key){
                        return Html::status($model['status']);
                  },
                'delete' => function($url, $model, $key){
                        return Html::delete(['delete', 'id' => $model->id]);
                },
                ]
            ]
         ]
    ]); ?>
            </div>
        </div>
    </div>
</div>

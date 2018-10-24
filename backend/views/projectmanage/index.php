<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\projectmanage\ProjectmanageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '项目管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="projectmanage-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'id' => "myform",
        'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
        'filterRowOptions'=>['class'=>'filters'],
        'panel'=>[
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> 数据列表</h3>',
            'type'=>'default',
            'footer'=>false
        ],
        'toolbar' => [
          '{export}',
        ],
        'export' => [
            'fontAwesome' => true,
        ],
        'pager'=>[
            'options'=>['class'=>'hidden']//关闭自带分页
        ],
        'persistResize'=>false,


        'columns' => [
            [
                'class'=>'kartik\grid\CheckboxColumn',
                
                'headerOptions'=>['class'=>'my-table'],
            ],

            'buildname',
            'contactname',
            'contactphone',
            'projectarea',
            'projectname',
            'projectuser',
            'projectin',
            'approvalname',
       

  


            ['class' => 'kartik\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view}{update}{delete}',
                'headerOptions' => ['width' => '200'],
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return  Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" ><span class="classformat">查看</span></span>', $url, ['title' => '查看'] ) ;
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"><span class="classformat">修改</span></span>', $url, ['title' => '修改'] ) ;
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" ><span class="classformat">删除</span></span>', $url, [
                            'title' => '删除',
                            'data'=>[
                                'confirm'=>'你确定要删除吗？',
                                'method'=>'post'
                            ]
                        ] ) ;
                    },

                ],
            ],
        ],
    ]); ?>
        <?= \backend\components\GoLinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'go' => true,
        ]); ?>
</div>

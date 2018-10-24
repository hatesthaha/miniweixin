<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\finance\FinanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '财务管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<style>
.right-side {
       
       
        overflow-x: scroll;

    }
.table-responsive{
        overflow-x:hidden;
    }
    .content{
        width:2100px;
        overflow-x: hidden;
    }
</style>
<script>
    $(function(){
        var b=$(window).height()-55;
        $(".right-side").css({
            'height':b

        })
    })
</script>
<div class="finance-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'id' => "myform",
        'pjax'=>true,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'containerOptions'=>['style'=>'overflow-x: inherit;'], // only set when $responsive = false
        'headerRowOptions'=>['class'=>'myform'],
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


            [
              'attribute' => 'qddate',
              'format' => ['date', 'Y-M-d'],
              'headerOptions' => ['width' => '150'],
            ],
            
            'htmoney',
            [
              'attribute' => 'sdkdate',
              'format' => ['date', 'Y-M-d'],
            ],
            [
              'attribute' => 'sfmoney',
              'headerOptions' => ['width' => '150'],
            ],
            
            [
              'attribute' => 'wkdate',
              'format' => ['date', 'Y-M-d'],
            ],
   
            'wkmoney',
            'jcunit',
            'jcmoney',
            'hezuofang',
            'dixiasmoney',
            'premoney',
            'ticheng',

            'username',


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

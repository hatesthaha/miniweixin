<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use common\models\auth\Auth;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Roles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        <button class="btn btn-warning" id="stop" type="button">停用</button>
        <button class="btn btn-primary" id="start" type="button">启用</button>
        <button class="btn btn-danger" id="alldel" type="button">删除</button>
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
            'toolbar' => [],
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
                    'attribute'=>'name', 
                ],

                'description',
          
   
                [
                    'attribute' => 'display',
                    'format' => 'html',
                    'value' => function ($model) {
                        if ($model->display === $model::DISPLAY_ACTIVE) {
                            $class = 'label-success';
                        }else{
                            $class = 'label-danger';
                        }

                        return '<span class="label ' . $class . '">' . $model->displayLabel . '</span>';
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>Auth::dislabels(), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'全部'],
                    'format'=>'raw'

                ],

    

                ['class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{view}{update}{delete}',
                    'headerOptions' => ['width' => '200'],

                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return  Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open" ><span class="classformat">查看</span></span>',  Yii::$app->getUrlManager()->createUrl(['role/view', 'name' => $model->name]), ['title' => '查看'] ) ;
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil"><span class="classformat">修改</span></span>', Yii::$app->getUrlManager()->createUrl(['role/update', 'name' => $model->name]), ['title' => '修改'] ) ;
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('&nbsp;&nbsp;<span class="glyphicon glyphicon-trash" ><span class="classformat">删除</span></span>', Yii::$app->getUrlManager()->createUrl(['role/delete', 'name' => $model->name]), [
                                'title' => '删除',
                                'data'=>[
                                    'confirm'=>'你确定要删除'.$model->name.'吗？',
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
<?php $this->beginBlock('inline_scripts'); ?>
    <script>
        $(document).ready(function(){
                bindqiyong("<?php echo Url::to(['role/start']);?>");
                bindtiyong("<?php echo Url::to(['role/stop']);?>");
                binddel("<?php echo Url::to(['role/alldelete']);?>");
        });
    </script>

<?php $this->endBlock(); ?>


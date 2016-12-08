<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\user\User;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\user\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
<style>

</style>

     <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

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
                    'attribute'=>'username', 
                    'vAlign'=>'middle',
                    'width'=>'180px',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return $model->username;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'username', 'username'), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'用户名'],
                    'format'=>'raw'
                ],

                // 'auth_key',
                // 'password_hash',
                // 'password_reset_token',
                'email:email',
                [
                    'attribute' => 'groupid',
                    'value' => function ($model) {
                        return $model->groupLabel;
                    },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>User::getArrayGroup(),
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'全部'],
                    'format'=>'raw'
                ],
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'value' => function ($model) {
                            if ($model->status === $model::STATUS_ACTIVE) {
                                $class = 'label-success';
                            } elseif ($model->status === $model::STATUS_DELETED) {
                                $class = 'label-warning';
                            } else {
                                $class = 'label-danger';
                            }

                            return '<span class="label ' . $class . '">' . $model->statusLabel . '</span>';
                        },
                    'filterType'=>GridView::FILTER_SELECT2,
                    'filter'=>User::getArrayStatus(), 
                    'filterWidgetOptions'=>[
                        'pluginOptions'=>['allowClear'=>true],
                    ],
                    'filterInputOptions'=>['placeholder'=>'全部'],
                    'format'=>'raw'

                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'Y-M-d H:i:s'],
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'Y-M-d H:i:s'],
                ],
    

                [
                    'class' => 'yii\grid\ActionColumn',
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
                                    'confirm'=>'你确定要删除'.$model->username.'吗？',
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
<?php $this->beginBlock('footer_scripts'); ?>
<script>
$(document).ready(function(){

    bindqiyong("<?php echo Url::to(['users/start']);?>");
    bindtiyong("<?php echo Url::to(['users/stop']);?>");
    binddel("<?php echo Url::to(['users/alldelete']);?>");

});
</script>
<?php $this->endBlock(); ?>
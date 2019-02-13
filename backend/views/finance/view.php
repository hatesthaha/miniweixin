<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\finance\Finance */

$this->title = $model->projectname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '财务管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="finance-view">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'projectname',
            [
              'attribute' => 'qddate',
              'value'=> $model->qddate>1000?date('Y-m-d',$model->qddate): '',
            ],
            [
              'attribute' => 'htmoney', 
              'value'=> $model->htmoney?$model->htmoney: '',
            ],
    
            [
              'attribute' => 'sdkdate',
              'value'=> $model->sdkdate>1000?date('Y-m-d',$model->sdkdate): '',
              
            ],
            [
              'attribute' => 'sfmoney', 
              'value'=> $model->sfmoney?$model->sfmoney: '',
            ],
        
            [
              'attribute' => 'wkdate',
              'value'=> $model->wkdate>1000?date('Y-m-d',$model->wkdate): '',
         
            ],
            [
              'attribute' => 'wkmoney', 
              'value'=> $model->wkmoney?$model->wkmoney: '',
            ],
       
            'jcunit',

            [
              'attribute' => 'jcmoney', 
              'value'=> $model->jcmoney?$model->jcmoney: '',
            ],
            'hezuofang',
            [
              'attribute' => 'dixiasmoney', 
              'value'=> $model->dixiasmoney?$model->dixiasmoney: '',
            ],
            [
              'attribute' => 'premoney', 
              'value'=> $model->premoney?$model->premoney: '',
            ],
            'ticheng',
            'remark:ntext',
            'username',
            [
              'attribute' => 'created_at',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d'],
            ],
        ],
    ]) ?>

</div>

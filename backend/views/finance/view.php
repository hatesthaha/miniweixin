<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\finance\Finance */

$this->title = $model->id;
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
            [
              'attribute' => 'qddate',
              'format' => ['date', 'php:Y-m-d'],
            ],
        
            'htmoney',
            [
              'attribute' => 'sdkdate',
              'format' => ['date', 'php:Y-m-d'],
            ],
 
            'sfmoney',
            [
              'attribute' => 'wkdate',
              'format' => ['date', 'php:Y-m-d'],
            ],

            'wkmoney',
            'jcunit',
            'jcmoney',
            'hezuofang',
            'dixiasmoney',
            'premoney',
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

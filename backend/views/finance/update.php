<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\finance\Finance */

$this->title = Yii::t('app', '更新 {modelClass}: ', [
    'modelClass' => '财务',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '财务管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="finance-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

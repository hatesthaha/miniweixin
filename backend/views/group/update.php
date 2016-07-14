<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\base\group\Group */

$this->title = Yii::t('app', 'Update Groups', [
    'modelClass' => 'Group',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="group-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

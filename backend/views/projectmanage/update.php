<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */

$this->title = Yii::t('app', '更新 {modelClass}: ', [
    'modelClass' => '项目',
]) . $model->projectname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '项目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->projectname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="projectmanage-update">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\filemanage\Filemanage */

$this->title = Yii::t('app', '更新 存档管理: ', [
    'modelClass' => 'Filemanage',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '存档管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="filemanage-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

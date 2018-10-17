<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\filemanage\FilemanageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filemanage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'filedate') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'piwen') ?>

    <?= $form->field($model, 'writename') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

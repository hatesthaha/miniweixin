<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\ProjectmanageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectmanage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'buildname') ?>

    <?= $form->field($model, 'contactname') ?>

    <?= $form->field($model, 'contactphone') ?>

    <?= $form->field($model, 'projectarea') ?>

    <?php // echo $form->field($model, 'projectname') ?>

    <?php // echo $form->field($model, 'projecttype') ?>

    <?php // echo $form->field($model, 'approval') ?>

    <?php // echo $form->field($model, 'projectuser') ?>

    <?php // echo $form->field($model, 'projectin') ?>

    <?php // echo $form->field($model, 'approvalname') ?>

    <?php // echo $form->field($model, 'tkandate') ?>

    <?php // echo $form->field($model, 'bsdate') ?>

    <?php // echo $form->field($model, 'psdate') ?>

    <?php // echo $form->field($model, 'bpjfdate') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'jindu') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

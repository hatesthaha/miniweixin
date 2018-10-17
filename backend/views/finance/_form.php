<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\finance\Finance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="finance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qddate')->textInput() ?>

    <?= $form->field($model, 'htmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdkdate')->textInput() ?>

    <?= $form->field($model, 'sfmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wkdate')->textInput() ?>

    <?= $form->field($model, 'wkmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jcunit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jcmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hezuofang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dixiasmoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'premoney')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ticheng')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

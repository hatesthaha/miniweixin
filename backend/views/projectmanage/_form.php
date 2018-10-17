<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projectmanage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'buildname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectarea')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projecttype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectuser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'projectin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approvalname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tkandate')->textInput() ?>

    <?= $form->field($model, 'bsdate')->textInput() ?>

    <?= $form->field($model, 'psdate')->textInput() ?>

    <?= $form->field($model, 'bpjfdate')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jindu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

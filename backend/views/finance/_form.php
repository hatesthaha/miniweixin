<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use common\models\finance\Finance;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\finance\Finance */
/* @var $form yii\widgets\ActiveForm */
$model->qddate == '1970-01-01' ? $model->qddate ='':'';
$model->sdkdate == '1970-01-01' ? $model->sdkdate ='':'';
$model->wkdate == '1970-01-01' ? $model->wkdate ='':'';
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="finance-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
      <div class="col-md-12 ">
        <?php
          echo '<label class="control-label">项目名称</label>';
          echo Select2::widget([
            'name' => 'Finance[projectid]',
            'value' => $model->projectid,
            'data' => Finance::getArrayProject(),
            'options' => [
                'placeholder' => '请选择 ...',
                'allowClear' => true
            ],
          ]);
          ?>
        
      </div>
    </div>
    <div class="row">
    <div class="col-md-6 ">
      <?= $form->field($model, 'qddate')->widget(
          DatePicker::className(), [
              // inline too, not bad
              // modify template for custom rendering
              'template' => '{addon}{input}',
              'language' => 'zh-CN',
              'clientOptions' => [
                  'autoclose' => true,
                  'format' => 'yyyy-mm-dd',
                  'todayBtn' => 'linked',
              ]
      ]);?>
    </div>
    <div class="col-md-6 ">
      <?= $form->field($model, 'htmoney')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6 ">
      <?= $form->field($model, 'sdkdate')->widget(
          DatePicker::className(), [
              // inline too, not bad

              // modify template for custom rendering
              'template' => '{addon}{input}',
              'language' => 'zh-CN',
              'clientOptions' => [
                'todayBtn' => 'linked',
                  'autoclose' => true,
                  'format' => 'yyyy-mm-dd'
              ]
      ]);?>
    </div>
    <div class="col-md-6 ">
      <?= $form->field($model, 'sfmoney')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'wkdate')->widget(
            DatePicker::className(), [
                // inline too, not bad

                // modify template for custom rendering
                'template' => '{addon}{input}',
                'language' => 'zh-CN',
                'clientOptions' => [
                  'todayBtn' => 'linked',
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'wkmoney')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'jcunit')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'jcmoney')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'hezuofang')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'dixiasmoney')->textInput(['maxlength' => true]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'premoney')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'ticheng')->radioList(['是'=>'是','否'=>'否']) ?>
      </div>
    </div>


    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

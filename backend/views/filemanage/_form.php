<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\filemanage\Filemanage */
/* @var $form yii\widgets\ActiveForm */
if(isset(json_decode($model->file)->newname)){
  $fileimg = json_decode($model->file)->newname;
  $fileoldimg = json_decode($model->file)->oldname;
}else{
  $fileoldimg = '';
  $fileimg = $model->file;
}
if(isset(json_decode($model->piwen)->newname)){
  $piwenimg = json_decode($model->piwen)->newname;
  $piwenoldimg = json_decode($model->piwen)->oldname;
}else{
  $piwenoldimg = '';
  $piwenimg = $model->piwen;
}
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="filemanage-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'filedate')->widget(
        DatePicker::className(), [
            // inline too, not bad

            // modify template for custom rendering
            'template' => '{addon}{input}',
            'language' => 'zh-CN',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
   
 
  
    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
      'options' => ['multiple' => true],
      'pluginOptions' => [
        'showPreview' => false,
        'showUpload' => false,
        'initialPreview'=>[
          !empty($fileimg)?Html::img(Yii::$app->params['img'].$fileimg):null,

        ],
        'initialCaption'=> $fileoldimg,
      ]
    ]); ?>
    <?= $form->field($model, 'piwen')->widget(FileInput::classname(), [
      'options' => ['multiple' => true],
      'pluginOptions' => [
        'showPreview' => false,
        'showUpload' => false,
        'initialPreview'=>[
          !empty($piwenimg)?Html::img(Yii::$app->params['img'].$piwenimg):null,

        ],
        'initialCaption'=> $piwenoldimg,
      ]
    ]); ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'writename')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

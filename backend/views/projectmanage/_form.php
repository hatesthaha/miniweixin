<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="projectmanage-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'buildname')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'projectarea')->dropDownList(['保定市'=>'保定市','高新区'=>'高新区','莲池区'=>'莲池区','竞秀区'=>'竞秀区','徐水区'=>'徐水区','满城区'=>'满城区','清苑区'=>'清苑区','安国市'=>'安国市','曲阳县'=>'曲阳县','唐县'=>'唐县','顺平县'=>'顺平县','定兴县'=>'定兴县','易县'=>'易县','蠡县'=>'蠡县','望都县'=>'望都县','涞源县'=>'涞源县','阜平县'=>'阜平县','博野县'=>'博野县','涞水县'=>'涞水县','高阳县'=>'高阳县','高碑店市'=>'高碑店市','涿州市'=>'涿州市','雄安新区'=>'雄安新区'], ['prompt'=>'请选择']) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'contactname')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'contactphone')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'projectname')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'projecttype')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'approval')->dropDownList(['县批'=>'县批','市批'=>'市批','省批'=>'省批'],['prompt'=>'请选择']) ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'projectuser')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 ">
        <?= $form->field($model, 'projectin')->textInput() ?>
      </div>
      <div class="col-md-6 ">
        <?= $form->field($model, 'approvalname')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 ">
      <?= $form->field($model, 'tkandate')->widget(
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
       
      </div>
      <div class="col-md-6 ">
      <?= $form->field($model, 'bsdate')->widget(
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
        
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 ">
      <?= $form->field($model, 'psdate')->widget(
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
        
      </div>
      <div class="col-md-6 ">
      <?= $form->field($model, 'bpjfdate')->widget(
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
        
      </div>
    </div>


 

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jindu')->textarea(['rows' => 6]) ?>

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

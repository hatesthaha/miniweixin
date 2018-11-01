<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
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
      <div class="col-md-4 ">
        <?= $form->field($model, 'buildname')->textInput() ?>
      </div>
      <div class="col-md-4 ">
        <?= $form->field($model, 'contactname')->textInput() ?>
      </div>
      <div class="col-md-4 ">
        <?= $form->field($model, 'contactphone')->textInput(['maxlength' => true]) ?>
      </div>

    </div>
    <div class="row">
      <div class="col-md-4 ">
        <?php
        echo '<label class="control-label">项目所在地</label>';
        echo Select2::widget([
          'name' => 'projectarea',
          'data' => ['保定市'=>['高新区'=>'高新区','莲池区'=>'莲池区','竞秀区'=>'竞秀区','徐水区'=>'徐水区','满城区'=>'满城区','清苑区'=>'清苑区','安国市'=>'安国市','曲阳县'=>'曲阳县','唐县'=>'唐县','顺平县'=>'顺平县','定兴县'=>'定兴县','易县'=>'易县','蠡县'=>'蠡县','望都县'=>'望都县','涞源县'=>'涞源县','阜平县'=>'阜平县','博野县'=>'博野县','涞水县'=>'涞水县','高阳县'=>'高阳县','高碑店市'=>'高碑店市','涿州市'=>'涿州市','雄安新区'=>'雄安新区']],
          'options' => [
              'placeholder' => '请选择 ...',
              'allowClear' => true
          ],
        ]);
        ?>
       </div>
       <div class="col-md-4 ">
        <?= $form->field($model, 'projectname')->textInput() ?>
      </div>
      <div class="col-md-4 ">
        <?php
        echo '<label class="control-label">报告类型</label>';
        echo Select2::widget([
          'name' => 'projecttype',
          'data' => ['一般环境影响报告表'=>'一般环境影响报告表','规划环境影响报告书'=>'规划环境影响报告书','场地调查报告'=>'场地调查报告','验收报告'=>'验收报告','应急预案'=>'应急预案','排污许可技术报告'=>'排污许可技术报告','项目简介'=>'项目简介','其他'=>'其他','环境影响报告书'=>['社会服务类'=>'社会服务类','轻工纺织化纤类'=>'轻工纺织化纤类','化工石化医药类'=>'化工石化医药类','交通运输类'=>'交通运输类','冶金机电类'=>'冶金机电类','建材火电类'=>'建材火电类','农林水利类'=>'农林水利类','其他报告书'=>'其他报告书']],
          'options' => [
              'placeholder' => '请选择 ...',
              'allowClear' => true
          ],
        ]);
        ?>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4 ">
        <?= $form->field($model, 'approval')->dropDownList(['县批'=>'县批','市批'=>'市批','省批'=>'省批'],['prompt'=>'请选择']) ?>
      </div>
      <div class="col-md-4 ">
        <?= $form->field($model, 'projectuser')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-4 ">
        <?= $form->field($model, 'projectin')->textInput() ?>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4 ">
        <?= $form->field($model, 'approvalname')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="col-md-4 ">
      <?= $form->field($model, 'tkandate')->widget(
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
      <div class="col-md-4 ">
      <?= $form->field($model, 'bsdate')->widget(
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
    </div>

    <div class="row">
      <div class="col-md-4 ">
      <?= $form->field($model, 'psdate')->widget(
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
      <div class="col-md-4 ">
      <?= $form->field($model, 'bpjfdate')->widget(
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
    </div>


 

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jindu')->textarea(['rows' => 6]) ?>

 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

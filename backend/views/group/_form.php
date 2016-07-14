<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wanhunet\wanhunet;
use common\models\group\Group;
/* @var $this yii\web\View */
/* @var $model common\models\base\group\Group */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-form">

    <?php $form = ActiveForm::begin(); ?>

    <input type="hidden" name="Group[uid]" value="<?= wanhunet::$app->user->identity->getId() ?>"/>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'context')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'display')->dropDownList(Group::dislabels()) ?>

    <div class="form-group">
        <?= Html::button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['id'=>'form_submit','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php $this->beginBlock('footer_scripts'); ?>
<script>
        $("#form_submit").click(function () {
            var name = $("#group-name").val();
            if (!$.trim(name)) {
                alert('名称不能为空');
                return false;
            }
            $("#form_submit").attr("disabled", "disabled");//只可点击一次不可多次点击提交
            $(this).parents("form").submit();
        });

</script>
<?php $this->endBlock(); ?>

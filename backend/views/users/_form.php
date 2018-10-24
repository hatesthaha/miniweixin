<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\user\User;
use yii\helpers\ArrayHelper;
use common\models\auth\Auth;
/* @var $this yii\web\View */
/* @var $model common\models\user\User */
/* @var $form yii\widgets\ActiveForm */
$allcat =Auth::find()->andWhere(['type'=>1])->andWhere(['status'=>10])->andWhere(['display'=>1])->all();

$cat = Yii::$app->authManager->getRolesByUser($model->id);

$newcat = [];

foreach($cat as $v){
    array_push($newcat,$v->name) ;
}
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'groupid')->dropDownList(User::getArrayGroup()) ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
    <div class="form-group field-user-role">
        <label class="control-label" for="user-role">角色管理(多选按住Ctrl键)</label>
        <input type="hidden" name="User[role]" value=""><select id="user-role" class="form-control" name="User[role][]" multiple="multiple" size="4" style="font-size:14px;">
            <?php
            foreach($allcat as $k=>$v){
                ?>
                <option value="<?php echo $v->name; ?>" <?php echo in_array($v->name,$newcat)? 'selected':''; ?> ><?php echo $v->name; ?></option>
                <?php
            }
            ?>
        </select>

        <div class="help-block"></div>
    </div>
    <?= $form->field($model, 'status')->dropDownList(User::getArrayStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

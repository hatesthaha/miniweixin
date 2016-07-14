<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\helpers\Url;
use common\models\auth\Auth;
/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */


?>


<div class="row">
    <?php
    $form = ActiveForm::begin([
        'enableClientValidation' => true,
        'id'=>'roleform',
    ]);
    ?>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('app', 'Role'); ?>
            </div>
            <div class="panel-body">
                <input type="hidden" name="selrole" value="" id="selrole" >
                <?php
                echo $form->field($model, 'name')->textInput($model->isNewRecord ? [] : ['disabled' => 'disabled']) .
                     $form->field($model, 'description')->textarea(['style' => 'height: 100px']) .
                     $form->field($model, 'display')->dropDownList(Auth::dislabels()).
                     Html::Button($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
                        'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','id'=>'cebutton'
                     ]);
                ?>
            </div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('app', 'Permissions'); ?>
            </div>

            <div class="panel-body">

                <div class="zTreeDemoBackground left">

                    <ul id="roletree" class="ztree" style="width:400px;"></ul>
                </div>
            </div>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
<?php $this->beginBlock('footer_scripts'); ?>
<script>

    var setting = {

        check: {
            enable: true
        },
        data: {
            simpleData: {
                enable: true
            }
        }
    };
    var zNodes =<?= json_encode($permissions) ?>;


        $.fn.zTree.init($("#roletree"), setting, zNodes);
        var treeObj = $.fn.zTree.getZTreeObj("roletree");
    <?php if(!$model->isNewRecord){ ?>
        treeObj.expandAll(true);
    <?php }?>

        $.each(<?= json_encode($model->_permissions) ?>,function(name,value) {

            var selnode = treeObj.getNodesByParam("action", value, null);
            if(selnode.length != 0){treeObj.checkNode(selnode[0], true, false); }

        });



        $('#cebutton').click(function(){
            var treeObj = $.fn.zTree.getZTreeObj("roletree");

            var nodes = treeObj.getCheckedNodes(true);
            var role = new Array();
            $.each(nodes,function(n,value) {
                role.push(value.action);

            });



            $('#selrole').val(role);
            var name = $("#auth-name").val();
            if(!$.trim(name)){
                alert('名称不能为空');
                return false;
            }
            $("#cebutton").attr("disabled", "disabled");//只可点击一次不可多次点击提交
            $('#roleform').submit();
        })


</script>
<?php $this->endBlock(); ?>


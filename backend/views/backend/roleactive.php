<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = '综合管理系统';
?>

<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/sidebar-menu') ?>
<?php $this->endBlock(); ?>
<div class="site-index">

    <div class="jumbotron">
        <h1>权限管理!</h1>

        <p class="lead">权限管理包含用户管理、角色管理、部门管理</p>

        <p></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>
        </div>

    </div>
</div>

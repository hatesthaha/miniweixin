<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\user\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="user-view">





    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            [
                'attribute' => 'groupid',
                'value' => $model->groupLabel,
            ],
            [
                'attribute' => 'status',
                'value' => $model->statusLabel,
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'Y-M-d H:i:s'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'Y-M-d H:i:s'],
            ],
        ],
    ]) ?>

</div>

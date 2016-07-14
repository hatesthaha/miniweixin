<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\user\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-view">



    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
<div class="user-view">
    <table class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th style="width: 32.3%;" >用户角色</th>
            <th><?php
                $cat = Yii::$app->authManager->getRolesByUser($model->id);
                $catarray = [];
                if($cat){
                    foreach ($cat as $key=>$val){
                        array_push($catarray,$key );
                    }
                  echo  implode(',',$catarray );

                }else{
                    echo "未设置";
                }
                ?>
            </th>
        </tr>
        </tbody>
    </table>
</div>
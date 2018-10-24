<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */

$this->title = $model->projectname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '项目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="projectmanage-view">



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
            'buildname',
            'contactname',
            'contactphone',
            'projectarea',
            'projectname',
            'projecttype',
            'approval',
            'projectuser',
            'projectin',
            'approvalname',
            [
              'attribute' => 'tkandate',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
              'attribute' => 'bsdate',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
              'attribute' => 'psdate',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
              'attribute' => 'bpjfdate',
              'format' => ['date', 'php:Y-m-d'],
            ],
  
            'remark:ntext',
            'jindu:ntext',
            'username',
            [
              'attribute' => 'created_at',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d'],
            ],
        ],
    ]) ?>

</div>

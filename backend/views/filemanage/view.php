<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\filemanage\Filemanage */

$this->title = $model->projectname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '存档管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if(isset(json_decode($model->file)->newname)){
  $fileimg = json_decode($model->file)->newname;
  $fileoldimg = json_decode($model->file)->oldname;
}else{
  $fileoldimg = '空图片';
  $fileimg = $model->file;
}
if(isset(json_decode($model->piwen)->newname)){
  $piwenimg = json_decode($model->piwen)->newname;
  $piwenoldimg = json_decode($model->piwen)->oldname;
}else{
  $piwenoldimg = '空图片';
  $piwenimg = $model->piwen;
}
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="filemanage-view">


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
            'projectname',
            [
              'attribute' => 'filedate',
              'format' => ['date', 'php:Y-m-d'],
            ],
            [
              'attribute' => 'file',
              'format' => 'raw',
              'value'  => !empty($fileimg)?Html::a($fileoldimg,Yii::$app->params['downimg'].'/'.$fileimg):null,
            ],
            [
              'attribute' => 'piwen',
              'format' => 'raw',
              'value'  => !empty($piwenimg)?Html::a($piwenoldimg,Yii::$app->params['downimg'].'/'.$piwenimg):null,
            ],

            'writename',
            'remark:ntext',
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

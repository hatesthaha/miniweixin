<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\filemanage\FilemanageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '存档管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('siderbar'); ?>
<?= $this->render('//layouts/project-menu') ?>
<?php $this->endBlock(); ?>
<div class="filemanage-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'filedate',
            'file',
            'piwen',
            'writename',
            // 'remark:ntext',
            // 'username',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */

$this->title = Yii::t('app', '新增');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '项目管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectmanage-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

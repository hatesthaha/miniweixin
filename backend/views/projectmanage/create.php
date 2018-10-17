<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\projectmanage\Projectmanage */

$this->title = Yii::t('app', 'Create Projectmanage');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projectmanages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projectmanage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\filemanage\Filemanage */

$this->title = Yii::t('app', '新增存档');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '存档管理'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filemanage-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

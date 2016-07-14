<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">



    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        当Web服务器处理您的请求时发生上述错误。
    </p>
    <p>
        如果你认为这是一个服务器错误，请与我们联系。谢谢你。
    </p>

</div>

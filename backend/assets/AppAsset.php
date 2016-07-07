<?php

namespace backend\assets;

use dmstr\web\AdminLteAsset;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AdminLteAsset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

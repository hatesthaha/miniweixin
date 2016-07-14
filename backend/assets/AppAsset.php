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
        'ztree/css/demo.css',
        'ztree/css/zTreeStyle/zTreeStyle.css',
    ];
    public $js = [
        'js/base.js',
        'ztree/js/jquery.ztree.core-3.5.js',
        'ztree/js/jquery.ztree.excheck-3.5.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

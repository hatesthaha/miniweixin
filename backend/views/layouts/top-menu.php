<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$menuItemsMain = [
    [
        'label' => '<!--<i class="fa fa-dashboard "></i> -->' . Yii::t('app', '权限管理'),
        'url' => ['/backend/roleactive'],
        'visible' => \Yii::$app->user->can('group/index'),
    ],
    [
        'label' => '<!--<i class="fa fa-dashboard "></i> -->' . Yii::t('app', '项目管理'),
        'url' => ['/projectmanage/index'],
    ],

];
echo Nav::widget([
    'options' => ['class' => 'nav nav-pills navbar-left'],
    'items' => $menuItemsMain,
    'encodeLabels' => false,
]);
$menuItems = [
    ['label' => '首页', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => '退出 (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'nav nav-pills navbar-right'],
    'items' => $menuItems,
]);

//NavBar::end();


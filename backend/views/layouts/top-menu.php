<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$menuItemsMain = [
    [
        'label' => '<!--<i class="fa fa-dashboard "></i> -->' . Yii::t('app', '分类管理'),
        'url' => ['/adrzcount'],
        'active' => 'adrzcount' === Yii::$app->controller->action->id,
    ],
    [
        'label' => '<!--<i class="fa fa-dashboard "></i> -->' . Yii::t('app', '显示管理'),
        'url' => ['/show'],
        'active' => 'show' === Yii::$app->controller->action->id,
    ],

];
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItemsMain,
    'encodeLabels' => false,
]);
$menuItems = [
    ['label' => '首页', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => '退出 (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);

//NavBar::end();


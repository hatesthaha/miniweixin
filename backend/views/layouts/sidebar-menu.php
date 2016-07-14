<?php
use dmstr\widgets\Menu;
echo Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => Yii::t('app', 'Groups'),
                        'url' => ['/group/index'],
                        'icon' => 'fa fa-group',
                        'active' => 'group' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('group/index'),
                    ],
                    [
                        'label' => Yii::t('app', 'Role'),
                        'url' => ['/role/index'],
                        'icon' => 'fa fa-lock',
                        'active' => 'role' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('role/index'),
                    ],
                    [
                        'label' => Yii::t('app', 'User'),
                        'url' => ['/users/index'],
                        'icon' => 'fa fa-user',
                        'active' => 'users' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('users/index'),
                    ],


                ],
            ]
        )

?>
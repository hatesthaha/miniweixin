<?php
use dmstr\widgets\Menu;
echo Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '权限管理', 'options' => ['class' => 'header']],
                    [
                        'label' => Yii::t('app', 'Groups'),
                        'url' => ['/group/index'],
                        'icon' => 'group',
                        'active' => 'group' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('group/index'),
                    ],
                    [
                        'label' => Yii::t('app', 'Role'),
                        'url' => ['/role/index'],
                        'icon' => 'lock',
                        'active' => 'role' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('role/index'),
                    ],
                    [
                        'label' => Yii::t('app', 'User'),
                        'url' => ['/users/index'],
                        'icon' => 'user',
                        'active' => 'users' === Yii::$app->controller->id,
                        'visible' => \Yii::$app->user->can('users/index'),
                    ],


                ],
            ]
        )

?>
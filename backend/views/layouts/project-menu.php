<?php
use dmstr\widgets\Menu;
echo Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '项目管理', 'options' => ['class' => 'header']],
                    [
                        'label' => '财务管理',
                        'url' => ['/group/index'],
                        'icon' => 'fa fa-group',
                        'active' => 'group' === Yii::$app->controller->id,
                        // 'visible' => \Yii::$app->user->can('group/index'),
                    ],
                    [
                        'label' => '项目管理',
                        'url' => ['/role/index'],
                        'icon' => 'fa fa-lock',
                        'active' => 'role' === Yii::$app->controller->id,
                        // 'visible' => \Yii::$app->user->can('role/index'),
                    ],
                    [
                        'label' => '存档管理',
                        'url' => ['/filemanage/index'],
                        'icon' => 'fa fa-user',
                        'active' => 'users' === Yii::$app->controller->id,
                        // 'visible' => \Yii::$app->user->can('users/index'),
                    ],


                ],
            ]
        )

?>
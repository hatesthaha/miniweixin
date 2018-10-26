<?php
use dmstr\widgets\Menu;
echo Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => '项目管理', 'options' => ['class' => 'header']],
                    [
                      'label' => '项目管理',
                      'url' => ['/projectmanage/index'],
                      'icon' => 'align-justify',
                      'active' => 'projectmanage' === Yii::$app->controller->id,
                      // 'visible' => \Yii::$app->user->can('role/index'),
                  ],
                    [
                        'label' => '财务管理',
                        'url' => ['/finance/index'],
                        'icon' => 'money',
                        'active' => 'finance' === Yii::$app->controller->id,
                        // 'visible' => \Yii::$app->user->can('group/index'),
                    ],
     
                    [
                        'label' => '存档管理',
                        'url' => ['/filemanage/index'],
                        'icon' => 'clipboard',
                        'active' => 'filemanage' === Yii::$app->controller->id,
                        // 'visible' => \Yii::$app->user->can('users/index'),
                    ],


                ],
            ]
        )

?>
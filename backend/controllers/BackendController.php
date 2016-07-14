<?php
namespace backend\controllers;

use wanhunet\wanhunet;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;


class BackendController extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                      //  'allow' => \Yii::$app->user->can(wanhunet::$app->controller->getRoute()),
                        'allow' => true,
                        'roles' => [wanhunet::$app->controller->getRoute()],
                    ]
                ],
                'denyCallback' => function ($rule, $action) {
                    if(empty(\Yii::$app->user->identity))
                    {
                        $this->redirect(['site/login']);
                    }else{
                        throw new ForbiddenHttpException("没有权限");
                    }
                }
            ],
        ];
    }
    //
    public function actionRoleactive(){
        return $this->render('roleactive');
    }
}
<?php
namespace backend\controllers;

use Yii;
use wanhunet\wanhunet;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;
use common\models\projectmanage\ProjectmanageSearch;


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
      $yearmonthstart =yii::$app->request->get('yearmonthstart');
      if(yii::$app->request->get('yearmonthstart')){
        $yearmonthstart = strtotime(yii::$app->request->get('yearmonthstart').' 00:00:00');
      }
      $yearmonthend =yii::$app->request->get('yearmonthend');
      if(yii::$app->request->get('yearmonthend')){
        $yearmonthend = strtotime(yii::$app->request->get('yearmonthend').' 23:59:59');
      }
        
        
     
        $searchModel = new ProjectmanageSearch();
        $dataProvider = $searchModel->rolesearch(Yii::$app->request->queryParams,$yearmonthstart,$yearmonthend);

        return $this->render('roleactive', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
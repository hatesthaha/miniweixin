<?php

namespace backend\controllers;

use Yii;
use common\models\projectmanage\Projectmanage;
use common\models\projectmanage\ProjectmanageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectmanageController implements the CRUD actions for Projectmanage model.
 */
class ProjectmanageController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Projectmanage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectmanageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projectmanage model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Projectmanage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projectmanage();
        $model->username = Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post()) ) {
          $model->tkandate = strtotime(Yii::$app->request->post()['Projectmanage']['tkandate']);
          $model->bsdate = strtotime(Yii::$app->request->post()['Projectmanage']['bsdate']);
          $model->psdate = strtotime(Yii::$app->request->post()['Projectmanage']['psdate']);
          $model->bpjfdate = strtotime(Yii::$app->request->post()['Projectmanage']['bpjfdate']);
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
          }else{
            Yii::$app->session->setFlash('warning', Yii::t('app', '保存未成功，信息没有填写完整'));
            return $this->render('create', [
              'model' => $model,
          ]); 
          }
           
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Projectmanage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
          $model->tkandate = strtotime(Yii::$app->request->post()['Projectmanage']['tkandate']);
          $model->bsdate = strtotime(Yii::$app->request->post()['Projectmanage']['bsdate']);
          $model->psdate = strtotime(Yii::$app->request->post()['Projectmanage']['psdate']);
          $model->bpjfdate = strtotime(Yii::$app->request->post()['Projectmanage']['bpjfdate']);
          if($model->save()){
            
            return $this->redirect(['view', 'id' => $model->id]);
          }else{
            $model->tkandate = date('Y-m-d', $model->tkandate);
            $model->bsdate = date('Y-m-d', $model->bsdate);
            $model->psdate = date('Y-m-d', $model->psdate);
            $model->bpjfdate = date('Y-m-d', $model->bpjfdate);
            return $this->render('update', [
              'model' => $model,
          ]);
          }
            
        } else {
          $model->tkandate = date('Y-m-d', $model->tkandate);
            $model->bsdate = date('Y-m-d', $model->bsdate);
            $model->psdate = date('Y-m-d', $model->psdate);
            $model->bpjfdate = date('Y-m-d', $model->bpjfdate);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Projectmanage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projectmanage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Projectmanage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projectmanage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

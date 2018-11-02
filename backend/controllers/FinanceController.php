<?php

namespace backend\controllers;

use Yii;
use common\models\finance\Finance;
use common\models\finance\FinanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\projectmanage\Projectmanage;

/**
 * FinanceController implements the CRUD actions for Finance model.
 */
class FinanceController extends Controller
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
     * Lists all Finance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FinanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Finance model.
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
     * Creates a new Finance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Finance();
        $model->username = Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post())) {
          $model->qddate = strtotime(Yii::$app->request->post()['Finance']['qddate']);
          $model->sdkdate = strtotime(Yii::$app->request->post()['Finance']['sdkdate']);
          $model->wkdate = strtotime(Yii::$app->request->post()['Finance']['wkdate']);
          $projectid = Yii::$app->request->post()['Finance']['projectid'];
          $model->projectname = Projectmanage::findONe(['id'=>$projectid])->projectname;
          if( $model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
          }else{
            $model->qddate = date('Y-m-d', $model->qddate);
            $model->sdkdate = date('Y-m-d', $model->sdkdate);
            $model->wkdate = date('Y-m-d', $model->wkdate);
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
     * Updates an existing Finance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
          $model->qddate = strtotime(Yii::$app->request->post()['Finance']['qddate']);
          $model->sdkdate = strtotime(Yii::$app->request->post()['Finance']['sdkdate']);
          $model->wkdate = strtotime(Yii::$app->request->post()['Finance']['wkdate']);
          $projectid = Yii::$app->request->post()['Finance']['projectid'];
          $model->projectname = Projectmanage::findONe(['id'=>$projectid])->projectname;
          if($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
          }else{
            Yii::$app->session->setFlash('warning', Yii::t('app', '保存未成功，信息没有填写完整'));
            $model->qddate = date('Y-m-d', $model->qddate);
            $model->sdkdate = date('Y-m-d', $model->sdkdate);
            $model->wkdate = date('Y-m-d', $model->wkdate);
              return $this->render('update', [
                  'model' => $model,
              ]);
          }
           
        } else {
          $model->qddate = date('Y-m-d', $model->qddate);
          $model->sdkdate = date('Y-m-d', $model->sdkdate);
          $model->wkdate = date('Y-m-d', $model->wkdate);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Finance model.
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
     * Finds the Finance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Finance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Finance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

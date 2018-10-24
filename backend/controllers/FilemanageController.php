<?php

namespace backend\controllers;

use Yii;
use common\models\filemanage\Filemanage;
use common\models\filemanage\FilemanageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\file\FileInput;//图片上传
use yii\web\UploadedFile;
use wanhunet\helpers\Utils;

/**
 * FilemanageController implements the CRUD actions for Filemanage model.
 */
class FilemanageController extends BackendController
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
     * Lists all Filemanage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FilemanageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Filemanage model.
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
     * Creates a new Filemanage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Filemanage();
        $model->writename = Yii::$app->user->identity->username;
        $model->username = Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post()) ) {
          $model->filedate = strtotime(Yii::$app->request->post()['Filemanage']['filedate']);
          $model->file = UploadedFile::getInstance($model, 'file');
          if($model->file){           
              $siteRoot = Yii::$app->params['img'];
              $json = Utils::uploadfile($_FILES['Filemanage']['tmp_name']['file'],$_FILES['Filemanage']['name']['file'],$siteRoot);
              $model->file = $json;   		
          }
          $model->piwen = UploadedFile::getInstance($model, 'piwen');
          if($model->piwen){           
              $siteRoot = Yii::$app->params['img'];
              $json = Utils::uploadfile($_FILES['Filemanage']['tmp_name']['piwen'],$_FILES['Filemanage']['name']['piwen'],$siteRoot);
              $model->piwen = $json;   		
          }
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
     * Updates an existing Filemanage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $model->filedate = strtotime(Yii::$app->request->post()['Filemanage']['filedate']);
          $model->file = UploadedFile::getInstance($model, 'file');
          if($model->file){           
              $siteRoot = Yii::$app->params['img'];
              $json = Utils::uploadfile($_FILES['Filemanage']['tmp_name']['file'],$_FILES['Filemanage']['name']['file'],$siteRoot);
              $model->file = $json;   		
          }
          if (!$model->file) {
            $new = $this->findModel($id);
            $model->file = $new->file;
          }
          $model->piwen = UploadedFile::getInstance($model, 'piwen');
          if($model->piwen){           
              $siteRoot = Yii::$app->params['img'];
              $json = Utils::uploadfile($_FILES['Filemanage']['tmp_name']['piwen'],$_FILES['Filemanage']['name']['piwen'],$siteRoot);
              $model->piwen = $json;   		
          }
          if (!$model->piwen) {
            $newpiwen = $this->findModel($id);
            $model->piwen = $newpiwen->piwen;
          }
          if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
          }else{
            $model->filedate = date('Y-m-d', $model->filedate);
            Yii::$app->session->setFlash('warning', Yii::t('app', '保存未成功，信息没有填写完整'));
            return $this->render('update', [
              'model' => $model,
          ]); 
          }
         
        } else {
          $model->filedate = date('Y-m-d', $model->filedate);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Filemanage model.
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
     * Finds the Filemanage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Filemanage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Filemanage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

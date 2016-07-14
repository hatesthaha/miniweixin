<?php

namespace backend\controllers;

use wanhunet\wanhunet;
use Yii;
use common\models\group\Group;
use common\models\group\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends BackendController
{


    /**
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
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
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Group();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Group model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    /**
     * 启用按钮
     * If update is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionStart()
    {
        if(isset(wanhunet::$app->request->post()["checkboxid"])){
            $ids = wanhunet::$app->request->post()["checkboxid"];
            $ids = explode(',',$ids);
            foreach($ids as $id){
                $model = Group::findOne(['id' => $id]);

                if($model->display== Group::DISPLAY_DELETED){
                    $model->display=Group::DISPLAY_ACTIVE;
                    $model->save();
                }
            }
            return true;
        }
    }

    /**
     * 停用按钮
     * If update is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionStop()
    {
        if(isset(wanhunet::$app->request->post()["checkboxid"])){
            $ids = wanhunet::$app->request->post()["checkboxid"];
            $ids = explode(',',$ids);
            foreach($ids as $id){
                $model = Group::findOne(['id' => $id]);

                if($model->display== Group::DISPLAY_ACTIVE){
                    $model->display=Group::DISPLAY_DELETED;
                    $model->save();
                }
            }
            return true;
        }
    }
    /**
     * 删除按钮
     * If update is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionAlldelete()
    {
        if(isset(wanhunet::$app->request->post()["checkboxid"])){
            $ids = wanhunet::$app->request->post()["checkboxid"];
            $ids = explode(',',$ids);
            foreach($ids as $id){
                $model = Group::findOne(['id' => $id]);

                if($model->status== Group::STATUS_ACTIVE){
                    $model->status=Group::STATUS_DELETED;
                    $model->save();
                }
            }
            return true;
        }
    }
    /**
     * Deletes an existing Group model.
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
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

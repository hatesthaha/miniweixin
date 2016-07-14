<?php

namespace backend\controllers;

use Yii;
use common\models\user\User;
use common\models\user\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use wanhunet\wanhunet;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
{
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach(Yii::$app->request->post()['User']['role'] as $val){
                Yii::$app->authManager->assign(Yii::$app->authManager->getRole($val), $model->id);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if($id == 1) {
            Yii::$app->session->setFlash('success', Yii::t('app', '没有权限'));
            return $this->redirect(['index']);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->authManager->revokeAll($id);
            foreach (Yii::$app->request->post()['User']['role'] as $val) {
                Yii::$app->authManager->assign(Yii::$app->authManager->getRole($val), $id);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($id==1){
            $this->redirect(['index']);
            Yii::$app->getSession()->setFlash('warning', '没有权限');
            return false;
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
                $model = User::findOne(['id' => $id]);
                User::updateAll(['status'=>User::STATUS_ACTIVE],['id' =>$model->id]);
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
                if(in_array(1,$ids)){
                    return false;
                }
                $model = User::findOne(['id' => $id]);
                User::updateAll(['status'=>User::STATUS_DELETED],['id' =>$model->id]);
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
            if(in_array(1,$ids)){
                return false;
            }
            foreach($ids as $id){
                $model = User::findOne(['id' => $id]);
                $this->findModel($id)->delete();

            }
            return true;
        }
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

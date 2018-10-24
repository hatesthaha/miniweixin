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
class MemberController extends Controller
{
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
    public function actionPassword($id)
    {
        $model = $this->findModel($id);
        if($id == 1) {
            Yii::$app->session->setFlash('success', Yii::t('app', '没有权限'));
            return $this->redirect(['index']);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('password', [
                'model' => $model,
            ]);
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

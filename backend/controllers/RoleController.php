<?php
namespace backend\controllers;

use wanhunet\wanhunet;
use Yii;
use yii\filters\AccessControl;
use yii\web\HttpException;
use common\models\auth\Auth;
use common\models\auth\AuthSearch;
use yii\web\Controller;
use yii\filters\VerbFilter;


class RoleController extends BackendController
{


    public function actionIndex()
    {
        $searchModel = new AuthSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get(), Auth::TYPE_ROLE);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionCreate()
    {

        $model = new Auth();
        if ($model->load(Yii::$app->request->post())) {
            $permissions = explode(",", Yii::$app->request->post()['selrole']);

            if(!empty($permissions[0])){
                Auth::updateAll(['display'=>Yii::$app->request->post()['Auth']['display']],['description' =>Yii::$app->request->post()['Auth']['description']]);
                if($model->createRole($permissions)) {
                    Yii::$app->session->setFlash('success', " '$model->name' " . Yii::t('app', 'successfully saved'));
                    return $this->redirect(['view', 'name' => $model->name]);
                }
                else
                {
                    $permissions = $this->getPermissions();
                    $model->_permissions =explode(",", Yii::$app->request->post()['selrole']);
                    return $this->render('create', [
                            'model' => $model,
                            'permissions' => $permissions
                        ]
                    );
                }
            }else{
                Yii::$app->session->setFlash('warning', "  " . Yii::t('app', '必须勾选权限'));
                $permissions = $this->getPermissions();
                return $this->render('create', [
                        'model' => $model,
                        'permissions' => $permissions
                    ]
                );
            }
        } else {
            $permissions = $this->getPermissions();
            return $this->render('create', [
                    'model' => $model,
                    'permissions' => $permissions
                ]
            );
        }
    }

    public function actionUpdate($name)
    {

        if($name == 'admin') {
            Yii::$app->session->setFlash('success', Yii::t('app', 'The Administrator has all permissions'));
            return $this->redirect(['view', 'name' => $name]);
        }
        $model = $this->findModel($name);
        if ($model->load(Yii::$app->request->post())) {

            $permissions = explode(",", Yii::$app->request->post()['selrole']);
            if(!empty($permissions[0])) {
                Auth::updateAll(['display' => Yii::$app->request->post()['Auth']['display']], ['description' => Yii::$app->request->post()['Auth']['description']]);
                if ($model->updateRole($name, $permissions)) {
                    Yii::$app->session->setFlash('success', " '$model->name' " . Yii::t('app', 'successfully updated'));
                    return $this->redirect(['view', 'name' => $name]);
                }
            }else{
                Yii::$app->session->setFlash('warning', "  " . Yii::t('app', '必须勾选权限'));
                $permissions = $this->getPermissions();

                $model->loadRolePermissions($name);
                return $this->render('update', [
                        'model' => $model,
                        'permissions' => $permissions
                    ]
                );
            }
        } else {
            $permissions = $this->getPermissions();

            $model->loadRolePermissions($name);
            return $this->render('update', [
                    'model' => $model,
                    'permissions' => $permissions,
                ]
            );
        }
    }

    public function actionDelete($name)
    {

        if($name == 'admin') {
            Yii::$app->session->setFlash('success', Yii::t('app', '没有权限'));
            return $this->redirect(['index']);
        }
        if ($name) {
            if(!Auth::hasUsersByRole($name)) {
                $auth = Yii::$app->getAuthManager();
                $role = $auth->getRole($name);

                // clear asset permissions
                $permissions = $auth->getPermissionsByRole($name);
                foreach($permissions as $permission) {
                    $auth->removeChild($role, $permission);
                }
                if($auth->remove($role)) {
                    Yii::$app->session->setFlash('success', " '$name' " . Yii::t('app', 'successfully removed'));
                }
            } else {
                Yii::$app->session->setFlash('warning', " '$name' " . Yii::t('app', 'still used'));
            }
        }
        return $this->redirect(['index']);
    }

    public function actionView($name)
    {
        $model = $this->findModel($name);
        $model->loadRolePermissions($name);

        $permissions = $this->getPermissions();
        return $this->render('view', [
            'model' => $model,
            'permissions' => $permissions,
        ]);
    }

    protected function findModel($name)
    {
        if ($name) {
            $auth = Yii::$app->getAuthManager();
            $model = new Auth();
            $role = $auth->getRole($name);
            if ($role) {
                $model->name = $role->name;
                $model->description = $role->description;
                $model->display = $model->display;
                $model->setIsNewRecord(false);
                return $model;
            }
        }
        throw new HttpException(404);
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
                $model = Auth::findOne(['name' => $id]);
                Auth::updateAll(['display'=>Auth::DISPLAY_ACTIVE],['name' =>$id]);

                $model->save();

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
                if(in_array('admin',$ids)){
                    return false;
                }
                Auth::updateAll(['display'=>Auth::DISPLAY_DELETED],['name' =>$id]);

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
                if(in_array('admin',$ids)){
                    return false;
                }
                Auth::updateAll(['status'=>Auth::STATUS_DELETED],['name' =>$id]);

            }
            return true;
        }
    }

    protected function getPermissions() {
        $models = Yii::$app->params['adminNav'];
        foreach($models as $key=>&$val){
            if(isset($val['nochildren'])){
                unset($val['children']);

            }
        }

        return $models;
    }
    protected function getOldpermissions() {


        $models = Auth::find()->where(['type' => Auth::TYPE_PERMISSION])->orderBy('paiid asc')->all();

        $permissions = [];
        foreach($models as $model) {
            $permissions[$model['name']] = ' (' . $model['description'] . ')';
        }
        return $models;
    }
    protected function preparePermissions($post) {
        return (isset($post['Auth']['_permissions']) &&
            is_array($post['Auth']['_permissions'])) ? $post['Auth']['_permissions'] : [];
    }
}

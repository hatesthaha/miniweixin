<?php
namespace backend\controllers;
/**
 * Created by PhpStorm.
 * User: wuwenhan
 * Date: 2015/7/6
 * Time: 13:17
 */

use wanhunet\wanhunet;
use Yii;
use yii\web\Controller;
use yii\rbac\DbManager;
use wanhunet\helpers\AdminNav;

class InitController extends Controller
{
    public function behaviors()
    {
        return [];
    }
    public function actionAuth()
    {
        AdminNav::initAdminAuth(wanhunet::app()->user->getId());
    }
    public function actionAuthView()
    {
        var_dump(Yii::$app->params['adminNav']);

        AdminNav::view();
    }
    public function actionIndex(){
        $auth = wanhunet::$app->getAuthManager();

        // add "createPost" permission upchange
        $createPost = $auth->createPermission('ceshi/index');
        $createPost->description = '单独内容维护列表';
        $auth->add($createPost);
        $roles = $auth->getRoles();
        foreach ($roles as $key => $value) {
            $auth->addChild($value, $createPost);

        }
    }
}
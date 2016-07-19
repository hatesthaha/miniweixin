<?php
namespace frontend\controllers;

use Yii;
use wanhunet\wanhunet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class WechatController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex(){

        $request = Yii::$app->request;

        switch ($request->getMethod()) {
            case 'GET':
                if (Yii::$app->wechat->checkSignature()) {
                    return $request->getQueryParam('echostr');
                }
            case 'POST':
                // $this->message = $this->parseRequest();
                // $result = WechatrequestController::switchType($this->message);
        }
    }
    public function actionCeshi(){
        $wechat = Yii::$app->wechat; 
        var_dump($wechat->parseRequest());
    }
}
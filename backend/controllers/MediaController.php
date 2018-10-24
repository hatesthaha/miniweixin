<?php

namespace backend\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\media\UploadForm;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use common\models\filemanage\Filemanage;

/**
 * MediaController
 */
class MediaController extends Controller
{
  public function actionFileupload() {
    $model = new Filemanage;
    $this->Upload($model,'file');
  }
  public function Upload($model,$oragename)
  {
      $imageFile = UploadedFile::getInstance($model, $oragename);

      $directory = Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
      if (!is_dir($directory)) {
          FileHelper::createDirectory($directory);
      }
      var_dump($imageFile);
      if ($imageFile) {
          $uid = uniqid(time(), true);
          $fileName = $uid . '.' . $imageFile->extension;
          $filePath = $directory . $fileName;
          var_dump($filePath);
          if ($imageFile->saveAs($filePath)) {
              $path = '/img/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
              return Json::encode([
                  'files' => [
                      [
                          'name' => $fileName,
                          'size' => $imageFile->size,
                          'url' => $path,
                          'thumbnailUrl' => $path,
                          'deleteUrl' => 'image-delete?name=' . $fileName,
                          'deleteType' => 'POST',
                      ],
                  ],
              ]);
          }
      }

      return '';
  }
}
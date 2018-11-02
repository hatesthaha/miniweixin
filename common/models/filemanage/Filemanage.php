<?php

namespace common\models\filemanage;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\projectmanage\Projectmanage;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "filemanage".
 *
 * @property integer $id
 * @property integer $filedate
 * @property string $file
 * @property string $piwen
 * @property string $writename
 * @property string $remark
 * @property string $username
 * @property integer $created_at
 * @property integer $updated_at
 */
class Filemanage extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filemanage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark'], 'string'],
            [['filedate','projectid'], 'required'],
            [['file', 'piwen', 'writename', 'username'], 'string', 'max' => 255],
        ];
    }
    public static function getArrayProject(){
      return ArrayHelper::map(Projectmanage::find()->all(), 'id', 'projectname');
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'filedate' => Yii::t('app', '存档日期'),
            'file' => Yii::t('app', '报告上传'),
            'piwen' => Yii::t('app', '批文上传'),
            'writename' => Yii::t('app', '项目编写人'),
            'remark' => Yii::t('app', '备注'),
            'username' => Yii::t('app', '操作人'),
            'projectid' => Yii::t('app', '项目名称'),
            'projectname' => Yii::t('app', '项目名称'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

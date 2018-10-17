<?php

namespace common\models\filemanage;

use Yii;

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
            [['filedate', 'created_at', 'updated_at'], 'integer'],
            [['remark'], 'string'],
            [['file', 'piwen', 'writename', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'filedate' => Yii::t('app', 'Filedate'),
            'file' => Yii::t('app', 'File'),
            'piwen' => Yii::t('app', 'Piwen'),
            'writename' => Yii::t('app', 'Writename'),
            'remark' => Yii::t('app', 'Remark'),
            'username' => Yii::t('app', 'Username'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

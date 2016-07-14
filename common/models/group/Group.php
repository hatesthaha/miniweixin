<?php

namespace common\models\group;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "group".
 *
 * @property integer $id
 * @property string $name
 * @property string $context
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $display
 * @property integer $is_show
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'group';
    }
    const DISPLAY_ACTIVE = 1;
    const DISPLAY_DELETED = -1;

    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = -1;
    private $_displayLabel;
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }
    public function getDisplayLabel()
    {
        if ($this->_displayLabel === null) {
            $display = self::dislabels();
            $this->_displayLabel = $display[$this->display];
        }
        return $this->_displayLabel;
    }
    public static function dislabels()
    {
        return [
            self::DISPLAY_ACTIVE=>"启用",
            self::DISPLAY_DELETED => "停用",
        ];
    }
    public static function getArrayStatus()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', '正常'),
            self::STATUS_DELETED => Yii::t('app', '回收站'),

        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'unique'],
            [['created_at', 'updated_at', 'status', 'display', 'is_show'], 'integer'],
            [['context'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'context' => Yii::t('app', 'Context'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'display' => Yii::t('app', 'Display'),
            'is_show' => Yii::t('app', 'Is Show'),
        ];
    }
}

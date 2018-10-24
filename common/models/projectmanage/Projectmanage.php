<?php

namespace common\models\projectmanage;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "projectmanage".
 *
 * @property integer $id
 * @property string $buildname
 * @property string $contactname
 * @property string $contactphone
 * @property string $projectarea
 * @property string $projectname
 * @property string $projecttype
 * @property string $approval
 * @property string $projectuser
 * @property string $projectin
 * @property string $approvalname
 * @property integer $tkandate
 * @property integer $bsdate
 * @property integer $psdate
 * @property integer $bpjfdate
 * @property string $remark
 * @property string $jindu
 * @property string $username
 * @property integer $created_at
 * @property integer $updated_at
 */
class Projectmanage extends \yii\db\ActiveRecord
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
        return 'projectmanage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['remark', 'jindu'], 'string'],
            [['buildname', 'contactname', 'projectarea', 'projectname', 'projecttype', 'approval', 'projectuser', 'projectin', 'approvalname', 'username'], 'string', 'max' => 255],
            [['contactphone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'buildname' => Yii::t('app', '建设单位'),
            'contactname' => Yii::t('app', '联系人'),
            'contactphone' => Yii::t('app', '联系电话'),
            'projectarea' => Yii::t('app', '项目所在地'),
            'projectname' => Yii::t('app', '项目名称'),
            'projecttype' => Yii::t('app', '报告类型'),
            'approval' => Yii::t('app', '审批部门'),
            'projectuser' => Yii::t('app', '项目负责人'),
            'projectin' => Yii::t('app', '项目参与人'),
            'approvalname' => Yii::t('app', '审核人'),
            'tkandate' => Yii::t('app', '踏勘现场日期'),
            'bsdate' => Yii::t('app', '报审版提交日期'),
            'psdate' => Yii::t('app', '评审会日期'),
            'bpjfdate' => Yii::t('app', '报批版交付日期'),
            'remark' => Yii::t('app', '备注'),
            'jindu' => Yii::t('app', '进度'),
            'username' => Yii::t('app', 'Username'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

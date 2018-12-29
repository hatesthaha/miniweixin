<?php

namespace common\models\finance;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\projectmanage\Projectmanage;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "finance".
 *
 * @property integer $id
 * @property integer $qddate
 * @property string $htmoney
 * @property integer $sdkdate
 * @property string $sfmoney
 * @property integer $wkdate
 * @property string $wkmoney
 * @property string $jcunit
 * @property string $jcmoney
 * @property string $hezuofang
 * @property string $dixiasmoney
 * @property string $premoney
 * @property integer $ticheng
 * @property string $remark
 * @property string $username
 * @property integer $created_at
 * @property integer $updated_at
 */
class Finance extends \yii\db\ActiveRecord
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
        return 'finance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectid'], 'required'],
            [['htmoney', 'sfmoney', 'wkmoney', 'jcmoney', 'dixiasmoney', 'premoney'], 'number'],
            [['remark'], 'string'],
            [['jcunit', 'hezuofang'], 'string', 'max' => 255],
            [['ticheng'], 'string', 'max' => 2],
        ];
    }
    public static function getArrayProject(){
      $user = current(Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id));
      if($user->name == 'admin'){
        return ArrayHelper::map(Projectmanage::find()->all(), 'id', 'projectname');
      }else{
        $query =Projectmanage::find()->andWhere(['username'=>Yii::$app->user->identity->username])->all();
        
        return ArrayHelper::map($query, 'id', 'projectname');
      }
       
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'qddate' => Yii::t('app', '合同签订日期'),
            'htmoney' => Yii::t('app', '合同金额（万元）'),
            'sdkdate' => Yii::t('app', '首付款打款时间'),
            'sfmoney' => Yii::t('app', '首付款金额（万元）'),
            'wkdate' => Yii::t('app', '尾款打款日期'),
            'wkmoney' => Yii::t('app', '尾款金额（万元）'),
            'jcunit' => Yii::t('app', '检测单位'),
            'jcmoney' => Yii::t('app', '检测费用（万元）'),
            'hezuofang' => Yii::t('app', '地下水评价合作方'),
            'dixiasmoney' => Yii::t('app', '地下水评价费用（万元）'),
            'premoney' => Yii::t('app', '专家费用（元）'),
            'ticheng' => Yii::t('app', '是否提成'),
            'remark' => Yii::t('app', '备注'),
            'username' => Yii::t('app', '操作人'),
            'projectid' => Yii::t('app', '项目名称'),
            'projectname' => Yii::t('app', '项目名称'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}

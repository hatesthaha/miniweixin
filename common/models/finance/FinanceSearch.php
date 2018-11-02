<?php

namespace common\models\finance;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\finance\Finance;

/**
 * FinanceSearch represents the model behind the search form about `common\models\finance\Finance`.
 */
class FinanceSearch extends Finance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qddate', 'sdkdate', 'wkdate', 'created_at', 'updated_at'], 'integer'],
            [['htmoney', 'sfmoney', 'wkmoney', 'jcmoney', 'dixiasmoney', 'premoney'], 'number'],
            [['jcunit', 'hezuofang', 'ticheng', 'remark', 'username','projectname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

      $user = current(Yii::$app->authManager->getRolesByUser(Yii::$app->user->identity->id));
      if($user->name == 'admin'){
        $query = Finance::find();
      }else{
        $query = Finance::find();
        $query->andWhere(['username'=>Yii::$app->user->identity->username]);
      }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'qddate' => $this->qddate,
            'htmoney' => $this->htmoney,
            'sdkdate' => $this->sdkdate,
            'sfmoney' => $this->sfmoney,
            'wkdate' => $this->wkdate,
            'wkmoney' => $this->wkmoney,
            'jcmoney' => $this->jcmoney,
            'dixiasmoney' => $this->dixiasmoney,
            'premoney' => $this->premoney,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jcunit', $this->jcunit])
            ->andFilterWhere(['like', 'hezuofang', $this->hezuofang])
            ->andFilterWhere(['like', 'projectname', $this->projectname])
            ->andFilterWhere(['like', 'ticheng', $this->ticheng])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}

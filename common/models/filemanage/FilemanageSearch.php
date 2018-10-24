<?php

namespace common\models\filemanage;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\filemanage\Filemanage;

/**
 * FilemanageSearch represents the model behind the search form about `common\models\filemanage\Filemanage`.
 */
class FilemanageSearch extends Filemanage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'filedate', 'created_at', 'updated_at'], 'integer'],
            [['file', 'piwen', 'writename', 'remark', 'username'], 'safe'],
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
        $query = Filemanage::find();
      }else{
        $query = Filemanage::find();
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
            'filedate' => $this->filedate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'piwen', $this->piwen])
            ->andFilterWhere(['like', 'writename', $this->writename])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}

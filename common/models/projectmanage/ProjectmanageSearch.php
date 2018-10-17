<?php

namespace common\models\projectmanage;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\projectmanage\Projectmanage;

/**
 * ProjectmanageSearch represents the model behind the search form about `common\models\projectmanage\Projectmanage`.
 */
class ProjectmanageSearch extends Projectmanage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tkandate', 'bsdate', 'psdate', 'bpjfdate', 'created_at', 'updated_at'], 'integer'],
            [['buildname', 'contactname', 'contactphone', 'projectarea', 'projectname', 'projecttype', 'approval', 'projectuser', 'projectin', 'approvalname', 'remark', 'jindu', 'username'], 'safe'],
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
        $query = Projectmanage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'tkandate' => $this->tkandate,
            'bsdate' => $this->bsdate,
            'psdate' => $this->psdate,
            'bpjfdate' => $this->bpjfdate,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'buildname', $this->buildname])
            ->andFilterWhere(['like', 'contactname', $this->contactname])
            ->andFilterWhere(['like', 'contactphone', $this->contactphone])
            ->andFilterWhere(['like', 'projectarea', $this->projectarea])
            ->andFilterWhere(['like', 'projectname', $this->projectname])
            ->andFilterWhere(['like', 'projecttype', $this->projecttype])
            ->andFilterWhere(['like', 'approval', $this->approval])
            ->andFilterWhere(['like', 'projectuser', $this->projectuser])
            ->andFilterWhere(['like', 'projectin', $this->projectin])
            ->andFilterWhere(['like', 'approvalname', $this->approvalname])
            ->andFilterWhere(['like', 'remark', $this->remark])
            ->andFilterWhere(['like', 'jindu', $this->jindu])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}

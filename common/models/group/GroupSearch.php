<?php

namespace common\models\group;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\group\Group;

/**
 * GroupSearch represents the model behind the search form about `common\models\base\group\Group`.
 */
class GroupSearch extends Group
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'created_at', 'updated_at', 'status', 'display', 'is_show'], 'integer'],
            [['name', 'context'], 'safe'],
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
        $query = Group::find()->andWhere(['status'=>Group::STATUS_ACTIVE])->orderBy('id DESC');

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

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'display' => $this->display,
            'is_show' => $this->is_show,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'context', $this->context]);

        return $dataProvider;
    }
}

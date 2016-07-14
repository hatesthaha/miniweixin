<?php

namespace common\models\auth;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\auth\Auth;
class AuthSearch extends Auth
{
    public $name;
    public $description;

    public $recordsPerPage = 10;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['display', 'is_show', 'status'], 'integer'],
            [['name', 'description'], 'string'],
        ];
    }

    public function search($params, $type)
    {
        $query = Auth::find()->andWhere(['type' => $type])->andWhere(['status' => Auth::STATUS_ACTIVE]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $this->recordsPerPage,
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'display' => $this->display,
            'status' => $this->status,
        ]);
        $this->addCondition($query, 'name', true);
        $this->addCondition($query, 'description', true);
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        $value = $this->$attribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}

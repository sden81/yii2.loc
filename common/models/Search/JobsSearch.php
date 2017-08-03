<?php

namespace common\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jobs;

/**
 * JobsSearch represents the model behind the search form about `common\models\Jobs`.
 */
class JobsSearch extends Jobs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idjobs', 'salary', 'uid', 'updated_at'], 'integer'],
            ['created_at', 'date', 'format' => 'php:Y-m-d'],
            [['company_name', 'title', 'description', 'location', 'address'], 'safe'],
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
        $query = Jobs::find();

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
            'idjobs' => $this->idjobs,
            'salary' => $this->salary,
            'uid' => $this->uid,
        ]);

        $query->andFilterWhere(["DATE(FROM_UNIXTIME('created_at'))" => $this->created_at]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}

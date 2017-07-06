<?php

namespace common\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Resume;

/**
 * ResumeSearch represents the model behind the search form about `common\models\Resume`.
 */
class ResumeSearch extends Resume
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idresume', 'uid', 'created_at', 'updated_at', 'counter'], 'integer'],
            [['title', 'skills'], 'safe'],
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
        $query = Resume::find();

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
            'idresume' => $this->idresume,
            'uid' => $this->uid,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'counter' => $this->counter,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'skills', $this->skills]);

        return $dataProvider;
    }
}

<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Faculties;

/**
 * FacultiesSearch represents the model behind the search form of `common\models\Faculties`.
 */
class FacultiesSearch extends Faculties
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_id'], 'integer'],
            [['faculty_name', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Faculties::find();

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
            'faculty_id' => $this->faculty_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'faculty_name', $this->faculty_name]);

        return $dataProvider;
    }
}

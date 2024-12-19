<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Grade;

/**
 * GradeSearch represents the model behind the search form of `common\models\Grade`.
 */
class GradeSearch extends Grade
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_id', 'student_id', 'course_id'], 'integer'],
            [['grade', 'grade_date', 'created_at'], 'safe'],
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
        $query = Grade::find();

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
            'grade_id' => $this->grade_id,
            'student_id' => $this->student_id,
            'course_id' => $this->course_id,
            'grade_date' => $this->grade_date,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade]);

        return $dataProvider;
    }
}

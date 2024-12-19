<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Uploaded;
use yii\web\UploadedFile;

/**
 * UploadedSearch represents the model behind the search form of `backend\models\Uploaded`.
 */
class UploadedSearch extends Uploaded
{
    public $file; // Fayl uchun qo'shimcha atribut

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['file_name', 'file_path', 'uploaded_at'], 'safe'],
            [['file'], 'file', 'extensions' => 'png, jpg, pdf', 'maxSize' => 1024 * 1024 * 5], // Fayl qoidalari
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
        $query = Uploaded::find();

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
            'uploaded_at' => $this->uploaded_at,
        ]);

        $query->andFilterWhere(['like', 'file_name', $this->file_name])
            ->andFilterWhere(['like', 'file_path', $this->file_path]);

        return $dataProvider;
    }
}

<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Review;

/**
 * ReviewSearch represents the model behind the search form about `common\models\Review`.
 */
class ReviewSearch extends Review
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'company_id', 'person_id', 'service_id', 'conference_id', 'stars', 'raiting', 'likes'], 'integer'],
            [['text', 'date', 'user_ids_like', 'user_ids_dislike'], 'safe'],
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
        $query = Review::find();

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
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'person_id' => $this->person_id,
            'service_id' => $this->service_id,
            'conference_id' => $this->conference_id,
            'stars' => $this->stars,
            'raiting' => $this->raiting,
            'likes' => $this->likes,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'user_ids_like', $this->user_ids_like])
            ->andFilterWhere(['like', 'user_ids_dislike', $this->user_ids_dislike])
            ->orderBy('id DESC');

        return $dataProvider;
    }
}

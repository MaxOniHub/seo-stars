<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Theme;

/**
 * ThemeSearch represents the model behind the search form about `common\models\Theme`.
 */
class ThemeSearch extends Theme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['logo_big', 'logo_small', 'main_text', 'main_title', 'main_keys', 'main_desc', 'raiting_h1', 'raiting_title', 'raiting_keys', 'raiting_desc', 'about_text', 'about_title', 'about_keys', 'about_desc', 'metrics'], 'safe'],
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
        $query = Theme::find();

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
        ]);

        $query->andFilterWhere(['like', 'logo_big', $this->logo_big])
            ->andFilterWhere(['like', 'logo_small', $this->logo_small])
            ->andFilterWhere(['like', 'main_text', $this->main_text])
            ->andFilterWhere(['like', 'metrics', $this->metrics])
            ->andFilterWhere(['like', 'main_title', $this->main_title])
            ->andFilterWhere(['like', 'main_keys', $this->main_keys])
            ->andFilterWhere(['like', 'main_desc', $this->main_desc])
            ->andFilterWhere(['like', 'raiting_h1', $this->raiting_h1])
            ->andFilterWhere(['like', 'raiting_title', $this->raiting_title])
            ->andFilterWhere(['like', 'raiting_keys', $this->raiting_keys])
            ->andFilterWhere(['like', 'raiting_desc', $this->raiting_desc])
            ->andFilterWhere(['like', 'about_text', $this->about_text])
            ->andFilterWhere(['like', 'about_title', $this->about_title])
            ->andFilterWhere(['like', 'about_keys', $this->about_keys])
            ->andFilterWhere(['like', 'about_desc', $this->about_desc]);

        return $dataProvider;
    }
}

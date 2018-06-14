<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Conference;

/**
 * ConferenceSearch represents the model behind the search form about `common\models\Conference`.
 */
class ConferenceSearch extends Conference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_id', 'company_id', 'site_link', 'raiting', 'reviews'], 'integer'],
            [['name', 'alias', 'site', 'vk_group', 'fb_group', 'tags', 'logo', 'about', 'seo_title', 'seo_keys', 'seo_desc'], 'safe'],
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
        $query = Conference::find();

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
            'person_id' => $this->person_id,
            'company_id' => $this->company_id,
            'site_link' => $this->site_link,
            'raiting' => $this->raiting,
            'reviews' => $this->reviews,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'vk_group', $this->vk_group])
            ->andFilterWhere(['like', 'fb_group', $this->fb_group])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'seo_title', $this->seo_title])
            ->andFilterWhere(['like', 'seo_keys', $this->seo_keys])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc]);

        return $dataProvider;
    }
}

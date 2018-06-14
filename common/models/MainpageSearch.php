<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mainpage;

/**
 * MainpageSearch represents the model behind the search form about `common\models\Mainpage`.
 */
class MainpageSearch extends Mainpage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'limit1', 'limit2', 'limit3', 'limit4'], 'integer'],
            [['title1', 'regions1', 'tags1', 'sort1', 'title2', 'regions2', 'tags2', 'sort2', 'title3', 'regions3', 'tags3', 'sort3', 'title4', 'regions4', 'tags4', 'sort4'], 'safe'],
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
        $query = Mainpage::find();

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
            'limit1' => $this->limit1,
            'limit2' => $this->limit2,
            'limit3' => $this->limit3,
            'limit4' => $this->limit4,
        ]);

        $query->andFilterWhere(['like', 'title1', $this->title1])
            ->andFilterWhere(['like', 'regions1', $this->regions1])
            ->andFilterWhere(['like', 'tags1', $this->tags1])
            ->andFilterWhere(['like', 'sort1', $this->sort1])
            ->andFilterWhere(['like', 'title2', $this->title2])
            ->andFilterWhere(['like', 'regions2', $this->regions2])
            ->andFilterWhere(['like', 'tags2', $this->tags2])
            ->andFilterWhere(['like', 'sort2', $this->sort2])
            ->andFilterWhere(['like', 'title3', $this->title3])
            ->andFilterWhere(['like', 'regions3', $this->regions3])
            ->andFilterWhere(['like', 'tags3', $this->tags3])
            ->andFilterWhere(['like', 'sort3', $this->sort3])
            ->andFilterWhere(['like', 'title4', $this->title4])
            ->andFilterWhere(['like', 'regions4', $this->regions4])
            ->andFilterWhere(['like', 'tags4', $this->tags4])
            ->andFilterWhere(['like', 'sort4', $this->sort4]);

        return $dataProvider;
    }
}

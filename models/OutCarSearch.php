<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OutCar;

/**
 * OutCarSearch represents the model behind the search form about `app\models\OutCar`.
 */
class OutCarSearch extends OutCar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mapid'], 'integer'],
            [['path', 'time_start', 'time_end'], 'safe'],
            [['mile', 'wg', 'time_kho', 'time_koy', 'time_go'], 'number'],
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
        $query = OutCar::find();

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
            'mapid' => $this->mapid,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'mile' => $this->mile,
            'wg' => $this->wg,
            'time_kho' => $this->time_kho,
            'time_koy' => $this->time_koy,
            'time_go' => $this->time_go,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}

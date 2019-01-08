<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Car;

/**
 * CarSearch represents the model behind the search form about `app\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brandid', 'sub', 'rangma', 'cc', 'whebase', 'oilid', 'bycar', 'userid'], 'integer'],
            [['carid', 'caric', 'regis', 'regispp', 'gener', 'babt', 'type', 'color', 'bate', 'upbase', 'downbase', 'typebase', 'usecar', 'image'], 'safe'],
            [['oilsize', 'width', 'longs', 'hieght', 'bw', 'freight', 'price'], 'number'],
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
        $query = Car::find();

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
            'brandid' => $this->brandid,
            'sub' => $this->sub,
            'rangma' => $this->rangma,
            'cc' => $this->cc,
            'whebase' => $this->whebase,
            'oilid' => $this->oilid,
            'oilsize' => $this->oilsize,
            'width' => $this->width,
            'longs' => $this->longs,
            'hieght' => $this->hieght,
            'bw' => $this->bw,
            'freight' => $this->freight,
            'bycar' => $this->bycar,
            'usecar' => $this->usecar,
            'price' => $this->price,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'carid', $this->carid])
            ->andFilterWhere(['like', 'caric', $this->caric])
            ->andFilterWhere(['like', 'regis', $this->regis])
            ->andFilterWhere(['like', 'regispp', $this->regispp])
            ->andFilterWhere(['like', 'gener', $this->gener])
            ->andFilterWhere(['like', 'babt', $this->babt])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'bate', $this->bate])
            ->andFilterWhere(['like', 'upbase', $this->upbase])
            ->andFilterWhere(['like', 'downbase', $this->downbase])
            ->andFilterWhere(['like', 'typebase', $this->typebase])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}

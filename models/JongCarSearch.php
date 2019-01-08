<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JongCar;

/**
 * JongCarSearch represents the model behind the search form of `app\models\JongCar`.
 */
class JongCarSearch extends JongCar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cno'], 'integer'],// caruse
            //['ucar', 'each', 'rule' => ['integer']],
            [['vdate', 'dt1', 'dt2', 'person', 'post', 'station', 'rab_station', 'rab_date', 'song_station', 'song_date', 'rdt1', 'rdt2', 'sdt1', 'sdt2', 'status'], 'safe'],
            [['thing', 'size'], 'number'],
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
    public function search($params){

        /*if(Yii::$app->user->identity->leveled=='3')
          $query = JongCar::find()->where(['=', 'us_car', Yii::$app->user->identity->id])->andwhere(['=','status','1'])->orderBy(['id'=>SORT_DESC]);
        elseif(Yii::$app->user->identity->leveled=='2')
          $query = JongCar::find()->where(['=', 'boss', Yii::$app->user->identity->id])->orwhere(['is','boss',null])->orderBy(['id'=>SORT_DESC]);
        else*/
          $query = JongCar::find()->orderBy(['id'=>SORT_DESC]);

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
            #'vdate' => $this->vdate,
            #'carid' => $this->carid,
            'cno' => $this->cno,
            'thing' => $this->thing,
            'size' => $this->size,
            #'us_car' => $this->us_car,
            'boss' => $this->boss,
            //'rab_date' => $this->rab_date,
            //'song_date' => $this->song_date,
            //'caruse' => $this->caruse,
            //'status' => $this->status,
            //'status' => $this->status==='-'? null : $this->status,
        ]);
        if($this->status<>'-')
          $query->andFilterWhere(['status' => $this->status]);
        else
          $query->andFilterWhere(['is','status', null]);
          #$query->andFilterWhere(['not in','status', ['0','1']]);
        //if(empty($this->dt1)) $this->dt1 = '2000-01-01';
        //if(empty($this->dt2)) $this->dt2 = '2200-01-01';
        //print_r($this->carid);exit();
        $query->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'post', $this->post])
            //->andFilterWhere(['in', 'us_car', $this->ucar])// คือ IN(1,2,3,4)
            ->andFilterWhere(['between', 'vdate',
            (!empty($this->dt1) ? $this->dt1 : '2010-01-01').' 00:00:00',
            (!empty($this->dt2) ? $this->dt2 : '2100-01-01').' 23:59:59'])// between 1 and 9
            ->andFilterWhere(['like', 'station', $this->station])
            ->andFilterWhere(['like', 'rab_staion', $this->rab_station])
            ->andFilterWhere(['between', 'rab_date',
            (!empty($this->rdt1) ? $this->rdt1 : '2010-01-01').' 00:00:00',
            (!empty($this->rdt2) ? $this->rdt2 : '2100-01-01').' 23:59:59'])
            ->andFilterWhere(['like', 'song_station', $this->song_station])
            ->andFilterWhere(['between', 'song_date',
            (!empty($this->sdt1) ? $this->sdt1 : '2010-01-01').' 00:00:00',
            (!empty($this->sdt2) ? $this->sdt2 : '2100-01-01').' 23:59:59']);

        return $dataProvider;
    }
}

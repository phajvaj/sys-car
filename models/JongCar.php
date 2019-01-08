<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

class JongCar extends \yii\db\ActiveRecord
{
    public $dt1,$dt2;
    public $rdt1,$rdt2;
    public $sdt1,$sdt2;
    public $ucar = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jong_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vdate', 'person', 'post', 'station', 'cno', 'rab_station', 'rab_date', 'song_station', 'song_date', 'caruse'], 'required'],
            [['vdate', 'rab_date', 'song_date', 'dt1', 'dt2', 'rdt1', 'rdt2', 'sdt1', 'sdt2'], 'safe'],
            [['cno', 'caruse', 'boss'], 'integer'],
            [['station', 'area', 'status'], 'string'],
            //['ucar', 'each', 'rule' => ['integer']],
            [['thing', 'size'], 'number'],
            [['person', 'post', 'rab_station', 'song_station'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vdate' => 'วันที่ขอรถ',
            'dt1' => 'วันที่ขอรถ',
            'dt2' => 'วันที่ขอรถ',
            'person' => 'ผู้ขอ',
            'post' => 'ตำแหน่ง',
            'station' => 'สถานที่ไป',
            'cno' => 'จำนวน(คน)',
            'thing' => 'น้ำหนักสิ่งของ(กม.)',
            'size' => 'ปริมาตรสิ่งของ(ชิ้น)',
            'rab_station' => 'สถานที่ไปรับ',
            'rab_date' => 'วันที่รับ',
            'song_station' => 'สถานที่ไปส่ง',
            'song_date' => 'วันที่ส่ง',
            'caruse' => 'จำนวน(เที่ยว)',
            'area' => 'พื้นที่',
            'boss' => 'ผู้อนุมัติ',
            'status' => 'อนุมัติ',
            'jCarName' => 'รถ'
        ];
    }

    public function getMapcar()
    {
        return $this->hasMany(MapCar::className(), ['jongid' => 'id']);
    }

    public function getJCarName() {
        $map = MapCar::find()->where(['jongid'=>$this->id, 'us_car'=>Yii::$app->user->identity->id])->one();
        if(empty($map->carid)) return '';
        return @Html::img(Yii::$app->request->baseUrl.'/car/'.@$map->car->image,['height'=>100, 'class'=>'img-circle']).' <br/><strong>ทะเบียน: '.@$map->car->regis.' รุ่น '.@$map->car->gener.'</strong>';
    }

    public function getJUseCar() {
        $map = MapCar::find()->where(['jongid'=>$this->id, 'us_car'=>Yii::$app->user->identity->id])->one();
        if(empty($map->useCars)) return false; else return true;
    }

    public function getJOutCar() {
        $map = MapCar::find()->where(['jongid'=>$this->id, 'us_car'=>Yii::$app->user->identity->id])->one();
        if(empty($map->outCars)) return false; else return true;
    }

    public function getJUserName(){
      if(empty($this->mapcar->us_car)) return '';
      return @Html::img(Yii::$app->request->baseUrl.'/user/'.@$this->mapcar->usered->image,['height'=>80, 'class'=>'img-circle']).'<br/> <strong>ชื่อ: '.@$this->mapcar->usered->fullname.' ต. '.@$this->mapcar->usered->post.'</strong>';
    }
}

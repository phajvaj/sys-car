<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "jong_car".
 *
 * @property integer $id
 * @property string $vdate
 * @property string $person
 * @property string $post
 * @property integer $carid
 * @property string $station
 * @property integer $cno
 * @property double $thing
 * @property double $size
 * @property integer $ps_car
 * @property string $rab_staion
 * @property string $rab_date
 * @property string $song_station
 * @property string $song_date
 * @property integer $caruse
 * @property string $area
 */
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
            [['vdate', 'rab_date', 'song_date', 'dt1', 'dt2', 'rdt1', 'rdt2', 'sdt1', 'sdt2'], 'safe'],
            [['carid', 'cno', 'ps_car', 'us_car', 'caruse', 'boss'], 'integer'],
            [['station', 'area', 'status'], 'string'],
            ['ucar', 'each', 'rule' => ['integer']],
            [['thing', 'size', 'fule', 'lubri'], 'number'],
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
            'carid' => 'รถ',
            'CarName' => 'รถ',
            'station' => 'สถานที่ไป',
            'cno' => 'จำนวน(คน)',
            'thing' => 'น้ำหนักสิ่งของ',
            'size' => 'ปริมาตรสิ่งของ',
            'ps_car' => 'ผู้ควบคุมรถ',
            'us_car' => 'พลขับ',
            'UserName' => 'พลขับ',
            'rab_station' => 'สถานที่ไปรับ',
            'rab_date' => 'วันที่รับ',
            'song_station' => 'สถานที่ไปส่ง',
            'song_date' => 'วันที่ส่ง',
            'caruse' => 'จำนวน(เที่ยว)',
            'area' => 'พื้นที่',
            'fule' => 'น้ำมันเชื่อเพลิง(ลิตร)',
            'lubri' => 'น้ำมันเครื่อง(ลิตร)',
            'boss' => 'ผู้อนุมัติ',
            'status' => 'อนุมัติ'
        ];
    }

    public function getCar() {
        return @$this->hasOne(Car::className(), ['id' => 'carid']);
    }

    public function getUsered() {
        return @$this->hasOne(User::className(), ['id' => 'us_car']);
    }

    public function getPscar() {
        return @$this->hasOne(PsCar::className(), ['id' => 'ps_car']);
    }

    public function getCarName() {
        if(empty($this->carid)) return '';
        return @Html::img(Yii::$app->request->baseUrl.'/car/'.$this->car->image,['height'=>100, 'class'=>'img-circle']).' <br/><strong>ทะเบียน: '.@$this->car->regis.' รุ่น '.@$this->car->gener.'</strong>';
    }

    public function getCared() {
        if(empty($this->carid)) return '';
        return 'ทะเบียน: '.@$this->car->regis.' รุ่น '.@$this->car->gener;
    }

    public function getUserName(){
      if(empty($this->us_car)) return '';
      return @Html::img(Yii::$app->request->baseUrl.'/user/'.@$this->usered->image,['height'=>80, 'class'=>'img-circle']).'<br/> <strong>ชื่อ: '.@$this->usered->fullname.' ต. '.@$this->usered->post.'</strong>';
    }

    public function getOutCars()
    {
        return $this->hasMany(OutCar::className(), ['jongid' => 'id']);
    }

    public function getUseCars()
    {
        return $this->hasMany(UseCar::className(), ['jongid' => 'id']);
    }

    public function getMapcar()
    {
        return $this->hasMany(MapCar::className(), ['jongid' => 'id']);
    }
}

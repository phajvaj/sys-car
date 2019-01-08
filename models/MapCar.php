<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "map_car".
 *
 * @property integer $id
 * @property integer $jongid
 * @property integer $carid
 * @property integer $ps_car
 * @property integer $us_car
 * @property double $fule
 * @property double $lubri
 *
 * @property JongCar $jong
 */
class MapCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'map_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['carid', 'ps_car', 'us_car',], 'required'],
            [['jongid', 'carid', 'ps_car', 'us_car'], 'integer'],
            //[['carid', 'ps_car', 'us_car'], 'each', 'rule' => ['integer']],
            [['fule', 'lubri'], 'number'],
            [['note'], 'string'],
            [['jongid', 'carid'], 'unique', 'targetAttribute' => ['jongid', 'carid'], 'message' => 'เลือกรถไม่ถูกต้อง มีการเลือกรถคันนี้อยู่แล้ว'],
            [['jongid', 'us_car'], 'unique', 'targetAttribute' => ['jongid', 'us_car'], 'message' => 'เลือกพลขับไม่ถูกต้อง มีการเลือกพลขับนี้อยู่แล้ว'],
            [['jongid'], 'exist', 'skipOnError' => true, 'targetClass' => JongCar::className(), 'targetAttribute' => ['jongid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jongid' => 'Jongid',
            'carid' => 'รถ',
            'CarName' => 'รถ',
            'ps_car' => 'ผู้ควบคุมรถ',
            'us_car' => 'พลขับ',
            'fule' => 'น้ำมันเชื่อเพลิง(ลิตร)',
            'lubri' => 'น้ำมันเครื่อง(ลิตร)',
            'note' => 'หมายเหตุ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJong()
    {
        return $this->hasOne(JongCar::className(), ['id' => 'jongid']);
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
        return $this->hasMany(OutCar::className(), ['mapid' => 'id']);
    }

    public function getUseCars()
    {
        return $this->hasMany(UseCar::className(), ['mapid' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "car".
 *
 * @property integer $id
 * @property string $carid
 * @property string $caric
 * @property string $regis
 * @property string $regispp
 * @property integer $brandid
 * @property string $gener
 * @property string $babt
 * @property string $type
 * @property string $color
 * @property integer $sub
 * @property integer $rangma
 * @property integer $cc
 * @property string $bate
 * @property integer $whebase
 * @property string $upbase
 * @property string $downbase
 * @property string $typebase
 * @property integer $oilid
 * @property double $oilsize
 * @property double $width
 * @property double $longs
 * @property double $hieght
 * @property double $bw
 * @property double $freight
 * @property integer $bycar
 * @property string $usecar
 * @property double $price
 * @property integer $userid
 * @property string $image
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brandid', 'sub', 'rangma', 'cc', 'whebase', 'oilid', 'bycar', 'userid'], 'integer'],
            [['oilsize', 'width', 'longs', 'hieght', 'bw', 'freight', 'price'], 'number'],
            [['usecar'], 'safe'],
            [['carid', 'caric', 'regis', 'regispp', 'typebase'], 'string', 'max' => 20],
            [['gener', 'type', 'bate'], 'string', 'max' => 255],
            [['babt'], 'string', 'max' => 100],
            [['color', 'upbase', 'downbase'], 'string', 'max' => 15],
            [['image'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carid' => 'เลขเครื่องยนต์',
            'caric' => 'เลขแคร่',
            'regis' => 'ทะเบียนทหาร',
            'regispp' => 'ทะเบียนกรมตำตรวจ',
            'brandid' => 'ยี่ห้อ',
            'gener' => 'รุ่น',
            'babt' => 'แบบ',
            'type' => 'ชนิด',
            'color' => 'สีรถ',
            'sub' => 'จำนวนสูบ',
            'rangma' => 'แรงม้า',
            'cc' => 'ซีซี',
            'bate' => 'แบตเตอรี่',
            'whebase' => 'ช่วงล้อ',
            'upbase' => 'ยางล้อหน้าขนาด',
            'downbase' => 'ยางล้อหลังขนาด',
            'typebase' => 'ชนิดยาง',
            'oilid' => 'น้ำมัน',
            'oilsize' => 'ขนาดถัง',
            'width' => 'กว้าง',
            'longs' => 'ยาว',
            'hieght' => 'สูง',
            'bw' => 'หนัก',
            'freight' => 'น้ำหนักบรรทุก',
            'bycar' => 'ปีที่ผลิต',
            'usecar' => 'วันที่เริ่มใช้',
            'price' => 'ราคา',
            'userid' => 'Userid',
            'image' => 'รูปภาพ',
        ];
    }

    public function getBrand() {
        return @$this->hasOne(Brand::className(), ['id' => 'brandid']);
    }

    public function getUsers() {
        return @$this->hasOne(User::className(), ['id' => 'userid']);
    }

    public function getBrandName() {
        return @$this->brand->name;
    }

    public function getUserName(){
      return Html::img(Yii::$app->request->baseUrl.'/user/'.@$this->users->image,['height'=>80, 'class'=>'img-circle']).'<br/> <strong>ชื่อ: '.@$this->users->fullname.' ต. '.@$this->users->post.'</strong>';
    }

    public function getMapcar()
    {
        return $this->hasMany(MapCar::className(), ['carid' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "use_car".
 *
 * @property integer $id
 * @property integer $usid
 * @property integer $mapid
 * @property string $wk1
 * @property string $wk2
 * @property string $wk3
 * @property string $time_start
 * @property double $mile_start
 * @property string $time_end
 * @property double $mile_end
 * @property string $wk11
 * @property string $wk12
 * @property string $wk13
 * @property string $wk14
 * @property string $wk15
 * @property string $wk16
 * @property string $wk17
 * @property string $wk18
 * @property string $wk19
 * @property string $wk21
 * @property string $wk22
 * @property string $wk23
 * @property string $wk24
 * @property string $wk25
 * @property string $wk26
 * @property string $wk31
 * @property string $wk32
 * @property string $wk33
 * @property string $wk34
 * @property string $wk35
 * @property string $wk36
 * @property string $wk37
 * @property string $wk38
 * @property string $wk39
 * @property string $wk310
 *
 * @property JongCar $jong
 * @property Users $us
 */
class UseCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'use_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usid', 'mapid'], 'integer'],
            [['wk1', 'wk2', 'wk3', 'wk11', 'wk12', 'wk13', 'wk14', 'wk15', 'wk16', 'wk17', 'wk18', 'wk19', 'wk21', 'wk22', 'wk23', 'wk24', 'wk25', 'wk26', 'wk31', 'wk32', 'wk33', 'wk34', 'wk35', 'wk36', 'wk37', 'wk38', 'wk39', 'wk310'], 'string'],
            [['time_start', 'time_end'], 'safe'],
            [['mile_start', 'mile_end'], 'number'],
            [['mapid'], 'exist', 'skipOnError' => true, 'targetClass' => MapCar::className(), 'targetAttribute' => ['mapid' => 'id']],
            [['usid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usid' => 'พลขับ',
            'mapid' => 'รายการจอง',
            'wk1' => 'บำรุงประจำวัน',
            'wk2' => 'บำรุงขณะใช้งาน',
            'wk3' => 'บำรุงหลังใช้งาน',
            'time_start' => 'เวลาเริ่ม',
            'mile_start' => 'ไมล์เริ่มต้น',
            'time_end' => 'เวลากลับ',
            'mile_end' => 'ไมล์สิ้นสุด',
            'wk11' => 'อาการชำรุดเล็กน้อย',
            'wk12' => 'อาการรั่วในที่ต่างๆ',
            'wk13' => 'เชื้อเพลิง น้ำมันเครื่อง น้ำ',
            'wk14' => 'แป้นเกลียวล้อ,แป้นปลายเพลาล้อ,ยาง',
            'wk15' => 'การอุ่นเครื่องยนต์',
            'wk16' => 'เครื่องวัดต่างๆ',
            'wk17' => 'เครื่องช่วยความปลอดภัย',
            'wk18' => 'เครื่องมือ, เครื่องใช้',
            'wk19' => 'เอกสาร, แบบฟอร์ม',
            'wk21' => 'เครื่องวัดต่างๆ',
            'wk22' => 'ห้ามล้อ',
            'wk23' => 'คลัทซ์',
            'wk24' => 'เครื่องบัคับเลี้ยว',
            'wk25' => 'การทำงานของเครื่องยนต์',
            'wk26' => 'เสียงผิดปกติ',
            'wk31' => 'โคมไฟและกระจกสะท้อนแสง',
            'wk32' => 'เครื่องช่วยความปลอดภัย',
            'wk33' => 'ห้ามล้อ',
            'wk34' => 'ถังลม (ระบายความชื้น)',
            'wk35' => 'เชื่อเพลิง, น้ำมันเครื่อง, น้ำ (เติม)',
            'wk36' => '* สายพานพัดลม ฯลฯ',
            'wk37' => '* ระดับน้ำกรดแบตเตอรี่',
            'wk38' => '* ความสะอาดของน้ำในหม้อน้ำ',
            'wk39' => '* ยาง (ชำรุด) (ความดัน)',
            'wk310' => '* การทำความสะอาดทุกส่วน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMap()
    {
        return $this->hasOne(MapCar::className(), ['id' => 'mapid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasOne(User::className(), ['id' => 'usid']);
    }

    public function getUserName(){
      return Html::img(Yii::$app->request->baseUrl.'/user/'.@$this->us->image,['height'=>80, 'class'=>'img-circle']).'<br/> <strong>ชื่อ: '.@$this->us->fullname.' ต. '.@$this->us->post.'</strong>';
    }
}

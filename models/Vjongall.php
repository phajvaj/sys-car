<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vjongall".
 *
 * @property integer $id
 * @property string $vdate
 * @property string $person
 * @property string $post
 * @property string $station
 * @property integer $cno
 * @property double $thing
 * @property double $size
 * @property string $rab_station
 * @property string $rab_date
 * @property string $song_station
 * @property string $song_date
 * @property integer $caruse
 * @property string $area
 * @property integer $boss
 * @property string $status
 * @property integer $mid
 * @property integer $carid
 * @property double $fule
 * @property integer $jongid
 * @property double $lubri
 * @property integer $ps_car
 * @property integer $us_car
 * @property string $regis
 * @property string $gener
 * @property string $type
 * @property string $cimage
 * @property string $psname
 * @property string $ppost
 * @property string $tel
 * @property string $fullname
 * @property string $uimage
 */
class Vjongall extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vjongall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cno', 'caruse', 'boss', 'mid', 'carid', 'jongid', 'ps_car', 'us_car'], 'integer'],
            [['vdate', 'rab_date', 'song_date'], 'safe'],
            [['thing', 'size', 'fule', 'lubri'], 'number'],
            [['area', 'status'], 'string'],
            [['person', 'post', 'station', 'rab_station', 'song_station', 'gener', 'type', 'psname'], 'string', 'max' => 255],
            [['regis'], 'string', 'max' => 20],
            [['cimage', 'uimage'], 'string', 'max' => 30],
            [['ppost'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 10],
            [['fullname'], 'string', 'max' => 200],
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
            'person' => 'ผู้ขอ',
            'post' => 'ตำแหน่ง',
            'station' => 'สถานที่ไป',
            'cno' => 'จำนวน(คน)',
            'thing' => 'น้ำหนักสิ่งของ',
            'size' => 'ปริมาตรสิ่งของ',
            'rab_station' => 'สถานที่ไปรับ',
            'rab_date' => 'วันที่รับ',
            'song_station' => 'สถานที่ไปส่ง',
            'song_date' => 'วันที่ส่ง',
            'caruse' => 'จำนวน(เที่ยว)',
            'area' => 'พื้นที่',
            'boss' => 'Boss',
            'status' => 'อนุมัติ',
            'mid' => 'Mid',
            'carid' => 'Carid',
            'fule' => 'น้ำมันเชื่อเพลิง(ลิตร)',
            'jongid' => 'Jongid',
            'lubri' => 'น้ำมันเครื่อง(ลิตร)',
            'ps_car' => 'ผู้ควบคุมรถ',
            'us_car' => 'พลขับ',
            'regis' => 'ทะเบียน',
            'gener' => 'รุ่น',
            'type' => 'ประเภท',
            'cimage' => 'Cimage',
            'psname' => 'ผู้ควบคุมรถ',
            'ppost' => 'ตำแหน่ง',
            'tel' => 'โทรศัพท์',
            'fullname' => 'Fullname',
            'uimage' => 'Uimage',
        ];
    }
}

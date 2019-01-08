<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jong_car".
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
 *
 * @property MapCar[] $mapCars
 * @property OutCar[] $outCars
 * @property UseCar[] $useCars
 */
class JongCar extends \yii\db\ActiveRecord
{
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
            [['vdate', 'rab_date', 'song_date'], 'safe'],
            [['cno', 'caruse', 'boss'], 'integer'],
            [['thing', 'size'], 'number'],
            [['area', 'status'], 'string'],
            [['person', 'post', 'station', 'rab_station', 'song_station'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapCars()
    {
        return $this->hasMany(MapCar::className(), ['jongid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOutCars()
    {
        return $this->hasMany(OutCar::className(), ['jongid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUseCars()
    {
        return $this->hasMany(UseCar::className(), ['jongid' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_car".
 *
 * @property integer $id
 * @property integer $jongid
 * @property string $wk1
 * @property string $wk2
 * @property string $wk3
 * @property string $time_start
 * @property double $mile_start
 * @property string $time_end
 * @property double $mile_end
 * @property double $fule
 * @property double $lubri
 */
class WorkCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jongid'], 'integer'],
            [['wk1', 'wk2', 'wk3'], 'string'],
            [['time_start', 'time_end'], 'safe'],
            [['mile_start', 'mile_end', 'fule', 'lubri'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jongid' => 'รายการจอง',
            'wk1' => 'บำรุงประจำวัน',
            'wk2' => 'บำรุงขณะใช้งาน',
            'wk3' => 'บำรุงหลังใช้งาน',
            'time_start' => 'เวลาเข้า',
            'mile_start' => 'ไมล์เริ่มต้น',
            'time_end' => 'เวลาออก',
            'mile_end' => 'ไมล์สิ้นสุด',
            'fule' => 'Fule',
            'lubri' => 'Lubri',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "out_car".
 *
 * @property integer $id
 * @property integer $mapid
 * @property string $path
 * @property string $time_start
 * @property string $time_end
 * @property double $mile
 * @property double $wg
 * @property double $time_kho
 * @property double $time_koy
 * @property double $time_go
 *
 * @property JongCar $jong
 */
class OutCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'out_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mapid'], 'integer'],
            [['time_start', 'time_end'], 'safe'],
            [['mile', 'wg', 'time_kho', 'time_koy', 'time_go'], 'number'],
            [['path'], 'string', 'max' => 255],
            [['mapid'], 'exist', 'skipOnError' => true, 'targetClass' => MapCar::className(), 'targetAttribute' => ['mapid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mapid' => 'รายการจอง',
            'path' => 'สถานที่',
            'time_start' => 'ออก',
            'time_end' => 'ถึง',
            'mile' => 'เลขไมล์',
            'wg' => 'น้ำหนักบรรทุก(กม.)',
            'time_kho' => 'เวลาขนของลง(นาที.)',
            'time_koy' => 'เวลาคอย(นาที.)',
            'time_go' => 'เวลาเดินทาง(ชม.)',
        ];
    }

    public function beforeSave(){
       /*if($this->isNewRecord){
        $this->audit_db_create_time=$this->audit_db_update_time=new CDbExpression('NOW()');
       }else{
        $this->audit_db_update_time=new CDbExpression('NOW()');
      }*/

       $this->time_go = str_replace(':', '.', $this->time_end) - str_replace(':', '.', $this->time_start);

       return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMap()
    {
        return $this->hasOne(MapCar::className(), ['id' => 'mapid']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ps_car".
 *
 * @property integer $id
 * @property string $psname
 * @property string $post
 * @property string $tel
 */
class PsCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['psname'], 'string', 'max' => 255],
            [['post'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'psname' => 'ผู้ควบคุมรถ',
            'post' => 'ตำแหน่ง',
            'tel' => 'โทรศัพท์',
        ];
    }
}

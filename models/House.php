<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "house".
 *
 * @property integer $house_id
 * @property integer $village_id
 * @property string $address
 * @property string $road
 * @property string $census_id
 * @property string $hos_guid
 * @property integer $location_area_id
 * @property string $latitude
 * @property string $longitude
 * @property integer $family_count
 * @property string $last_update
 * @property integer $house_type_id
 * @property string $doctor_code
 * @property string $house_guid
 * @property string $village_guid
 * @property integer $head_person_id
 * @property string $utm_lat
 * @property string $utm_long
 * @property string $house_social_survey_staff
 * @property integer $house_subtype_id
 * @property string $house_condo_roomno
 * @property string $house_condo_name
 * @property string $house_housing_development_name
 */
class House extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'house';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['house_id'], 'required'],
            [['house_id', 'village_id', 'location_area_id', 'family_count', 'house_type_id', 'head_person_id', 'house_subtype_id'], 'integer'],
            [['last_update'], 'safe'],
            [['address'], 'string', 'max' => 150],
            [['road', 'latitude', 'longitude', 'utm_lat', 'utm_long'], 'string', 'max' => 100],
            [['census_id'], 'string', 'max' => 20],
            [['hos_guid', 'house_guid', 'village_guid'], 'string', 'max' => 38],
            [['doctor_code'], 'string', 'max' => 9],
            [['house_social_survey_staff', 'house_condo_name', 'house_housing_development_name'], 'string', 'max' => 50],
            [['house_condo_roomno'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'house_id' => 'House ID',
            'village_id' => 'Village ID',
            'address' => 'Address',
            'road' => 'Road',
            'census_id' => 'Census ID',
            'hos_guid' => 'Hos Guid',
            'location_area_id' => 'Location Area ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'family_count' => 'Family Count',
            'last_update' => 'Last Update',
            'house_type_id' => 'House Type ID',
            'doctor_code' => 'Doctor Code',
            'house_guid' => 'House Guid',
            'village_guid' => 'Village Guid',
            'head_person_id' => 'Head Person ID',
            'utm_lat' => 'Utm Lat',
            'utm_long' => 'Utm Long',
            'house_social_survey_staff' => 'House Social Survey Staff',
            'house_subtype_id' => 'House Subtype ID',
            'house_condo_roomno' => 'House Condo Roomno',
            'house_condo_name' => 'House Condo Name',
            'house_housing_development_name' => 'House Housing Development Name',
        ];
    }
}

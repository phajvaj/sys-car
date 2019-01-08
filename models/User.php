<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

#class User extends \yii\base\Object implements \yii\web\IdentityInterface
class User extends ActiveRecord implements IdentityInterface
{
    #public $id;
    #public $username;
    #public $password;
    #public $authKey;
    #public $accessToken;

    public static function TableName(){
        return 'users';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['leveled', 'created_at', 'updated_at'], 'integer'],
            [['confirmed_at'], 'string', 'max' => 1],
            [['username', 'password', 'fullname', 'post', 'registration_ip', 'image'], 'string'],
            [['username', 'fullname', 'post', 'leveled'], 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'ผู้ใช้งาน',
            'password' => 'รหัสผ่าน',
            'fullname' => 'ชื่อ - นามสกุล',
            'post' => 'ตำแหน่ง',
            'leveled' => 'สิทธิใช้งาน',
            'confirmed_at' => 'สถานะใช้งาน',
            'registration_ip' => 'ไอพี(IP)',
            'created_at' => 'ลงทะเบียน',
            'updated_at' => 'ปรับปรุง',
            'image' => 'รูปภาพ',
        ];
    }

    public function getLevel() {
        return @$this->hasOne(Level::className(), ['level_id' => 'leveled']);
    }

    public function getLevelName() {
        return @$this->level->level_name;
    }

    public function getMapcar()
    {
        return $this->hasMany(MapCar::className(), ['us_car' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->password;
    }

    public function getFullName(){
        return $this->fullname;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return true;#$this->authKey === $authKey;
    }

    public function validateCheck($username)
    {
        return static::findOne(['username' => $username,'confirmed_at' => 'Y']);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return static::findOne(['password' => $this->passwordHash($password), ]);
        //Password::hash($password)
    }

    public function passwordHash($value)
    {
      #return password_hash($value.'-phingosoft.com', PASSWORD_DEFAULT);
      return sha1($value.'-phingosoft.com');
    }
}

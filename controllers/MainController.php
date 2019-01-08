<?php
namespace app\controllers;

use Yii;
#use yii\filters\AccessControl;
use yii\web\Controller;
#use yii\filters\VerbFilter;
use yii\web\Response;
/*
Line Notify
G8dLbcMqfwbwktfFDa0JvrIb2VI9uxBp5d3bMADtJzK
*/
class MainController extends Controller{

    protected $arUseCar = array(
        'Y' => 'เรียบร้อย',
        'X' => 'ชำรุด',
        'W' => 'ปรนนิบัตรบำรุงประจำสัปดาห์'
    );

    protected $arUpCar = array(
        'Y' => 'เรียบร้อย',
        'X' => 'ชำรุด',
    );

    protected $pages = false;
    protected $pdt1 = null;
    protected $pdt2 = null;
    protected $params = null;
    protected $charts = null;
    public $spaces = '&nbsp;';

    public function getRawdata($sql)
    {
        try{
            $query = \Yii::$app->db->createCommand($sql)->queryAll();
        }catch(\yii\db\Exception $e){
            #throw new \yii\web\ConflicHttpException("กรุณาตรวจสอบคำสั่ง SQL => <per>{$sql}</per>");
            return null;
        }
        //แบ่งหน้า
        $page = $this->pages;
        if($page > 0){
            $page = array(
                'page' => $this->pages - 1,
                'params' => $this->params);
        }
        //นำข้อมูลไปใส่ใน Provider
        $this->charts = $query;
        $data = new \yii\data\ArrayDataProvider([
            'allModels' => $query,
            'pagination' => $page,
        ]);

        return $data;
    }

    public function getSqldata($sql)
    {
        $query = null;
        try{
            $query = \Yii::$app->db->createCommand($sql)->queryAll();
        }catch(\yii\db\Exception $e){
            #throw new \yii\web\ConflicHttpException("กรุณาตรวจสอบคำสั่ง SQL => <per>{$sql}</per>");
            return null;
        }

        return $query;
    }

    public function array2d_search($array = null, $attr = null, $val = null, $strict = FALSE) {
      // Error is input array is not an array
      if (!is_array($array)) return FALSE;
      // Loop the array
      foreach ($array as $key => $inner) {
        // Error if inner item is not an array (you may want to remove this line)
        if (!is_array($inner)) return FALSE;
        // Skip entries where search key is not present
        if (!isset($inner[$attr])) continue;

        if ($strict) {
          // Strict typing
          if ($inner[$attr] === $val) return $key;
        } else {
          // Loose typing
          if ($inner[$attr] == $val) return $key;
        }
      }
      // We didn't find it
      return NULL;
    }

    public static function getSpace(){
      return $this->spaces;
    }

    public static function mapSpace($sp){
      $a = 1; $nbsp = null;
      while ($a <= $sp) {
        $nbsp .= '&nbsp;';
        #$nbsp .= $this->getSpace();
        $a++;
      }
      return $nbsp;
    }

    public function getFMonth($m){
      $mon = array(
        '1' => 'มกราคม',
        '2' => 'กุมภาพันธ์',
        '3' => 'มีนาคม',
        '4' => 'เมษายน',
        '5' => 'พฤษภาคม',
        '6' => 'มิถุนายน',
        '7' => 'กรกฏาคม',
        '8' => 'สิงหาคม',
        '9' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤษจิกายน',
        '12' => 'ธันวาคม',
      );
      return $mon[(int)$m];
    }

    public function getSMonth($m){
      $mon = array(
        '1' => 'ม.ค.',
        '2' => 'ก.พ.',
        '3' => 'มี.ค.',
        '4' => 'เม.ย',
        '5' => 'พ.ค.',
        '6' => 'มิ.ย',
        '7' => 'ก.ค.',
        '8' => 'ส.ค.',
        '9' => 'ก.ย.',
        '10' => 'ต.ค.',
        '11' => 'พ.ย.',
        '12' => 'ธ.ค.',
      );
      return $mon[(int)$m];
    }

    public function getNumThai($txt){
      $letters = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
      $fruit   = array('๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙', '๐');
      //$txt    = '43,3423.00';
      return  @str_replace($letters, $fruit, $txt);
    }
/*
import requests,json
import urllib.parse

LINE_ACCESS_TOKEN="ใส่ Token"
url = "https://notify-api.line.me/api/notify"


message ="ทดสอบ" # ข้อความที่ต้องการส่ง
msg = urllib.parse.urlencode({"message":message})
LINE_HEADERS = {'Content-Type':'application/x-www-form-urlencoded',"Authorization":"Bearer "+LINE_ACCESS_TOKEN}
session = requests.Session()
a=session.post(url, headers=LINE_HEADERS, data=msg)
print(a.text)
*/
    public function lineNotify($msg) {
      $url = 'https://notify-api.line.me/api/notify';
      $token = 'CpXImHmvYm3g4ZwWD6ENHzmfS3yNnAD8hgVCPB1ZEUp';//saciw
      //$token = 'eyAb0LEJ3y77Nt7fqHHGPK8CzyVy2maK0hanZaOnQyD';//srp group
      $queryData = array('message' => $msg);
      $queryData = http_build_query($queryData,'','&');
      $headerOptions = array(
        'http'=>array(
          'method'=>'POST',
          'header'=> "Content-Type: application/x-www-form-urlencoded\r\n" ."Authorization: Bearer ".$token."\r\n" ."Content-Length: ".strlen($queryData)."\r\n",
          'content' => $queryData
          )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($url, FALSE, $context);
        $res = json_decode($result);

        if($res->status!=200)
          shell_exec("curl -X POST -H 'Authorization: Bearer {$token}' -F 'message={$msg}' {$url}");// shell linux only

        return $res;
      }

    /*public function imageUpload($image)
    {
        $model = new Demo;
        if (!empty($_POST)) {
            $model->image = $_POST['Demo']['image'];
            $file = \yii\web\UploadedFile::getInstance($model, 'image');
            var_dump($file);

            // You can then do the following
            if ($model->save()) {
                $file->saveAs('path/to/file');
            }
            // its better if you relegate such a code to your model class
        }
        return $this->render('upload', ['model'=>$model]);
    }*/
}

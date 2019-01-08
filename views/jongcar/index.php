<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\DataColumn;
use yii\widgets\Pjax;
use kartik\widgets\DatePicker;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Url;
use app\models\Car;
use app\models\User;

use yii2mod\alert\Alert;
/* @var $this yii\web\View */
/* @var $searchModel app\models\JongCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการขอใช้รถ';
$this->params['breadcrumbs'][] = $this->title;

#date_default_timezone_set('Asia/Bangkok');

echo date_default_timezone_get();
/*
$time = time();

echo Yii::$app->thaiFormatter->asDate($time, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDate($time, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDateTime($time, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDate($time, 'php:Y-m-d')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($time, 'php:Y-m-d H:i:s')."<br>";
*/
//select filterModel car
$format = <<< SCRIPT
function getCar(state) {
    if (!state.id) return state.text; // optgroup
    return state.text;
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, View::POS_HEAD);


?>
<div class="jong-car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

    //$users = 'pscar.psname';// function ใน models jongcar

    /*if(Yii::$app->user->identity->leveled!='3'){
      $users = [
        'attribute' => 'us_car',
        'value' => function($model){
          return $model->getUserName();
          #return Html::img(Yii::$app->request->baseUrl.'/user/'.$model->user->image,['height'=>30, 'class'=>'img-circle']).' <strong><br/>ชื่อ : '.$model->user->fullname.' <br/>ต. '.$model->user->post.'</strong>';
        },
        'filter' => Select2::widget([
            'model' => $searchModel,
            'attribute' => 'us_car',//ucar
            'name' => 'us_car',//ucar
            'data' => ArrayHelper::map(User::find()->where(['leveled'=>3])->all(), 'id','fullname'),
            //'data' => ArrayHelper::map(User::find()->where(['leveled'=>3])->all(), 'id', function($user){
              //return Html::img(Yii::$app->request->baseUrl.'/user/'.$user['image'],['height'=>30, 'class'=>'img-circle']).' <strong>ชื่อ: '.$user['fullname'].' ต. '.$user['post'].'</strong>';
            //}),
            'options' => ['placeholder' => 'เลือกพลขับ ...'],
            'pluginOptions' => [
                //'templateResult' => new JsExpression('getCar'),
                //'templateSelection' => new JsExpression('getCar'),
                //'escapeMarkup' => $escape,
                'allowClear' => true,
                //'multiple' => true
            ],
        ]),
        'format' => 'html',
      ];
    }*/
    Yii::$app->formatter->locale = 'th_TH';
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'rowOptions' => function ($model) {
            if (empty($model->status)) {
                return ['class' => 'info'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                /*'detail'=>function ($model, $key, $index, $column) {
                    //return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
                    return Yii::$app->controller->render('map-details', ['model'=>$model]);
                },*/
                'detailUrl' =>  Url::to(['mapcar/map-details',]),
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'expandOneOnly'=>true
            ],
            //'vdate:datetime',
            [ // แสดงข้อมูลออกเป็น icon
              'attribute' => 'status',
              'format'=>'html',
              'value'=>function($model, $key, $index, $column){//ต้นแบบ
                return $model->status=='1' ? "<i class='btn glyphicon glyphicon-ok text-green' title='อนุมัติ'></i>" : ($model->status=='0' ? "<i class='btn glyphicon glyphicon-remove text-red' title='ไม่อนุมัติ'></i>" : "<i class=\"btn glyphicon glyphicon-repeat text-yellow\" title='รอการอนุมัติ'></i>");
              },
              'filter' => Select2::widget([
                  'model' => $searchModel,
                  'attribute' => 'status',
                  'name' => 'status',
                  'data' => ['-'=>'รอการอนุมัติ','1'=>'อนุมัติ','0'=>'ไม่อนุมัติ'],
                  'options' => ['placeholder' => 'เลือก ...'],
                  'pluginOptions' => [
                      'allowClear' => true,
                  ],
              ]),
            ],
            [
               'attribute' => 'vdate',
               'value' => function($model){
                 //return Yii::$app->thaiFormatter->asDateTime($model->vdate, 'medium');
                 return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->vdate))), 'medium');
               },
               'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'dt1',
                    'attribute2' => 'dt2',
                    'language' => 'th',
                    'removeButton' => [
                        'icon'=>'trash',
                    ],
                    'options' => ['placeholder' => 'เริ่มต้น'],
                    'options2' => ['placeholder' => 'สิ้นสุด'],
                    'type' => DatePicker::TYPE_RANGE,
                    //'form' => $dataProvider,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ]
                ]),
               'format' => 'html',
             ],
            'person',
            //'post',
            //'carid',
            //'car.regis',
            /*[
              'attribute' => 'carid',
              'value' => function($model){
                return $model->getCarName();
                #return Html::img(Yii::$app->request->baseUrl.'/car/'.$model->car->image,['height'=>30, 'class'=>'img-circle']).' <strong><br/>ป้าย : '.$model->car->regis.' <br/>รุ่น '.$model->car->gener.'</strong>';
              },
              'filter' => Select2::widget([
                  'model' => $searchModel,
                  'attribute' => 'carid',
                  'name' => 'carid',
                  //'data' => ArrayHelper::map(Car::find()->all(), 'id', 'regis'),
                  'data' => ArrayHelper::map(Car::find()->all(), 'id', function($car){
                    return Html::img(Yii::$app->request->baseUrl.'/car/'.$car['image'],['height'=>30, 'class'=>'img-circle']).' <strong>ป้าย: '.$car['regis'].' รุ่น '.$car['gener'].'</strong>';
                  }),
                  'options' => ['placeholder' => 'เลือกรถ ...'],
                  'pluginOptions' => [
                      'templateResult' => new JsExpression('getCar'),
                      'templateSelection' => new JsExpression('getCar'),
                      'escapeMarkup' => $escape,
                      'allowClear' => true,
                  ],
              ]),
              'format' => 'html',
            ],*/
            // 'station:ntext',
            // 'cno',
            // 'thing',
            // 'size',
            // 'ps_car',
             'rab_station',
             //'rab_date',
             [
                'attribute' => 'rab_date',
                'value' => function($model){
                  //return Yii::$app->thaiFormatter->asDateTime($model->rab_date, 'medium');
                  return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->rab_date))), 'medium');
                },
                'filter' => DatePicker::widget([
                     'model' => $searchModel,
                     'attribute' => 'rdt1',
                     'attribute2' => 'rdt2',
                     'language' => 'th',
                     'removeButton' => [
                         'icon'=>'trash',
                     ],
                     'options' => ['placeholder' => 'เริ่มต้น'],
                     'options2' => ['placeholder' => 'สิ้นสุด'],
                     'type' => DatePicker::TYPE_RANGE,
                     //'form' => $dataProvider,
                     'pluginOptions' => [
                         'format' => 'yyyy-mm-dd',
                         'autoclose' => true,
                     ]
                 ]),
                'format' => 'html',
              ],
             'song_station',
             //'song_date',
             [
                'attribute' => 'song_date',
                'value' => function($model){
                  //return Yii::$app->thaiFormatter->asDateTime($model->song_date, 'medium');
                  return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->song_date))), 'medium');
                },
                'filter' => DatePicker::widget([
                     'model' => $searchModel,
                     'attribute' => 'sdt1',
                     'attribute2' => 'sdt2',
                     'language' => 'th',
                     'removeButton' => [
                         'icon'=>'trash',
                     ],
                     'options' => ['placeholder' => 'เริ่มต้น'],
                     'options2' => ['placeholder' => 'สิ้นสุด'],
                     'type' => DatePicker::TYPE_RANGE,
                     //'form' => $dataProvider,
                     'pluginOptions' => [
                         'format' => 'yyyy-mm-dd',
                         'autoclose' => true,
                     ]
                 ]),
                'format' => 'html',
              ],
             'caruse:integer',
             //$users,

            //['class' => 'yii\grid\ActionColumn'],
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{print} {view} {update} {delete}',
              'buttons' => [
                            //'update' => function($url, $model){},
                            'delete' => function($url, $model){
                              if(!empty($model->outCars) or @Yii::$app->user->identity->leveled <> '2') return '';
                              return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url,
                              [
                                'title' => Yii::t('app', 'ลบ'),
                                'aria-label' => Yii::t('app', 'ลบ'),
                                'data-confirm' => 'คุณแน่ใจหรือไม่ที่จะลบรายการนี้',
                                //'onClick' => 'javascript:swal("Nice!", "You wrote: ")',
                                //'data-method' => 'post',
                                'data-pjax' => 0
                              ]);
                            },
              ],
              'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                  return Url::to(['view','id'=>$model->id]);
                }
                if ($action === 'update') {
                    return Url::to(['update','id'=>$model->id]);
                }
                if ($action === 'delete') {
                  if(@Yii::$app->user->identity->leveled=='2')
                  return Url::to(['delete','id'=>$model->id]);
                }
              }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

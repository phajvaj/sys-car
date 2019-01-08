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

$this->title = 'อนุมัติขอใช้รถ';
$this->params['breadcrumbs'][] = $this->title;


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

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'detailUrl' =>  Url::to(['map-details',]),
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'expandOneOnly'=>true
            ],
            [ // แสดงข้อมูลออกเป็น icon
              'attribute' => 'status',
              'format'=>'html',
              'value'=>function($model, $key, $index, $column){//ต้นแบบ
                return $model->status=='1' ? "<i class='btn glyphicon glyphicon-ok text-green' title='อนุมัติ'></i>" : ($model->status=='0' ? "<i class='btn glyphicon glyphicon-remove text-red' title='ไม่อนุมัติ'></i>" : "<i class=\"btn glyphicon glyphicon-repeat text-yellow\" title='รอการอนุมัติ'></i>");
              },
            ],
            [
               'attribute' => 'vdate',
               'value' => function($model){
                 //return Yii::$app->formatter->asDateTime($model->vdate, 'medium');
                 return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->vdate))), 'medium');
               },
               'format' => 'html',
             ],
            'person',
             'rab_station',
             [
                'attribute' => 'rab_date',
                'value' => function($model){
                  //return Yii::$app->thaiFormatter->asDateTime($model->rab_date, 'medium');
                  return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->rab_date))), 'medium');
                },
                'format' => 'html',
              ],
             'song_station',
             [
                'attribute' => 'song_date',
                'value' => function($model){
                  //return Yii::$app->thaiFormatter->asDateTime($model->song_date, 'medium');
                  return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->song_date))), 'medium');
                },
                'format' => 'html',
              ],
             'caruse:integer',

            //['class' => 'yii\grid\ActionColumn'],
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {insert} {update}',
              'buttons' => [
                            'view' => function($url, $model){
                              if(empty($model->mapcar)) return '';
                              return Html::a('<span class="glyphicon glyphicon-print"></span>', $url,
                              [
                                'title' => Yii::t('app', 'พิมพ์เอกสาร'),
                                'target' => '_blank',
                              ]);
                            },
                            'insert' => function ($url, $model) {
                              if(!empty($model->mapcar)) return '';
                              return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url,
                              [
                                'title' => Yii::t('app', 'เพิ่ม'),
                              ]);
                            },
                            'update' => function($url, $model){
                              if(empty($model->mapcar)) return '';
                              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                              [
                                'title' => Yii::t('app', 'แก้ไข'),
                              ]);
                            },
              ],
              'urlCreator' => function ($action, $model, $key, $index) {
                  if ($action === 'view') {
                    #return Url::to(['view','id'=>$model->id]);
                    return 'stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=jong-i.mrt&jongid='.$model->id;
                  }
                  if ($action === 'insert') {
                    return Url::to(['create','id'=>$model->id]);
                  }
                  if ($action === 'update') {
                    return Url::to(['update','id'=>$model->id]);
                  }
              }
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

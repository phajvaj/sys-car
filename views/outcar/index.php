<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OutCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ตำบลเดินทาง';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-car-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Out Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'vdate:datetime',
            [
               'attribute' => 'vdate',
               'value' => function($model){
                 //return Yii::$app->formatter->asDateTime($model->vdate, 'medium');
                 return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->vdate))), 'medium');
               },
               'format' => 'html',
             ],
            'person',
            'station:ntext',
            'jCarName:html',
            'rab_station',
            //'rab_date:datetime',
            [
               'attribute' => 'vdate',
               'value' => function($model){
                 //return Yii::$app->formatter->asDateTime($model->rab_date, 'medium');
                 return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->rab_date))), 'medium');
               },
               'format' => 'html',
             ],
            'song_station',
            //'song_date:datetime',
            [
               'attribute' => 'song_date',
               'value' => function($model){
                 //return Yii::$app->formatter->asDateTime($model->song_date, 'medium');
                 return Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->song_date))), 'medium');
               },
               'format' => 'html',
             ],
            //'path',
            //'time_start',
            //'time_end',
            // 'mile',
            // 'wg',
            // 'time_kho',
            // 'time_koy',
            // 'time_go',

            /*[
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {insert} {update}',
              'buttons' => [
                'insert' =>
              ],
            ],*/
            [
              'class' => 'yii\grid\ActionColumn',
              'template' => '{view} {insert} {update}',
              'buttons' => [
                            'view' => function($url, $model){
                              if($model->jOutCar==false) return '';
                              return Html::a('<span class="glyphicon glyphicon-print"></span>', $url,
                              [
                                'title' => Yii::t('app', 'พิมพ์เอกสาร'),
                              ]);
                            },
                            'insert' => function ($url, $model) {
                              if($model->jOutCar==true) return '';
                              return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url,
                              [
                                'title' => Yii::t('app', 'เพิ่ม'),
                              ]);
                            },
                            'update' => function($url, $model){
                              if($model->jOutCar==false) return '';
                              return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                              [
                                'title' => Yii::t('app', 'แก้ไข'),
                              ]);
                            },
              ],
              'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                  return Url::to(['view','id'=>$model->id]);
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
<?php Pjax::end(); ?></div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'การใช้รถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="use-car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
            'dataProvider' => $dataProvider,
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
                [
                  'class' => 'yii\grid\ActionColumn',
                  'template' => '{view} {insert} {update}',
                  'buttons' => [
                                'view' => function($url, $model){
                                  if($model->jUseCar==false) return '';
                                  return Html::a('<span class="glyphicon glyphicon-print"></span>', $url,
                                  [
                                    'title' => Yii::t('app', 'พิมพ์เอกสาร'),
                                  ]);
                                },
                                'insert' => function ($url, $model) {
                                  if($model->jUseCar==true) return '';
                                  return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url,
                                  [
                                    'title' => Yii::t('app', 'เพิ่ม'),
                                  ]);
                                },
                                'update' => function($url, $model){
                                  if($model->jUseCar==false) return '';
                                  return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url,
                                  [
                                    'title' => Yii::t('app', 'แก้ไข'),
                                  ]);
                                },
                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                      return Url::to(['view','id'=>$model->id]);
                      #return Url::to(['@web/stimulrep/stimulsoft','stimulsoft_client_key'=>'ViewerFx','stimulsoft_report_key'=>'usecar.mrt','jongid'=>$model->id]);
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

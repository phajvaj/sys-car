<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="map-car-index">
<?= GridView::widget([
        'dataProvider' => $model,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute' => 'carid',
              'value' => function($model){
                return $model->getCarName();
              },
              'format' => 'html',
            ],
            'pscar.psname',
            [
              'attribute' => 'us_car',
              'value' => function($model){
                return $model->getUserName();
              },
              'format' => 'html',
            ],
            // 'fule',
            // 'lubri',
        ],
    ]); ?>
</div>

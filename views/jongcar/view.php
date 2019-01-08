<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\JongCar */

$this->title = $model->station;
$this->params['breadcrumbs'][] = ['label' => 'รายการขอใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jong-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php //Html::a('Print', ['print', 'id' => $model->id], ['class' => 'btn btn-success', 'target' => '_blank']) ?>
        <?= Html::a('พิมพ์เอกสาร',  '@web/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=jong-i.mrt&jongid='.$model->id, ['class' => 'btn btn-success', 'target' => '_blank']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vdate',
            'person',
            'post',
            'station:ntext',
            'cno',
            'thing',
            'size',
            'rab_station',
            'rab_date',
            'song_station',
            'song_date',
            'caruse',
        ],
    ]) ?>

    <div class="row" id="car-view">
      <h2>รายการรถที่จะใช้เดินทาง</h2>
      <?=$car?>
    </div>
</div>
<?php
/*$script = <<< JS
function useTifview(jong){
  $('#car-view').html(' ');
  $.ajax({
     url: 'index.php',
     data: {r: 'mapcar/map-details', expandRowKey: jong,},
     success: function(data) {
         $('#car-view').html(data);
     }
  });
}
JS;
$this->registerJs($script, View::POS_END);

$this->registerJs("useTifview({$model->id})", View::POS_END);
*/
?>

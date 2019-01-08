<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OutCar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'เส้นทางการเดินรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('พิมพ์เอกสาร',  '@web/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=outcar.mrt&jongid='.$model->id, ['class' => 'btn btn-success', 'target' => '_blank']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jongid',
            'path',
            'time_start',
            'time_end',
            'mile',
            'wg',
            'time_kho',
            'time_koy',
            'time_go',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OutCar */

$this->title = 'ปรับปรุงตำบลเดินทาง: ' . $JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'ตำบลเดินทาง', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $JongCar->station, 'url' => ['view', 'id' => $JongCar->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="out-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'MapCar' => $MapCar,
    ]) ?>

</div>

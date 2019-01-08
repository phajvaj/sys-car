<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MapCar */

$this->title = 'แก้ไขการอนุมัติขอใช้รถ ' . $JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'อนุมัติขอใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $JongCar->station, 'url' => ['view', 'id' => $JongCar->id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="map-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'user' => $user,
        'car' => $car
    ]) ?>

</div>

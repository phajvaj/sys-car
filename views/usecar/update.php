<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UseCar */

$this->title = 'แก้ไขการใช้รถ: ' . $JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'การใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $JongCar->station, 'url' => ['view', 'id' => $JongCar->id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="use-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'MapCar' => $MapCar,
        'arUseCar' => $arUseCar,
        'arUpCar' => $arUpCar,
    ]) ?>

</div>

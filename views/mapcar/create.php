<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MapCar */

$this->title = 'บันทึกอนุมัติขอใช้รถ '.$JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'Map Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="map-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'user' => $user,
        'car' => $car
    ]) ?>

</div>

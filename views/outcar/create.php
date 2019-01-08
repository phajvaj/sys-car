<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OutCar */

$this->title = 'บันทึกตำบลเดินทาง: '.$JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'ตำบลเดินทาง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'MapCar' => $MapCar,
    ]) ?>

</div>

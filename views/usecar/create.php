<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UseCar */

$this->title = 'บันทึกการใช้รถ: '.$JongCar->station;
$this->params['breadcrumbs'][] = ['label' => 'การใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="use-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'JongCar' => $JongCar,
        'MapCar' => $MapCar,
        'arUseCar' => $arUseCar,
        'arUpCar' => $arUpCar,
    ]) ?>

</div>

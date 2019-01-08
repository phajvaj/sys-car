<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JongCar */

$this->title = 'ปรับปรุงขอใช้รถ: ' . $model->station;
$this->params['breadcrumbs'][] = ['label' => 'รายการขอใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->station, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="jong-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

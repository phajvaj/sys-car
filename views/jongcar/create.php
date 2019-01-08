<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JongCar */

$this->title = 'บันทึกขอใช้รถ';
$this->params['breadcrumbs'][] = ['label' => 'รายการขอใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jong-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

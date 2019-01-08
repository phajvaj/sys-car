<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PsCar */

$this->title = 'แก้ไขผู้ควบคุมรถ: ' . $model->psname;
$this->params['breadcrumbs'][] = ['label' => 'ผู้ควบคุมรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->psname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ps-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

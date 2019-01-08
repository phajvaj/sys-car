<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PsCar */

$this->title = 'เพิ่มผู้ควบคุมรถ';
$this->params['breadcrumbs'][] = ['label' => 'ผู้ควบคุมรถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ps-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

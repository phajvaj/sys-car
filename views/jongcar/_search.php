<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JongCarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jong-car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vdate') ?>

    <?= $form->field($model, 'person') ?>

    <?= $form->field($model, 'post') ?>

    <?= $form->field($model, 'carid') ?>

    <?php // echo $form->field($model, 'station') ?>

    <?php // echo $form->field($model, 'cno') ?>

    <?php // echo $form->field($model, 'thing') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'ps_car') ?>

    <?php // echo $form->field($model, 'rab_staion') ?>

    <?php // echo $form->field($model, 'rab_date') ?>

    <?php // echo $form->field($model, 'song_station') ?>

    <?php // echo $form->field($model, 'song_date') ?>

    <?php // echo $form->field($model, 'caruse') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

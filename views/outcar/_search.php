<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutCarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jongid') ?>

    <?= $form->field($model, 'path') ?>

    <?= $form->field($model, 'time_start') ?>

    <?= $form->field($model, 'time_end') ?>

    <?php // echo $form->field($model, 'mile') ?>

    <?php // echo $form->field($model, 'wg') ?>

    <?php // echo $form->field($model, 'time_kho') ?>

    <?php // echo $form->field($model, 'time_koy') ?>

    <?php // echo $form->field($model, 'time_go') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

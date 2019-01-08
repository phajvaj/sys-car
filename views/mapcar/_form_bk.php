<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MapCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="map-car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jongid')->textInput() ?>

    <?= $form->field($model, 'carid')->textInput() ?>

    <?= $form->field($model, 'ps_car')->textInput() ?>

    <?= $form->field($model, 'us_car')->textInput() ?>

    <?= $form->field($model, 'fule')->textInput() ?>

    <?= $form->field($model, 'lubri')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

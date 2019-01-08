<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OutCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jongid')->textInput() ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <?= $form->field($model, 'mile')->textInput() ?>

    <?= $form->field($model, 'wg')->textInput() ?>

    <?= $form->field($model, 'time_kho')->textInput() ?>

    <?= $form->field($model, 'time_koy')->textInput() ?>

    <?= $form->field($model, 'time_go')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

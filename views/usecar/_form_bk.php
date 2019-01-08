<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UseCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="use-car-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jongid')->textInput() ?>

    <?= $form->field($model, 'wk1')->dropDownList([ 'N' => 'N', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk2')->dropDownList([ 'N' => 'N', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk3')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'time_start')->textInput() ?>

    <?= $form->field($model, 'mile_start')->textInput() ?>

    <?= $form->field($model, 'time_end')->textInput() ?>

    <?= $form->field($model, 'mile_end')->textInput() ?>

    <?= $form->field($model, 'wk11')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk12')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk13')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk14')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk15')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk16')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk17')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk18')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk19')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk21')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk22')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk23')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk24')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk25')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk26')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk31')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk32')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk33')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk34')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk35')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk36')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk37')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk38')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk39')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'wk310')->dropDownList([ 'W' => 'W', 'X' => 'X', 'Y' => 'Y', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

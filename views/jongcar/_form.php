<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model app\models\JongCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jong-car-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"></i> รายละเอียดการจอง</h4></div>
        <div class="panel-body">
            <div class="row">
    <?= $form->field($model, 'vdate')->textInput(array('value' => date("Y-m-d H:i:s"), 'readOnly' => true)) ?>

    <?= $form->field($model, 'person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'station')->textInput() ?>

    <?= $form->field($model, 'cno')->textInput(array('type'=>'number', 'min'=>1)) ?>

    <?= $form->field($model, 'thing')->textInput(array('type'=>'number', 'min'=>0)) ?>

    <?= $form->field($model, 'size')->textInput(array('type'=>'number', 'min'=>0)) ?>

    <?= $form->field($model, 'rab_station')->textInput() ?>

    <?=$form->field($model, 'rab_date')->widget(DateTimePicker::classname(), [
    	'options' => ['placeholder' => 'ปฏิทิน'],
      'language' => 'th',
    	'pluginOptions' => [
    		'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss'
    	]
    ]) ?>

    <?= $form->field($model, 'song_station')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'song_date')->widget(DateTimePicker::classname(), [
    	'options' => ['placeholder' => 'ปฏิทิน'],
      'language' => 'th',
    	'pluginOptions' => [
    		'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss'
    	]
    ]) ?>

    <?= $form->field($model, 'caruse')->textInput(array('type'=>'number', 'min'=>1)) ?>

    <?php $model->area = $model->isNewRecord ? 'I' : $model->area ?>
    <?= $form->field($model, 'area')->radioList(array('I'=>'ในจังหวัด', 'O'=>'นอกจังหวัด')) ?>

      </div>
    </div>
  </div>

  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>

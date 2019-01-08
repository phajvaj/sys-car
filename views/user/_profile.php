<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'value' => '', 'required' => $model->isNewRecord ? true : false]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>

    <?php #$form->field($model, 'registration_ip')->textInput(['maxlength' => true]) ?>

    <?php #$form->field($model, 'created_at')->textInput() ?>

    <?php #$form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*', 'multiple'=>false],
        'pluginOptions' => [
          'previewFileType' => 'image',
          'initialPreview'=>[
            'user/'.$model->image,
          ],
          'initialPreviewAsData'=>true,
          'showUpload' => false,
          'showRemove' => false,
          'initialCaption' => $model->image,
          'initialPreviewConfig' => [
            ['caption' => 'User.jpg', 'size' => '873727'],
          ],
        ]
    ]);?>

    <input type="hidden" name="imgname" value="<?=$model->image?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

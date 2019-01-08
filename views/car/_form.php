<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;

use app\models\Brand;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Car */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'regis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regispp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caric')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'brandid')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Brand::find()->all(), 'id', 'name'),
    ]);
    ?>

    <?= $form->field($model, 'gener')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'babt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'rangma')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'cc')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'bate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'whebase')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'upbase')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'downbase')->textInput(['maxlength' => true, 'type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'typebase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'oilid')->textInput() ?>

    <?= $form->field($model, 'oilsize')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'width')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'longs')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'hieght')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'bw')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'freight')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'bycar')->textInput(['type'=>'number', 'min'=>0]) ?>

    <?= $form->field($model, 'usecar')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['type'=>'number', 'min'=>0.0]) ?>


<?php
$format = <<< SCRIPT
function getCar(state) {
    if (!state.id) return state.text; // optgroup
    return state.text;
}
SCRIPT;
$escape = new JsExpression("function(m) { return m; }");
$this->registerJs($format, View::POS_HEAD);
?>
    <?= $form->field($model, 'userid')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(User::find()->where(['leveled'=>3])->all(), 'id', function($user){
        return Html::img(Yii::$app->request->baseUrl.'/user/'.$user['image'],['height'=>30, 'class'=>'img-circle']).'<strong>ชื่อ: '.$user['fullname'].' ตำแหน่ง: '.$user['post'].'</strong>';
      }),
      'options' => ['placeholder' => 'เลือกพลขับ...'],
      'pluginOptions' => [
          'templateResult' => new JsExpression('getCar'),
          'templateSelection' => new JsExpression('getCar'),
          'escapeMarkup' => $escape,
          'allowClear' => true
      ],
    ]);
    ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*', 'multiple'=>false],
        'pluginOptions' => [
          'previewFileType' => 'image',
          'initialPreview'=>[
            'car/'.$model->image,
          ],
          'initialPreviewAsData'=>true,
          'showUpload' => false,
          'showRemove' => false,
          'initialCaption' => $model->image,
          'initialPreviewConfig' => [
            ['caption' => 'Car.jpg', 'size' => '873727'],
          ],
        ]
    ]);?>

    <input type="hidden" name="imgname" value="<?=$model->image?>">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
#use kartik\widgets\ActiveForm;
#use kartik\builder\Form;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\TimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\OutCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-car-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"></i> รายละเอียดการจอง</h4></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group field-jongcar-CarName">
                        <label class="control-label" for="jongcar-CarName">รถยนต์</label><br/>
                        <?= $JongCar->jCarName?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group field-jongcar-vdate">
                        <label class="control-label" for="jongcar-vdate">วันที่ขอรถ</label><br/>
                        <?= Yii::$app->formatter->asDateTime($JongCar->vdate, 'medium')?>
                    </div>
                    <div class="form-group field-jongcar-person">
                        <label class="control-label" for="jongcar-person">ผู้ขอ</label><br/>
                        <?= $JongCar->person?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group field-jongcar-post">
                        <label class="control-label" for="jongcar-post">สถานที่ไป</label><br/>
                        <?= $JongCar->station?>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group field-jongcar-rab">
                            <label class="control-label" for="jongcar-rab">รับ</label><br/>
                            <?= Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($JongCar->rab_date))), 'short') .' <br/> '. $JongCar->rab_station?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group field-jongcar-song">
                            <label class="control-label" for="jongcar-song">ส่ง</label><br/>
                            <?= Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($JongCar->song_date))), 'short') .' <br/> '. $JongCar->song_station?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tags"></i> ตำบลเดินทาง</h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-12">
              <?= $form->field($MapCar, 'note')->textInput() ?>
            </div>
          </div>
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $model[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'path',
                    'time_start',
                    'time_end',
                    'mile',
                    'wg',
                    'time_kho',
                    'time_koy',
                    'time_go'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($model as $i => $mdl): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">เส้นทาง</h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                            if (! $mdl->isNewRecord) {
                                echo Html::activeHiddenInput($mdl, "[{$i}]id");
                            }
                            ?>
                            <?= $form->field($mdl, "[{$i}]path")->textInput(['maxlength' => true]) ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]time_start")->widget(TimePicker::classname(), ['pluginOptions'=>['minuteStep' => 10, 'showMeridian' => false]]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]time_end")->widget(TimePicker::classname(), ['pluginOptions'=>['minuteStep' => 10, 'showMeridian' => false]]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]mile")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]wg")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                            </div><!-- .row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($mdl, "[{$i}]time_kho")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($mdl, "[{$i}]time_koy")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                                <!--<div class="col-sm-4"> -->
                                    <?php //$form->field($mdl, "[{$i}]time_go")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                <!--</div>-->
                            </div><!-- .row -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($mdl->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $mdl->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

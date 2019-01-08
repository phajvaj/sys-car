<?php
use app\models\User;

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\TimePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
#use yii\helpers\BaseHtml;

?>

<div class="use-car-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamicformusecar']); ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"></i> รายละเอียดการจอง</h4></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group field-jongcar-CarName">
                        <label class="control-label" for="jongcar-CarName">รถยนต์</label><br/>
                        <?= $JongCar->jCarName?>
                        <?php //$form->field($JongCar, 'id')->textInput(['type' => 'hidden']) ?>
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
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tags"></i> เส้นทางการเดินรถ</h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-3">
              <?= $form->field($MapCar, 'fule')->textInput(['type'=>'number', 'min'=>0.0]) ?>
            </div>
            <div class="col-sm-3">
              <?= $form->field($MapCar, 'lubri')->textInput(['type'=>'number', 'min'=>0.0]) ?>
            </div>
          </div>
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 1, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $model[0],
                'formId' => 'dynamicformusecar',
                'formFields' => [
                    'usid','wk1','wk2','wk3',
                    'time_start','mile_start',
                    'time_end','mile_end',
                    'wk11','wk12','wk13','wk14','wk15','wk16','wk17','wk18','wk19',
                    'wk21','wk22','wk23','wk24','wk25','wk26',
                    'wk31','wk32','wk33','wk34','wk35','wk36','wk37','wk38','wk39','wk310',
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
                            echo $form->field($mdl, "[{$i}]usid")->textInput(['type' => 'hidden', 'value'=>Yii::$app->user->identity->id]);
                            ?>

                            <div class="row">
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]wk1")->widget(Select2::classname(), [
                                      'data' => $arUpCar,
                                      'options' => ['placeholder' => 'เลือก...'],
                                      'pluginOptions' => [
                                          'allowClear' => true
                                      ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                  <?= $form->field($mdl, "[{$i}]wk2")->widget(Select2::classname(), [
                                    'data' => $arUpCar,
                                    'options' => ['placeholder' => 'เลือก...'],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                  ]);
                                  ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php /*$form->field($mdl, "[{$i}]wk3")->widget(SwitchInput::classname(), [
                                      'pluginOptions' => [
                                          'onText' => 'ใช่',
                                          'offText' => 'ไม่',
                                          'onColor' => 'success',
                                          'offColor' => 'danger',
                                      ]
                                    ]) */?>
                                    <?= $form->field($mdl, "[{$i}]wk3")->widget(Select2::classname(), [
                                      'data' => $arUpCar,
                                      'options' => ['placeholder' => 'เลือก...'],
                                      'pluginOptions' => [
                                          'allowClear' => true
                                      ],
                                    ]);
                                    ?>
                                </div>
                            </div><!-- .row -->

                            <div class="row">
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]time_start")->widget(TimePicker::classname(), ['pluginOptions'=>['minuteStep' => 10, 'showMeridian' => false]]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]mile_start")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]time_end")->widget(TimePicker::classname(), ['pluginOptions'=>['minuteStep' => 10, 'showMeridian' => false]]) ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($mdl, "[{$i}]mile_end")->textInput(['type'=>'number', 'min'=>0.0]) ?>
                                </div>
                            </div><!-- .row -->

                            <div class="row">
                                <div class="col-sm-4">
                                  <div class="box box-warning box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">ก่อนใช้งาน</h3>

                                      <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" style="display: block;">
                                      <?= $form->field($mdl, "[{$i}]wk11")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk12")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk13")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk14")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk15")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk16")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk17")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk18")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk19")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="box box-info box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">ขณะใช้งาน</h3>

                                      <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" style="display: block;">
                                      <?php //$form->field($mdl, "[{$i}]wk21")->dropDownList($arUseCar, ['prompt' => '']) ?>
                                      <?= $form->field($mdl, "[{$i}]wk21")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk22")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk23")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk24")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk25")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk26")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="box box-danger box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">หลังใช้งาน</h3>

                                      <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                      </div>
                                      <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" style="display: block;">
                                      <?= $form->field($mdl, "[{$i}]wk31")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk32")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk33")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk34")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk35")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk36")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk37")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk38")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk39")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                      <?= $form->field($mdl, "[{$i}]wk310")->widget(Select2::classname(), [
                                        'data' => $arUseCar,
                                        'options' => ['placeholder' => 'เลือก...'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                      ]);
                                      ?>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($mdl->isNewRecord ? 'บันทึก' : 'แก้ไข', ['class' => $mdl->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

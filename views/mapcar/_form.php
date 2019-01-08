<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\TimePicker;
use kartik\widgets\SwitchInput;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\web\JsExpression;
use yii\web\View;

use app\models\Car;
use app\models\User;
use app\models\PsCar;
/* @var $this yii\web\View */
/* @var $model app\models\MapCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="out-car-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-book"></i> รายละเอียดการจอง</h4></div>
        <div class="panel-body">
            <div class="row">
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
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-tags"></i> รายละเอียดการอนุมัติ</h4></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-3">
              <?php
              echo $form->field($JongCar, 'status')->widget(SwitchInput::classname(), [
                'pluginOptions' => [
                  'size' => 'large',
                  'onColor' => 'success',
                  'offColor' => 'danger',
                  'onText' => 'อนุมัติ',
                  'offText' => 'ไม่อนุมัติ',
                  'handleWidth' => 80,
                ]
              ]);
              ?>
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
                    'carid',
                    'ps_car',
                    'us_car',
                ],
            ]); ?>
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
            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($model as $i => $mdl): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">ภาระกิจ</h3>
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
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php
                                    echo $form->field($mdl, "[{$i}]carid")->widget(Select2::classname(), [
                                      'data' => ArrayHelper::map(Car::find()->where(['not in','id',empty($car)?array():$car])->all(), 'id', function($car){
                                        return Html::img(Yii::$app->request->baseUrl.'/car/'.$car['image'],['height'=>30, 'class'=>'img-circle']).' <strong>ทะเบียน: '.$car['regis'].' รุ่น '.$car['gener'].'</strong>';
                                      }),
                                      'options' => ['placeholder' => 'เลือกรถ...'],
                                      'pluginOptions' => [
                                          'templateResult' => new JsExpression('getCar'),
                                          'templateSelection' => new JsExpression('getCar'),
                                          'escapeMarkup' => $escape,
                                          'allowClear' => true
                                      ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php
                                    echo $form->field($mdl, "[{$i}]ps_car")->widget(Select2::classname(), [
                                      'data' => ArrayHelper::map(PsCar::find()->all(), 'id', 'psname'),
                                      'options' => ['placeholder' => 'เลือกผู้คุมรถ...'],
                                      'pluginOptions' => [
                                          'allowClear' => true
                                      ],
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php
                                    echo $form->field($mdl, "[{$i}]us_car")->widget(Select2::classname(), [
                                      'data' => ArrayHelper::map(User::find()->where(['leveled'=>3])->andwhere(['not in','id',empty($user)?array():$user])->all(), 'id', function($user){
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
                                    /*
                                    echo $form->field($mdl, "[{$i}]us_car")->widget(Select2::classname(), [
                                      'data' => ArrayHelper::map(User::find()->joinwith(['mapcar', 'mapcar.jong'])
                                      ->where(['user.leveled'=>3, 'jong_acr.status'=>'1'])
                                      ->andwhere()
                                      ->all(), 'id', function($user){
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
                                    */
                                    ?>
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
        <?= Html::submitButton($mdl->isNewRecord ? 'บันทึก' : 'ปรับปรุง', ['class' => $mdl->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

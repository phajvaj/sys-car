<?
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use kartik\widgets\SwitchInput;
use kartik\checkbox\CheckboxX;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\web\JsExpression;
use yii\web\View;

use app\models\User;
?>
<?= $form->field($mdl, "[{$i}]usid")->widget(Select2::classname(), [
  'data' => ArrayHelper::map(User::find()->where(['leveled'=>3])->all(), 'id', 'fullname'),
  'options' => ['placeholder' => 'เลือกพลขับ...'],
  'pluginOptions' => [
      'allowClear' => true
  ],
]);
?>
<div class="row">
    <div class="col-sm-3">
        <?= $form->field($mdl, "[{$i}]wk1")->widget(CheckboxX::classname(), [
          'pluginOptions' => [
              ['threeState'=>false]
          ]
        ]) ?>
    </div>
    <div class="col-sm-3">
        <?= $form->field($mdl, "[{$i}]wk2")->widget(SwitchInput::classname(), [
          'pluginOptions' => [
              'onText' => 'ใช่',
              'offText' => 'ไม่',
              'onColor' => 'success',
              'offColor' => 'danger',
          ]
        ]) ?>
    </div>
    <div class="col-sm-3">
        <?= $form->field($mdl, "[{$i}]wk3")->widget(SwitchInput::classname(), [
          'pluginOptions' => [
              'onText' => 'ใช่',
              'offText' => 'ไม่',
              'onColor' => 'success',
              'offColor' => 'danger',
          ]
        ]) ?>
    </div>
</div><!-- .row -->

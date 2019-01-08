<?php
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use dosamigos\datepicker\DateRangePicker;

$this->title = 'รายงานการจ่ายรถประจำวัน';

$gridColumns = [
  ['class' => 'kartik\grid\SerialColumn'],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      //'options' => ['style' => 'width:90px;'],
      'attribute' => 'regis',
      'header' => 'หมายเลข<br/>ทะเบียน',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      //'options' => ['style' => 'width:90px;'],
      'attribute' => 'fullname',
      'header' => 'ยศ นาม(พลขับ)',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'attribute' => 'type',
      'header' => 'ชนิดรถ',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'attribute' => 'person',
      'header' => 'ผู้ขอ',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'header' => 'ผู้จ่าย',
      'value' => function(){return 'ผอ.ฯ';}
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'header' => 'ผู้จ่าย',
      'value' => function(){return 'ผู้อนุมัติในระบบ';}
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'header' => 'หน่วย',
      'value' => function(){return 'รพ.ค่ายสุริยพงษ์';}
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'attribute' => 'rab_station',
      'header' => 'ตำบลรายงาน',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      //'attribute' => 'cno',
      'header' => 'การ<br/>บรรทุก',
      'value' => function($data){
        return $data['cno'].' คน';
      }
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'attribute' => 'song_station',
      'header' => 'ตำบลเดินทาง',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-center'],
      'attribute' => 'timeend',
      'header' => 'เวลา<br/>รายงาน',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-center'],
      'attribute' => 'timestart',
      'header' => 'เวลาออก',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-center'],
      'attribute' => 'timeend',
      'header' => 'เวลากลับ',
  ],
  [
      'headerOptions' => ['class' => 'text-center'],
      'contentOptions' => ['class' => 'text-left'],
      'attribute' => 'mile',
      'header' => 'ไมล์/กม.',
  ],
];
?>
<div class="rport-index">
    <div class="body-content">
        <div class='well'>
            <div class="row">
                <?php $form = ActiveForm::begin(['id' => 'rpt-form', 'enableClientValidation' => false]); ?>
                <div class="col-lg-2">
                    <strong>วันที่จ่ายรถ</strong>
                </div>
                <div class="col-lg-8">
                  <?= DateRangePicker::widget([
                      'language' => 'th',
                      'name' => 'dt1',
                      'value' => date('d-m-Y', strtotime($dt1)),
                      'nameTo' => 'dt2',
                      'valueTo' => date('d-m-Y', strtotime($dt2)),
                      'clientOptions' => [
                          'autoclose' => true,
                          'format' => 'dd-mm-yyyy'
                      ],
                      'size' => 'lg',
                  ]);?>
                </div>
                <div class="col-lg-2">
                    <button class='btn btn-info'>ค้นหา</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php yii\widgets\Pjax::begin(); ?>
        <?php
        echo GridView::widget([
            'dataProvider' => $data,
            'responsive' => true,
            'hover' => true,
            'floatHeader' => true,
            'toolbar'=> [
                ['content'=>
                    ExportMenu::widget([
                        'dataProvider' => $data,
                        'fontAwesome' => true,
                        'showConfirmAlert' => false,
                        'dropdownOptions' => [
                            'class' => 'btn btn-default'
                        ]
                    ])
                ],
                '{toggleData}',
            ],
            'panel' => [
                'before' => 'ประมวลผลล่าสุด '.date('d/m/').(date('Y')+543),
                'type' => 'primary', 'heading' => $this->title
            ],
            'columns' => $gridColumns,
        ]);
        ?>
        <?php yii\widgets\Pjax::end(); ?>
    </div>
</div>
<?php
$script = <<< JS
$(function(){
    $('.kv-export-full-form').append('<input type="hidden" name="dt1" value="{$dt1}" />');
    $('.kv-export-full-form').append('<input type="hidden" name="dt2" value="{$dt2}" />');
});
JS;
$this->registerJs($script);
?>

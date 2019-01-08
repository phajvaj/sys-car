<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\UseCar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'การใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="use-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('พิมพ์เอกสาร',  '@web/stimulrep/stimulsoft/index.php?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=usecar.mrt&jongid='.$model->id, ['class' => 'btn btn-success', 'target' => '_blank']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jongid',
            'wk1',
            'wk2',
            'wk3',
            'time_start',
            'mile_start',
            'time_end',
            'mile_end',
            'wk11',
            'wk12',
            'wk13',
            'wk14',
            'wk15',
            'wk16',
            'wk17',
            'wk18',
            'wk19',
            'wk21',
            'wk22',
            'wk23',
            'wk24',
            'wk25',
            'wk26',
            'wk31',
            'wk32',
            'wk33',
            'wk34',
            'wk35',
            'wk36',
            'wk37',
            'wk38',
            'wk39',
            'wk310',
        ],
    ]) ?>

</div>
<iframe src="<?=Url::to('@web/stimulrep/stimulsoft/?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=usecar.mrt&jongid='.$model->id)?>" style="height:800px;width:100%"></iframe>

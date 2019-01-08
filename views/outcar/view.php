<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\OutCar */

$this->title = $model->station;
$this->params['breadcrumbs'][] = ['label' => 'ตำบลเดินทาง', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="out-car-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<iframe src="<?=Url::to('@web/stimulrep/stimulsoft/?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=outcar.mrt&jongid='.$model->id.'&userid='.Yii::$app->user->identity->id)?>" style="height:800px;width:100%;border:none;"></iframe>
</div>

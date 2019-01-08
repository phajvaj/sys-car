<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\UseCar */

$this->title = $model->station;
$this->params['breadcrumbs'][] = ['label' => 'การใช้รถ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="use-car-view">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <iframe src="<?=Url::to('@web/stimulrep/stimulsoft/?stimulsoft_client_key=ViewerFx&stimulsoft_report_key=usecar.mrt&jongid='.$model->id.'&userid='.Yii::$app->user->identity->id)?>" style="height:800px;width:100%;border:none;"></iframe>
</div>

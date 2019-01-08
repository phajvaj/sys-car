<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

use app\models\Level;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php //$this->render('_search', ['model' => $searchModel]) ?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            array(
              'attribute'=>'image',
              'format'=>'html',
              'value'=>function($model){
                return empty($model->image)? '' : '<img src="'.Yii::$app->request->baseUrl.'/user/'.$model->image.'" height="100">';
                }
            ),
            'username',
            //'password',
            'fullname',
            'post',
            // 'confirmed_at',
            // 'blocked_at',
            // 'registration_ip',
             'created_at:datetime',
             /*[
                'attribute' => 'created_at',
                'value' => function($model){
                  return Yii::$app->thaiFormatter->asDateTime($model->created_at, 'medium');
                },
                'format' => 'html',
              ],*/
             'updated_at:datetime',
             //'leveled',
             [
                'attribute' => 'leveled',
                'value' => 'level.level_name',
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'leveled',
                    //'name' => 'leveled',
                    'data' => ArrayHelper::map(Level::find()->all(), 'level_id', 'level_name'),
                    'options' => ['placeholder' => 'เลือกสิทธิ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]),
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

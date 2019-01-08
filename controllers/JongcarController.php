<?php

namespace app\controllers;

use Yii;
use app\models\JongCar;
use app\models\MapCar;
use app\models\JongCarSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
/**
 * JongcarController implements the CRUD actions for JongCar model.
 */
class JongcarController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class'  => AccessControl::className(),
                'rules' =>  [
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                      'actions' => ['index', 'create', 'update', 'view', 'print', 'lists'],
                      'allow' => true,
                      'roles' => ['?','@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JongCar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JongCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLists()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => JongCar::find()->orderBy(['id'=>SORT_DESC]),
        ]);

        return $this->render('lists', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JongCar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = new ActiveDataProvider([
            'query' => MapCar::find()->where(['jongid' => $id]),
        ]);
        $car = $this->renderPartial('//mapcar/_map-details', ['model'=>$model]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'car' => $car,
        ]);
    }

    /**
     * Creates a new JongCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JongCar();

        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='2'):
          $model->boss = Yii::$app->user->identity->id;
        endif;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = "ขอใช้รถโดย: {$model->person} ตำแหน่ง: {$model->post}\n
            สถานที่ไป: {$model->station}\n
            รับที่: {$model->rab_station} เวลา: ".Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->rab_date))), 'medium')."\n
            ส่งที่: {$model->song_station} เวลา: ".Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($model->song_date))), 'medium')."\n
            ผู้โดยสาร: {$model->cno} คน";
            $this->lineNotify($msg);//line notify
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JongCar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='2'):
          $model->boss = Yii::$app->user->identity->id;
        endif;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'แก้ไขข้อมูลเรียบร้อย!');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JongCar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JongCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JongCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JongCar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPrint($id=null)
    {

        $ucar = JongCar::findOne($id);

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('print', [
            'cared' => $ucar,
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => [210, 170],//Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@app/web/css/kv-mpdf-bootstrap-saciw.css',
            #'cssFile' => ['@app/web/css/pdf.css','@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css'],
            #'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            // set mPDF properties on the fly
            'options' => ['title' => $ucar->station],
            'marginLeft' => 25,
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
}

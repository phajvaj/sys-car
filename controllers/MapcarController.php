<?php

namespace app\controllers;

use Yii;
use app\models\MapCar;
use app\models\JongCar;
use app\models\Model;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
/**
 * MapcarController implements the CRUD actions for MapCar model.
 */
class MapcarController extends MainController
{
    protected $user = null;
    protected $car = null;
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
                         'actions' => ['index', 'create', 'update', 'view', 'delete'],
                         'allow' => true,
                         'roles' => ['@']
                     ],
                     [
                       'actions' => ['map-details'],
                       'allow' => true,
                       'roles' => ['@','?']
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
     * Lists all MapCar models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$dataProvider = new ActiveDataProvider([
            'query' => MapCar::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);*/
        $dataProvider = new ActiveDataProvider([
            'query' => JongCar::find()->orderBy(['id'=>SORT_DESC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MapCar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MapCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate($id)
     {
         $modelMapCar = [new MapCar()];
         $modelJongCar = JongCar::findOne($id);

         if (!$modelJongCar->load(Yii::$app->request->post())){
            $this->getDatause($modelJongCar);
         }

         $carid = [];$userid = []; $userd = 'พลขับ: ';

         if ($modelJongCar->load(Yii::$app->request->post())) {

             $modelMapCar = Model::createMultiple(MapCar::classname());
             Model::loadMultiple($modelMapCar, Yii::$app->request->post());

             // ajax validation
             if (Yii::$app->request->isAjax) {
                 Yii::$app->response->format = Response::FORMAT_JSON;
                 return ArrayHelper::merge(
                     ActiveForm::validateMultiple($modelMapCar),
                     ActiveForm::validate($modelJongCar)
                 );
             }

             // validate all models
             $valid = $modelJongCar->validate();
             $valid = Model::validateMultiple($modelMapCar) && $valid;

             if ($valid) {
                 $transaction = \Yii::$app->db->beginTransaction();
                 try {
                     if ($flag = $modelJongCar->save(false)) {
                         foreach ($modelMapCar as $mdl) {
                           if(in_array($mdl->carid, $carid) or in_array($mdl->us_car, $userid)){
                             Yii::$app->session->setFlash('error', 'พบข้อผิดพลาด มีรายการที่ซ้ำซ้อนกัน!');
                             $transaction->rollBack();
                             return $this->redirect(Yii::$app->request->referrer);
                           }
                           $carid[] = $mdl->carid;//ไว้ตรวจซ้ำ
                           $userid[] = $mdl->us_car;//ไว้ตรวจซ้ำ

                           $mdl->jongid = $modelJongCar->id;

                           $userd .= @$mdl->usered->fullname.', ';

                           if (!($flag = @$mdl->save(false))) {//$mdl->validate() &&
                             $transaction->rollBack();
                             break;
                           }
                       }
                     }
                     if ($flag) {
                         $transaction->commit();

                         //$msg = "รายการขอใช้รถไป: {$modelJongCar->station} \n วันที่ {$modelJongCar->rab_date}\n".
                         $msg = "รายการขอใช้รถไป: {$modelJongCar->station} วันที่ ".Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($modelJongCar->rab_date))), 'medium')."\n".
                         "ผู้ขอใช้รถ: {$modelJongCar->person}\n".
                         "สถานะ: ".(($modelJongCar->status==1)?'อนุมัติ':'ไม่อนุมัติ')."\n".
                         "{$userd}\n".
                         "ผู้เสนอขออนุมัติ: ".Yii::$app->user->identity->fullname."\n";
                         "ผู้อนุมัติ: ผอ.รพ.ค่ายสุริยพงษ์";
                         $this->lineNotify($msg);//line notify

                         Yii::$app->session->setFlash('success', 'บันทึกข้อมูลสำเร็จ!');
                         return $this->redirect(['index']);
                     }
                 } catch (Exception $e) {
                     $transaction->rollBack();
                 }
             }
         } else {
             return $this->render('create', [
                 'model' => (empty($modelMapCar)) ? [new MapCar] : $modelMapCar,
                 'JongCar' => $modelJongCar,
                 'user' => $this->user,
                 'car' => $this->car
             ]);
         }
     }

    /**
     * Updates an existing MapCar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id)
     {
         $modelJongCar = JongCar::findOne($id);
         $modelMapCar = $modelJongCar->mapcar;//$this->find(['jongid'=>$modelJongCar->id]);

         if (!$modelJongCar->load(Yii::$app->request->post())){
            $this->getDatause($modelJongCar);
         }

         $carid = [];$userid = []; $userd = 'พลขับ: ';

         if ($modelJongCar->load(Yii::$app->request->post())) { // && $modelJongCar->save()

             $oldIDs = ArrayHelper::map($modelMapCar, 'id', 'id');
             $modelMapCar = Model::createMultiple(MapCar::classname(), $modelMapCar);
             Model::loadMultiple($modelMapCar, Yii::$app->request->post());
             $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelMapCar, 'id', 'id')));

             // ajax validation
             if (Yii::$app->request->isAjax) {
                 Yii::$app->response->format = Response::FORMAT_JSON;
                 return ArrayHelper::merge(
                     ActiveForm::validateMultiple($modelMapCar),
                     ActiveForm::validate($modelJongCar)
                 );
             }

             // validate all models
             $valid = $modelJongCar->validate();
             $valid = Model::validateMultiple($modelMapCar) && $valid;

             if ($valid) {
                 $transaction = \Yii::$app->db->beginTransaction();
                 try {
                     if ($flag = $modelJongCar->save(false)) {
                         if (!empty($deletedIDs)) {
                             MapCar::deleteAll(['id' => $deletedIDs]);
                         }

                         foreach ($modelMapCar as $mdl) {

                           if(in_array($mdl->carid, $carid) or in_array($mdl->us_car, $userid)){
                             Yii::$app->session->setFlash('error', 'พบข้อผิดพลาด มีรายการที่ซ้ำซ้อนกัน!');
                             $transaction->rollBack();
                             return $this->redirect(Yii::$app->request->referrer);
                           }
                           $carid[] = $mdl->carid;//ไว้ตรวจซ้ำ
                           $userid[] = $mdl->us_car;//ไว้ตรวจซ้ำ

                           $mdl->jongid = $modelJongCar->id;

                           $userd .= @$mdl->usered->fullname.', ';

                           if (!($flag = @$mdl->save(false))) {//$mdl->validate() &&
                             $transaction->rollBack();
                             break;
                           }
                         }
                     }
                     if ($flag) {
                         $transaction->commit();

                         //$msg = "รายการขอใช้รถไป: {$modelJongCar->station} \n วันที่ {$modelJongCar->rab_date}\n".
                         $msg = "รายการขอใช้รถไป: {$modelJongCar->station} วันที่ ".Yii::$app->thaiFormatter->asDateTime(date('Y-m-d H:i',strtotime('-7 hour',strtotime($modelJongCar->rab_date))), 'medium')."\n".
                         "ผู้ขอใช้รถ: {$modelJongCar->person}\n".
                         "สถานะ: ".(($modelJongCar->status==1)?'อนุมัติ':'ไม่อนุมัติ')."\n".
                         "{$userd}\n".
                         "ผู้เสนอขออนุมัติ: ".Yii::$app->user->identity->fullname."\n";
                         "ผู้อนุมัติ: ผอ.รพ.ค่ายสุริยพงษ์";
                         $this->lineNotify($msg);//line notify

                         Yii::$app->session->setFlash('success', 'แก้ไขข้อมูลเรียบร้อย!');
                         //return $this->redirect(['view', 'id' => $modelJongCar->id]);
                         return $this->redirect(['index']);
                     }
                 } catch (Exception $e) {
                     $transaction->rollBack();
                 }
             }

         } else {
             return $this->render('update', [
                 'model' => (empty($modelMapCar)) ? [new MapCar] : $modelMapCar,
                 'JongCar' => $modelJongCar,
             ]);
         }
     }

    /**
     * Deletes an existing MapCar model.
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
     * Finds the MapCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MapCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MapCar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionMapDetails() {
        if (isset($_REQUEST['expandRowKey'])) {
            $model = new ActiveDataProvider([
                'query' => MapCar::find()->where(['jongid' => $_REQUEST['expandRowKey']]),
            ]);
            return $this->renderPartial('_map-details', ['model'=>$model]);
        } else {
          return '<div class="alert alert-danger">ไม่มีข้อมูล</div>';
        }
    }

    private function getDatause($model){
      $sql = "SELECT GROUP_CONCAT(m.carid) as car,GROUP_CONCAT(m.us_car) as `user` FROM
       jong_car as j
       INNER JOIN map_car as m ON(j.id=m.jongid)
       WHERE (
       (j.rab_date BETWEEN '{$model->rab_date}' AND '{$model->song_date}')
       OR
       (j.song_date BETWEEN '{$model->rab_date}' AND '{$model->song_date}')
       )
       AND j.`status` = '1' AND j.id<>'{$model->id}'";

       $sql = $this->getSqldata($sql);

       $this->user = $sql[0]['user'];
       $this->car = $sql[0]['car'];
    }
}

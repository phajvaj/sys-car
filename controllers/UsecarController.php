<?php

namespace app\controllers;

use Yii;
use app\models\UseCar;
use app\models\Model;
use app\models\JongCar;
use app\models\MapCar;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
/**
 * UsecarController implements the CRUD actions for UseCar model.
 */
class UsecarController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'view'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all UseCar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => JongCar::find()->joinwith('mapcar')->where(['map_car.us_car'=>Yii::$app->user->identity->id,'jong_car.status'=>'1'])->orderBy(['jong_car.id'=>SORT_DESC]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UseCar model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            //'model' => $this->findModel($id),
            'model' => JongCar::findOne($id),
        ]);
    }

    /**
     * Creates a new UseCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
      $modelUsecar = [new UseCar()];
      $modelJongCar = JongCar::findOne($id);
      $modelMapCar = MapCar::find()->where(['jongid'=>$id, 'us_car'=>Yii::$app->user->identity->id])->one();
      if ($modelMapCar->load(Yii::$app->request->post())) {// && $modelJongCar->save()

          $modelUsecar = Model::createMultiple(UseCar::classname());
          Model::loadMultiple($modelUsecar, Yii::$app->request->post());

          // ajax validation
          if (Yii::$app->request->isAjax) {
              Yii::$app->response->format = Response::FORMAT_JSON;
              return ArrayHelper::merge(
                  ActiveForm::validateMultiple($modelUsecar),
                  ActiveForm::validate($modelMapCar)
              );
          }

          // validate all models
          $valid = $modelMapCar->validate();
          $valid = Model::validateMultiple($modelUsecar) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {
                  if ($flag = $modelMapCar->save(false)) {
                      foreach ($modelUsecar as $mdl) {
                          $mdl->mapid = $modelMapCar->id;
                          if (! ($flag = $mdl->save(false))) {
                              $transaction->rollBack();
                              break;
                          }
                      }
                  }
                  if ($flag) {
                      $transaction->commit();
                      Yii::$app->session->setFlash('success', 'บันทึกข้อมูลสำเร็จ!');
                      //return $this->redirect(['view', 'id' => $modelJongCar->id]);
                      return $this->redirect(['index']);
                  }
              } catch (Exception $e) {
                  $transaction->rollBack();
              }
          }
      } else {
          return $this->render('create', [
              'model' => (empty($modelUsecar)) ? [new UseCar] : $modelUsecar,
              'JongCar' => $modelJongCar,
              'MapCar' => $modelMapCar,
              'arUseCar' => $this->arUseCar,
              'arUpCar' => $this->arUpCar
          ]);
      }
    }

    /**
     * Updates an existing UseCar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $modelJongCar = JongCar::findOne($id);
      $modelMapCar = MapCar::find()->where(['jongid'=>$id, 'us_car'=>Yii::$app->user->identity->id])->one();
      $modelUsecar = $modelMapCar->useCars;//$this->find(['jongid'=>$modelMapCar->id]);

      if ($modelMapCar->load(Yii::$app->request->post())) { // && $modelMapCar->save()

          $oldIDs = ArrayHelper::map($modelUsecar, 'id', 'id');
          $modelUsecar = Model::createMultiple(UseCar::classname(), $modelUsecar);
          Model::loadMultiple($modelUsecar, Yii::$app->request->post());
          $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelUsecar, 'id', 'id')));

          // ajax validation
          if (Yii::$app->request->isAjax) {
              Yii::$app->response->format = Response::FORMAT_JSON;
              return ArrayHelper::merge(
                  ActiveForm::validateMultiple($modelUsecar),
                  ActiveForm::validate($modelMapCar)
              );
          }

          // validate all models
          $valid = $modelMapCar->validate();
          $valid = Model::validateMultiple($modelUsecar) && $valid;

          if ($valid) {
              $transaction = \Yii::$app->db->beginTransaction();
              try {
                  if ($flag = $modelMapCar->save(false)) {
                      if (!empty($deletedIDs)) {
                          UseCar::deleteAll(['id' => $deletedIDs]);
                      }
                      foreach ($modelUsecar as $mdl) {
                          $mdl->mapid = $modelMapCar->id;
                          if (!($flag = $mdl->save(false))) {
                              $transaction->rollBack();
                              break;
                          }
                      }
                  }
                  if ($flag) {
                      $transaction->commit();
                      Yii::$app->session->setFlash('success', 'แก้ไขข้อมูลเรียบร้อย!');
                      //return $this->redirect(['view', 'id' => $modelMapCar->id]);
                      return $this->redirect(['index']);
                  }
              } catch (Exception $e) {
                  $transaction->rollBack();
              }
          }

      } else {
          return $this->render('update', [
              'model' => (empty($modelUsecar)) ? [new UseCar] : $modelUsecar,
              'JongCar' => $modelJongCar,
              'MapCar' => $modelMapCar,
              'arUseCar' => $this->arUseCar,
              'arUpCar' => $this->arUpCar
          ]);
      }
    }

    /**
     * Deletes an existing UseCar model.
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
     * Finds the UseCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UseCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UseCar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

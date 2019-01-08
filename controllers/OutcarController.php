<?php

namespace app\controllers;

use Yii;
use app\models\OutCar;
use app\models\OutCarSearch;
use app\models\JongCar;
use app\models\JongCarSearch;
use app\models\MapCar;
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
 * OutcarController implements the CRUD actions for OutCar model.
 */
class OutcarController extends MainController
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
     * Lists all OutCar models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new OutCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        /*
        $searchModel = new JongCarSearch();
        $searchModel->find()->where(['us_car'=>Yii::$app->user->identity->id,'status'=>'1']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        */
        $dataProvider = new ActiveDataProvider([
            'query' => JongCar::find()->joinwith('mapcar')->where(['map_car.us_car'=>Yii::$app->user->identity->id,'jong_car.status'=>'1'])->orderBy(['jong_car.id'=>SORT_DESC]),
        ]);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OutCar model.
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
     * Creates a new OutCar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $modelOutcar = [new OutCar()];
        $modelJongCar = JongCar::findOne($id);
        $modelMapCar = MapCar::find()->where(['jongid'=>$id, 'us_car'=>Yii::$app->user->identity->id])->one();
        //$modelOutcar = OutCar::findAll(['jongid'=>$id]);
        //print_r($modelJongCar->id);
        //exit($modelJongCar->vdate);
        if ($modelMapCar->load(Yii::$app->request->post())) {// && $modelMapCar->save()

            $modelOutcar = Model::createMultiple(OutCar::classname());
            Model::loadMultiple($modelOutcar, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelOutcar),
                    ActiveForm::validate($modelMapCar)
                );
            }

            // validate all models
            $valid = $modelMapCar->validate();
            $valid = Model::validateMultiple($modelOutcar) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelMapCar->save(false)) {
                        foreach ($modelOutcar as $mdl) {
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
                        //return $this->redirect(['view', 'id' => $modelMapCar->id]);
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('create', [
                'model' => (empty($modelOutcar)) ? [new OutCar] : $modelOutcar,
                'JongCar' => $modelJongCar,
                'MapCar' => $modelMapCar,
            ]);
        }
    }

    /**
     * Updates an existing OutCar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelJongCar = JongCar::findOne($id);
        $modelMapCar = MapCar::find()->where(['jongid'=>$id, 'us_car'=>Yii::$app->user->identity->id])->one();
        $modelOutcar = $modelMapCar->outCars;//$this->find(['jongid'=>$modelMapCar->id]);

        if ($modelMapCar->load(Yii::$app->request->post())) { // && $modelMapCar->save()

            $oldIDs = ArrayHelper::map($modelOutcar, 'id', 'id');
            $modelOutcar = Model::createMultiple(OutCar::classname(), $modelOutcar);
            Model::loadMultiple($modelOutcar, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelOutcar, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelOutcar),
                    ActiveForm::validate($modelMapCar)
                );
            }

            // validate all models
            $valid = $modelMapCar->validate();
            $valid = Model::validateMultiple($modelOutcar) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelMapCar->save(false)) {
                        if (!empty($deletedIDs)) {
                            OutCar::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelOutcar as $mdl) {
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
                'model' => (empty($modelOutcar)) ? [new OutCar] : $modelOutcar,
                'JongCar' => $modelJongCar,
                'MapCar' => $modelMapCar,
            ]);
        }
    }

    /**
     * Deletes an existing OutCar model.
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
     * Finds the OutCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OutCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OutCar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;
use yii2fullcalendar\yii2fullcalendar;

class SiteController extends MainController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'access' => [
                'class' => AccessControl::ClassName(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                  [
                      'actions' => ['signup', 'index'],
                      'allow' => true,
                      'roles' => ['?'],
                  ],
                  [
                      'actions' => ['logout'],
                      'allow' => true,
                      'roles' => ['@'],
                  ],
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //echo Yii::getAlias('@webroot');
        $sql = null;
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='3'){
          $sql = " AND m.us_car='".Yii::$app->user->identity->id."'";
        }
        $sql = Yii::$app->db->createCommand("SELECT j.id,j.station,j.cno,j.rab_date FROM jong_car as j INNER JOIN map_car as m ON(j.id=m.jongid) WHERE j.rab_date LIKE'".date('Y-m-d')."%' ".$sql." AND j.status='1'");
        $Eday = $sql->queryAll();
        #return $this->render('index', ['events'=>$task, 'Eday'=>$Eday]);
        return $this->render('index', ['Eday'=>$Eday]);
    }

    public function actionJsoncalendar($start=NULL,$end=NULL,$_=NULL){

      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $c = null;

      if(!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='3'){
        $c = " AND us_car='".Yii::$app->user->identity->id."' ";
      }
      $c = Yii::$app->db->createCommand("SELECT * FROM vjongall WHERE DATE_FORMAT(rab_date,'%Y-%m-%d') BETWEEN '{$start}' AND '{$end}' AND status='1' {$c}");
      $events = $c->queryAll();
      $task=[];
      foreach ($events as $eve) {
          $event = new \yii2fullcalendar\models\Event();
          $event->id = $eve['id'];
          $event->title = $eve['type'].'('.$eve['regis'].'): '.$eve['station'];
          $event->start = date('Y-m-d\TH:i:s\Z',strtotime($eve['rab_date']));
          $event->end = date('Y-m-d\TH:i:s\Z',strtotime($eve['song_date']));
          #$event->end = date('Y-m-d\TH:i:s\Z',strtotime($eve['song_date'] . "+1 days"));
          $event->allDay = true;
          $event->url = Url::to(['/jongcar/view', 'id'=>$eve['id']]);
          if($eve['area']=='I') $event->color = '#378006';
          $task[] = $event;

      }

      return $task;
  }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

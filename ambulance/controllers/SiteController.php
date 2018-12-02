<?php

namespace app\controllers;

use abhimanyu\sms\components\Sms;
use SoapClient;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
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
//        $role = Yii::$app->authManager->createRole('dispatcher');
//        $role->description = 'Головний диспетчер';
//        Yii::$app->authManager->add($role);
//
//        $role = Yii::$app->authManager->createRole('subdispatcher');
//        $role->description = 'Диспетчер підстанції';
//        Yii::$app->authManager->add($role);
//
//        $role = Yii::$app->authManager->createRole('brigade');
//        $role->description = 'Бригада';
//        Yii::$app->authManager->add($role);
//
//        $role = Yii::$app->authManager->createRole('patient');
//        $role->description = 'Пацієнт';
//        Yii::$app->authManager->add($role);
//        $to_number = array('+380951528130');
//
//        $message = array('HELLO');
//
//
//        $client = new SoapClient("parsasms.com/webservice/v2.asmx?WSDL");
//
//        $params = array(
//
//            'username' => 'demo',
//
//            'password' => 'demo',
//
//            'senderNumbers' => array("30005006002651"),
//
//            'recipientNumbers'=> $to_number,
//
//            'messageBodies' => $message
//
//        );
//
//        $results = $client->SendSMS($params);
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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

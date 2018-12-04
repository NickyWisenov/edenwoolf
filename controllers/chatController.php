<?php

namespace app\controllers;

use app\modules\admin\modules\settings\models\Settings;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use app\models\LoginForm;
use app\models\UserMaster;
use app\models\CarerDetails;
use app\models\FamilyDetails;
use app\models\Cms;
use app\models\Faq;
use app\models\FavouriteMaster;

class ChatController extends FrontController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['error', 'generatelogajoblink', 'index', 'checkname', 'regcarer', 'regfamily', 'activeaccount', 'login', 'forgotpassword', 'showresetmodal', 'resetpassword', 'aboutus', 'join', 'addfav', 'removefav','autosuggestion','autosuggestionbysuburborpostcode','testmail'],
//                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    public function actions() {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex() {
        return $this->render('index');
    }
     public function actionChat() {
        return $this->render('chat');
    }

}

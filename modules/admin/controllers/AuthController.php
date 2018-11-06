<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Session;
use yii\web\Cookie;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\admin\models\LoginForm;
use app\models\UserMaster;

class AuthController extends AdminController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'forgotpassword', 'lockscreen'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->response->redirect(['admin/dashboard/index']);
        }

        $this->layout = 'login';
        $model = new LoginForm();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            $cookies = Yii::$app->response->cookies;
            if (isset($_POST['LoginForm']['rememberMe']) && $_POST['LoginForm']['rememberMe'] != '') {
                $expire = time() + 3600;
                $cookies->add(new Cookie(['name' => 'admin_email', 'value' => $_POST['LoginForm']['email'], 'expire' => $expire]));
                $cookies->add(new Cookie(['name' => 'admin_password', 'value' => $_POST['LoginForm']['password'], 'expire' => $expire]));
            } else {
                $cookies->remove('admin_email');
                $cookies->remove('admin_password');
            }
            $user = UserMaster::findOne(Yii::$app->user->id);
            $user->last_login = date('Y-m-d H:i:s');
            $user->login_count = $user->login_count + 1;
            $user->save(false);
            Yii::$app->session->setFlash('success', 'You are successfully logged in.');
            Yii::$app->response->redirect(['admin/dashboard/']);
        } else {
            return $this->render('login', ['model' => $model]);
        }
    }

    public function actionLogout($status = "") {
        $cookies = Yii::$app->response->cookies;
        if ($status != "") {
            $user_id = Yii::$app->user->id;
            $user = UserMaster::findOne($user_id);
            $expire = time() + 3600;
            $cookies->add(new Cookie(['name' => 'admin_email_lock', 'value' => $user->email, 'expire' => $expire]));
            $cookies->remove('_edenwoolfbackendSession');
            Yii::$app->user->logout();
            Yii::$app->response->redirect(['admin/auth/lockscreen']);
        } else {
            $cookies->remove('_edenwoolfbackendSession');
            Yii::$app->user->logout();
            session_write_close();
            Yii::$app->response->redirect(['admin/']);
        }
    }

    public function actionForgotpassword() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $model = new UserMaster();
            $model->scenario = 'admin_forgot_password';
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model = UserMaster::find()
                        ->where(['email' => $model->email, 'status' => '1'])
                        ->andWhere(['type_id' => '1'])
                        ->one();
                $password = $this->rand_string(6);
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($password);
                $model->save(false);
                $email_setting = $this->get_email_data('admin_forgot_password', array('NAME' => $model->first_name, 'NEW_PASSWORD' => $password));
                $email_data = [
                    'to' => $model->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'admin_forgot_password',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
                Yii::$app->session->setFlash('success', 'We are successfully sent new password to your email.');
                $data_msg['link'] = Yii::$app->urlManager->createAbsoluteUrl(['admin']);
                $data_msg['res'] = 1;
            } else {
                $errors = array();
                $errors = $model->getErrors();
                foreach ($errors as $key => $value) {
                    $data_msg['error'][$key] = $value[0];
                }
                $data_msg['res'] = 0;
            }
            echo json_encode($data_msg);
            exit;
        }
    }

    public function actionLockscreen() {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->response->redirect(['admin/dashboard/index']);
        }
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('admin_email_lock')) {
            $admin_model = UserMaster::find()->where(['email' => $cookies->getValue('admin_email_lock'), 'type_id' => '1', 'status' => '1'])->one();
            $this->layout = 'lock';
            $model = new LoginForm;
            $model->scenario = 'lock';
            $model->email = $admin_model->email;
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                $cookies = Yii::$app->response->cookies;
                $cookies->remove('admin_email_lock');
                Yii::$app->session->setFlash('success', 'You are successfully unlocked.');
                Yii::$app->response->redirect(['admin/dashboard/']);
            }
            return $this->render('lock_screen', ['model' => $model, 'admin_model' => $admin_model]);
        } else {
            Yii::$app->response->redirect(['admin/auth/login']);
        }
    }

}

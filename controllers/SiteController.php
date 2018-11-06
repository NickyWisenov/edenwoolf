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

class SiteController extends FrontController {

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
    public function actionAutosuggestion() {
        if (Yii::$app->request->isAjax) {
            $key_str = $_POST['phrase1'];
            $search_arr = [];
            if ($key_str != '') {
                $key_arr = explode(' ', $key_str);
                foreach ($key_arr as $key) {
                    $sql = "SELECT * FROM postcode_db WHERE postcode LIKE '" . $key . "%' order by suburb asc";
                    $countries = Yii::$app->getDb()->createCommand($sql)->queryAll();
                    if (count($countries) > 0) {
                        foreach ($countries as $country) {
                            $value['postcode'] = $country['postcode'];
                            $value['name'] =  $country['suburb'] . ', ' . $country['state'].', '.$country['postcode'];
                            $value['lat'] = $country['lat'];
                            $value['lon'] = $country['lon'];
                            $value['suburb'] = $country['suburb'];
                            array_push($search_arr, $value);
                        }
                    }
                }
            }
            echo json_encode($search_arr);
            exit();
        }
    }
    public function actionAutosuggestionbysuburborpostcode() {
        if (Yii::$app->request->isAjax) {
            $key_str = $_POST['phrase1'];
            $search_arr = [];
            if ($key_str != '') {
                $key_arr = explode(' ', $key_str);
                foreach ($key_arr as $key) {
                    $sql = "SELECT * FROM postcode_db WHERE (postcode LIKE '" . $key . "%' OR suburb LIKE '%" . $key . "%') order by suburb asc";
                    $countries = Yii::$app->getDb()->createCommand($sql)->queryAll();
                    if (count($countries) > 0) {
                        foreach ($countries as $country) {
                            $value['postcode'] = $country['postcode'];
                            $value['name'] = ucfirst(strtolower($country['suburb'] . ', ' . $country['state'].', '.$country['postcode']));
                            $value['lat'] = $country['lat'];
                            $value['lon'] = $country['lon'];
                            $value['suburb'] = $country['suburb'];
                            array_push($search_arr, $value);
                        }
                    }
                }
            }
            echo json_encode($search_arr);
            exit();
        }
    }

    public function actionTestmail() {
         $email_setting = $this->get_email_data('carer_registration', array('NAME' => '$model->first_name', 'LINK' => '$link'));
            $email_data = [
                'to' => '$model->email',
                'subject' => 'sdsd',
                'template' => 'carer_registration',
                'data' => ['message' => 'sdsd']
            ];
            $this->SendMail($email_data);
            exit;
    }
    public function actionIndex() {
        $data = [];
        $data['banner_content'] = Cms::find()->where(['slug' => "banner_content"])->andWhere(['page_name' => "Home Page"])->one();
        $data['banner_content_2'] = Cms::find()->where(['slug' => "banner_content_2"])->andWhere(['page_name' => "Home Page"])->one();
        $data['backgorund_image'] = Cms::find()->where(['slug' => "backgorund_image"])->andWhere(['page_name' => "Home Page"])->one();
        $data['banner_video'] = Cms::find()->where(['slug' => "banner_video"])->andWhere(['page_name' => "Home Page"])->one();
        $data['join_carer'] = Cms::find()->where(['slug' => "join_carer"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['join_family'] = Cms::find()->where(['slug' => "join_family"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['home_page_heading'] = Cms::find()->where(['slug' => "home_page_heading"])->andWhere(['page_name' => "Home Page"])->one();
        $data['how_it_works_step_1'] = Cms::find()->where(['slug' => "how_it_works_step_1"])->andWhere(['page_name' => "Home Page"])->one();
        $data['how_it_works_step_2'] = Cms::find()->where(['slug' => "how_it_works_step_2"])->andWhere(['page_name' => "Home Page"])->one();
        $data['how_it_works_step_3'] = Cms::find()->where(['slug' => "how_it_works_step_3"])->andWhere(['page_name' => "Home Page"])->one();
        $data['how_it_works_step_4'] = Cms::find()->where(['slug' => "how_it_works_step_4"])->andWhere(['page_name' => "Home Page"])->one();
        $data['how_it_works_step_5'] = Cms::find()->where(['slug' => "how_it_works_step_5"])->andWhere(['page_name' => "Home Page"])->one();
        $data['join_carer_help_text'] = Cms::find()->where(['slug' => "join_carer_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        $data['join_family_help_text'] = Cms::find()->where(['slug' => "join_family_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        return $this->render('index', $data);
    }

    public function actionCheckname() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $name = $_POST['name'];
            if (!Yii::$app->user->isGuest) {
                $user_id = Yii::$app->user->id;
                $model = UserMaster::find()
                        ->where(['=', 'REPLACE(display_name, " ", "")', str_replace(' ', '', $name)])
                        ->andWhere(['<>', 'id', $user_id])
                        ->andWhere(['<>', 'status', "3"])
                        ->one();
            } else {
                $model = UserMaster::find()
                        ->where(['=', 'REPLACE(display_name, " ", "")', str_replace(' ', '', $name)])
//                    ->andWhere(['type_id' => $type])
                        ->andWhere(['<>', 'status', "3"])
                        ->one();
            }
//            $type = $_POST['type'];

            if (count($model) > 0) {
                $data_msg['error']['display_name'] = 'This name already exists in our database. Please try another.';
                $data_msg['res'] = 0;
            } else {
                $data_msg['res'] = 1;
            }
            echo json_encode($data_msg);
            exit;
        }
    }

    public function actionRegcarer() {
        $data = [];
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->type_id == '2')
                return $this->redirect(Url::to(['carer/dashboard']));
            else if (Yii::$app->user->identity->type_id == '3')
                return $this->redirect(Url::to(['family/dashboard']));
        }
        $model = new UserMaster;
        $model->scenario = 'reg_carer';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $image = UploadedFile::getInstance($model, 'image');
            if (isset($image) && $image != '') {
                $image_name = time() . rand(10, 100) . '.' . $image->extension;
                $image->saveAs(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name);
                Image::getImagine()->open(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name)->thumbnail(new Box(350, 450))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/preview/' . $image_name, ['quality' => 90]);
                Image::getImagine()->open(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name)->thumbnail(new Box(150, 250))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/thumb/' . $image_name, ['quality' => 90]);
                $model->image = $image_name;
            }
            $token = $this->rand_string(25);
            $password = Yii::$app->request->post('UserMaster')['password'];
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($password);
            $model->dob = Yii::$app->request->post('UserMaster')['year'] . '-' . Yii::$app->request->post('UserMaster')['month'] . '-' . Yii::$app->request->post('UserMaster')['date'];
            if ($model->age_privacy == "")
                $model->age_privacy = '0';
            $model->active_token = $token;
            $model->created_at = date("Y-m-d H:i:s");
            $model->save(false);
            $link = Yii::$app->urlManager->createAbsoluteUrl(['site/activeaccount', 'id' => base64_encode($model->id), 'token' => $model->active_token]);
            $email_setting = $this->get_email_data('carer_registration', array('NAME' => $model->first_name, 'LINK' => $link));
            $email_data = [
                'to' => $model->email,
                'subject' => $email_setting['subject'],
                'template' => 'carer_registration',
                'data' => ['message' => $email_setting['body']]
            ];
            $this->SendMail($email_data);
            $model_det = new CarerDetails;
            $model_det->user_id = $model->id;
            $model_det->save(false);
            Yii::$app->session->setFlash('success', 'You are registered successfully with us. Please check your email for verify your account.');
            return $this->redirect(['site/index']);
        }
        $data['model'] = $model;
        return $this->render('carer_register', $data);
    }

    public function actionRegfamily() {
        $data = [];
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->type_id == '2')
                return $this->redirect(Url::to(['carer/dashboard']));
            else if (Yii::$app->user->identity->type_id == '3')
                return $this->redirect(Url::to(['family/dashboard']));
        }
        $model = new UserMaster;
        $model_det = new FamilyDetails;
        $model->scenario = $model_det->scenario = 'reg_family';
        if ($model->load(Yii::$app->request->post())) {
            if (count(Yii::$app->request->post('FamilyDetails')['care_needed']) > 0){
                $model_det->care_needed = isset($_POST['FamilyDetails']['care_needed']) ? implode(',', Yii::$app->request->post('FamilyDetails')['care_needed']) : '';
            }
            $model_validate = $model->validate();
            $model_det_validate = $model_det->validate();
            if ($model_validate && $model_det_validate) {
                $image = UploadedFile::getInstance($model, 'image');
                if (isset($image) && $image != '') {
                    $image_name = time() . rand(10, 100) . '.' . $image->extension;
                    $image->saveAs(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name);
                    Image::getImagine()->open(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name)->thumbnail(new Box(350, 450))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/preview/' . $image_name, ['quality' => 90]);
                    Image::getImagine()->open(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $image_name)->thumbnail(new Box(150, 250))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/thumb/' . $image_name, ['quality' => 90]);
                    $model->image = $image_name;
                }
                $token = $this->rand_string(25);
                $password = Yii::$app->request->post('UserMaster')['password'];
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($password);
                $model->active_token = $token;
                $model->created_at = date("Y-m-d H:i:s");
                $model->save(false);
                $link = Yii::$app->urlManager->createAbsoluteUrl(['site/activeaccount', 'id' => base64_encode($model->id), 'token' => $model->active_token]);
                $email_setting = $this->get_email_data('family_registration', array('NAME' => $model->first_name, 'LINK' => $link));
                $email_data = [
                    'to' => $model->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'family_registration',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
                $model_det->user_id = $model->id;
                $model_det->save(false);
                Yii::$app->session->setFlash('success', 'You are registered successfully with us. Please check your email for verify your account.');
                return $this->redirect(['site/index']);
            }
        }
        if (count(Yii::$app->request->post('FamilyDetails')['care_needed']) > 0)
            $model_det->care_needed = Yii::$app->request->post('FamilyDetails')['care_needed'];
        $data['model'] = $model;
        $data['model_det'] = $model_det;
        return $this->render('family_register', $data);
    }

    public function actionError() {
        $this->layout = 'error';
        return $this->render('error');
    }

    public function actionActiveaccount() {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->type_id == '2')
                return $this->redirect(Url::to(['carer/dashboard']));
            else if (Yii::$app->user->identity->type_id == '3')
                return $this->redirect(Url::to(['family/dashboard']));
        }
        $id = isset($_GET['id']) ? base64_decode($_GET['id']) : '';
        $token = isset($_GET['token']) ? $_GET['token'] : '';
        $model = UserMaster::find()
                ->where(['id' => $id])
                ->andWhere(['active_token' => $token])
                ->andWhere(['<>', 'status', '3'])
                ->one();
        if (count($model) > 0) {
            $model->status = '1';
            $model->active_token = NULL;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'You have successfuly verified your email address. Now you can login.');
            return $this->redirect(['site/index']);
        } else {
            Yii::$app->session->setFlash('error', 'There was a problem with the verification of your email address. Please contact support if the problem persists.');
            return $this->redirect(['site/index']);
        }
    }

    public function actionLogin() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $model = new LoginForm;
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                $data_msg['account_data'] = $_POST['LoginForm']['email'] . ',' . $_POST['LoginForm']['password'];
                $user = UserMaster::findOne(Yii::$app->user->id);
                $user->last_login = date('Y-m-d H:i:s');
                $user->login_count = $user->login_count + 1;
                $user->save(false);
                Yii::$app->session->setFlash('success', 'You are successfully logged in.');
                $data_msg['res'] = 1;
                $id = Yii::$app->user->id;
                $customer = UserMaster::find()
						    ->where(['id' => $id])
						    ->one();
                
				$name = $customer->display_name;
				$suburb = $customer->suburb;
				$zipcode = $customer->zipcode;				
                $session = Yii::$app->session;
                $session['user_id'] = $id;
                $session['user_name'] = $name.','.$suburb.','.$zipcode;
               //  print_r($session['user_id']); 
               // print_r($session['user_name']); die;
                if (Yii::$app->user->identity->type_id == '2') {
//                    if (isset(Yii::$app->session["success_url"]) && Yii::$app->session["success_url"] != "") {
//                        Yii::$app->session->setFlash('success', 'You are successfully logged in.');
//                    }
                    $data_msg['link'] = Url::to(['carer/dashboard']);
                } else {
                    if (isset(Yii::$app->session["success_url"]) && Yii::$app->session["success_url"] != "") {
                        $data_msg['link'] = Yii::$app->session["success_url"];
                        unset(Yii::$app->session["success_url"]);
                    } else {
                        $data_msg['link'] = Url::to(['family/dashboard'],$customer);
                    }
                }
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

    public function actionForgotpassword() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $model = new UserMaster;
            $model->scenario = 'forgot_password';
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model = UserMaster::find()
                        ->where(['email' => $model->email])
                        ->andWhere(['status' => '1'])
                        ->one();
                $token = $this->rand_string(25);
                $link = Yii::$app->urlManager->createAbsoluteUrl(['site/index', 'id' => base64_encode($model->id), 'token' => $token]);
                $model->reset_password_token = $token;
                $model->save(false);
                $email_setting = $this->get_email_data('user_forgot_password', array('NAME' => $model->first_name, 'LINK' => $link));
                $email_data = [
                    'to' => $model->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'user_forgot_password',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
                $data_msg['res'] = 1;
                $data_msg['msg'] = 'We have sent reset password link in your mail please check.';
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

    public function actionShowresetmodal() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $id = isset($_POST['UserMaster']['id']) ? base64_decode($_POST['UserMaster']['id']) : '';
            $token = isset($_POST['UserMaster']['reset_password_token']) ? $_POST['UserMaster']['reset_password_token'] : '';
            $model = UserMaster::find()
                    ->where(['id' => $id])
                    ->andWhere(['reset_password_token' => $token])
                    ->andWhere(['<>', 'type_id', '1'])
                    ->andWhere(['status' => '1'])
                    ->one();
            if (count($model) > 0) {
                $data_msg['res'] = 1;
            } else {
                $data_msg['res'] = 0;
                $data_msg['msg'] = 'There was a problem with the reset password. Please contact support if the problem persists.';
            }
            echo json_encode($data_msg);
            exit;
        }
    }

    public function actionResetpassword() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $id = isset($_POST['UserMaster']['id']) ? base64_decode($_POST['UserMaster']['id']) : '';
            $token = isset($_POST['UserMaster']['reset_password_token']) ? $_POST['UserMaster']['reset_password_token'] : '';
            $model = UserMaster::find()
                    ->where(['id' => $id])
                    ->andWhere(['reset_password_token' => $token])
                    ->andWhere(['<>', 'type_id', '1'])
                    ->andWhere(['status' => '1'])
                    ->one();
            $model->scenario = 'reset_password';
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->reset_password_token = NULL;
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($_POST['UserMaster']['new_password']);
                $model->updated_at = date('Y-m-d H:i:s');
                $model->save(false);
                $data_msg['link'] = Url::to(['site/index']);
                Yii::$app->session->setFlash('success', 'Password reset successfully. Now you can login with your new credentials.');
                $data_msg['res'] = 1;
            } else {
                $errors = array();
                $errors = $model->getErrors();
                foreach ($errors as $key => $value) {
                    $data_msg['error'][$key] = $value[0];
                }
                $data_msg['res'] = 0;
            }
        }
        echo json_encode($data_msg);
        exit;
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'You are successfully logged out.');
        return $this->goHome();
    }

    public function actionAboutus() {
        $data = [];
        $data['about_us_heading'] = Cms::find()->where(['slug' => "about_us_heading"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_step_1'] = Cms::find()->where(['slug' => "about_us_step_1"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_step_2'] = Cms::find()->where(['slug' => "about_us_step_2"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_step_3'] = Cms::find()->where(['slug' => "about_us_step_3"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_child_care'] = Cms::find()->where(['slug' => "about_us_child_care"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_disability_care'] = Cms::find()->where(['slug' => "about_us_disability_care"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_aged_care'] = Cms::find()->where(['slug' => "about_us_aged_care"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_sharing_unpaid_care'] = Cms::find()->where(['slug' => "about_us_sharing_unpaid_care"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_exchange_unpaid_care'] = Cms::find()->where(['slug' => "about_us_exchange_unpaid_care"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_sharing_unpaid_care_example'] = Cms::find()->where(['slug' => "about_us_sharing_unpaid_care_example"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['sharing_unpaid_care_step_1'] = Cms::find()->where(['slug' => "sharing_unpaid_care_step_1"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['sharing_unpaid_care_step_2'] = Cms::find()->where(['slug' => "sharing_unpaid_care_step_2"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['sharing_unpaid_care_step_3'] = Cms::find()->where(['slug' => "sharing_unpaid_care_step_3"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_nanny_carer_sharing'] = Cms::find()->where(['slug' => "about_us_nanny_carer_sharing"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_nanny_carer_sharing_example'] = Cms::find()->where(['slug' => "about_us_nanny_carer_sharing_example"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_nanny_carer_sharing_advantage'] = Cms::find()->where(['slug' => "about_us_nanny_carer_sharing_advantage"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['nanny_carer_sharing_step_1'] = Cms::find()->where(['slug' => "nanny_carer_sharing_step_1"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['nanny_carer_sharing_step_2'] = Cms::find()->where(['slug' => "nanny_carer_sharing_step_2"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['nanny_carer_sharing_step_3'] = Cms::find()->where(['slug' => "nanny_carer_sharing_step_3"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['nanny_carer_sharing_step_4'] = Cms::find()->where(['slug' => "nanny_carer_sharing_step_4"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['nanny_carer_sharing_step_5'] = Cms::find()->where(['slug' => "nanny_carer_sharing_step_5"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq'] = Cms::find()->where(['slug' => "about_us_faq"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq_1'] = Cms::find()->where(['slug' => "about_us_faq_1"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq_2'] = Cms::find()->where(['slug' => "about_us_faq_2"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq_3'] = Cms::find()->where(['slug' => "about_us_faq_3"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq_4'] = Cms::find()->where(['slug' => "about_us_faq_4"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['about_us_faq_5'] = Cms::find()->where(['slug' => "about_us_faq_5"])->andWhere(['page_name' => "About Us Page"])->one();
        $data['join_carer'] = Cms::find()->where(['slug' => "join_carer"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['join_family'] = Cms::find()->where(['slug' => "join_family"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['join_carer_help_text'] = Cms::find()->where(['slug' => "join_carer_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        $data['join_family_help_text'] = Cms::find()->where(['slug' => "join_family_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        $data['faqs'] = Faq::find()->where(['status' => "1"])->all();
        return $this->render('about_us', $data);
    }

    public function actionJoin() {
        $data = [];
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->type_id == '2')
                return $this->redirect(Url::to(['carer/dashboard']));
            else if (Yii::$app->user->identity->type_id == '3')
                return $this->redirect(Url::to(['family/dashboard']));
        }
        $data['join_carer'] = Cms::find()->where(['slug' => "join_carer"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['join_family'] = Cms::find()->where(['slug' => "join_family"])->andWhere(['page_name' => "Home & Join Page"])->one();
        $data['join_carer_help_text'] = Cms::find()->where(['slug' => "join_carer_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        $data['join_family_help_text'] = Cms::find()->where(['slug' => "join_family_help_text"])->andWhere(['page_name' => "Home, Join & About Us Page"])->one();
        return $this->render('join', $data);
    }

    public function actionLanguage() {
        if (Yii::$app->request->isAjax) {
            $lang = $_POST['lang'];
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'edenwoolf_language',
                'value' => $lang,
                'expire' => time() + 604800,
            ]));
            if ($lang == 'jp')
                $lang = 'Japanese';
            else
                $lang = 'English';
            Yii::$app->session->setFlash('success', Yii::t('app', $lang . ' language successfully set.'));
            return json_encode('success');
            exit();
        }
    }

    public function actionGeneratelogajoblink() {
        if (Yii::$app->request->isAjax) {
            $resp['isFamily'] = false;
            $resp['isLoggedin'] = false;

            if (Yii::$app->user->isGuest) {
                $resp['respMessage'] = "Please Log In to log a job.";
                Yii::$app->session["success_url"] = Yii::$app->urlManager->createAbsoluteUrl("joblog/index");
            } else {
                $resp['isLoggedin'] = true;
                $user = UserMaster::findOne(Yii::$app->user->id);
                if (count($user) > 0 && $user->type_id == '3') {
                    $resp['isFamily'] = true;
                    $resp['redirectUrl'] = Yii::$app->urlManager->createAbsoluteUrl("joblog/index");
                } else {
                    $resp['respMessage'] = "You have not permited to log a job.";
                }
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionAddfav() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $user = UserMaster::findOne($_POST['id']);
                $model = new FavouriteMaster;
                $model->user_id = Yii::$app->user->id;
                $model->fav_id = $_POST['id'];
                if ($user->type_id == '2')
                    $model->user_type = '1';
                else
                    $model->user_type = '2';
                $model->created_at = date('Y-m-d H:i:s');
                $model->save(false);
                Yii::$app->session->setFlash('success', 'Person has been added to your favourite list.');
                if (Yii::$app->user->identity->type_id == '2')
                    $data_msg['link'] = Yii::$app->urlManager->createAbsoluteUrl("carer/favlist");
                else if (Yii::$app->user->identity->type_id == '3')
                    $data_msg['link'] = Yii::$app->urlManager->createAbsoluteUrl("family/favlist");
            }
            echo json_encode($data_msg);
            exit;
        }
    }

    public function actionRemovefav() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            if (isset($_POST['id']) && $_POST['id'] != "") {
                $user_id = Yii::$app->user->id;
                FavouriteMaster::find()->where(['user_id' => $user_id])->andWhere(['fav_id' => $_POST['id']])->andWhere(['status' => "1"])->one();
                FavouriteMaster::updateAll(['status' => "3"], 'user_id = :user_id AND fav_id = :fav_id AND status =:status', [':user_id' => $user_id, ':fav_id' => $_POST['id'], ':status' => "1"]);
                if (!isset($_POST['type']))
                    $data_msg['msg'] = 'Person has been removed from your favourite list.';
                else
                    Yii::$app->session->setFlash('success', 'Person has been removed from your favourite list.');
            }
            echo json_encode($data_msg);
            exit;
        }
    }

}

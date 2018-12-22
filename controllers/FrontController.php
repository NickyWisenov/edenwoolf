<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Seo;
use app\models\Email;
use app\models\UserMaster;
use app\models\JobDescription;

class FrontController extends Controller {

    public $body_class = 'inner-page';
    public $layout = 'column1';

    public function beforeAction($action) {
        if (!Yii::$app->request->isAjax) {
            $controller_id = Yii::$app->controller->id;
            $controller_action_id = Yii::$app->controller->action->id;
            $route = $controller_id . '/' . $controller_action_id;
            $seo = Seo::find()->where(['route' => $route])->one();
            if ($seo == NULL) {
                $seo = new Seo;
                $seo->route = $route;
                $seo->save(false);
            }
            if ($seo != NULL) {
                \Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $seo->title]);
                \Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $seo->description]);
                \Yii::$app->view->registerMetaTag(['name' => 'keyword', 'content' => $seo->keyword]);
            }
        }
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true;
    }

    public function init() {
        parent::init();
        $cookies = Yii::$app->request->cookies;
        if (($cookie = $cookies->get('edenwoolf_language')) !== null) {
            $language = $cookie->value;
        } else {
            $language = 'en';
        }
        Yii::$app->language = $language;
    }

    public function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
    }

    public function SendMail($data) {
        $template = Yii::$app->controller->renderPartial('@app/mail/layouts/template.php');
        $content = Yii::$app->controller->renderPartial('@app/mail/' . $data['template'] . '.php', $data['data']);
        $view = str_replace('{{email_message}}', $content, $template);
        Yii::$app->mailer->compose()
                ->setTo($data['to'])
                ->setFrom(['admin@edenwoolf.com' => 'edenwoolf'])
                ->setSubject(isset($data['subject']) ? $data['subject'] : '')
                ->setHtmlBody($view)
                ->send();
//        $headers = "MIME-Version: 1.0" . "\r\n";
//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//        $headers .= 'From: admin@edenwoolf.com' . "\r\n" .
//                'Reply-To: no-reply@edenwoolf.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//        $va = str_replace('{{email_message}}', $content, $template);
//        return mail($data['to'], $data['subject'], $va, $headers);
    }

    public function get_email_data($code, $replacedata = array()) {
        $email_data = Email::find()
                ->where(['email_code' => $code])
                ->one();
        $email_msg = "";
        $email_array = array();
        $email_msg = $email_data->body;
        $subject = $email_data->subject;
        if (!empty($replacedata)) {
            foreach ($replacedata as $key => $value) {
                $email_msg = str_replace("{{" . $key . "}}", $value, $email_msg);
            }
        }
        return array('body' => $email_msg, 'subject' => $subject);
    }

    public static function Route() {
        return Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
    }

    public function getName($id = 0) {
        if ($id == 0 && !Yii::$app->user->isGuest) {
            $id = Yii::$app->user->id;
        }

        $user = UserMaster::findOne($id);
        // if (count($user) > 0) {
        if (true) {
//            return $user->first_name . ' ' . $user->last_name;
            return $user->first_name;
        } else {
            return ucwords('anonymous');
        }
    }

    public function getDisplayName($id = NULL) {
        $user = UserMaster::findOne($id);
        if (count($user) > 0) {
            if ($user->display_name != "") {
                return ucwords($user->display_name);
            } else {
                return ucwords($user->first_name . ' ' . $user->last_name);
            }
        } else {
            return ucwords('anonymous');
        }
    }

    public function getUserProfileImage($id = '') {
//        if (!Yii::$app->user->isGuest) {
            if ($id == '') {
                $userDetails = UserMaster::find()->where('id =' . Yii::$app->user->id)->one();
            } else {
                $userDetails = UserMaster::find()->where('id =' . $id)->one();
            }
            if ($userDetails->image != '') {
                if (file_exists(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/preview/' . $userDetails->image)) {
                    return Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/frontend/carer_picture/preview/' . $userDetails->image;
                } else {
                    return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
                }
            } else {
                return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
            }
//        } else {
//            return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
//        }
    }
    public function getOriginalUserProfileImage($id = '') {
//        if (!Yii::$app->user->isGuest) {
            if ($id == '') {
                $userDetails = UserMaster::find()->where('id =' . Yii::$app->user->id)->one();
            } else {
                $userDetails = UserMaster::find()->where('id =' . $id)->one();
            }
            if ($userDetails->image != '') {
                if (file_exists(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $userDetails->image)) {
                    return Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/frontend/carer_picture/original/' . $userDetails->image;
                } else {
                    return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
                }
            } else {
                return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
            }
//        } else {
//            return Yii::$app->request->baseUrl . '/web/frontend/images/prof_big_img_1.png';
//        }
    }

    public function getUserIDProofImage($id = '') {
//        if (!Yii::$app->user->isGuest) {
            if ($id == '') {
                $userDetails = UserMaster::find()->where('id =' . Yii::$app->user->id)->one();
            } else {
                $userDetails = UserMaster::find()->where('id =' . $id)->one();
            }
            if ($userDetails->id_proofimage != '') {
                if (file_exists(Yii::$app->basePath . '/web/uploads/frontend/carer_id_proof/preview/' . $userDetails->id_proofimage)) {
                    return Yii::$app->getUrlManager()->getBaseUrl() . '/web/uploads/frontend/carer_id_proof/preview/' . $userDetails->id_proofimage;
                } else {
                    return Yii::$app->request->baseUrl . '/web/frontend/images/linces_1.jpg';
                }
            } else {
                return Yii::$app->request->baseUrl . '/web/frontend/images/linces_1.jpg';
            }
//        } else {
//            return Yii::$app->request->baseUrl . '/web/frontend/images/linces_1.jpg';
//        }
    }

    public function getThemeImage($img = "") {
        return Yii::$app->request->baseUrl . "/frontend/images/$img";
    }

    public function getCarerLookingTypes() {
        return JobDescription::find()->where(["status" => 1])->all();
    }

    public function carerKnownLanguages($carerId = 0) {
        $knownLang = "";
        if ($carerId != 0) {
            $getDefaultLang = \app\models\CarerDetails::find()->where("user_id = $carerId")->one();
            if (isset($getDefaultLang->native_lang) && count($getDefaultLang->native_lang) > 0) {
                $knownLang .= $getDefaultLang->native_lang->name;
            }
            if ($getDefaultLang->other_language != "" && $getDefaultLang->other_language != NULL) {
                $getOtherLang = \app\models\Languages::find()->where("id IN ($getDefaultLang->other_language)")->all();
                if (count($getOtherLang) > 0) {
                    foreach ($getOtherLang as $v) {
                        if ($knownLang == "") {
                            $knownLang .= $v->name;
                        } else {
                            $knownLang .= ", " . $v->name;
                        }
                    }
                }
            }
        }
        return $knownLang;
    }

}

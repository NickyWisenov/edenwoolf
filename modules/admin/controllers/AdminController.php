<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Email;
use app\models\CourseMaster;
use app\models\UserMaster;

class AdminController extends Controller {
    
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
    
    public function getUserProfileImage($id = '') {
        if (!Yii::$app->user->isGuest) {
            if ($id == '') {
                $userDetails = UserMaster::find()->where('id =' . Yii::$app->user->id)->one();
            } else {
                $userDetails = UserMaster::find()->where('id =' . $id)->one();
            }
                if ($userDetails->image != '') {
                    if (file_exists(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/preview/' . $userDetails->image)) {
                        return Yii::$app->getUrlManager()->getBaseUrl() . '/uploads/frontend/carer_picture/preview/' . $userDetails->image;
                    }else {
                            return Yii::$app->request->baseUrl.'/web/frontend/images/prof_big_img_1.png';
                        }
                } else {
                    return Yii::$app->request->baseUrl.'/web/frontend/images/prof_big_img_1.png';
                }
        } else {
            return Yii::$app->request->baseUrl.'/web/frontend/images/prof_big_img_1.png';
        }
    }
    
    public function getUserIDProofImage($id = '') {
        if (!Yii::$app->user->isGuest) {
            if ($id == '') {
                $userDetails = UserMaster::find()->where('id =' . Yii::$app->user->id)->one();
            } else {
                $userDetails = UserMaster::find()->where('id =' . $id)->one();
            }
                if ($userDetails->id_proofimage != '') {
                    if (file_exists(Yii::$app->basePath . '/web/uploads/frontend/carer_id_proof/preview/' . $userDetails->id_proofimage)) {
                        return Yii::$app->getUrlManager()->getBaseUrl() . '/web/uploads/frontend/carer_id_proof/preview/' . $userDetails->id_proofimage;
                    }else {
                            return Yii::$app->request->baseUrl.'/web/frontend/images/linces_1.jpg';
                        }
                } else {
                    return Yii::$app->request->baseUrl.'/web/frontend/images/linces_1.jpg';
                }
        } else {
            return Yii::$app->request->baseUrl.'/web/frontend/images/linces_1.jpg';
        }
    }

}

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
use app\models\UserMaster;
use app\models\FamilyDetails;
use app\models\LookingCareFor;
//use app\models\CarePersonDetails;
use app\models\FamilyCarePerson;
use app\models\FavouriteMaster;

class FamilyController extends FrontController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'dashboard', 'editprofile', 'updatefamilyinfoform', 'updatecareinfoform', 'changepassword', 'favlist', 'favlistajax','favlistfamilies','favlistfamiliesajax'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->type_id === '3';
                        },
                        'roles' => ['@'],
                    ],
                ],
            ],
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

    public function actionUpdatecareinfoform() {
        $user_id = Yii::$app->user->id;
        $resp = [];
        $resp['flag'] = false;
        $resp['start_time_err'] = false;
        $resp['end_time_err'] = false;
        $day_master_checkbox = false;
        $start_time_error = false;
        $end_time_error = false;
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $family = FamilyDetails::find()->where(['user_id' => $user_id])->one();

        if (Yii::$app->request->isAjax) {
            $family->scenario = "update_care_info";
            $family->attributes = isset($_POST['FamilyDetails']) ? $_POST['FamilyDetails'] : '';
            $family->other_perk = isset($_POST['FamilyDetails']['other_perk']) ? $_POST['FamilyDetails']['other_perk'] : '';
            $family->accomodation_type = isset($_POST['FamilyDetails']['accomodation_type']) ? $_POST['FamilyDetails']['accomodation_type'] : '';
            $family->other_task = isset($_POST['FamilyDetails']['other_task']) ? $_POST['FamilyDetails']['other_task'] : '';
            $family->care_describe_type = isset($_POST['FamilyDetails']['care_describe_type']) ? $_POST['FamilyDetails']['care_describe_type'] : '';
            $family->care_needed = isset($_POST['FamilyDetails']['care_needed']) ? $_POST['FamilyDetails']['care_needed'] : '';
            $family->disability_type = isset($_POST['FamilyDetails']['disability_type']) ? $_POST['FamilyDetails']['disability_type'] : '';
            if (isset($_POST['DayMaster']['id'])) {
                $day_master_checkbox = true;
            } else {
                $day_master_checkbox = false;
                $resp['day_master_checkbox_err'] = true;
                $resp['day_master_checkbox_err_msg'] = "Please select at least 1 day";
            }
            for ($i = 1; $i < 8; $i++) {
                if (isset($_POST['DayMaster']['id'][$i]) && ($_POST['DayMaster']['start_time'][$i] == '00:00' || $_POST['DayMaster']['start_time'][$i] == '')) {
                    $resp['start_time_error'][$i] = "Please input the valid time";
                    $start_time_error = true;
                    $resp['start_time_err'] = true;
                }
                if (isset($_POST['DayMaster']['id'][$i]) && ($_POST['DayMaster']['end_time'][$i] == '00:00' || $_POST['DayMaster']['end_time'][$i] == '')) {
                    $resp['end_time_error'][$i] = "Please input the valid time";
                    $end_time_error = true;
                    $resp['end_time_err'] = true;
                }
                if (isset($_POST['DayMaster']['id'][$i]) && strtotime($_POST['DayMaster']['start_time'][$i]) >= strtotime($_POST['DayMaster']['end_time'][$i])) {
                    $resp['start_time_error'][$i] = "Please input the valid time";
                    $start_time_error = true;
                    $resp['start_time_err'] = true;
                }
            }
            $family->validate();
            if ($day_master_checkbox == true && $start_time_error == false && $end_time_error == false && $family->validate()) {
                for ($i = 1; $i < 8; $i++) {
                    if (isset($_POST['DayMaster']['id'][$i])) {
                        $time_model = \app\models\AvailableTime::find()->where(['user_id' => $user_id, 'day_master_id' => $i])->one();
                        if (count($time_model) > 0) {
                            $time_model->all_day = (isset($_POST['DayMaster']['all_day'][$i])) ? 1 : 0;
                            $time_model->start_time = ($time_model->all_day == 1) ? '00:00' : date('H:i', strtotime($_POST['DayMaster']['start_time'][$i]));
                            $time_model->end_time = ($time_model->all_day == 1) ? '23:30' : date('H:i', strtotime($_POST['DayMaster']['end_time'][$i]));
                            $time_model->status = 1;
                            $time_model->save(false);
                        } else {
                            $new_time_model = new \app\models\AvailableTime();
                            $new_time_model->user_id = $user_id;
                            $new_time_model->type_id = $model->type_id;
                            $new_time_model->day_master_id = $i;
                            $new_time_model->all_day = (isset($_POST['DayMaster']['all_day'][$i])) ? 1 : 0;
                            $new_time_model->start_time = ($new_time_model->all_day == 1) ? '00:00' : date('H:i', strtotime($_POST['DayMaster']['start_time'][$i]));
                            $new_time_model->end_time = ($new_time_model->all_day == 1) ? '23:30' : date('H:i', strtotime($_POST['DayMaster']['end_time'][$i]));
                            $new_time_model->status = 1;
                            $new_time_model->save(false);
                        }
                    } else {
                        $time_model = \app\models\AvailableTime::find()->where(['user_id' => $user_id, 'day_master_id' => $i])->one();
                        if (count($time_model) > 0) {
                            $time_model->status = 0;
                            $time_model->save(false);
                        } else {
                            $new_time_model = new \app\models\AvailableTime();
                            $new_time_model->user_id = $user_id;
                            $new_time_model->type_id = $model->type_id;
                            $new_time_model->day_master_id = $i;
                            $new_time_model->status = 0;
                            $new_time_model->save(false);
                        }
                    }
                }
//                echo "<pre>";
//                print_r($family);
//                print_r($family->care_describe_type);
//                print_r(count($family->care_describe_type));
//                echo "</pre>";
//                exit;
                if ($family->care_describe_type != "" && !in_array(1, $family->care_describe_type) && !in_array(3, $family->care_describe_type)) {
                    $family->accomodation_type = '';
                    $family->other_perk = '';
                } else {
                    if ($family->care_describe_type != "" && !in_array(1, $family->care_describe_type)) {
                        $family->other_perk = '';
                    }
                }
                if ($family->care_needed != "" && !in_array(3, $family->care_needed)) {
                    $family->disability_type = '';
                }
                if ($family->care_needed != "" && !in_array(1, $family->care_needed)) {
                    $family->carer_parent_status = 0;
                    $family->carer_child_work = 0;
                }

                $family->other_perk = ($family->other_perk != '') ? implode(',', $family->other_perk) : '';
                $family->accomodation_type = ($family->accomodation_type != '') ? implode(',', $family->accomodation_type) : '';
                $family->other_task = ($family->other_task != '') ? implode(',', $family->other_task) : '';
                $family->negotiable = isset($_POST['FamilyDetails']['negotiable']) ? 1 : 0;
                $family->care_describe_type = ($family->care_describe_type != '') ? implode(',', $family->care_describe_type) : '';
                $family->care_needed = ($family->care_needed != '') ? implode(',', $family->care_needed) : '';
                $family->disability_type = ($family->disability_type != '') ? implode(',', $family->disability_type) : '';
                $family->save(false);
                $family->care_describe_type = explode(',', $family->care_describe_type);
                $family->care_needed = explode(',', $family->care_needed);
                if (in_array(1, $family->care_needed)) {
                    $resp['childcare'] = true;
                } else {
                    $resp['childcare'] = false;
                }
                if (in_array(3, $family->care_describe_type)) {
                    $resp['care_describe_type_both'] = true;
                } else {
                    $resp['care_describe_type_both'] = false;
                }
                if (in_array(1, $family->care_describe_type) && in_array(3, $family->care_describe_type)) {
                    $resp['care_describe_type_live_in'] = true;
                } else {
                    if (in_array(3, $family->care_describe_type)) {
                        $resp['care_describe_type_live_in'] = true;
                    } else {
                        $resp['care_describe_type_live_in'] = false;
                    }
                    if (in_array(1, $family->care_describe_type)) {
                        $resp['care_describe_type_long_term'] = true;
                    } else {
                        $resp['care_describe_type_long_term'] = false;
                    }
                }
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Care info data successfully updated.');
            } else {
                $resp['msg'] = Yii::t('app', 'Profile Incomplete, please check inputs');
                $resp['family_errors'] = $family->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionUpdatefamilyinfoform() {
        $user_id = Yii::$app->user->id;
        $resp = [];
        $resp['flag'] = false;
        $resp['imgError'] = false;
        $care_person_err = false;
        $resp['care_person_err'] = false;
        $resp['family_person_dob_err'] = false;
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $family = FamilyDetails::find()->where(['user_id' => $user_id])->one();
        $care_person = FamilyCarePerson::find()->where(['user_id' => $user_id])->all();
        if (Yii::$app->request->isAjax) {
            $model->scenario = "update_family_info";
            $model->attributes = isset($_POST['UserMaster']) ? $_POST['UserMaster'] : '';
            $family->attributes = isset($_POST['FamilyDetails']) ? $_POST['FamilyDetails'] : '';


            $model->image = UploadedFile::getInstance($model, 'image');

//            foreach ($_POST['FamilyCarePerson']['name'] as $k => $v) {
//                if ($v == "" && $_POST['FamilyCarePerson']['description'][$k] == "" && $_POST['FamilyCarePerson']['year'][$k] == "" && $_POST['FamilyCarePerson']['month'][$k] == "" && $_POST['FamilyCarePerson']['date'][$k] == "") {
//                    
//                } else {
//                    if ($v == '') {
//                        $care_person_err = true;
//                        $resp['care_person_err_msg'][$k] = "Please Fill all the details";
//                        $resp['care_person_err'] = true;
//                    }
//                    if ($_POST['FamilyCarePerson']['description'][$k] == '') {
//                        $care_person_err = true;
//                        if (isset($resp['care_person_err_msg'][$k])) {
//                            $resp['care_person_err_msg'][$k] = "Please Fill all the details";
//                            $resp['care_person_err'] = true;
//                        }
//                    }
////                if ($_POST['FamilyCarePerson']['dob'][$k] == '') {
////                    $care_person_err = true;
////                    if (isset($resp['care_person_err_msg'][$k])) {
////                        $resp['care_person_err_msg'][$k] = "Please Fill all the details";
////                        $resp['care_person_err'] = true;
////                    }
////                }
//                }
//            }
            $model->validate();
            $family->validate();
            if ($model->validate() && $family->validate() && $care_person_err == false) {
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Family info data successfully updated.');
                if ($model->image == '') {
                    $model->image = $old_model->image;
                }
                $model->save(false);


                $family->save(false);
                $family->care_needed = explode(',', $family->care_needed);

                if (count($care_person) > 0) {
                    FamilyCarePerson::deleteAll(['user_id' => $user_id]);
                }
                if (isset($_POST['FamilyCarePerson']['name']) && count($_POST['FamilyCarePerson']['name']) > 0) {
                    foreach ($_POST['FamilyCarePerson']['name'] as $k => $v) {
                        if ($_POST['FamilyCarePerson']['name'] != "") {
                            $care_person = new FamilyCarePerson;
                            $care_person->user_id = $user_id;
                            $care_person->name = $v;
                            $care_person->description = $_POST['FamilyCarePerson']['description'][$k];
                            $care_person->need_care = ($_POST['FamilyCarePerson']['need_care'][$k] && $_POST['FamilyCarePerson']['need_care'][$k] != "") ? trim($_POST['FamilyCarePerson']['need_care'][$k]) : 0;
                            $care_person->save(false);
                        }
                    }
                }
                if (isset($model->image) && $model->image != '') {
                    if (isset($model->image->name)) {
                        $extArr = explode(".", $model->image->name);
                        $ext = end($extArr);
                        $imageName = time() . $this->rand_string(6) . ".$ext";

                        $path = Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original';
                        if ($model->image->saveAs($path . '/' . $imageName)) {
                            $model->image = $imageName;
                            $model->save(false);
                            $user_temp_image_with_path = Yii::$app->basePath . '/web/uploads/frontend/carer_picture/original/' . $imageName;
                            Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(120, 120))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_picture/preview/' . $imageName, ['quality' => 90]);
                        } else {
                            $resp['imgError'] = true;
                            $resp['imgErrorMsg'] = Yii::t('app', 'Image Uploding Error. Please try again after some times');
                        }
                    } else {
//                        $resp['imgError'] = true;
//                        $resp['imgErrorMsg'] = Yii::t('app', 'Image Uploding Error. Please try again after some times');
                    }
                }
//                $carer->care_type= explode(',',$carer->care_type);
//                if(in_array(1, $carer->care_type)){
//                    $resp['childcare']=true;
//                }else{
//                    $resp['childcare']=false;
//                }
            } else {
                $resp['msg'] = Yii::t('app', 'Profile Incomplete, please check inputs');
                $resp['errors'] = $model->getErrors();
                $resp['family_errors'] = $family->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionDashboard() {
        $data = [];
        return $this->render('dashboard', $data);
    }

    public function actionEditprofile() {
        $userId = Yii::$app->user->id;
        $data = [];
        $data["user"] = $user = UserMaster::findOne($userId);
        $family = FamilyDetails::find()->where(["user_id" => $userId])->one();
        $family->care_needed = explode(',', $family->care_needed);
        $family->disability_type = explode(',', $family->disability_type);
        $family->care_describe_type = explode(',', $family->care_describe_type);
        $family->other_task = explode(',', $family->other_task);
        $family->accomodation_type = explode(',', $family->accomodation_type);
        $family->other_perk = explode(',', $family->other_perk);
        $data["family"] = $family;
        $data["lookingcare"] = $lookingcare = LookingCareFor::find()->where(["status" => 1])->all();
        $data["family_care_person"] = $family_care_person = FamilyCarePerson::find()->where(['user_id' => $userId, 'status' => 1])->all();
        $data['all_other_duties'] = $all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();
        $data['all_accomodations'] = $all_accomodations = \app\models\Accomodation::find()->where(['status' => 1])->all();
        $data['all_perks'] = $all_perks = \app\models\OtherPerks::find()->where(['status' => 1])->all();
        $data['caringExperienceType'] = $caringExperienceType = \app\models\CaringExperienceType::find()->where(['status' => 1])->all();
        return $this->render('edit_profile', $data);
    }

    public function actionChangepassword() {
        $resp = [];
        $resp['flag'] = false;
        if (Yii::$app->request->isAjax) {
            $model = UserMaster::findOne(Yii::$app->user->id);
            $model->scenario = "change-password";
            $postData = Yii::$app->request->post("UserMaster");
            $model->old_password = $postData['old_password'];
            $model->new_password = $postData['new_password'];
            $model->retype_password = $postData['retype_password'];

            if ($model->validate()) {
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Password successfully updated.');
                $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->new_password);
                $model->save(false);
            } else {
                $resp['errors'] = $model->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    function checkValidateDate($date, $format = 'Y-m-d') {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function actionFavlist() {
        $data = [];
        $data['limit'] = 10;
        $data['offset'] = 0;
        return $this->render('favourite_list', $data);
    }
    public function actionFavlistfamilies() {
        $data = [];
        $data['limit'] = 10;
        $data['offset'] = 0;
        return $this->render('favourite_list_families', $data);
    }

    public function actionFavlistajax() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $user_id = Yii::$app->user->id;
            $limit = $_POST['limit'];
            $offset = $_POST['offset'];
            $model = FavouriteMaster::find()
                    ->where(['user_type' => "1"])
                    ->andWhere(['user_id' => $user_id])
                    ->andWhere(['<>', 'status', "3"])
                    ->limit($limit + 1)
                    ->offset($offset)
                    ->orderBy('id DESC')
                    ->all();
            if (count($model) == 11) {
                $data_msg['offset'] = (($offset + count($model)) - 1);
            } else {
                $data_msg['offset'] = ($offset + count($model));
            }
            $data_msg['limit'] = $limit;
            $data_msg['total'] = count($model);
            $data_msg['content'] = $this->renderPartial('favourite_list_ajax', ['model' => $model, 'limit' => $limit, 'offset' => $offset], true);
            echo json_encode($data_msg);
            exit();
        }
    }
    public function actionFavlistfamiliesajax() {
        if (Yii::$app->request->isAjax) {
            $data_msg = [];
            $user_id = Yii::$app->user->id;
            $limit = $_POST['limit'];
            $offset = $_POST['offset'];
            $model = FavouriteMaster::find()
                    ->where(['user_type' => "2"])
                    ->andWhere(['user_id' => $user_id])
                    ->andWhere(['<>', 'status', "3"])
                    ->limit($limit + 1)
                    ->offset($offset)
                    ->orderBy('id DESC')
                    ->all();
            if (count($model) == 11) {
                $data_msg['offset'] = (($offset + count($model)) - 1);
            } else {
                $data_msg['offset'] = ($offset + count($model));
            }
            $data_msg['limit'] = $limit;
            $data_msg['total'] = count($model);
            $data_msg['content'] = $this->renderPartial('favourite_list_families_ajax', ['model' => $model, 'limit' => $limit, 'offset' => $offset], true);
            echo json_encode($data_msg);
            exit();
        }
    }

}

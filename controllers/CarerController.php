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
use app\models\FavouriteMaster;

class CarerController extends FrontController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout', 'dashboard', 'editprofile', 'updatebasicform', 'updateadvancedform', 'updateavailablityform', 'favlist', 'favlistajax'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->type_id === '2';
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

    public function actionDashboard() {
        $data = [];
        return $this->render('dashboard', $data);
    }

    public function actionEditprofile() {
        $user_id = Yii::$app->user->id;
        $data = [];
        $data['user'] = $user = UserMaster::findOne($user_id);
        $carer = \app\models\CarerDetails::find()->where(['user_id' => $user_id])->one();
        $carer->care_type = explode(',', $carer->care_type);
        $carer->native_language = explode(',', $carer->native_language);
        $carer->other_language = explode(',', $carer->other_language);
        $carer->job_type = explode(',', $carer->job_type);
        $carer->certifications = explode(',', $carer->certifications);
        $carer->type_of_experience = explode(',', $carer->type_of_experience);
        $carer->other_task = explode(',', $carer->other_task);
        $data['carer'] = $carer;
        $data['all_languages'] = $all_languages = \app\models\Languages::find()->where(['status' => 1])->all();
        $data['all_job_descriptions'] = $all_job_descriptions = \app\models\JobDescription::find()->where(['status' => 1])->all();
        $data['all_qualifications'] = $all_qualifications = \app\models\Qualifications::find()->where(['status' => 1])->all();
        $data['all_caring_exp_type'] = $all_caring_exp_type = \app\models\CaringExperienceType::find()->where(['status' => 1])->all();
        $data['all_other_duties'] = $all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();

        return $this->render('edit_profile', $data);
    }

    public function actionUpdatebasicform() {
        error_reporting(E_ALL); 
        ini_set('display_errors', '1');
        $resp = [];
        $resp['flag'] = false;
        $resp['imgError'] = false;
        $resp['id_proofimageError'] = false;
        $user_id = Yii::$app->user->id;
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $carer = \app\models\CarerDetails::find()->where(['user_id' => $user_id])->one();
        if (Yii::$app->request->isAjax) {
            $model->scenario = $carer->scenario = "update_profile_basic";
            $model->attributes = $_POST['UserMaster'];
            $carer->attributes = isset($_POST['CarerDetails']) ? $_POST['CarerDetails'] : '';
            $carer->care_type = isset($_POST['CarerDetails']['care_type']) ? $_POST['CarerDetails']['care_type'] : '';
            $carer->native_language = isset($_POST['CarerDetails']['native_language']) ? $_POST['CarerDetails']['native_language'] : '';
            $carer->other_language = isset($_POST['CarerDetails']['other_language']) ? $_POST['CarerDetails']['other_language'] : '';
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->id_proofimage = UploadedFile::getInstance($model, 'id_proofimage');
            $model->age_privacy = isset($_POST['UserMaster']['age_privacy']) ? '1' : '0';
            if ($model->validate() && $carer->validate()) {
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Basic profile data successfully updated.');
                $model->dob = date('Y-m-d', strtotime($model->dob));
                if ($model->image == '') {
                    $model->image = $old_model->image;
                }
                if ($model->id_proofimage == '') {
                    $model->id_proofimage = $old_model->id_proofimage;
                }
                $model->save(false);
                $carer->care_type = ($carer->care_type != '') ? implode(',', $carer->care_type) : '';
                $carer->native_language = ($carer->native_language != '') ? implode(',', $carer->native_language) : '';
                $carer->other_language = ($carer->other_language != '') ? implode(',', $carer->other_language) : '';
                $carer->save(false);
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
                if (isset($model->id_proofimage) && $model->id_proofimage != '') {
                    if (isset($model->id_proofimage->name)) {
                        $extArr = explode(".", $model->id_proofimage->name);
                        $ext = end($extArr);
                        $imageName = time() . $this->rand_string(6) . ".$ext";

                        $path = Yii::$app->basePath . '/web/uploads/frontend/carer_id_proof/original';
                        if ($model->id_proofimage->saveAs($path . '/' . $imageName)) {
                            $model->id_proofimage = $imageName;
                            $model->save(false);
                            $user_temp_image_with_path = Yii::$app->basePath . '/web/uploads/frontend/carer_id_proof/original/' . $imageName;
                            Image::getImagine()->open($user_temp_image_with_path)->thumbnail(new Box(200, 130))->save(Yii::$app->basePath . '/web/uploads/frontend/carer_id_proof/preview/' . $imageName, ['quality' => 90]);
                        } else {
                            $resp['id_proofimageError'] = true;
                            $resp['id_proofimageErrorMsg'] = Yii::t('app', 'Image Uploding Error. Please try again after some times');
                        }
                    } else {
//                        $resp['id_proofimageError'] = true;
//                        $resp['id_proofimageErrorMsg'] = Yii::t('app', 'Image Uploding Error. Please try again after some times');
                    }
                }
                $carer->care_type = explode(',', $carer->care_type);
                if (in_array(1, $carer->care_type)) {
                    $resp['childcare'] = true;
                } else {
                    $resp['childcare'] = false;
                }
            } else {
                $resp['msg'] = Yii::t('app', 'Profile Incomplete, please check inputs');
                $resp['errors'] = $model->getErrors();
                $resp['carer_errors'] = $carer->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionUpdateadvancedform() {
        $resp = [];
        $resp['flag'] = false;
        $user_id = Yii::$app->user->id;
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $carer = \app\models\CarerDetails::find()->where(['user_id' => $user_id])->one();
        if (Yii::$app->request->isAjax) {
            $carer->scenario = "update_profile_advanced";
            $carer->attributes = isset($_POST['CarerDetails']) ? $_POST['CarerDetails'] : '';
            $carer->job_type = isset($_POST['CarerDetails']['job_type']) ? $_POST['CarerDetails']['job_type'] : '';
            $carer->certifications = isset($_POST['CarerDetails']['certifications']) ? $_POST['CarerDetails']['certifications'] : '';
            $carer->type_of_experience = isset($_POST['CarerDetails']['type_of_experience']) ? $_POST['CarerDetails']['type_of_experience'] : '';
            $carer->other_task = isset($_POST['CarerDetails']['other_task']) ? $_POST['CarerDetails']['other_task'] : '';
            $carer->other_certifications = isset($_POST['CarerDetails']['other_certifications']) ? $_POST['CarerDetails']['other_certifications'] : '';
            $carer->number_care = (isset($_POST['CarerDetails']['number_care']) && $_POST['CarerDetails']['number_care'] == '') ? 6 : $_POST['CarerDetails']['number_care'];
            if ($carer->validate()) {
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Advanced profile data successfully updated.');
                $carer->job_type = ($carer->job_type != '') ? implode(',', $carer->job_type) : '';
                $carer->certifications = ($carer->certifications != '') ? implode(',', $carer->certifications) : '';
                $carer->type_of_experience = ($carer->type_of_experience != '') ? implode(',', $carer->type_of_experience) : '';
                $carer->other_task = ($carer->other_task != '') ? implode(',', $carer->other_task) : '';
                $carer->save(false);
            } else {
                $resp['msg'] = Yii::t('app', 'Profile Incomplete, please check inputs');
                $resp['errors'] = $carer->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionUpdateavailablityform() {
        $resp = [];
        $resp['flag'] = false;
        $resp['start_time_err'] = false;
        $resp['end_time_err'] = false;
        $resp['flag'] = false;
        $day_master_checkbox = false;
        $start_time_error = false;
        $end_time_error = false;
        $user_id = Yii::$app->user->id;
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $carer = \app\models\CarerDetails::find()->where(['user_id' => $user_id])->one();
        if (Yii::$app->request->isAjax) {
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
            if ($day_master_checkbox == true && $start_time_error == false && $end_time_error == false) {
                $carer->is_looking_found = $_POST['CarerDetails']['is_looking_found'];
                $carer->save(false);
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
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Availability profile data successfully updated.');
            } else {
                $resp['msg'] = Yii::t('app', 'Profile Incomplete, please check inputs');
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionFavlist() {
        $data = [];
        $data['limit'] = 10;
        $data['offset'] = 0;
        return $this->render('favourite_list', $data);
    }

    public function actionFavlistajax() {
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
            $data_msg['content'] = $this->renderPartial('favourite_list_ajax', ['model' => $model, 'limit' => $limit, 'offset' => $offset], true);
            echo json_encode($data_msg);
            exit();
        }
    }

}

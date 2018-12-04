<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use app\models\UserMaster;
use app\models\CarerDetails;
use app\models\FamilyDetails;
use app\models\LoggingJobsMaster;
use app\models\LoggingJobType;
use app\models\Qualifications;
use app\models\OtherDuties;
use app\models\CarerAgeRange;
use app\models\CaringExperienceType;
use app\models\CaringExperienceYear;
use app\models\ChildrenAgeMaster;
use app\models\LoggingJobAvailableTime;

class JoblogController extends FrontController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [],
//                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index', 'createjoblog'],
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
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', Yii::t("app", 'Please login to log a job'));
            return $this->redirect(Yii::$app->request->referrer ? Yii::$app->request->referrer : Yii::$app->homeUrl);
        }
//        $carerId = (Yii::$app->session["carer_id"] != "" && Yii::$app->session["carer_id"] > 0) ? trim(session["carer_id"]) : 0;
        $carerIdEn = Yii::$app->request->get("car_id");
        $carerId = base64_decode($carerIdEn);
        if ($carerId > 0 && is_numeric($carerId)) {
            $data['carerMaster'] = $carerMaster = UserMaster::findOne($carerId);
            $familyId = Yii::$app->user->id;
            $loggingJobsMaster = new LoggingJobsMaster();
            $loggingJobsMaster->isNewRecord = true;
            $loggingJobsMaster->carer_id = (count($carerMaster) > 0) ? $carerMaster->id : 0;
            $loggingJobsMaster->carer_type = explode(',', $loggingJobsMaster->carer_type);
            $loggingJobsMaster->carer_qualification = explode(',', $loggingJobsMaster->carer_qualification);
            $loggingJobsMaster->carer_other_duties = explode(',', $loggingJobsMaster->carer_other_duties);
            $loggingJobsMaster->exprience_type = explode(',', $loggingJobsMaster->exprience_type);
            $loggingJobsMaster->children_ages = explode(',', $loggingJobsMaster->children_ages);
            $data['loggingJobsMaster'] = $loggingJobsMaster;
            $data['loggingJobType'] = $loggingJobType = LoggingJobType::find()->where(['status' => 1])->all();
            $data['familyMaster'] = $familyMaster = UserMaster::findOne($familyId);
            $data['all_qualifications'] = $all_qualifications = Qualifications::find()->where(['status' => 1])->all();
            $data['otherDuties'] = $otherDuties = OtherDuties::find()->where(['status' => 1])->all();
            $data['carerAgeRange'] = $carerAgeRange = CarerAgeRange::find()->where(['status' => 1])->all();
            $data['careringExpYear'] = $careringExpYear = CaringExperienceYear::find()->where(['status' => 1])->all();
            $data['careringExpType'] = $careringExpType = CaringExperienceType::find()->where(['status' => 1])->all();
            $data['childrenAgeMaster'] = $childrenAgeMaster = ChildrenAgeMaster::find()->where(['status' => 1])->all();
            $data['carerUsers'] = $carerUsers = UserMaster::find()->where("type_id = '2' AND status = '1'")->all();

            return $this->render("log_job", $data);
        } else {
            throw new \yii\web\NotFoundHttpException();
        }
    }

    public function actionCreatejoblog() {
        if (Yii::$app->request->isAjax) {
            $avaliTime = [];
            $resp['flag'] = false;
            $resp['start_time_err'] = false;
            $resp['end_time_err'] = false;
            $day_master_checkbox = false;
            $start_time_error = false;
            $end_time_error = false;

            $userId = Yii::$app->user->id;
            $loggingJobsMaster = new LoggingJobsMaster();
            $loggingJobsMaster->isNewRecord = true;
            $loggingJobsMaster->scenario = "add-job-log";

            $loggingJobsMaster->load(Yii::$app->request->post());
            $loggingJobsMaster->family_id = $userId;

            $loggingJobsMaster->carer_type = ($loggingJobsMaster->carer_type != "") ? implode(',', $loggingJobsMaster->carer_type) : "";
            $loggingJobsMaster->carer_qualification = ($loggingJobsMaster->carer_qualification != "") ? implode(',', $loggingJobsMaster->carer_qualification) : "";
            $loggingJobsMaster->carer_other_duties = ($loggingJobsMaster->carer_other_duties != "") ? implode(',', $loggingJobsMaster->carer_other_duties) : "";
            $loggingJobsMaster->exprience_type = ($loggingJobsMaster->exprience_type != "") ? implode(',', $loggingJobsMaster->exprience_type) : "";
            $loggingJobsMaster->children_ages = ($loggingJobsMaster->children_ages != "") ? implode(',', $loggingJobsMaster->children_ages) : "";

            $loggingJobsMaster->status = '1';
            $loggingJobsMaster->created_at = date("Y-m-d H:i:s");
            $loggingJobsMaster->updated_at = date("Y-m-d H:i:s");
//            ================== checking avalablity time ===================
            $postDayMaster = Yii::$app->request->post('DayMaster');
            if (isset($postDayMaster['id'])) {
                $day_master_checkbox = true;
            } else {
                $day_master_checkbox = false;
                $resp['day_master_checkbox_err'] = true;
                $resp['day_master_checkbox_err_msg'] = "Please select atleast 1 day";
            }
            for ($i = 1; $i < 8; $i++) {
                if (isset($postDayMaster['id'][$i]) && ($postDayMaster['start_time'][$i] == '00:00' || $postDayMaster['start_time'][$i] == '')) {
                    $resp['start_time_error'][$i] = "Please input the valid time";
                    $start_time_error = true;
                    $resp['start_time_err'] = true;
                }
                if (isset($postDayMaster['id'][$i]) && ($postDayMaster['end_time'][$i] == '00:00' || $postDayMaster['end_time'][$i] == '')) {
                    $resp['end_time_error'][$i] = "Please input the valid time";
                    $end_time_error = true;
                    $resp['end_time_err'] = true;
                }
                if (isset($postDayMaster['id'][$i]) && strtotime($postDayMaster['start_time'][$i]) >= strtotime($postDayMaster['end_time'][$i])) {
                    $resp['start_time_error'][$i] = "Please input the valid time";
                    $start_time_error = true;
                    $resp['start_time_err'] = true;
                }
                if ($day_master_checkbox == true && $start_time_error == false && $end_time_error == false) {
                    $timeArray['start_time'] = $postDayMaster['start_time'][$i];
                    $timeArray['end_time'] = $postDayMaster['end_time'][$i];

                    array_push($avaliTime, $timeArray);
                }
            }
//            $loggingJobsMaster->carer_availability = $avaliTime;
//            ================== end checking avalablity time ===================
            $loggingJobsMaster->validate();
            if ($day_master_checkbox == true && $start_time_error == false && $end_time_error == false && $loggingJobsMaster->validate() && $loggingJobsMaster->save()) {
                for ($i = 1; $i < 8; $i++) {
                    if (isset($postDayMaster['id'][$i])) {
                        $time_model = LoggingJobAvailableTime::find()->where(['lagging_job_id' => $loggingJobsMaster->id, 'day_master_id' => $i])->one();
                        if (count($time_model) > 0) {
                            $time_model->all_day = (isset($postDayMaster['all_day'][$i])) ? 1 : 0;
                            $time_model->start_time = ($time_model->all_day == 1) ? '00:00' : date('H:i', strtotime($postDayMaster['start_time'][$i]));
                            $time_model->end_time = ($time_model->all_day == 1) ? '23:30' : date('H:i', strtotime($postDayMaster['end_time'][$i]));
                            $time_model->status = 1;
                            $time_model->save(false);
                        } else {
                            $time_model = new LoggingJobAvailableTime();
                            $time_model->lagging_job_id = $loggingJobsMaster->id;
                            $time_model->day_master_id = $i;
                            $time_model->all_day = (isset($postDayMaster['all_day'][$i])) ? 1 : 0;
                            $time_model->start_time = ($time_model->all_day == 1) ? '00:00' : date('H:i', strtotime($postDayMaster['start_time'][$i]));
                            $time_model->end_time = ($time_model->all_day == 1) ? '23:30' : date('H:i', strtotime($postDayMaster['end_time'][$i]));
                            $time_model->status = 1;
                            $time_model->save(false);
                            $loggingJobsMaster->carer_availability = $time_model->id;
                            $loggingJobsMaster->save(false);
                        }
                    } else {
                        $time_model = LoggingJobAvailableTime::find()->where(['lagging_job_id' => $loggingJobsMaster->id, 'day_master_id' => $i])->one();
                        if (count($time_model) > 0) {
                            $time_model->status = 0;
                            $time_model->save(false);
                        } else {
                            $time_model = new LoggingJobAvailableTime();
                            $time_model->lagging_job_id = $loggingJobsMaster->id;
                            $time_model->day_master_id = $i;
                            $time_model->status = 0;
                            $time_model->save(false);
                            $loggingJobsMaster->carer_availability = $time_model->id;
                            $loggingJobsMaster->save(false);
                        }
                    }
                }
                $resp['flag'] = true;
                $resp['respMessage'] = "You have successfully logged a Job.";
            } else {
                $resp['errors'] = $loggingJobsMaster->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

}

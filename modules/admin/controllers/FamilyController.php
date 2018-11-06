<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use app\models\UserMaster;
use app\models\FamilyDetails;
use app\models\LookingCareFor;
//use app\models\CarePersonDetails;
use app\models\FamilyCarePerson;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use yii\web\NotFoundHttpException;

class FamilyController extends AdminController {
     public function actionUpdate($id) {
        $userId = $id;
        $data = [];
//        $data["user"] = $user = UserMaster::findOne($userId);
        $data["user"] = $user = $this->findModel($userId);
        $family = FamilyDetails::find()->where(["user_id" => $userId])->one();
        $family->care_needed = explode(',',$family->care_needed);
        $family->disability_type = explode(',',$family->disability_type);
        $family->care_describe_type= explode(',',$family->care_describe_type);
        $family->other_task= explode(',',$family->other_task);
        $family->accomodation_type= explode(',',$family->accomodation_type);
        $family->other_perk= explode(',',$family->other_perk);
        $data["family"] = $family;
        $data["lookingcare"] = $lookingcare = LookingCareFor::find()->where(["status" => 1])->all();
        $data["family_care_person"]=$family_care_person= FamilyCarePerson::find()->where(['user_id'=>$userId,'status'=>1])->all();
        $data['all_other_duties']=$all_other_duties= \app\models\OtherDuties::find()->where(['status'=>1])->all();
        $data['all_accomodations']=$all_accomodations= \app\models\Accomodation::find()->where(['status'=>1])->all();
        $data['all_perks']=$all_perks= \app\models\OtherPerks::find()->where(['status'=>1])->all();
        $data['caringExperienceType'] = $caringExperienceType = \app\models\CaringExperienceType::find()->where(['status' => 1])->all();
        return $this->render('update', $data);
    }
    public function actionUpdatecareinfoform() {
        $user_id= $_POST['UserMaster']['id'];
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
    public function actionUpdatecareinfoform111() {
        $resp = [];
        $resp['flag'] = false;
        $resp['start_time_err'] = false;
        $resp['end_time_err'] = false;
        $day_master_checkbox=false;
        $start_time_error=false;
        $end_time_error=false;
        $user_id= $_POST['UserMaster']['id'];
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $family= FamilyDetails::find()->where(['user_id'=>$user_id])->one();
        if (Yii::$app->request->isAjax) {
            $family->scenario= "update_care_info";
            $family->attributes = isset($_POST['FamilyDetails'])?$_POST['FamilyDetails']:'';
            $family->other_perk= isset($_POST['FamilyDetails']['other_perk'])?$_POST['FamilyDetails']['other_perk']:'';
            $family->accomodation_type= isset($_POST['FamilyDetails']['accomodation_type'])?$_POST['FamilyDetails']['accomodation_type']:'';
            $family->other_task= isset($_POST['FamilyDetails']['other_task'])?$_POST['FamilyDetails']['other_task']:'';
                if(isset($_POST['DayMaster']['id'])){
                $day_master_checkbox=true;
                }else{
                $day_master_checkbox= false;
                $resp['day_master_checkbox_err']=true;
                $resp['day_master_checkbox_err_msg']="Please select atleast 1 day";
                }
                for($i=1;$i<8;$i++){
                if(isset($_POST['DayMaster']['id'][$i]) && ($_POST['DayMaster']['start_time'][$i]=='00:00' || $_POST['DayMaster']['start_time'][$i]=='')){
                      $resp['start_time_error'][$i]="Please input the valid time";
                      $start_time_error=true;
                      $resp['start_time_err'] = true;
                    }
                if(isset($_POST['DayMaster']['id'][$i]) && ($_POST['DayMaster']['end_time'][$i]=='00:00' || $_POST['DayMaster']['end_time'][$i]=='')){
                      $resp['end_time_error'][$i]="Please input the valid time";
                      $end_time_error=true;
                      $resp['end_time_err'] = true;
                    }
                    if(isset($_POST['DayMaster']['id'][$i]) && strtotime($_POST['DayMaster']['start_time'][$i])>=strtotime($_POST['DayMaster']['end_time'][$i])){
                      $resp['start_time_error'][$i]="Please input the valid time";
                      $start_time_error=true;
                      $resp['start_time_err'] = true;
                    }
                }
                $family->validate();
            if ($day_master_checkbox==true && $start_time_error==false && $end_time_error==false && $family->validate()) {
                for($i=1;$i<8;$i++){
                    if(isset($_POST['DayMaster']['id'][$i])){
                        $time_model= \app\models\AvailableTime::find()->where(['user_id'=>$user_id,'day_master_id'=>$i])->one();
                        if(count($time_model)>0){
                            $time_model->all_day=(isset($_POST['DayMaster']['all_day'][$i]))?1:0;
                            $time_model->start_time=($time_model->all_day==1)?'00:00':date('H:i',strtotime($_POST['DayMaster']['start_time'][$i]));
                            $time_model->end_time=($time_model->all_day==1)?'23:30':date('H:i',strtotime($_POST['DayMaster']['end_time'][$i]));
                            $time_model->status=1;
                            $time_model->save(false);
                        }else{
                            $new_time_model=new \app\models\AvailableTime();
                            $new_time_model->user_id=$user_id;
                            $new_time_model->type_id=$model->type_id;
                            $new_time_model->day_master_id=$i;
                            $new_time_model->all_day=(isset($_POST['DayMaster']['all_day'][$i]))?1:0;
                            $new_time_model->start_time=($new_time_model->all_day==1)?'00:00':date('H:i',strtotime($_POST['DayMaster']['start_time'][$i]));
                            $new_time_model->end_time=($new_time_model->all_day==1)?'23:30':date('H:i',strtotime($_POST['DayMaster']['end_time'][$i]));
                            $new_time_model->status=1;
                            $new_time_model->save(false);
                        }
                    }else{
                        $time_model= \app\models\AvailableTime::find()->where(['user_id'=>$user_id,'day_master_id'=>$i])->one();
                        if(count($time_model)>0){
                            $time_model->status=0;
                            $time_model->save(false);
                        }else{
                            $new_time_model=new \app\models\AvailableTime();
                            $new_time_model->user_id=$user_id;
                            $new_time_model->type_id=$model->type_id;
                            $new_time_model->day_master_id=$i;
                            $new_time_model->status=0;
                            $new_time_model->save(false);
                        }
                    }
                }
                $family->other_perk= ($family->other_perk!='')?implode(',',$family->other_perk):'';
                $family->accomodation_type= ($family->accomodation_type!='')?implode(',',$family->accomodation_type):'';
                $family->other_task= ($family->other_task!='')?implode(',',$family->other_task):'';
                $family->negotiable= isset($_POST['FamilyDetails']['negotiable'])?1:0;
                $family->save(false);
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Care info data successfully updated.');
            }else{
                $resp['msg'] = Yii::t('app', 'Validation error!! Please check the inputs');
                $resp['family_errors'] = $family->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }
    public function actionUpdatefamilyinfoform() {
        $user_id= $_POST['UserMaster']['id'];
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
    public function actionUpdatefamilyinfoform111() {
        $resp = [];
        $resp['flag'] = false;
        $resp['imgError']=false;
        $care_person_err=false;
        $resp['care_person_err']=false;
        $user_id= $_POST['UserMaster']['id'];
        $old_model = UserMaster::find()->where(['id' => $user_id])->one();
        $model = UserMaster::find()->where(['id' => $user_id])->one();
        $family= FamilyDetails::find()->where(['user_id'=>$user_id])->one();
        $care_person= FamilyCarePerson::find()->where(['user_id'=>$user_id])->all();
        if (Yii::$app->request->isAjax) {
            $model->scenario ="update_family_info";
//            $family->scenario= "update_profile_basic_without_disablity";
            $model->attributes = $_POST['UserMaster'];
            $family->attributes = isset($_POST['FamilyDetails'])?$_POST['FamilyDetails']:'';
            $family->care_needed= isset($_POST['FamilyDetails']['care_needed'])?$_POST['FamilyDetails']['care_needed']:'';
            $family->disability_type= isset($_POST['FamilyDetails']['disability_type'])?$_POST['FamilyDetails']['disability_type']:'';
            $family->care_describe_type= isset($_POST['FamilyDetails']['care_describe_type'])?$_POST['FamilyDetails']['care_describe_type']:'';
            $model->image = UploadedFile::getInstance($model, 'image');
            foreach($_POST['FamilyCarePerson']['name'] as $k=>$v){
                if($v==''){
                   $care_person_err=true; 
                   $resp['care_person_err_msg'][$k]="Please Fill all the details";
                   $resp['care_person_err'] = true;
                }
                if($_POST['FamilyCarePerson']['description'][$k]==''){
                    $care_person_err=true; 
                    if(isset($resp['care_person_err_msg'][$k])){
                    $resp['care_person_err_msg'][$k]="Please Fill all the details";
                    $resp['care_person_err'] = true;
                    }
                }
                if($_POST['FamilyCarePerson']['dob'][$k]==''){
                    $care_person_err=true;
                    if(isset($resp['care_person_err_msg'][$k])){
                    $resp['care_person_err_msg'][$k]="Please Fill all the details";
                    $resp['care_person_err'] = true;
                    }
                }
            }
            $model->validate();
            $family->validate();
            if ($model->validate() && $family->validate() && $care_person_err==false) {
                $resp['flag'] = true;
                $resp['msg'] = Yii::t('app', 'Family info data successfully updated.');
                $model->dob=$model->year.'-'.$model->month.'-'.$model->date;
                if ($model->image=='') {
                    $model->image=$old_model->image;
                }
                $model->status='1';
                $model->save(false);
                if(!in_array(3, $family->care_needed)){
                    $family->disability_type='';
                }
                if(!in_array(1, $family->care_needed)){
                    $family->carer_parent_status=0;
                    $family->carer_child_work=0;
                }
                if($family->care_describe_type!='' && !in_array(1, $family->care_describe_type) && !in_array(3, $family->care_describe_type)){
                    $family->accomodation_type='';
                    $family->other_perk='';
                }else{
                    if($family->care_describe_type!='' && !in_array(1, $family->care_describe_type)){
                        $family->other_perk='';
                    }
                }
                $family->care_needed= ($family->care_needed!='')?implode(',',$family->care_needed):'';
                $family->disability_type= ($family->disability_type!='')?implode(',',$family->disability_type):'';
                $family->care_describe_type= ($family->care_describe_type!='')?implode(',',$family->care_describe_type):'';
                $family->save(false);
                $family->care_needed= explode(',',$family->care_needed);
                $family->care_describe_type= explode(',',$family->care_describe_type);
                if(in_array(1, $family->care_needed)){
                    $resp['childcare']=true;
                }else{
                    $resp['childcare']=false;
                }
                if(in_array(3, $family->care_describe_type)){
                    $resp['care_describe_type_both']=true;
                }else{
                   $resp['care_describe_type_both']=false; 
                }
                if(in_array(1, $family->care_describe_type) && in_array(3, $family->care_describe_type)){
                    $resp['care_describe_type_live_in']=true;
                    
                }else{
                    if(in_array(3, $family->care_describe_type)){
                        $resp['care_describe_type_live_in']=true;
                    }else{
                        $resp['care_describe_type_live_in']=false;
                    }
                    if(in_array(1, $family->care_describe_type)){
                      $resp['care_describe_type_long_term']=true;  
                    }else{
                    $resp['care_describe_type_long_term']=false;
                    }
                     
                }
                if(count($care_person)>0){
                    FamilyCarePerson::deleteAll(['user_id'=>$user_id]);
                }
                foreach($_POST['FamilyCarePerson']['name'] as $k=>$v){
                    $care_person= new FamilyCarePerson;
                    $care_person->user_id=$user_id;
                    $care_person->name=$v;
                    $care_person->description=$_POST['FamilyCarePerson']['description'][$k];
                    $care_person->dob=date('Y-m-d',strtotime($_POST['FamilyCarePerson']['dob'][$k]));
                    $care_person->save(false);
                }
                if (isset($model->image) && $model->image!='') {
                    if (isset($model->image->name)) {
                        $extArr = explode(".", $model->image->name);
                        $ext = end($extArr);
                        $imageName =  time() . $this->rand_string(6) . ".$ext";
                        
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
                
            }else {
                $resp['msg'] = Yii::t('app', 'Validation error!! Please check the inputs');
                $resp['errors'] = $model->getErrors();
                $resp['family_errors'] = $family->getErrors();
            }
            echo json_encode($resp);
            exit;
        }
    }

    public function actionIndex() {
        $data_msg = [];
        $data_msg['first_name'] = $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : "";
        $data_msg['last_name'] = $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : "";
        $data_msg['email'] = $email = isset($_GET['email']) ? $_GET['email'] : "";
        $data_msg['phone'] = $phone = isset($_GET['phone']) ? $_GET['phone'] : "";
        $data_msg['status'] = $status = isset($_GET['status']) ? $_GET['status'] : "";
        $data_msg['search_filter'] = isset($_GET['search_filter']) ? $_GET['search_filter'] : "";
        $query = UserMaster::find()->where(['type_id' => "3"])->andWhere(['<>', 'status', '3'])->orderBy('id DESC');
        if ($first_name != "") {
            $query->andWhere(['like', 'first_name', $first_name]);
        }
        if ($last_name != "") {
            $query->andWhere(['like', 'last_name', $last_name]);
        }
        if ($email != "") {
            $query->andWhere(['like', 'email', $email]);
        }
        if ($phone != "") {
            $query->andWhere(['like', 'phone', $phone]);
        }
        if ($status != "") {
            if ($status == 'inactive') {
                $query->andWhere(['=', 'status', '0']);
            } else if ($status == 'active') {
                $query->andWhere(['=', 'status', '1']);
            } else if ($status == 'suspended') {
                $query->andWhere(['=', 'status', '2']);
            } else if ($status == 'all') {
                $query->andWhere(['<>', 'status', '3']);
            }
        }
        $countQuery = clone $query;
        $pagination = new Pagination(['pageSize' => 10, 'totalCount' => $countQuery->count()]);
        $model = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
        $data_msg['model'] = $model;
        $data_msg['pagination'] = $pagination;
        return $this->render('index', $data_msg);
    }

    public function actionCreate() {
        $model = new UserMaster;
        $model->scenario = 'create_family';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $password = $this->rand_string(6);
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($password);
            $model->active_token = $this->rand_string(25);
            $model->created_at = date('Y-m-d H:i:s');
            $model->status = '0';
            if ($model->save(false)) {
                $model_det = new FamilyDetails;
                $model_det->user_id = $model->id;
                $model_det->save(false);
                $link = Yii::$app->urlManager->createAbsoluteUrl(['site/activeaccount', 'id' => base64_encode($model->id), 'token' => $model->active_token]);
                $email_setting = $this->get_email_data('admin_create_family', array('NAME' => $model->first_name, 'EMAIL' => $model->email, 'PASSWORD' => $password, 'LINK' => $link));
                $email_data = [
                    'to' => $model->email,
                    'subject' => $email_setting['subject'],
                    'template' => 'admin_create_family',
                    'data' => ['message' => $email_setting['body']]
                ];
                $this->SendMail($email_data);
                Yii::$app->session->setFlash('success', 'Family created successfully.');
            }
            return $this->redirect(Url::toRoute('family/index'));
        }
        $data['model'] = $model;
        return $this->render('create', $data);
    }

    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id)
        ]);
    }


    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->status = '3';
        $model->save(false);
        Yii::$app->session->setFlash('success', 'Family deleted successfully.');
        return $this->redirect(['index']);
    }

    protected function findModel($id) {
        if (($model = UserMaster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

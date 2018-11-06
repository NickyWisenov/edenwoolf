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
use app\models\CarerAgeRange;
use app\models\OtherDuties;
use app\models\Qualifications;
use app\models\CaringExperienceType;
use app\models\DayMaster;
use app\models\AvailableTime;
use app\models\LookingCareFor;
use app\models\FamilyCarePerson;

class SearchController extends FrontController {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only' => ['logout'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['familysearch', 'carersearch', 'submitcarersearch', 'carerprofile','submitfamilysearch','familyprofile','getprofileajax','getfamilyprofileajax'],
//                        'roles' => ['?'],
                    ],
//                    [
//                        'actions' => ['index', 'searchresult'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
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

    public function actionFamilysearch() {
        $data = [];
        $data['limit'] = 10;
        $data['offset'] = 0;
        $data['searchPostData'] = $searchPostData = Yii::$app->request->post("SearchCarer");
        
        return $this->render("family_search/family_search", $data);
    }

    public function actionCarersearch() {
        $data = [];
         $session = Yii::$app->session;
        $data['searchPostData'] = $searchPostData = Yii::$app->request->get("SearchCarer");
//         echo "<pre>";
//         print_r($searchPostData);
//         exit;
//           $session['zipcode1']='';
//            $session['zipcode']='';
//            $session['latitude']='';
//            $session['longitude']='';
//            $session['distance_within']=''; 
        $data['limit'] = 10;
        $data['offset'] = 0;
        return $this->render("carer_search/carer_search", $data);
    }

    public function actionSubmitcarersearch() {
        $session = Yii::$app->session;
        $data = [];
        $total_count = 0;
        $limit = $_REQUEST['limit'];
        $offset = $_REQUEST['offset'];
        $postcode_sql='';
        $mile_sql='';
        $having='';
        $session['zipcode1']='';
        $session['zipcode']='';
        $session['latitude']='';
        $session['longitude']='';
        $session['distance_within']='';
        if (isset($_REQUEST['UserMaster']['zipcode1']) && $_REQUEST['UserMaster']['zipcode1']!='') {
            $zipcode=$_REQUEST['UserMaster']['zipcode1'];
            $session['zipcode1']=$zipcode;
            $session['zipcode']=$_REQUEST['UserMaster']['zipcode'];
            if((isset($_REQUEST['UserMaster']['latitude']) && $_REQUEST['UserMaster']['latitude']!='') && (isset($_REQUEST['UserMaster']['longitude']) && $_REQUEST['UserMaster']['longitude']!='') &&(isset($_REQUEST['UserMaster']['distance_within']))){
            $lat=$_REQUEST['UserMaster']['latitude'];
            $long=$_REQUEST['UserMaster']['longitude'];
            $distance=$_REQUEST['UserMaster']['distance_within'];
            $session['latitude']=$lat;
            $session['longitude']=$long;
            $session['distance_within']=$distance;
            $mile_sql.=', ( (((acos(sin(('.$lat.' *pi()/180)) * sin((`latitude`*pi()/180))+cos(('.$lat.' *pi()/180)) * cos((`latitude`*pi()/180)) * cos((('.$long.' - `longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) ) as `distance` ';
            $having.=' having (';
            foreach($distance as $dk=>$dval){
                if($dk==0){
                 $having.=' distance <= '.$dval.' ';
                }else{
                 $having.=' OR distance <= '.$dval.' ';   
                }
            }
            $having.=' )';
        }else{
            $postcode_sql.=' and zipcode='.$zipcode.' ';
        }
        }
        
        $available_select='';
        $available_group_by='';
        $available_having='';
        if(isset($_REQUEST['DayMaster']['id'])){
            $available_select=',(select count(*) as count from available_time as at1 where at1.status=1 and at1.user_id=at.user_id and (';
            $i=0;
            foreach($_REQUEST['DayMaster']['id'] as $dayk=>$dayval){
//                $start_time='00:00:00';
//                $end_time='23:30:00';
                $end_time='00:00:00';
                $start_time='23:30:00';
                $day_master_id=$dayk;
                if($_REQUEST['DayMaster']['start_time'][$dayk]!=''){
                   $start_time= date('H:i:s',strtotime($_REQUEST['DayMaster']['start_time'][$dayk]));
                   $session['carer_start_time_'.$dayk] = $_POST['DayMaster']['start_time'][$dayk];
                }
                if($_REQUEST['DayMaster']['end_time'][$dayk]!=''){
                   $end_time= date('H:i:s',strtotime($_REQUEST['DayMaster']['end_time'][$dayk]));
                   $session['carer_end_time_'.$dayk]= $_POST['DayMaster']['end_time'][$dayk];
                }
                if($i==0){
                $available_select.="((at1.start_time <= '$start_time') AND (at1.end_time >= '$end_time') and at1.day_master_id=$day_master_id)";
                }else{
                $available_select.=" OR ((at1.start_time <= '$start_time') AND (at1.end_time >= '$end_time') and at1.day_master_id=$day_master_id)";
                }
                $i++;
                }
//                $available_condition.=")>=$i)";
                $available_select.=")) as count_data ";
                $available_group_by.=" GROUP BY at.user_id ";
                if($having==''){
                    $available_having.=" HAVING count_data =$i ";
                }else{
                $available_having.=" and count_data =$i ";
                }
        }
        if($available_group_by==''){
           $available_group_by.= " GROUP BY um.id ";
        }
        
        $age_select='';
        $age_having='';
        $age_sql='';
        if(isset($_POST['CarerDetails']['age']) && $_POST['CarerDetails']['age']!=''){
            $age=explode('-',$_POST['CarerDetails']['age']);
            $minage=$age[0];
            $maxage=$age[1];
            $today=date('Y-m-d');
            $age_select=",DATEDIFF('$today',um.dob) / 365.25 as age ";
            
//                $age_sql .= ' and (';
//            $age_sql .= "um.age_privacy ='0'";
//            $age_sql .= ') ';
                if($having=='' && $available_having==''){
                    $age_having.=" HAVING (age between $minage AND $maxage) ";
                }else{
                    $age_having.=" and (age between $minage AND $maxage)  ";
                }
        }
        
        
        
        $job_type_sql = '';
        if (isset($_REQUEST['CarerDetails']['job_type']) && count($_REQUEST['CarerDetails']['job_type']) > 0) {
            $job_type_sql .= ' and (';
            foreach ($_REQUEST['CarerDetails']['job_type'] as $k => $v) {
                if ($k == 0) {
                    $job_type_sql .= 'FIND_IN_SET(' . $v . ', carer_details.job_type)';
                } else {
                    $job_type_sql .= ' OR FIND_IN_SET(' . $v . ', carer_details.job_type)';
                }
            }
            $job_type_sql .= ') ';
        }

        $certifications_sql = '';
        if (isset($_REQUEST['CarerDetails']['certifications']) && count($_REQUEST['CarerDetails']['certifications']) > 0) {
            $certifications_sql .= ' and (';
            foreach ($_REQUEST['CarerDetails']['certifications'] as $k => $v) {
                if ($k == 0) {
                    $certifications_sql .= 'FIND_IN_SET(' . $v . ', carer_details.certifications)';
                } else {
                    $certifications_sql .= ' AND FIND_IN_SET(' . $v . ', carer_details.certifications)';
                }
            }
            $certifications_sql .= ') ';
        }

        $care_type_sql = '';
        if (isset($_REQUEST['CarerDetails']['care_type']) && count($_REQUEST['CarerDetails']['care_type']) > 0) {
            $care_type_sql .= ' and (';
            foreach ($_REQUEST['CarerDetails']['care_type'] as $k => $v) {
                if ($k == 0) {
                    $care_type_sql .= 'FIND_IN_SET(' . $v . ', carer_details.care_type)';
                } else {
                    $care_type_sql .= ' OR FIND_IN_SET(' . $v . ', carer_details.care_type)';
                }
            }
            $care_type_sql .= ') ';
        }

        $number_care_sql = '';
        if (isset($_REQUEST['CarerDetails']['number_care']) && $_REQUEST['CarerDetails']['number_care']!='') {
            $v = $_REQUEST['CarerDetails']['number_care'];
            $number_care_sql .= ' and (';
            $number_care_sql .= 'carer_details.number_care =' . $v . '';
            $number_care_sql .= ') ';
        }

        $caring_experience_sql = '';
        if (isset($_REQUEST['CarerDetails']['caring_experience']) && $_REQUEST['CarerDetails']['caring_experience']!='') {
            $v = $_REQUEST['CarerDetails']['caring_experience'];
            $caring_experience_sql .= ' and (';
            $caring_experience_sql .= 'carer_details.caring_experience >=' . $v . '';
            $caring_experience_sql .= ') ';
        }

        $type_of_experience_sql = '';
        if (isset($_REQUEST['CarerDetails']['type_of_experience']) && $_REQUEST['CarerDetails']['type_of_experience']!='') {
//            $v = $_REQUEST['CarerDetails']['type_of_experience'];
            $type_of_experience_sql .= ' and (';
//                    $type_of_experience_sql .= 'carer_details.type_of_experience =' . $v . '';
            foreach ($_REQUEST['CarerDetails']['type_of_experience'] as $k => $v) {
                if ($k == 0) {
                    $native_language_sql .= 'FIND_IN_SET(' . $v . ', carer_details.type_of_experience)';
                } else {
                    $native_language_sql .= ' OR FIND_IN_SET(' . $v . ', carer_details.type_of_experience)';
                }
            }
            
            $type_of_experience_sql .= ') ';
        }

        $native_language_sql = '';
        if (isset($_REQUEST['CarerDetails']['native_language']) && $_REQUEST['CarerDetails']['native_language']!='') {
//            $v = $_REQUEST['CarerDetails']['native_language'];
            $native_language_sql .= ' and (';
//            $native_language_sql .= 'carer_details.native_language =' . $v . '';
            
            foreach ($_REQUEST['CarerDetails']['native_language'] as $k => $v) {
                if ($k == 0) {
                    $native_language_sql .= 'FIND_IN_SET(' . $v . ', carer_details.other_language) OR carer_details.native_language =' . $v . ' ';
                } else {
                    $native_language_sql .= ' OR FIND_IN_SET(' . $v . ', carer_details.other_language) OR carer_details.native_language =' . $v . ' ';
                }
            }
            
            $native_language_sql .= ') ';
        }

        $other_language_sql = '';
//        if (isset($_REQUEST['CarerDetails']['other_language']) && $_REQUEST['CarerDetails']['other_language']!='') {
//            $v=$_REQUEST['CarerDetails']['other_language'];
//            $other_language_sql .= ' and (';
//            $other_language_sql .= 'FIND_IN_SET(' . $v . ', carer_details.other_language)';
//            $other_language_sql .= ') ';
//        }

        $parent_status_sql = '';
        if (isset($_REQUEST['CarerDetails']['parent_status']) && $_REQUEST['CarerDetails']['parent_status']!='') {
            $v = $_REQUEST['CarerDetails']['parent_status'];
            $parent_status_sql .= ' and (';
            $parent_status_sql .= 'carer_details.parent_status =' . $v . '';
            $parent_status_sql .= ') ';
        }

        $take_children_sql = '';
        if (isset($_REQUEST['CarerDetails']['take_children']) && $_REQUEST['CarerDetails']['take_children']!='') {
            $v = $_REQUEST['CarerDetails']['take_children'];
            $take_children_sql .= ' and (';
            $take_children_sql .= 'carer_details.take_children =' . $v . '';
            $take_children_sql .= ') ';
        }

        $other_task_sql = '';
        if (isset($_REQUEST['CarerDetails']['other_task']) && count($_REQUEST['CarerDetails']['other_task']) > 0) {
            $other_task_sql .= ' and (';
            foreach ($_REQUEST['CarerDetails']['other_task'] as $k => $v) {
                if ($k == 0) {
                    $other_task_sql .= 'FIND_IN_SET(' . $v . ', carer_details.other_task)';
                } else {
                    $other_task_sql .= ' AND FIND_IN_SET(' . $v . ', carer_details.other_task)';
                }
            }
            $other_task_sql .= ') ';
        }

        $id_proofimage_sql = '';
        if (isset($_REQUEST['CarerDetails']['id_proofimage'])) {
            $v = $_REQUEST['CarerDetails']['id_proofimage'];
            $id_proofimage_sql .= ' and (';
            if ($v == 0) {
                $id_proofimage_sql .= 'um.id_proofimage is NULL';
            } else {
                $id_proofimage_sql .= 'um.id_proofimage is NOT NULL';
            }
            $id_proofimage_sql .= ') ';
        }

        $sql = '';
//        $sql .= 'select at.*,um.*,carer_details.user_id,carer_details.care_type,carer_details.job_type,carer_details.caring_experience,carer_details.description '.$mile_sql.' '.$available_select. ' from available_time as at left join user_master as um ON um.id=at.user_id LEFT JOIN carer_details as carer_details ON at.user_id=carer_details.user_id '
//                . 'where um.status="1" and at.status=1 ' . $job_type_sql . ' ' . $certifications_sql . ' ' . $care_type_sql . ' ' . $number_care_sql . ' ' . $caring_experience_sql . ' ' . $type_of_experience_sql . ' ' . $native_language_sql . ' ' . $other_language_sql . ' ' . $parent_status_sql . ' ' . $take_children_sql . ' ' . $other_task_sql . ' ' . $id_proofimage_sql . ' '. $postcode_sql .' '
//                . 'and um.type_id="2" '.$available_group_by.' ' .$having.' '.$available_having;
        $sql .= 'select at.id as atid,um.*,carer_details.user_id,carer_details.care_type,carer_details.job_type,carer_details.caring_experience,carer_details.description '.$mile_sql.' '.$available_select.' '.$age_select. ' from user_master as um left join available_time as at ON um.id=at.user_id LEFT JOIN carer_details as carer_details ON um.id=carer_details.user_id '
                . 'where um.status="1" ' . $job_type_sql . ' ' . $certifications_sql . ' ' . $care_type_sql . ' ' . $number_care_sql . ' ' . $caring_experience_sql . ' ' . $type_of_experience_sql . ' ' . $native_language_sql . ' ' . $other_language_sql . ' ' . $parent_status_sql . ' ' . $take_children_sql . ' ' . $other_task_sql . ' ' . $id_proofimage_sql . ' '. $postcode_sql .' '.' '.$age_sql.' '
                . 'and um.type_id="2" '.$available_group_by.' ' .$having.' '.$available_having.' '.$age_having. ' LIMIT ' .$limit.' OFFSET '. $offset;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        $totalsql='';
        $totalsql .= 'select at.id as atid,um.*,carer_details.user_id,carer_details.care_type,carer_details.job_type,carer_details.caring_experience,carer_details.description '.$mile_sql.' '.$available_select.' '.$age_select.  ' from user_master as um left join available_time as at ON um.id=at.user_id LEFT JOIN carer_details as carer_details ON um.id=carer_details.user_id '
                . 'where um.status="1" ' . $job_type_sql . ' ' . $certifications_sql . ' ' . $care_type_sql . ' ' . $number_care_sql . ' ' . $caring_experience_sql . ' ' . $type_of_experience_sql . ' ' . $native_language_sql . ' ' . $other_language_sql . ' ' . $parent_status_sql . ' ' . $take_children_sql . ' ' . $other_task_sql . ' ' . $id_proofimage_sql . ' '. $postcode_sql .' '.' '.$age_sql.' '
                . 'and um.type_id="2" '.$available_group_by.' ' .$having.' '.$available_having.' '.$age_having;
        $total_command = Yii::$app->db->createCommand($totalsql)->queryAll();
        $all_carers=[];
        if(count($total_command)>0){
            foreach($total_command as $kk=>$vv){
                $val = (object) $vv;
                array_push($all_carers, base64_encode($val->id));
            }
            $session['all_carer']=$all_carers;
        }
        $data['limit'] = $_REQUEST['limit'];
        $data['offset'] = $current_offset=$limit+$offset;
        $data['total_count'] = count($total_command);
        $data['more_data'] = ($current_offset<count($total_command))?'yes':'no';
        
        $data['result'] = $result = $command->queryAll();
        $data['day_master'] = $dayMaster = DayMaster::find()->all();
        $data['html'] = $html = $this->renderPartial('carer_search/carer_search_html', $data, TRUE);
        return json_encode($data);
        exit();
    }
    public function actionSubmitfamilysearch() {
        $data = [];
        $session = Yii::$app->session;
        $total_count = 0;
        $limit = $_POST['limit'];
        $offset = $_POST['offset'];
        $session['family_zipcode1']='';
        $session['family_zipcode']='';
        $session['family_latitude']='';
        $session['family_longitude']='';
        $session['family_distance_within']='';
        $postcode_sql='';
        $mile_sql='';
        $having='';
        if (isset($_POST['UserMaster']['zipcode1']) && $_POST['UserMaster']['zipcode1']!='') {
            $zipcode=$_POST['UserMaster']['zipcode1'];
             $session['family_zipcode1']=$zipcode;
            $session['family_zipcode']=$_REQUEST['UserMaster']['zipcode'];
            if((isset($_POST['UserMaster']['latitude']) && $_POST['UserMaster']['latitude']!='') && (isset($_POST['UserMaster']['longitude']) && $_POST['UserMaster']['longitude']!='') &&(isset($_POST['UserMaster']['distance_within']))){
            $lat=$_POST['UserMaster']['latitude'];
            $long=$_POST['UserMaster']['longitude'];
            $distance=$_POST['UserMaster']['distance_within'];
            $session['family_latitude']=$lat;
            $session['family_longitude']=$long;
            $session['family_distance_within']=$distance;
            $mile_sql.=', ( (((acos(sin(('.$lat.' *pi()/180)) * sin((`latitude`*pi()/180))+cos(('.$lat.' *pi()/180)) * cos((`latitude`*pi()/180)) * cos((('.$long.' - `longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) ) as `distance` ';
            $having.=' having (';
            foreach($distance as $dk=>$dval){
                if($dk==0){
                 $having.=' distance <= '.$dval.' ';
                }else{
                 $having.=' OR distance <= '.$dval.' ';   
                }
            }
            $having.=' )';
        }else{
            $postcode_sql.=' and zipcode='.$zipcode.' ';
        }
        }
        
        $available_select='';
        $available_group_by='';
        $available_having='';
        if(isset($_POST['DayMaster']['id'])){
            $available_select=',(select count(*) as count from available_time as at1 where at1.status=1 and at1.user_id=at.user_id and (';
            $i=0;
            foreach($_POST['DayMaster']['id'] as $dayk=>$dayval){
//                $start_time='00:00:00';
//                $end_time='23:30:00';
                $end_time='00:00:00';
                $start_time='23:30:00';
                $day_master_id=$dayk;
                if($_POST['DayMaster']['start_time'][$dayk]!=''){
                   $start_time= date('H:i:s',strtotime($_POST['DayMaster']['start_time'][$dayk]));
                   
                    $session['start_time_'.$dayk] = $_POST['DayMaster']['start_time'][$dayk];
                }
                if($_POST['DayMaster']['end_time'][$dayk]!=''){
                   $end_time= date('H:i:s',strtotime($_POST['DayMaster']['end_time'][$dayk]));
                   $session['end_time_'.$dayk]= $_POST['DayMaster']['end_time'][$dayk];
                }
                if($i==0){
                $available_select.="((at1.start_time <= '$start_time') AND (at1.end_time >= '$end_time') and at1.day_master_id=$day_master_id)";
                }else{
                $available_select.=" OR ((at1.start_time <= '$start_time') AND (at1.end_time >= '$end_time') and at1.day_master_id=$day_master_id)";
                }
                $i++;
                }
//                $available_condition.=")>=$i)";
                $available_select.=")) as count_data ";
                $available_group_by.=" GROUP BY at.user_id ";
                if($having==''){
                    $available_having.=" HAVING count_data =$i ";
                }else{
                $available_having.=" and count_data =$i ";
                }
        }
        if($available_group_by==''){
           $available_group_by.= " GROUP BY um.id ";
        }
        
        $number_of_people_select='';
//        $number_of_people_group_by='';
        $number_of_people_having='';
        if(isset($_POST['FamilyDetails']['number_of_people']) && $_POST['FamilyDetails']['number_of_people']!=''){
            $no_of_people=$_POST['FamilyDetails']['number_of_people'];
            $number_of_people_select=',(select count(*) as number_of_people_count from family_care_person as fcp where fcp.status=1 and fcp.user_id=um.id ';
            
                $number_of_people_select.=") as number_of_people_count_data ";
//                $number_of_people_group_by.=" GROUP BY at.user_id ";
//                if($no_of_people<6){
//                    $sq= '=';
//                }else{
//                    $sq= '>=';
//                }
                if($having=='' && $available_having==''){
                    $number_of_people_having.=" HAVING number_of_people_count_data <= $no_of_people ";
                }else{
                $number_of_people_having.=" and number_of_people_count_data <= $no_of_people ";
                }
        }
        
        $care_needed_sql = '';
        if (isset($_POST['FamilyDetails']['care_needed']) && count($_POST['FamilyDetails']['care_needed']) > 0) {
            $care_needed_sql .= ' and (';
            foreach ($_POST['FamilyDetails']['care_needed'] as $k => $v) {
                if ($k == 0) {
                    $care_needed_sql .= 'FIND_IN_SET(' . $v . ', family_details.care_needed)';
                } else {
                    $care_needed_sql .= ' OR FIND_IN_SET(' . $v . ', family_details.care_needed)';
                }
            }
            $care_needed_sql .= ') ';
        }
        $disability_type_sql = '';
        if (isset($_POST['FamilyDetails']['disability_type']) && count($_POST['FamilyDetails']['disability_type']) > 0) {
            $disability_type_sql .= ' and (';
            foreach ($_POST['FamilyDetails']['disability_type'] as $k => $v) {
                if ($k == 0) {
                    $disability_type_sql .= 'FIND_IN_SET(' . $v . ', family_details.disability_type)';
                } else {
                    $disability_type_sql .= ' AND FIND_IN_SET(' . $v . ', family_details.disability_type)';
                }
            }
            $disability_type_sql .= ') ';
        }
        $care_describe_type_sql = '';
        if (isset($_POST['FamilyDetails']['care_describe_type']) && count($_POST['FamilyDetails']['care_describe_type']) > 0) {
            $care_describe_type_sql .= ' and (';
            foreach ($_POST['FamilyDetails']['care_describe_type'] as $k => $v) {
                if ($k == 0) {
                    $care_describe_type_sql .= 'FIND_IN_SET(' . $v . ', family_details.care_describe_type)';
                } else {
                    $care_describe_type_sql .= ' AND FIND_IN_SET(' . $v . ', family_details.care_describe_type)';
                }
            }
            $care_describe_type_sql .= ') ';
        }
        $accomodation_type_sql = '';
        if (isset($_POST['FamilyDetails']['accomodation_type']) && count($_POST['FamilyDetails']['accomodation_type']) > 0 && isset($_POST['FamilyDetails']['care_describe_type']) && in_array(3, $_POST['FamilyDetails']['care_describe_type'])) {
            $accomodation_type_sql .= ' and (';
            foreach ($_POST['FamilyDetails']['accomodation_type'] as $k => $v) {
                if ($k == 0) {
                    $accomodation_type_sql .= 'FIND_IN_SET(' . $v . ', family_details.accomodation_type)';
                } else {
                    $accomodation_type_sql .= ' AND FIND_IN_SET(' . $v . ', family_details.accomodation_type)';
                }
            }
            $accomodation_type_sql .= ') ';
        }
        $carer_parent_status_sql = '';
        if (isset($_POST['FamilyDetails']['carer_parent_status']) && $_POST['FamilyDetails']['carer_parent_status']!='') {
            $v = $_POST['FamilyDetails']['carer_parent_status'];
            $carer_parent_status_sql .= ' and (';
            $carer_parent_status_sql .= 'family_details.carer_parent_status =' . $v . '';
            $carer_parent_status_sql .= ') ';
        }
        $carer_child_work_sql = '';
        if (isset($_POST['FamilyDetails']['carer_child_work']) && $_POST['FamilyDetails']['carer_child_work']!='') {
            $v = $_POST['FamilyDetails']['carer_child_work'];
            $carer_child_work_sql .= ' and (';
            $carer_child_work_sql .= 'family_details.carer_child_work =' . $v . '';
            $carer_child_work_sql .= ') ';
        }
        $other_task_sql = '';
        if (isset($_POST['FamilyDetails']['other_task']) && count($_POST['FamilyDetails']['other_task']) > 0) {
            $other_task_sql .= ' and (';
            foreach ($_POST['FamilyDetails']['other_task'] as $k => $v) {
                if ($k == 0) {
                    $other_task_sql .= 'FIND_IN_SET(' . $v . ', family_details.other_task)';
                } else {
                    $other_task_sql .= ' AND FIND_IN_SET(' . $v . ', family_details.other_task)';
                }
            }
            $other_task_sql .= ') ';
        }

        $sql = '';
//        $sql .= 'select user_master.*,'.$mile_sql.' '.$available_select. ' family_details.user_id,family_details.care_needed,family_details.disability_type,family_details.care_describe_type,family_details.description,family_details.accomodation_type from user_master LEFT JOIN family_details ON user_master.id=family_details.user_id '
//                .$available_join. 'where user_master.status="1" '.$available_condition.' ' . $care_needed_sql . ' ' . $disability_type_sql . ' ' . $care_describe_type_sql . ' ' . $accomodation_type_sql . ' ' . $carer_parent_status_sql . ' ' . $carer_child_work_sql . ' ' . $other_task_sql . ' '. $postcode_sql .' '
//                . 'and user_master.type_id="3" group by user_master.id ' .$having.' ';
        
        $sql .= 'select at.id as atid,um.*,family_details.user_id,family_details.care_needed,family_details.disability_type,family_details.care_describe_type,family_details.description,family_details.accomodation_type '.$mile_sql.' '.$available_select.' '.$number_of_people_select. ' from user_master as um left join available_time as at ON um.id=at.user_id LEFT JOIN family_details as family_details ON um.id=family_details.user_id '
                . 'where um.status="1" ' . $care_needed_sql . ' ' . $care_needed_sql . ' ' . $disability_type_sql . ' ' . $care_describe_type_sql . ' ' . $accomodation_type_sql . ' ' . $carer_parent_status_sql . ' ' . $carer_child_work_sql . ' ' . $other_task_sql . ' '. $postcode_sql .' '
                . 'and um.type_id="3" '.$available_group_by.' ' .$having.' '.$available_having.' '.$number_of_people_having. ' LIMIT ' .$limit.' OFFSET '. $offset;
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        
        $totalsql='';
        $totalsql .= 'select at.id as atid,um.*,family_details.user_id,family_details.care_needed,family_details.disability_type,family_details.care_describe_type,family_details.description,family_details.accomodation_type '.$mile_sql.' '.$available_select.' '.$number_of_people_select. ' from user_master as um left join available_time as at ON um.id=at.user_id LEFT JOIN family_details as family_details ON um.id=family_details.user_id '
                . 'where um.status="1" ' . $care_needed_sql . ' ' . $care_needed_sql . ' ' . $disability_type_sql . ' ' . $care_describe_type_sql . ' ' . $accomodation_type_sql . ' ' . $carer_parent_status_sql . ' ' . $carer_child_work_sql . ' ' . $other_task_sql . ' '. $postcode_sql .' '
                . 'and um.type_id="3" '.$available_group_by.' ' .$having.' '.$available_having.' '.$number_of_people_having;
        $total_command = Yii::$app->db->createCommand($totalsql)->queryAll();
        $all_family=[];
        if(count($total_command)>0){
            foreach($total_command as $kk=>$vv){
                $val = (object) $vv;
                array_push($all_family, base64_encode($val->id));
            }
            $session['all_family']=$all_family;
        }
        $data['limit'] = $_POST['limit'];
        $data['offset'] = $current_offset=$limit+$offset;
        $data['total_count'] = count($total_command);
        $data['more_data'] = ($current_offset<count($total_command))?'yes':'no';
        
        
        $data['result'] = $result = $command->queryAll();
        $data['day_master'] = $dayMaster = DayMaster::find()->all();
        $data['html'] = $html = $this->renderPartial('family_search/family_search_html', $data, TRUE);
        return json_encode($data);
        exit();
    }

    
//    ========================= carers profile =================
    public function actionCarerprofile() {
        $carerIdEn = Yii::$app->request->get("car_id");
        $carerId = base64_decode($carerIdEn);
        if ($carerId > 0 && is_numeric($carerId)) {
            $data["carerDetails"] = $carerDetails = CarerDetails::find()->where(['user_id' => $carerId])->one();
            $data["carerAvailability"] = $carerAvailability = AvailableTime::find()->where("user_id = $carerId AND status = 1")->all();
            $data["carerAllExpType"] = $carerAllExpType = CaringExperienceType::find()->where("status = 1")->all();
            $data["qualification"] = $qualification = Qualifications::find()->where("status = 1")->all();
            $data["carerAgeRange"] = $carerAgeRange = CarerAgeRange::find()->where("status = 1")->all();
            $data["carerOtherDuties"] = $carerOtherDuties = OtherDuties::find()->where("status = 1")->all();
            $data["day_master"] = $dayMaster = DayMaster::find()->all();
            return $this->render("profile/carer-profile", $data);
//            return $this->render("profile/carer-profile1", $data);
        } else {
            throw new \yii\web\NotFoundHttpException();
        }
    }
    public function actionGetprofileajax() {
        $carerIdEn = Yii::$app->request->post("id");
        $carerId = base64_decode($carerIdEn);
        if ($carerId > 0 && is_numeric($carerId)) {
            $data["carerDetails"] = $carerDetails = CarerDetails::find()->where(['user_id' => $carerId])->one();
            $data["carerAvailability"] = $carerAvailability = AvailableTime::find()->where("user_id = $carerId AND status = 1")->all();
            $data["carerAllExpType"] = $carerAllExpType = CaringExperienceType::find()->where("status = 1")->all();
            $data["qualification"] = $qualification = Qualifications::find()->where("status = 1")->all();
            $data["carerAgeRange"] = $carerAgeRange = CarerAgeRange::find()->where("status = 1")->all();
            $data["carerOtherDuties"] = $carerOtherDuties = OtherDuties::find()->where("status = 1")->all();
            $data["day_master"] = $dayMaster = DayMaster::find()->all();
           $data['html'] = $html = $this->renderPartial('profile/carer-profile-ajax', $data, TRUE);
            return json_encode($data);
            exit();
        } else {
            throw new \yii\web\NotFoundHttpException();
        }
    }
    public function actionGetfamilyprofileajax() {
        $userIdEn = Yii::$app->request->post("id");
        $userId = base64_decode($userIdEn);
        if ($userId > 0 && is_numeric($userId)) {
            $data["familyDetails"] = $familyDetails = FamilyDetails::find()->where(['user_id' => $userId])->one();
            $data["familyAvailability"] = $familyAvailability = AvailableTime::find()->where("user_id = $userId AND status = 1")->all();
            $data["lookingcare"] = $lookingcare = LookingCareFor::find()->where(["status" => 1])->all();
            $data["family_care_person"] = $family_care_person = FamilyCarePerson::find()->where(['user_id' => $userId, 'status' => 1])->all();
            $data['all_other_duties'] = $all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();
            $data['day_master'] = $dayMaster = DayMaster::find()->all();
            $data['all_accomodations'] = $all_accomodations = \app\models\Accomodation::find()->where(['status' => 1])->all();
            $data['all_perks'] = $all_perks = \app\models\OtherPerks::find()->where(['status' => 1])->all();
           $data['html'] = $html = $this->renderPartial('profile/family-profile-ajax', $data, TRUE);
            return json_encode($data);
            exit();
        } else {
            throw new \yii\web\NotFoundHttpException();
        }
    }
    public function actionFamilyprofile() {
        $userIdEn = Yii::$app->request->get("user_id");
        $userId = base64_decode($userIdEn);
        if ($userId > 0 && is_numeric($userId)) {
            $data["familyDetails"] = $familyDetails = FamilyDetails::find()->where(['user_id' => $userId])->one();
            $data["familyAvailability"] = $familyAvailability = AvailableTime::find()->where("user_id = $userId AND status = 1")->all();
            $data["lookingcare"] = $lookingcare = LookingCareFor::find()->where(["status" => 1])->all();
            $data["family_care_person"] = $family_care_person = FamilyCarePerson::find()->where(['user_id' => $userId, 'status' => 1])->all();
            $data['all_other_duties'] = $all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();
            $data['all_accomodations'] = $all_accomodations = \app\models\Accomodation::find()->where(['status' => 1])->all();
            $data['all_perks'] = $all_perks = \app\models\OtherPerks::find()->where(['status' => 1])->all();
//            $data["carerAllExpType"] = $carerAllExpType = CaringExperienceType::find()->where("status = 1")->all();
//            $data["qualification"] = $qualification = Qualifications::find()->where("status = 1")->all();
//            $data["carerAgeRange"] = $carerAgeRange = CarerAgeRange::find()->where("status = 1")->all();
//            $data["carerOtherDuties"] = $carerOtherDuties = OtherDuties::find()->where("status = 1")->all();
            $data['day_master'] = $dayMaster = DayMaster::find()->all();
            return $this->render("profile/family-profile", $data);
        } else {
            throw new \yii\web\NotFoundHttpException();
        }
    }

    public function getCarerAvailableTime($userId = 0, $dayId = 0) {
        $timingText = "";
        $timing = AvailableTime::find()->where("user_id = $userId AND day_master_id = $dayId AND status = 1")->one();
        if ($timing) {
            $startTime = date("h:i a", strtotime($timing->start_time));
            $endTime = date("h:i a", strtotime($timing->end_time));
            $timingText = "($startTime - $endTime)";
        } else {
            $timingText = "-";
        }
        return $timingText;
    }

}

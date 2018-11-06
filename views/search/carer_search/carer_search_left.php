<?php
$session = Yii::$app->session;
use app\assets\frontend\AutocompleteAsset;
AutocompleteAsset::register($this);
?>
<?php
$all_languages = \app\models\Languages::find()->where(['status' => 1])->all();
$all_job_descriptions = \app\models\JobDescription::find()->where(['status' => 1])->all();
$all_qualifications = \app\models\Qualifications::find()->where(['status' => 1])->all();
$all_caring_exp_type = \app\models\CaringExperienceType::find()->where(['status' => 1])->all();
$all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();
?>
<div class="bottom-part">
    <div class="mob-toggle nw-mb-tgl hidden-sm hidden-md hidden-lg">
        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/nw_berger_menu.png" alt="" class="img-responsive" onclick="$('.api-menu').toggle();">
    </div>
    <h1 class="top-hd">
        Filter<i class="fa fa-filter" aria-hidden="true"></i> 
    </h1>
    <div class="api-menu cst-ap-mnu appi-new-mnu" id="a">
        <form name="searchform" id="searchform" action="" method="POST">
            <input id="limit" value="<?= (isset($limit) && $limit!='')?$limit:5; ?>" name="limit" type="hidden">
            <input id="offset" value="<?= (isset($offset) && $offset!='')?$offset:0; ?>" name="offset" type="hidden">
            
            <div class="panel-group" id="accordion" role="tablist">
                <div class="filter-wrap">
                    <ul id="filter_selection">
                    </ul>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading14">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span><span class="menu-right-icon"> Location</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">

                            <ul class="ul-location">
                                
                                <li>
                                    <div class="avel-box nw-form-box">
                                        <input type="hidden" id="autocomplete-init" value="0">
                                        <input type="hidden" id="usermaster-zipcode1" class="form-control" name="UserMaster[zipcode1]" value="<?=(isset($session['zipcode1'])&& $session['zipcode1']!='')?$session['zipcode1']:((isset($searchPostData['address_postcode1']) && $searchPostData['address_postcode1'] != '') ? $searchPostData['address_postcode1'] : '')?>">
                                        <input class="form-control input-size" onkeyup="easyautocompleteInit('usermaster-zipcode')" type="text" name="UserMaster[zipcode]" id="usermaster-zipcode" placeholder="Enter postcode" value="<?=(isset($session['zipcode'])&& $session['zipcode']!='')?$session['zipcode']:((isset($searchPostData['address_postcode']) && $searchPostData['address_postcode'] != '') ? $searchPostData['address_postcode'] : '') ?>">
                                        <a href="javascript:;" class="btn btn-info button-size" onclick="searchCarers();"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        <input class="form-control" type="hidden" name="UserMaster[latitude]" id="usermaster-latitude" placeholder="latitude" value="<?=(isset($session['latitude'])&& $session['latitude']!='')?$session['latitude']:((isset($searchPostData['latitude']) && $searchPostData['latitude'] != '') ? $searchPostData['latitude'] : '' )?>">
                                        <input class="form-control" type="hidden" name="UserMaster[longitude]" id="usermaster-longitude" placeholder="longitude" value="<?=(isset($session['longitude'])&& $session['longitude']!='')?$session['longitude']: ((isset($searchPostData['longitude']) && $searchPostData['longitude'] != '') ? $searchPostData['longitude'] : '' )?>">
                                    </div>
                                    <div class="row avel-box distance">
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="5 km" type="radio" name="UserMaster[distance_within][]" id="distance_within5" value="5" <?=(isset($session['distance_within']) && $session['distance_within']==5)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(5, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
                                                <label for="distance_within5">
                                                    5 km
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="10 km" type="radio" name="UserMaster[distance_within][]" id="distance_within10" value="10" <?=(isset($session['distance_within']) && $session['distance_within']==10)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(10, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
                                                <label for="distance_within10">
                                                    10 km
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="50 km" type="radio" name="UserMaster[distance_within][]" id="distance_within50" value="50" <?=(isset($session['distance_within']) && $session['distance_within']==50)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(50, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
                                                <label for="distance_within50">
                                                    50 km
                                                </label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Type of Care</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="care_type_1" data-type="Type of Care" data-val="Child care" type="checkbox" name="CarerDetails[care_type][]" value="1" <?= (isset($searchPostData['care_type']) && in_array(1, $searchPostData['care_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Child care</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="care_type_2" data-type="Type of Care" data-val="Aged care" type="checkbox" name="CarerDetails[care_type][]" value="2" <?= (isset($searchPostData['care_type']) && in_array(2, $searchPostData['care_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Aged Care</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="care_type_3" data-type="Type of Care" data-val="Disability care" type="checkbox" name="CarerDetails[care_type][]" value="3" <?= (isset($searchPostData['care_type']) && in_array(3, $searchPostData['care_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Disability Care</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Preferred Job Types</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">

                        <div class="panel-body">
                            <ul>
                                <?php if (isset($all_job_descriptions) && count($all_job_descriptions) > 0) : ?>
                                    <?php
                                    foreach ($all_job_descriptions as $k => $v) :
                                        if ($v->search_form_value != '' && $v->id !=4) {
                                            ?>
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="job_type<?=$v->id?>" data-type="Preferred Job Types" data-val="<?=$v->search_form_value?>" type="checkbox" name="CarerDetails[job_type][]" value="<?= $v->id ?>" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        <span class="">
                                                            <?php
                                                            echo $v->search_form_value;
//                                                            if ($k == 0) {
//                                                                echo "I am looking for a permanent or long-term carer";
//                                                            } else if ($k == 1) {
//                                                                echo "I am looking for a carer for a specific date(s) and time(s)";
//                                                            } else if ($k == 2) {
//                                                                echo "I am looking for a live-in carer";
//                                                            } else if ($k == 3) {
//                                                                echo "I am just browsing";
//                                                            }
                                                            ?>
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php }endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Carer Qualifications and Experience</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <span style="">
                                        Qualifications
                                    </span> 
                                    <ul class="sub-checkbox">
                                        <?php if (isset($all_qualifications) && count($all_qualifications) > 0) : ?>
                                            <?php
                                            foreach ($all_qualifications as $k => $v) :
                                                if ($v->value != '' && $v->id != 14) {
                                                    ?>
                                                    <li>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input id="certifications_<?=$v->id?>" data-type="Qualifications" data-val="<?= $v->value ?>" type="checkbox" name="CarerDetails[certifications][]" value="<?= $v->id ?>">
                                                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                <span class=""><?= $v->value ?></span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                <?php } endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <li class="new-level-class">
                                    <span class="nw-heading">
                                        Number of years’ experience
                                    </span> 
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" name="CarerDetails[caring_experience]" onchange="searchCarers();">
                                                    <option value="">Select</option>
                                                    <?php
                                                    for ($i = 0; $i <= 5; $i++) {
                                                        ?>
                                                        <option value="<?= ($i == 5) ? 6 : $i ?>"><?= ($i == 5) ? '5+' : $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span style="">
                                        Type of experience
                                    </span> 
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" multiple name="CarerDetails[type_of_experience][]" onchange="searchCarers();">
                                                    <option value="">Select</option>
                                                    <?php if (isset($all_caring_exp_type) && count($all_caring_exp_type) > 0) : ?>
                                                        <?php foreach ($all_caring_exp_type as $v) : ?>
                                                            <option value="<?= $v->id ?>"><?= $v->value ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading12">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"> <i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Other duties</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <?php if (isset($all_other_duties) && count($all_other_duties) > 0) : ?>
                                    <?php foreach ($all_other_duties as $v) : ?>
                                        <?php
                                        if ($v->value != 'Other') {
                                            ?>
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input id="other_task_<?=$v->id?>" data-type="Other duties" data-val="<?= $v->value ?>" type="checkbox" name="CarerDetails[other_task][]" value="<?= $v->id ?>">
                                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                        <span class=""><?= $v->value ?></span>
                                                    </label>
                                                </div>
                                            </li>
                                        <?php }endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default" style="">
                    <div class="panel-heading" role="tab" id="heading5">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Carer availability</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <?php
                                $day_master = \app\models\DayMaster::find()->where(['status' => 1])->all();
                                if (count($day_master) > 0) {
                                    foreach ($day_master as $key => $value) {
                                        ?>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input data-key="<?=$value->id?>" id="day_time_<?=$value->id?>" data-type="Carer availability" data-val="<?=$value->name?>" type="checkbox" name="DayMaster[id][<?= $value->id ?>]" >
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class=""> <?= $value->name ?></span>
                                                </label>
                                            </div>
                                            <div class="row avel-box">
                                                <div class="col-sm-6 col-xs-6">
                                                    <input type="text" id="start_time_<?=$value->id?>" class="form-control clockpicker day_time_<?=$value->id?>" placeholder="Start time" name="DayMaster[start_time][<?= $value->id ?>]" autocomplete="false" value="<?=isset($session['carer_start_time_'.$value->id])?$session['carer_start_time_'.$value->id]:''?>" onchange="changeTimeCarer(<?=$value->id?>)">
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <input type="text" id="end_time_<?=$value->id?>" class="form-control clockpicker day_time_<?=$value->id?>" placeholder="End time" name="DayMaster[end_time][<?= $value->id ?>]"  autocomplete="false" value="<?=isset($session['carer_end_time_'.$value->id])?$session['carer_end_time_'.$value->id]:''?>"  onchange="changeTimeCarer(<?=$value->id?>)">
                                                </div>
                                            </div> 
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Carer Language(s)</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li class="new-level-class-2">
<!--                                    <span class="nw-heading">
                                        Native language
                                    </span>-->
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" multiple name="CarerDetails[native_language][]" onchange="searchCarers();">
                                                    <?php if (isset($all_languages) && count($all_languages) > 0) : ?>
                                                        <?php foreach ($all_languages as $v) : ?>
                                                            <option value="<?= $v->id ?>"> <?= $v->name ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
<!--                                <li>
                                    <span style="">
                                        Other language(s)
                                    </span>
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" name="CarerDetails[other_language]" onchange="searchCarers();">
                                                    <option value="">Select</option>
                                                    <?php if (isset($all_languages) && count($all_languages) > 0) : ?>
                                                        <?php foreach ($all_languages as $v) : ?>
                                                            <option value="<?php // $v->id ?>"> <?php // $v->name ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading_age">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_age" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Age</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse_age" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_age" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li class="new-level-class-2">
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" name="CarerDetails[age]" onchange="searchCarers();">
                                                    <option value="">Select</option>
                                                    <option value="0-18">< 18</option>
                                                    <option value="18-25">18-25</option>
                                                    <option value="26-35">26-35</option>
                                                    <option value="36-45">36-45</option>
                                                    <option value="45-500">45+</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading10">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Parents</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <span style="">
                                        Only include carers who are parents
                                    </span>
                                    <ul class="sub-checkbox">
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="parent_status_1" data-type="Parents" data-val="Yes" type="checkbox" name="CarerDetails[parent_status]" value="1">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Yes</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span style="">
                                        Exclude carers who wish to take their own children to jobs
                                    </span>
                                    <ul class="sub-checkbox">
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="take_children_1" data-type="Exclude carers who wish to take their own children to jobs" data-val="Yes" type="checkbox" name="CarerDetails[take_children]" value="0">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Yes</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading13">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Drivers’ License</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul class="sub-checkbox">
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="id_proofimage_1" data-type="Drivers License" data-val="Only show carers who have a current driver's license" type="checkbox" name="CarerDetails[id_proofimage]" value="1">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Only show carers who have a current driver's license</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
<!--                            <ul>

                                <li>
                                    <div class="radio ">
                                        <input type="radio" name="CarerDetails[id_proofimage]" id="id_proofimage1" value="1">
                                        <label for="id_proofimage1">
                                            Yes
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="radio ">
                                        <input type="radio" name="CarerDetails[id_proofimage]" id="id_proofimage0" value="0">
                                        <label for="id_proofimage0">
                                            No
                                        </label>
                                    </div>
                                </li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

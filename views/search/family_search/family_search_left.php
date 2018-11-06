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
//$all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();


$lookingcare = \app\models\LookingCareFor::find()->where(["status" => 1])->all();
$all_other_duties = \app\models\OtherDuties::find()->where(['status' => 1])->all();
$all_accomodations = \app\models\Accomodation::find()->where(['status' => 1])->all();
$all_perks = \app\models\OtherPerks::find()->where(['status' => 1])->all();
$caringExperienceType = \app\models\CaringExperienceType::find()->where(['status' => 1])->all();
?>
<div class="bottom-part">
    <div class="mob-toggle nw-mb-tgl hidden-sm hidden-md hidden-lg"> 
        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/nw_berger_menu.png" alt="" class="img-responsive" onclick="$('.api-menu').toggle();">
    </div>
     <h1 class="top-hd">
        Filter<i class="fa fa-filter" aria-hidden="true"></i> 
    </h1>
    <div class="api-menu cst-ap-mnu appi-new-mnu" id="a">
        <form name="familysearchform" id="familysearchform" action="" method="post">
            <input id="limit" value="<?= (isset($limit) && $limit!='')?$limit:5; ?>" name="limit" type="hidden">
            <input id="offset" value="<?= (isset($offset) && $offset!='')?$offset:0; ?>" name="offset" type="hidden">
            <div class="panel-group" id="accordion" role="tablist">
                
                <div class="filter-wrap">
                    <ul id="filter_selection">
<!--                        <li>
                            <span>category</span>
                            <h3>Denim</h3>
                            <div class="close-filter"><a href="#"><i class="fa fa-times"></i></a></div>
                        </li>-->
                        
                    </ul>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading14">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Location</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul class="ul-location">
                                <li>
                                    <div class="avel-box nw-form-box">
                                        <input type="hidden" id="autocomplete-init" value="0">
                                        <input type="hidden" id="usermaster-zipcode1" class="form-control" name="UserMaster[zipcode1]" value="<?=(isset($session['family_zipcode1'])&& $session['family_zipcode1']!='')?$session['family_zipcode1']:((isset($searchPostData['address_postcode1']) && $searchPostData['address_postcode1'] != '') ? $searchPostData['address_postcode1'] : '')?>">
                                        <input class="form-control input-size" type="text" onkeyup="easyautocompleteInit('usermaster-zipcode')" name="UserMaster[zipcode]" id="usermaster-zipcode" placeholder="Enter postcode" value="<?=(isset($session['family_zipcode'])&& $session['family_zipcode']!='')?$session['family_zipcode']:((isset($searchPostData['address_postcode']) && $searchPostData['address_postcode'] != '') ? $searchPostData['address_postcode'] : '') ?>">
                                        <a href="javascript:;" class="btn btn-info button-size" onclick="searchFamilies();"><i class="fa fa-search" aria-hidden="true"></i></a>
                                        <input class="form-control" type="hidden" name="UserMaster[latitude]" id="usermaster-latitude" placeholder="latitude" value="<?=(isset($session['family_latitude'])&& $session['family_latitude']!='')?$session['family_latitude']:((isset($searchPostData['latitude']) && $searchPostData['latitude'] != '') ? $searchPostData['latitude'] : '' )?>">
                                        <input class="form-control" type="hidden" name="UserMaster[longitude]" id="usermaster-longitude" placeholder="longitude" value="<?=(isset($session['family_longitude'])&& $session['family_longitude']!='')?$session['family_longitude']: ((isset($searchPostData['longitude']) && $searchPostData['longitude'] != '') ? $searchPostData['longitude'] : '' )?>">
                                    </div>
                                    <div class="row avel-box">
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="5 km" type="radio" name="UserMaster[distance_within][]" id="distance_within5" value="5" <?=(isset($session['family_distance_within']) && $session['family_distance_within']==5)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(5, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
                                                <label for="distance_within5">
                                                    5 km
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="10 km" type="radio" name="UserMaster[distance_within][]" id="distance_within10" value="10" <?=(isset($session['family_distance_within']) && $session['family_distance_within']==10)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(10, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
                                                <label for="distance_within10">
                                                    10 km
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 nw-rdo-box">
                                            <div class="radio ">
                                                <input data-class="ul-location" data-type="Location" data-val="50 km" type="radio" name="UserMaster[distance_within][]" id="distance_within50" value="50" <?=(isset($session['family_distance_within']) && $session['family_distance_within']==50)?'checked="checked"': ((isset($searchPostData['distance_within']) && in_array(50, $searchPostData['distance_within'])) ? 'checked="checked"' : '' )?>>
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
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Type of Care</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="care_needed_1" data-type="Type of Care" data-val="Child care" type="checkbox" name="FamilyDetails[care_needed][]" value="1" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Child care</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="care_needed_2" data-type="Type of Care" data-val="Aged care" type="checkbox" name="FamilyDetails[care_needed][]" value="2" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Aged care</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <!--<input id="care_needed_3" data-type="Type of Care" data-val="Disability care" type="checkbox" name="FamilyDetails[care_needed][]" value="3" <? (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?> onclick="disabilityCheck();">-->
                                            <input id="care_needed_3" data-type="Type of Care" data-val="Disability care" type="checkbox" name="FamilyDetails[care_needed][]" value="3" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            <span class="">Disability care</span>
                                        </label>
                                    </div>
                                    <ul class="sub-checkbox disability_type-div" style="display: none;">
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="FamilyDetails[disability_type][]" value="1" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Physical</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="FamilyDetails[disability_type][]" value="2" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Intellectual</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="FamilyDetails[disability_type][]" value="3" <?= (isset($searchPostData['job_type']) && in_array($v->id, $searchPostData['job_type'])) ? 'checked="checked"' : ''; ?>>
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Sensory</span>
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
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Preferred Job Types</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <?php if (isset($lookingcare) && count($lookingcare) > 0) : ?>
                                    <?php foreach ($lookingcare as $v) : ?>
                                <?php
                                if($v->id!=6){
                                ?>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input data-type="Preferred Job Types" data-val="<?=$v->family_search?>" id="care_describe_type_<?= $v->id ?>" type="checkbox" name="FamilyDetails[care_describe_type][]" value="<?= $v->id ?>" <?php if ($v->id == 3) { ?> onclick="describeTypeCheck();"<?php } ?>>
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">
                                                        <?php
                                                            echo $v->family_search;
                                                        ?>
                                                    </span>
                                                </label>
                                            </div>
                                        </li>
                                <?php } ?>
                                    <?php endforeach; ?>
<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default accomodation-div" style="display:none;">
                    <div class="panel-heading" role="tab" id="headingTwoaccomodation_type">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwoaccomodation_type" class="collapsed"> 
                            <h4 class="panel-title">
                                Accommodation can you provide for your live-in carer
                            </h4> 
                        </a>
                    </div>
                    <div id="collapseTwoaccomodation_type" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwoaccomodation_type" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <?php if (isset($all_accomodations) && count($all_accomodations) > 0) : ?>
    <?php foreach ($all_accomodations as $v) : ?>
                                        <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="accomodation_type_<?=$v->id?>" data-type="Accommodation" data-val="<?=$v->value?>" type="checkbox" name="FamilyDetails[accomodation_type][]" value="<?= $v->id ?>">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class=""><?= $v->value ?></span>
                                                </label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
<?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading5">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Day(s) and time(s) care is required</span>
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
                                                    <input data-key="<?=$value->id?>" id="day_time_<?=$value->id?>" data-type="Day(s) and time(s)" data-val="<?=$value->name?>" type="checkbox" name="DayMaster[id][<?= $value->id ?>]" >
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class=""> <?= $value->name ?></span>
                                                </label>
                                                <!--<a href="javascript:;" class="btn btn-info day-master-go-btn" onclick="$('#day_time_<?=$value->id?>').prop('checked', true)">Go</a>-->
                                            </div>
                                            <div class="row avel-box">
                                                <div class="col-sm-6 col-xs-6">
                                                    <input type="text" id="start_time_<?=$value->id?>" class="form-control clockpicker day_time_<?=$value->id?>" placeholder="Start time" name="DayMaster[start_time][<?= $value->id ?>]" autocomplete="false" value="<?=isset($session['start_time_'.$value->id])?$session['start_time_'.$value->id]:''?>"  onchange="changeTime(<?=$value->id?>)">
                                                </div>
                                                <div class="col-sm-6 col-xs-6">
                                                    <input type="text" id="end_time_<?=$value->id?>" class="form-control clockpicker day_time_<?=$value->id?>" placeholder="End time" name="DayMaster[end_time][<?= $value->id ?>]"  autocomplete="false" value="<?=isset($session['end_time_'.$value->id])?$session['end_time_'.$value->id]:''?>"  onchange="changeTime(<?=$value->id?>)">
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
                    <div class="panel-heading" role="tab" id="heading6">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Parents</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
<!--                                <li>
                                    <span style="">
                                        Do you have your own children?
                                    </span> 
                                    <ul class="sub-checkbox ul-carer-parent-status">
                                        <li>
                                            <div class="radio ">
                                                <input data-class="ul-carer-parent-status" data-type="Do you have your own children?" data-val="Yes" type="radio" name="FamilyDetails[carer_parent_status]" id="carer_parent_status1" value="1">
                                                <label for="carer_parent_status1">Yes</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="radio ">
                                                <input data-class="ul-carer-parent-status" data-type="Do you have your own children?" data-val="No" type="radio" name="FamilyDetails[carer_parent_status]" id="carer_parent_status0" value="0">
                                                <label for="carer_parent_status0">No</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>-->
                                <li>
                                            <div class="checkbox">
                                                <label>
                                                    <input id="carer_child_work1" data-type="Only show families who are happy for carers to take their own children to jobs" data-val="Yes" type="checkbox" name="FamilyDetails[carer_child_work]" value="1">
                                                    <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                    <span class="">Only show families who are happy for carers to take their own children to jobs</span>
                                                </label>
                                            </div>
                                        </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading7">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" class="collapsed"> 
                            <h4 class="panel-title">
                                <span class="menu-lft-icon"><i class="fa fa-circle" aria-hidden="true"></i></span> <span class="menu-right-icon">Family Size</span>
                            </h4> 
                        </a>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li class="new-level-class">
                                    <span class="nw-heading">
                                        Number of people in need of care
                                    </span> 
                                    <ul class="sub-checkbox sub-check-1">
                                        <li>
                                            <div class="avel-box clearfix">
                                                <select class="form-control selectpicker" name="FamilyDetails[number_of_people]" onchange="searchFamilies();">
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
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

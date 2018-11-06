<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\frontend\DatepickerAsset;
use app\assets\frontend\ClockpickerAsset;

DatepickerAsset::register($this);
ClockpickerAsset::register($this);
$this->title = 'Log A Job';
?>

<!-- *****************Join-start****************** -->
<section class="dash-main-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        <?= Yii::$app->controller->renderPartial('@app/views/partials/left_family.php'); ?>
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <div class="top-part">
                                    <div class="clearfix">

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-1.png" class="media-object">
                                                    <h1>4.5</h1>
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">Read Reviews</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle spl-shade-1">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-2.png" class="media-object">
                                                    <h1 class="spl-shade-2">6</h1>
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">Check Message</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle spl-shade-2">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-3.png" class="media-object">
                                                    <!--                                                                <h1>4.5</h1>-->
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">log a Job</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle spl-shade-3">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-4.png" class="media-object">
                                                    <!--                                                                <h1>4.5</h1>-->
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">$675.00 Wallet Balance</a> 
                                                </h1>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <div class="blue-hding-panel">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <h2>Please fill up all the details for log a job</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-log">
                                            <section class="product-info-cont">
                                                <form role="form" id="logging-job-form" method="POST" enctype="multipart/form-data">
                                                    <div class="clearfix">
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Your Carer Name</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[carer_id]" id="loggingjobsmaster-carer_id">
                                                                        <option value="">Select Your Carer</option>
                                                                        <?php if (isset($carerUsers) && count($carerUsers) > 0) : ?>
                                                                            <?php foreach ($carerUsers as $v) : ?>
                                                                                <option value="<?= $v->id ?>" <?= ($v->id == $carerMaster->id) ? "selected" : "" ?>><?= $this->context->getDisplayName($v->id) ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>                        
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">What type of job are you logging?</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[log_job_type]" id="loggingjobsmaster-log_job_type">
                                                                        <option value="">Select type of job are you logging</option>
                                                                        <?php if (isset($loggingJobType) && count($loggingJobType) > 0) : ?>
                                                                            <?php foreach ($loggingJobType as $v) : ?>
                                                                                <option value="<?= $v->id ?>" <?= ($v->id == $loggingJobsMaster->log_job_type) ? "selected" : "" ?>><?= $v->type ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>                        
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <label for="usr" class="nw-label-5">What type of care do you need?</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="hidden" name="LoggingJobsMaster[carer_type]" id="loggingjobsmaster-carer_type"/>
                                                                <div class="checkbox chk-new">
                                                                    <input id="loggingjobsmaster-carer_type_1" type="checkbox" name="LoggingJobsMaster[carer_type][]" value="1" <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(1, $loggingJobsMaster->carer_type)) ? 'checked="checked"' : ''; ?> onchange="toogleChildCareDependencies(this)">
                                                                    <label for="loggingjobsmaster-carer_type_1" class="cst-lbl-chk">
                                                                        Child care
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox chk-new">
                                                                    <input id="loggingjobsmaster-carer_type_2" type="checkbox" name="LoggingJobsMaster[carer_type][]" value="2" <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(2, $loggingJobsMaster->carer_type)) ? 'checked="checked"' : ''; ?>>
                                                                    <label for="loggingjobsmaster-carer_type_2" class="cst-lbl-chk">
                                                                        Aged care
                                                                    </label>
                                                                </div>
                                                                <div class="checkbox chk-new">
                                                                    <input id="loggingjobsmaster-carer_type_3" type="checkbox" name="LoggingJobsMaster[carer_type][]" value="3" <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(3, $loggingJobsMaster->carer_type)) ? 'checked="checked"' : ''; ?>>
                                                                    <label for="loggingjobsmaster-carer_type_3" class="cst-lbl-chk">
                                                                        Disability care
                                                                    </label>
                                                                </div>
                                                                <div class="help-block error-carer_type"></div>
                                                            </div>
                                                        </div>   
                                                        <div class="row mrg-55" id="child_care_dis_cont" style="display: <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(1, $loggingJobsMaster->carer_type)) ? "block" : 'none'; ?>;">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Would you prefer a carer who is a parent?</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[prefer_care_who_parent]" id="loggingjobsmaster-prefer_care_who_parent" onchange="openPreferCareWhoParentDiv(this);">
                                                                        <option value="">Select One Preference</option>
                                                                        <option value="1" <?= ($loggingJobsMaster->prefer_care_who_parent == 1) ? "selected" : "" ?>>Yes</option>
                                                                        <option value="2" <?= ($loggingJobsMaster->prefer_care_who_parent == 2) ? "selected" : "" ?>>No</option>
                                                                        <option value="3" <?= ($loggingJobsMaster->prefer_care_who_parent == 3) ? "selected" : "" ?>>Don't mind</option>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div> 
                                                        </div>   
                                                        <div class="row mrg-55" id="open_prefer_care_who_parent_cont" style="display: <?= ($loggingJobsMaster->prefer_care_who_parent == 1) ? "block" : "none" ?>;">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Are you OK with your carer taking their own children to work?</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[carer_take_own_child]" id="loggingjobsmaster-carer_take_own_child">
                                                                        <option value="">Select One Preference</option>
                                                                        <option value="1" <?= ($loggingJobsMaster->carer_take_own_child == 1) ? "selected" : "" ?>>Yes</option>
                                                                        <option value="0" <?= ($loggingJobsMaster->carer_take_own_child == 0) ? "selected" : "" ?>>No</option>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div> 
                                                        <hr/>
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <label for="usr" class="nw-label-5">Carer availability</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="custom-table">
                                                                    <div class="custom-table-top clearfix">
                                                                        <div class="col-sm-6">
                                                                            <h1>Select day</h1>
                                                                        </div> 
                                                                        <div class="col-sm-6 text-right">
                                                                            <!--<a href="javascript:;" class="btn btn-all">Select all days</a>-->
                                                                            <div class="checkbox chk-new">
                                                                                <input class="select_all_day" id="select_all_day" name="select_all_day" type="checkbox" value="1" onchange="selectalldayclick(this)">
                                                                                <label for="select_all_day" class="cst-lbl-chk">
                                                                                    Select all days
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="custom-table-bottom">
                                                                        <input type="hidden" name="LoggingJobsMaster[carer_availability]" id="loggingjobsmaster-carer_availability"/>
                                                                        <?php
                                                                        $day_master = \app\models\DayMaster::find()->where(['status' => 1])->all();
                                                                        if (count($day_master) > 0) {
                                                                            foreach ($day_master as $key => $value) {
                                                                                $v = $get_time = app\models\LoggingJobAvailableTime::find()->where(['lagging_job_id' => $loggingJobsMaster->id, 'day_master_id' => $value->id])->one();
                                                                                ?>
                                                                                <div class="table-cstt-line clearfix carer_availability">
                                                                                    <div class="col-sm-4">
                                                                                        <div class="checkbox chk-new">
                                                                                            <input <?= (count($v) > 0 && $v->status == 1) ? 'checked' : '' ?> class="day_master_id" id="day_master_id_<?= $value->id ?>" name="DayMaster[id][<?= $value->id ?>]" type="checkbox" value="<?= $value->id ?>" onchange="daymastercheckboxclick(this)">
                                                                                            <label for="day_master_id_<?= $value->id ?>" class="cst-lbl-chk">
                                                                                                <?= $value->name ?>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="text-right-cast">
                                                                                            <div class="checkbox chk-new">
                                                                                                <input <?= (count($v) > 0 && $v->all_day == 1 && $v->status == 1) ? 'checked' : '' ?> id="day_master_all_day_<?= $value->id ?>" name="DayMaster[all_day][<?= $value->id ?>]" type="checkbox" value="<?= $value->id ?>" onchange="alldaycheckboxclick(this)">
                                                                                                <label for="day_master_all_day_<?= $value->id ?>" class="cst-lbl-chk">
                                                                                                    All Day
                                                                                                </label>
                                                                                            </div>
                                                                                            <input type="text" class="form-control cst-frm-control-8 clockpicker" placeholder="Start time" id="day_master_start_time_<?= $value->id ?>" name="DayMaster[start_time][<?= $value->id ?>]" value="<?= (isset($v->start_time) && $v->start_time != '' && $v->status == 1) ? date('h:i A', strtotime($v->start_time)) : '' ?>">
                                                                                            <input type="text" class="form-control cst-frm-control-9 clockpicker" placeholder="End time" id="day_master_end_time_<?= $value->id ?>" name="DayMaster[end_time][<?= $value->id ?>]" value="<?= (isset($v->end_time) && $v->end_time != '' && $v->status == 1) ? date('h:i A', strtotime($v->end_time)) : '' ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="error_<?= $value->id ?>" class="help-block" style="padding: 0 15px;"></div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                        <div id="no_checkbox_error_div" class="help-block" style="padding: 0 15px;"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>       
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <label for="usr" class="nw-label-5">Carer qualifications</label>
                                                            </div>
                                                            <div class="clearfix">
                                                                <input type="hidden" name="LoggingJobsMaster[carer_qualification]" id="loggingjobsmaster-carer_qualification"/>
                                                                <?php foreach ($all_qualifications as $checkboxOptions) : ?>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                                        <div class="checkbox chk-new">
                                                                            <input id="loggingjobsmaster-carer_qualification_<?= $checkboxOptions->id ?>" type="checkbox" name="LoggingJobsMaster[carer_qualification][]" value="<?= $checkboxOptions->id ?>" <?= (is_array($loggingJobsMaster->carer_qualification) && (count($loggingJobsMaster->carer_qualification) > 0) && in_array($checkboxOptions->id, $loggingJobsMaster->carer_qualification)) ? 'checked="checked"' : ''; ?> onchange="openOtherQualificationDiv(this)">
                                                                            <label for="loggingjobsmaster-carer_qualification_<?= $checkboxOptions->id ?>" class="cst-lbl-chk">
                                                                                <?= $checkboxOptions->value ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                <div class="help-block error-carer_type"></div>
                                                            </div>
                                                            <div class="col-sm-12" id="other_qualification_cont" style="display: none;">
                                                                <label for="usr" class="nw-label-5">Mention your other qualifications</label>
                                                                <div class="form-group">
                                                                    <input type="text" name="LoggingJobsMaster[other_qualification]" id="loggingjobsmaster-other_qualification" class="form-control" placeholder="Mention your other qualifications" value="<?= $loggingJobsMaster->other_qualification ?>"/>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Drivers license</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[driver_license]" id="loggingjobsmaster-driver_license">
                                                                        <option value="">Select license</option>
                                                                        <option value="1">No</option>
                                                                        <option value="2">Yes, driver's license</option>
                                                                        <option value="3">Yes, driver's license + own car</option>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12">
                                                                <label for="usr" class="nw-label-5">Would you like you carer to do any other duties?</label>
                                                            </div>
                                                            <div class="clearfix">
                                                                <input type="hidden" name="LoggingJobsMaster[carer_other_duties]" id="loggingjobsmaster-carer_other_duties"/>
                                                                <?php foreach ($otherDuties as $otherDuties) : ?>
                                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                                        <div class="checkbox chk-new">
                                                                            <input id="loggingjobsmaster-carer_other_duties_<?= $otherDuties->id ?>" type="checkbox" name="LoggingJobsMaster[carer_other_duties][]" value="<?= $otherDuties->id ?>" <?= (is_array($loggingJobsMaster->carer_other_duties) && (count($loggingJobsMaster->carer_other_duties) > 0) && in_array($otherDuties->id, $loggingJobsMaster->carer_other_duties)) ? 'checked="checked"' : ''; ?> onchange="openDutiesOtherOptionDiv(this)">
                                                                            <label for="loggingjobsmaster-carer_other_duties_<?= $otherDuties->id ?>" class="cst-lbl-chk">
                                                                                <?= $otherDuties->value ?>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                                <div class="help-block error-carer_other_duties"></div>
                                                            </div>
                                                            <div class="col-sm-12" id="other_duties_cont" style="display: none;">
                                                                <label for="usr" class="nw-label-5">Mention your other duties</label>
                                                                <div class="form-group">
                                                                    <input type="text" name="LoggingJobsMaster[duties_other_option]" id="loggingjobsmaster-duties_other_option" class="form-control" placeholder="Mention your other duties" value="<?= $loggingJobsMaster->duties_other_option ?>"/>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mrg-55">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Carer age range</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[carer_age_range]" id="loggingjobsmaster-driver_license">
                                                                        <option value="">Select Carer Age Range</option>
                                                                        <?php foreach ($carerAgeRange as $cAgeRngOPt) : ?>
                                                                            <option value="<?= $cAgeRngOPt->id ?>" <?= ($cAgeRngOPt->id == $loggingJobsMaster->carer_age_range) ? "selected" : "" ?>><?= $cAgeRngOPt->value ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div> 
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">Years of caring experience?</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[carering_exp]" id="loggingjobsmaster-carering_exp">
                                                                        <option value="">Select One Preference</option>
                                                                        <?php foreach ($careringExpYear as $careringExpYearOPt) : ?>
                                                                            <option value="<?= $careringExpYearOPt->id ?>" <?= ($careringExpYearOPt->id == $loggingJobsMaster->carering_exp) ? "selected" : "" ?>><?= $careringExpYearOPt->value ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="row mrg-55" id="experiene_type_cont" style="display: <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(1, $loggingJobsMaster->carer_type)) ? "block" : 'none'; ?>;">
                                                            <div class="col-sm-12 col-md-12">
                                                                <label for="usr" class="nw-label-5">Type of experience</label>
                                                            </div>
                                                            <div class="clearfix">
                                                                <div class="form-group">
                                                                    <?php foreach ($careringExpType as $careringExpTypeOPt) : ?>
                                                                        <input type="hidden" name="LoggingJobsMaster[exprience_type]" id="loggingjobsmaster-exprience_type"/>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="checkbox chk-new">
                                                                                <input id="loggingjobsmaster-exprience_type_<?= $careringExpTypeOPt->id ?>" type="checkbox" name="LoggingJobsMaster[exprience_type][]" value="<?= $careringExpTypeOPt->id ?>" <?= (is_array($loggingJobsMaster->exprience_type) && (count($loggingJobsMaster->exprience_type) > 0) && in_array($careringExpTypeOPt->id, $loggingJobsMaster->exprience_type)) ? 'checked="checked"' : ''; ?>>
                                                                                <label for="loggingjobsmaster-exprience_type_<?= $careringExpTypeOPt->id ?>" class="cst-lbl-chk">
                                                                                    <?= $careringExpTypeOPt->value ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                                        <div class="row mrg-55" id="carering_exp_cont" style="display: <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(1, $loggingJobsMaster->carer_type)) ? "block" : 'none'; ?>;">
                                                            <div class="col-sm-12 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="usr" class="nw-label-5">How many children would you like to arrange care for?</label>
                                                                    <select class="form-control" name="LoggingJobsMaster[no_child_arrange_care]" id="loggingjobsmaster-no_child_arrange_care">
                                                                        <option value="">Select One Preference</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">5+</option>
                                                                    </select>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                                        <div class="row mrg-55" id="children_age_cont" style="display: <?= (is_array($loggingJobsMaster->carer_type) && (count($loggingJobsMaster->carer_type) > 0) && in_array(1, $loggingJobsMaster->carer_type)) ? "block" : 'none'; ?>;">
                                                            <div class="col-sm-12 col-md-12">
                                                                <label for="usr" class="nw-label-5">What are the children's ages?</label>
                                                            </div>
                                                            <div class="clearfix">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="LoggingJobsMaster[children_ages]" id="loggingjobsmaster-children_ages"/>
                                                                    <?php foreach ($childrenAgeMaster as $childrenAgeMasterOpt) : ?>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                                            <div class="checkbox chk-new">
                                                                                <input id="loggingjobsmaster-children_ages_<?= $childrenAgeMasterOpt->id ?>" type="checkbox" name="LoggingJobsMaster[children_ages][]" value="<?= $childrenAgeMasterOpt->id ?>" <?= (is_array($loggingJobsMaster->children_ages) && (count($loggingJobsMaster->children_ages) > 0) && in_array($childrenAgeMasterOpt->id, $loggingJobsMaster->children_ages)) ? 'checked="checked"' : ''; ?>>
                                                                                <label for="loggingjobsmaster-children_ages_<?= $childrenAgeMasterOpt->id ?>" class="cst-lbl-chk">
                                                                                    <?= $childrenAgeMasterOpt->age_range ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                    <div class="help-block"></div>
                                                                </div>
                                                            </div>                        
                                                        </div>
                                                    </div>
                                                    <div class="text-center new-btn-cent">
                                                        <a class="style-btn blue-btn" href="javascript:;" onclick="$('#logging-job-form').submit()"><span>Submit</span></a>
                                                    </div>
                                                </form>       
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- *****************Join-end****************** -->
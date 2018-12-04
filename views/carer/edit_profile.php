<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\frontend\DatepickerAsset;
use app\assets\frontend\AutocompleteAsset;
AutocompleteAsset::register($this);

DatepickerAsset::register($this);

use app\assets\frontend\ClockpickerAsset;

ClockpickerAsset::register($this);
$this->title = 'Edit Profile';
?>

<!-- *****************Join-start****************** -->
<section class="dash-main-body dash-main-body-bg-four db-mn-bdy-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        <?= Yii::$app->controller->renderPartial('@app/views/partials/left_carer.php'); ?>
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <?= Yii::$app->controller->renderPartial('@app/views/partials/carer-top-menu.php'); ?>
                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <h1 class="mn-heading"><?= $this->context->getName() ?></h1>
                                        <div class="carer-edit-prof-main">
                                            <div class="tab-area">
                                                <div class="clearfix">
                                                    <div class="col-sm-12 col-md-12 edit-no-pad">
                                                        <ul id="myTab" class="nav nav-tabs nav_tabs">
                                                            <li class="first col-sm-4 col-xs-4  active"><a href="#service-one" id="basic_tab" data-toggle="tab"><i class="fa fa-info" aria-hidden="true"></i> Basic</a></li>
                                                            <li class="first col-sm-4 col-xs-4"><a href="#service-two" id="advanced_tab" data-toggle="tab"><i class="fa fa-rocket" aria-hidden="true"></i> Advanced</a></li>
                                                            <li class="first col-sm-4 col-xs-4"><a href="#service-three" id="available_tab" data-toggle="tab"><i class="fa fa-clock-o" aria-hidden="true"></i> Availability</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="myTabContent" class="tab-content">
                                                    <div class="tab-pane fade active in" id="service-one">
                                                        <section class="product-info-cont">
                                                            <form role="form" id="carer-edit-profile-basic-form" method="POST" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="nw-label-20">Carer display name</label>
                                                                            <input type="text" name="UserMaster[display_name]" id="usermaster-display_name" class="form-control" placeholder="Carer display name" value="<?= $user->display_name ?>">
                                                                            <p class="frm-message">This is the name which will appear on your public profile</p>
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="nw-label-20">First Name</label>
                                                                            <input type="text" name="UserMaster[first_name]" id="usermaster-first_name" class="form-control" placeholder="First Name" value="<?= $user->first_name ?>"/>
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="nw-label-20">Last Name</label>
                                                                            <input type="text" name="UserMaster[last_name]" id="usermaster-last_name" class="form-control" placeholder="Last Name" value="<?= $user->last_name ?>"/>
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <p class="frm-message">Your Name, Address and email will not be displayed publicly</p>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group clearfix">
                                                                        <div class="col-sm-8">
                                                                            <div class="img-up-left-1">
                                                                                <div class="media">
                                                                                    <div class="media-left">
                                                                                        <img src="<?= $this->context->getUserProfileImage() ?>" class="media-object img-circle" id="uploaded-image" onclick="$('#usermaster-image').click()" style="vertical-align: middle;height: 120px;width: 120px;">
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <div class="grp-media-1">
                                                                                            <h1>Upload a Profile photo</h1>
                                                                                            <span id="fileselector">
                                                                                                <input class="upload-file-selector" type="file" name="UserMaster[image]" id="usermaster-image" onchange="updateProfilePicture(this)"/>
                                                                                                <label onclick="$('#usermaster-image').trigger('click');" class="btn btn-default wht-btn" for="upload-file-selector">
                                                                                                    Browse
                                                                                                </label>
                                                                                            </span>
                                                                                            <div class="help-block image-error"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                        <div class="col-sm-4">
                                                                            <div class="img-up-right-1">
                                                                                <p>Driver License/Passport</p>
                                                                                <div class="hovereffect">
                                                                                    <div class="z-text">
                                                                                        <input type="file" name="UserMaster[id_proofimage]" id="usermaster-id_proofimage" onchange="updateIDproofimage(this)">
                                                                                    </div>
                                                                                    <div class="z-img">
                                                                                        <img id="uploaded-id_proofimage" class="img-responsive" src="<?= $this->context->getUserIDProofImage() ?>" alt="" style="width:200px;height:130px;" onclick="$('#usermaster-id_proofimage').click()">
                                                                                    </div>   
                                                                                    <div class="help-block id_proofimage-error"></div> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="nw-label-20">Address</label>
                                                                            <input type="text" name="UserMaster[address]" id="usermaster-address" class="form-control" placeholder="Type Your Full Address" value="<?= $user->address ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="row">
<!--                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="text" name="UserMaster[city]" id="usermaster-city" class="form-control" placeholder="City" value="<? $user->city ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="hidden" id="autocomplete-init" value="0">
                                                                            <input type="hidden" id="usermaster-latitude" class="form-control" name="UserMaster[latitude]" value="<?=($user->latitude!='')?$user->latitude:''?>">
                                                                            <input type="hidden" id="usermaster-longitude" class="form-control" name="UserMaster[longitude]" value="<?=($user->longitude!='')?$user->longitude:''?>">
                                
                                                                            <input type="text" onkeyup="easyautocompleteInit('usermaster-zipcode')" name="UserMaster[zipcode]" id="usermaster-zipcode" class="form-control" placeholder="Postcode" value="<?= $user->zipcode ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="text" name="UserMaster[suburb]" id="usermaster-suburb" class="form-control" placeholder="Suburb" value="<?= $user->suburb ?>" readonly="true">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="row  pos-relative">
                                                                    <div class="col-sm-12">
                                                                        <label for="usr" class="nw-label-20">Date of birth</label>
                                                                    </div>
                                                                    <?php
                                                                    if ($user->dob != null) {
                                                                        $day = date('d', strtotime($user->dob));
                                                                        $month = date('m', strtotime($user->dob));
                                                                        $year = date('Y', strtotime($user->dob));
                                                                    } else {
                                                                        $day = $month = $year = 0;
                                                                    }
                                                                    ?>
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name='UserMaster[date]' id='usermaster-date'>
                                                                                <option value="">Day</option>
                                                                                <?php for ($today = 1; $today <= 31; $today++) : ?>
                                                                                    <option value='<?= $today ?>' <?= ($today == $day) ? "selected" : "" ?>><?= $today ?></option>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                            <div class="help-block error-date"></div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name='UserMaster[month]' id='usermaster-month'>
                                                                                <option value="">Month</option>
                                                                                <?php for ($crntMonth = 1; $crntMonth <= 12; $crntMonth++) : ?>
                                                                                    <option value='<?= $crntMonth ?>' <?= ($crntMonth == $month) ? "selected" : "" ?>><?= date('F', mktime(0, 0, 0, $crntMonth, 10)); ?></option>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                            <div class="help-block error-month"></div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="UserMaster[year]" id='usermaster-year'>
                                                                                <option value="">Year</option>
                                                                                <?php for ($crntYear = date("Y"); $crntYear >= 1900; $crntYear--) : ?>
                                                                                    <option value='<?= $crntYear ?>' <?= ($crntYear == $year) ? "selected" : "" ?>><?= $crntYear ?></option>
                                                                                <?php endfor; ?>
                                                                            </select>
                                                                            <div class="help-block error-year"></div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-sm-12 pos-absulute">
                                                                        <p class="frm-message-23">Your date of birth will not be displayed publicly</p>
                                                                    </div>                  
                                                                </div>
                                                                <div class="row mrg-55">
                                                                    <div class="col-sm-12">
                                                                        <div class="checkbox chk-new-2">
                                                                            <input id="age_privacy" type="checkbox" name="UserMaster[age_privacy]" value="1" <?= ($user->age_privacy == '1') ? 'checked="checked"' : ''; ?>> 
                                                                            <label for="age_privacy" class="cst-lbl-chk">
                                                                                I would prefer my age to be kept private
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block error-age_privacy"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-20">Email</label>
                                                                            <input type="text" name="UserMaster[email]" id="usermaster-email" class="form-control" placeholder="Email" value="<?= $user->email ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-20">Phone</label>
                                                                            <input type="text" name="UserMaster[phone]" id="usermaster-phone" class="form-control" placeholder="Phone number" value="<?= $user->phone ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-20">ABN</label>
                                                                            <input type="text" name="UserMaster[abn]" id="usermaster-abn" class="form-control" placeholder="ABN" value="<?= $user->abn ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row mrg-55">
                                                                    <div class="col-sm-12">
                                                                        <label for="usr" class="nw-label-5">What type of care are you able to provide?</label>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="checkbox chk-new-2">
                                                                            <input id="care1" type="checkbox" name="CarerDetails[care_type][]" value="1" <?= (is_array($carer->care_type) && (count($carer->care_type) > 0) && in_array(1, $carer->care_type)) ? 'checked="checked"' : ''; ?>> 
                                                                            <label for="care1" class="cst-lbl-chk">
                                                                                Childcare
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox chk-new-2">
                                                                            <input id="care2" type="checkbox"  name="CarerDetails[care_type][]" value="2" <?= (is_array($carer->care_type) && (count($carer->care_type) > 0) && in_array(2, $carer->care_type)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="care2" class="cst-lbl-chk">
                                                                                Aged Care
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox chk-new-2">
                                                                            <input id="care3" type="checkbox"  name="CarerDetails[care_type][]" value="3" <?= (is_array($carer->care_type) && (count($carer->care_type) > 0) && in_array(3, $carer->care_type)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="care3" class="cst-lbl-chk">
                                                                                Disability Care
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block error-care_type"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Your native language(s)</label>
                                                                            <select class="form-control select2-multiple" name="CarerDetails[native_language][]" id="carerdetails-native_language">
                                                                                <?php if (isset($all_languages) && count($all_languages) > 0) : ?>
                                                                                    <?php foreach ($all_languages as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->native_language)) ? "selected" : "" ?>><?= $v->name ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-native_language"></div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Your other language(s)</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="CarerDetails[other_language][]" id="carerdetails-other_language">
                                                                                <?php if (isset($all_languages) && count($all_languages) > 0) : ?>
                                                                                    <?php foreach ($all_languages as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->other_language)) ? "selected" : "" ?>><?= $v->name ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-other_language"></div>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                                <div class="text-center">
                                                                    <div class="text-center new-btn-cent">
                                                                        <a class="style-btn blue-btn" href="javascript:;" onclick="$('#carer-edit-profile-basic-form').submit()"><span>Next</span></a>
                                                                        <!--<a href="#" class="btn btn-all">Next</a>-->
                                                                    </div>
                                                                </div>
                                                            </form>       

                                                        </section>
                                                    </div>
                                                    <div class="tab-pane fade" id="service-two">
                                                        <section class="product-info-cont">
                                                            <form role="form" id="carer-edit-profile-advanced-form" method="POST" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What best describes the jobs you are looking for?</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="CarerDetails[job_type][]" id="carerdetails-job_type">
                                                                                <?php if (isset($all_job_descriptions) && count($all_job_descriptions) > 0) : ?>
                                                                                    <?php foreach ($all_job_descriptions as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->job_type)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-job_type"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What qualifications and certifications do you have?</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="CarerDetails[certifications][]" id="carerdetails-certifications">
                                                                                <?php if (isset($all_qualifications) && count($all_qualifications) > 0) : ?>
                                                                                    <?php foreach ($all_qualifications as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->certifications)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-certifications"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row other_qualification" style="display:<?= (in_array(14, $carer->certifications)) ? "block" : "none" ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Other certifications</label>
                                                                            <input type="text" name="CarerDetails[other_certifications]" id="carerdetails-other_certifications" class="form-control" placeholder="Other certifications" value="<?= $carer->other_certifications ?>">
                                                                            <div class="help-block error-other_certifications"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What is the maximum number of people you are willing to care for?</label>
                                                                            <select class="form-control cst-frm-control-5" name="CarerDetails[number_care]">
                                                                                <option value="">Select</option>
                                                                                <option value="1" <?= ($carer->number_care == 1) ? "selected" : "" ?>>1</option>
                                                                                <option value="2" <?= ($carer->number_care == 2) ? "selected" : "" ?>>2</option>
                                                                                <option value="3" <?= ($carer->number_care == 3) ? "selected" : "" ?>>3</option>
                                                                                <option value="4" <?= ($carer->number_care == 4) ? "selected" : "" ?>>4</option>
                                                                                <option value="6" <?= ($carer->number_care == 6) ? "selected" : "" ?>>5+</option> <!--more than 5 thats why value is 6 -->
                                                                            </select>
                                                                            <div class="help-block error-number_care"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">How many years of caring experience do you have?</label>
                                                                            <select class="form-control cst-frm-control-5" name="CarerDetails[caring_experience]">
                                                                                <option value="0" <?= ($carer->caring_experience == 0) ? "selected" : "" ?>>0</option>
                                                                                <option value="1" <?= ($carer->caring_experience == 1) ? "selected" : "" ?>>1</option>
                                                                                <option value="2" <?= ($carer->caring_experience == 2) ? "selected" : "" ?>>2</option>
                                                                                <option value="3" <?= ($carer->caring_experience == 3) ? "selected" : "" ?>>3</option>
                                                                                <option value="4" <?= ($carer->caring_experience == 4) ? "selected" : "" ?>>4</option>
                                                                                <option value="6" <?= ($carer->caring_experience == 6) ? "selected" : "" ?>>5+</option> <!--more than 5 thats why value is 6 -->
                                                                            </select>
                                                                            <div class="help-block error-caring_experience"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What type of caring experience do you have?</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="CarerDetails[type_of_experience][]" id="carerdetails-type_of_experience">
                                                                                <?php if (isset($all_caring_exp_type) && count($all_caring_exp_type) > 0) : ?>
                                                                                    <?php foreach ($all_caring_exp_type as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->type_of_experience)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-type_of_experience"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row adv_childcare" style="display: <?= (is_array($carer->care_type) && (count($carer->care_type) > 0) && in_array(1, $carer->care_type)) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5" data-toggle="tooltip" data-placement="right" title="Nothing beats real life experience, many parents prefer carers who are parents 
                                                                                   themselves">Do you have any children of your own?</label>
                                                                            <select class="form-control cst-frm-control-5" name="CarerDetails[parent_status]">
                                                                                <option value="0" <?= ($carer->parent_status == 0) ? "selected" : "" ?>>No</option>
                                                                                <option value="1" <?= ($carer->parent_status == 1) ? "selected" : "" ?>>Yes</option>
                                                                            </select>
                                                                            <div class="help-block error-parent_status"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row  adv_childcare" style="display: <?= (is_array($carer->care_type) && (count($carer->care_type) > 0) && in_array(1, $carer->care_type)) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Would you like to take your children with you to jobs?</label>
                                                                            <select class="form-control cst-frm-control-5" name="CarerDetails[take_children]">
                                                                                <option value="0" <?= ($carer->take_children == 0) ? "selected" : "" ?>>No</option>
                                                                                <option value="1" <?= ($carer->take_children == 1) ? "selected" : "" ?>>Yes</option>
                                                                            </select>
                                                                            <div class="help-block error-take_children"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Are you able to undertake any other duties?</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="CarerDetails[other_task][]" id="carerdetails-other_task">
                                                                                <?php if (isset($all_other_duties) && count($all_other_duties) > 0) : ?>
                                                                                    <?php foreach ($all_other_duties as $v) : ?>
                                                                                        <?php
                                                                                        if ($v->value != 'Other') {
                                                                                            ?>
                                                                                            <option value="<?= $v->id ?>" <?= (in_array($v->id, $carer->other_task)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                        <?php }endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-other_task"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">About you</label>
                                                                            <textarea name="CarerDetails[description]" placeholder="Please write a brief description of yourself and what you are looking for below, so that we can match you with the right family." class="form-control cst-txt-box" rows="6"><?= $carer->description ?></textarea>
                                                                            <div class="help-block error-description"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="text-center new-btn-cent">
                                                                    <a class="style-btn blue-btn" href="javascript:;" onclick="$('#carer-edit-profile-advanced-form').submit()"><span>Next</span></a>

                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                    <div class="tab-pane fade" id="service-three">
                                                        <section class="product-info-cont">
                                                            <form role="form" id="carer-edit-profile-availablity-form" method="POST" enctype="multipart/form-data">
                                                                <div class="row mrg-55">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <label for="usr" class="nw-label-5">Are you currently looking for jobs?</label>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="radio ">
                                                                                        <input type="radio" id="carerdetails_is_looking_found_0" name="CarerDetails[is_looking_found]" value="0" <?= ($carer->is_looking_found == 0) ? 'checked="checked"' : ''; ?> value="0">
                                                                                        <label for="carerdetails_is_looking_found_0">
                                                                                            I am currently looking for work
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12">
                                                                                    <div class="radio ">
                                                                                        <input type="radio" id="carerdetails_is_looking_found_1" name="CarerDetails[is_looking_found]" value="1" <?= ($carer->is_looking_found == 1) ? 'checked="checked"' : ''; ?> value="1">
                                                                                        <label for="carerdetails_is_looking_found_1">
                                                                                            I have found work as a carer and currently not looking for more jobs
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="help-block error-is_looking_found"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="third-day">
                                                                    <div class="row">
                                                                        <div class="col-md-10 col-sm-12">
                                                                            <div class="third-step">
                                                                                <h1>What day and time are you available?</h1>
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
                                                                                        <?php
                                                                                        $day_master = \app\models\DayMaster::find()->where(['status' => 1])->all();
                                                                                        if (count($day_master) > 0) {
                                                                                            foreach ($day_master as $key => $value) {
                                                                                                $v = $get_time = app\models\AvailableTime::find()->where(['user_id' => $user->id, 'day_master_id' => $value->id])->one();
                                                                                                ?>
                                                                                                <div class="table-cstt-line clearfix">
                                                                                                    <div class="clearfix">
                                                                                                        <div class="col-md-4 col-sm-2 col-xs-4">
                                                                                                            <div class="checkbox chk-new">
                                                                                                                <input <?= (count($v) > 0 && $v->status == 1) ? 'checked' : '' ?> class="day_master_id" id="day_master_id_<?= $value->id ?>" name="DayMaster[id][<?= $value->id ?>]" type="checkbox" value="<?= $value->id ?>" onchange="daymastercheckboxclick(this)">
                                                                                                                <label for="day_master_id_<?= $value->id ?>" class="cst-lbl-chk">
                                                                                                                    <?= $value->name ?>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-8 col-sm-10 col-xs-8">
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
                                                                                                    </div>
                                                                                                    <div id="error_<?= $value->id ?>" class="help-block" style="padding: 0 15px;"></div>
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                        }
                                                                                        ?>
                                                                                        <div id="no_checkbox_error_div" class="help-block" style="padding: 0 15px;"></div>
                                                                                        <!--                                                                                    <div class="table-cstt-line clearfix">
                                                                                                                                                                                <div class="col-sm-4">
                                                                                                                                                                                    <div class="checkbox chk-new">
                                                                                                                                                                                        <input id="checkbox10" type="checkbox">
                                                                                                                                                                                        <label for="checkbox10" class="cst-lbl-chk">
                                                                                                                                                                                            Monday
                                                                                                                                                                                        </label>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                                <div class="col-sm-8">
                                                                                                                                                                                    <div class="text-right-cast">
                                                                                                                                                                                        <div class="checkbox chk-new">
                                                                                                                                                                                            <input id="checkbox11" type="checkbox">
                                                                                                                                                                                            <label for="checkbox11" class="cst-lbl-chk">
                                                                                                                                                                                                All Day
                                                                                                                                                                                            </label>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <input type="text" class="form-control cst-frm-control-8" placeholder="Start time">
                                                                                                                                                                                        <input type="text" class="form-control cst-frm-control-9" placeholder="End time">
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>-->

                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-center new-btn-cent">
                                                                                    <a class="style-btn blue-btn" href="javascript:;" onclick="$('#carer-edit-profile-availablity-form').submit()"><span>Save</span></a>
                                                                                    <!--<a href="#" class="btn btn-all">Next</a>-->
                                                                                </div>
                                                                                <!--<a href="#" class="btn btn-all">Submit</a>-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
            </div>
        </div>
    </div>
</section>
<!-- *****************Join-end****************** -->
<script>
    function easyautocompleteInit(id) {
        $('#usermaster-suburb').val('');
    var csrfToken = '<?= Yii::$app->request->csrfToken ?>';
    var options1 = {
            url: function (phrase1) {
                return full_path + 'site/autosuggestion';
            },
            getValue: function (element) {
                $("#eac-container-" + id).show();
                return element.name;
            },
            ajaxSettings: {
                headers: {'X-CSRF-TOKEN': csrfToken},
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },
            preparePostData: function (data) {
                data.phrase1 = $("#" + id).val();
                return data;
            },
            template: {
                type: "custom",
                method: function (value, item) {
                        return '<table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td width="100%"><p><span class="ss-result-title" data-type="countries" data-id="' + item.postcode + '">' + value + '</span></p></td></tr></tbody></table>';
                }
            },
            requestDelay: 1000,
            list: {
                onMouseOverEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                },
                onSelectItemEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.postcode);
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-suburb').val(result.suburb);
                },
                onChooseEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.postcode);
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-suburb').val(result.suburb);
                        $('#usermaster-suburb').focus();
                }
            }
        };
 var autoval=$('#autocomplete-init').val();
 if(autoval==0){
     $('#autocomplete-init').val('1');
    $("#" + id).easyAutocomplete(options1); 
    $("#" + id).focus(); 
 }
     }
    function initMap() {
    }
//    $('#usermaster-address').keyup(function () {
//        var input = document.getElementById('usermaster-address');
//        var autocomplete = new google.maps.places.Autocomplete(input);
//        autocomplete.addListener('place_changed', function () {
//            var place = autocomplete.getPlace();
//            $("#usermaster-latitude").val(place.geometry.location.lat());
//            $("#usermaster-longitude").val(place.geometry.location.lng());
//        })
//    });
//    function initMap() {
//        var input = document.getElementById('usermaster-address');
//        var autocomplete = new google.maps.places.Autocomplete(input);
//        autocomplete.addListener('place_changed', function () {
//            var place = autocomplete.getPlace();
//            $("#usermaster-latitude").val(place.geometry.location.lat());
//            $("#usermaster-longitude").val(place.geometry.location.lng());
//        })
//    }
//    $('#usermaster-zipcode').keyup(function () {
//        var geocoder = new google.maps.Geocoder();
//        var zipcode = $('#usermaster-zipcode').val();
//        var lat = '';
//        var lng = '';
//        var address = zipcode;
//        geocoder.geocode({'address': address}, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                lat = results[0].geometry.location.lat();
//                lng = results[0].geometry.location.lng();
//                $('#usermaster-latitude').val(lat);
//                $('#usermaster-longitude').val(lng);
//            } else {
//                console.log("Geocode was not successful for the following reason: " + status);
//                $('#usermaster-latitude').val('');
//                $('#usermaster-longitude').val('');
//            }
//        });
//    });
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>-->
<script>
    $(function ()
    {
        $(".datepicker").datepicker({
            autoclose: true,
            dateFormat: 'mm/dd/yy'
        });
    });
</script>

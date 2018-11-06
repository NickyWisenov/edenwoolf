<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\frontend\ClockpickerAsset;
use app\assets\frontend\AutocompleteAsset;
AutocompleteAsset::register($this);

ClockpickerAsset::register($this);
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .help-block{
        color: #a94442;
    }
    .select2-container.select2-container--bootstrap{
        width:100% !important;
        display: block !important;
    }
    .noDisplay{display: none;}

    .btn.remove{
        background-color: #bb0f00 !important;
    }
    .btn.remove:hover {
        background-color: #FFF !important;
        border-color: #bb0f00 !important;
        color: #bb0f00 !important;
    }
    .admin-btn-submit{
            margin: 0 auto;
    display: inline-block;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase"><?= Html::encode($this->title) ?></span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#service-one" id="family_info_tab" data-toggle="tab">Family info</a>
                                </li>
                                <li class="">
                                    <a href="#service-two" id="care_info_tab" data-toggle="tab">Care info</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="service-one">
                                        <section class="product-info-cont">
                                        <form role="form" id="family-info-form" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="UserMaster[id]" id="usermaster-id" class="form-control" placeholder="id" value="<?= $user->id ?>"/>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="nw-label-20">Family Display Name</label>
                                                                            <input type="text" name="UserMaster[display_name]" id="usermaster-display_name" class="form-control" placeholder="Family Display name" value="<?= $user->display_name ?>"/>
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
                                                                        <div class="col-md-8 col-sm-12">
                                                                            <div class="img-up-left-1">
                                                                                <div class="media">
                                                                                    <div class="media-left">
                                                                                        <img src="<?= $this->context->getUserProfileImage($user->id) ?>" class="media-object img-circle" id="uploaded-image" onclick="$('#usermaster-image').click()" style="vertical-align: middle;height: 120px;width: 120px;">
                                                                                    </div>
                                                                                    <div class="media-body">
                                                                                        <div class="grp-media-1">
                                                                                            <h1>Upload a Profile photo</h1>
                                                                                            <span id="fileselector">
                                                                                                <input class="upload-file-selector" type="file" name="UserMaster[image]" id="usermaster-image" onchange="updateProfilePicture(this)" style="display:none;">
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
                                                                            <input type="text" name="UserMaster[city]" id="usermaster-city" class="form-control" placeholder="Suburb/Town" value="<? $user->city ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> -->
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <input type="hidden" id="autocomplete-init" value="0">
                                                                            <input type="hidden" id="usermaster-latitude" class="form-control" name="UserMaster[latitude]" value="<?=($user->latitude!='')?$user->latitude:''?>">
                                                                            <input type="hidden" id="usermaster-longitude" class="form-control" name="UserMaster[longitude]" value="<?=($user->longitude!='')?$user->longitude:''?>">
                                                
                                                                            <input type="text" name="UserMaster[zipcode]" onkeyup="easyautocompleteInit('usermaster-zipcode')" id="usermaster-zipcode" class="form-control" placeholder="Postcode" value="<?= $user->zipcode ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div> 
                                                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" name="UserMaster[suburb]" id="usermaster-suburb" class="form-control" placeholder="Suburb/Town" value="<?= $user->suburb ?>" readonly="true">
                                                <div class="help-block"></div>
                                            </div> 
                                        </div>
                                                                </div>
                                            
                                                                <!--                                                                <div class="row pos-relative">
                                                                                                                                    <div class="col-sm-12">
                                                                                                                                        <label for="usr" class="nw-label-20">Date of birth</label>
                                                                                                                                    </div>
                                                                <?php
//                                                                    if ($user->dob != null) {
//                                                                        $day = date('d', strtotime($user->dob));
//                                                                        $month = date('m', strtotime($user->dob));
//                                                                        $year = date('Y', strtotime($user->dob));
//                                                                    } else {
//                                                                        $day = $month = $year = 0;
//                                                                    }
                                                                ?>
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <select class="form-control" name='UserMaster[date]' id='usermaster-date'>
                                                                                                                                                <option value="">Day</option>
                                                                <?php // for ($today = 1; $today <= 31; $today++) :  ?>
                                                                                                                                                    <option value='<?php // $today            ?>' <?php // ($today == $day) ? "selected" : ""            ?>><?php // $today            ?></option>
                                                                <?php // endfor;  ?>
                                                                                                                                            </select>
                                                                                                                                            <div class="help-block error-date"></div>
                                                                                                                                        </div>
                                                                                                                                    </div>  
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <select class="form-control" name='UserMaster[month]' id='usermaster-month'>
                                                                                                                                                <option value="">Month</option>
                                                                <?php // for ($crntMonth = 1; $crntMonth <= 12; $crntMonth++) :  ?>
                                                                                                                                                    <option value='<?php // $crntMonth            ?>' <?php // ($crntMonth == $month) ? "selected" : ""            ?>><?php // date('F', mktime(0, 0, 0, $crntMonth, 10))            ?></option>
                                                                <?php // endfor;  ?>
                                                                                                                                            </select>
                                                                                                                                            <div class="help-block error-month"></div>
                                                                                                                                        </div>
                                                                                                                                    </div>  
                                                                                                                                    <div class="col-sm-4">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <select class="form-control" name="UserMaster[year]" id='usermaster-year'>
                                                                                                                                                <option value="">Year</option>
                                                                <?php // for ($crntYear = date("Y"); $crntYear >= 1947; $crntYear--) :  ?>
                                                                                                                                                    <option value='<?php // $crntYear            ?>' <?php // ($crntYear == $year) ? "selected" : ""            ?>><?php // $crntYear            ?></option>
                                                                <?php // endfor;  ?>
                                                                                                                                            </select>
                                                                                                                                            <div class="help-block error-year"></div>
                                                                                                                                        </div>
                                                                                                                                    </div>  
                                                                                                                                    <div class="col-sm-12 pos-absulute">
                                                                                                                                        <p class="frm-message-23">Your date of birth will not be displayed publicly</p>
                                                                                                                                    </div>
                                                                                                                                </div>-->
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
                                                                            <input type="text" name="UserMaster[phone]" id="usermaster-phone" class="form-control" placeholder="Phone Number" value="<?= $user->phone ?>">
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>


                                                                <div id="care_persons_container">
                                                                    <?php
                                                                    if (count($family_care_person) > 0) {
                                                                        foreach ($family_care_person as $key => $value) {
                                                                            ?>
                                                                            <div id="care_persons_list_<?= $key ?>">
                                                                                <div class="row">
                                                                                    <div class="col-md-10 col-sm-8">
                                                                                        <div class="form-group">
                                                                                            <label for="usr" class="nw-label-5">Please provide the details of the person(s) in need of care</label>
                                                                                            <input type="text" class="form-control" name="FamilyCarePerson[name][<?= $key ?>]" id="familycareperson-name_<?= $key ?>" placeholder="Name of person in need of care" autocomplete="off" value="<?= $value->name ?>">
                                                                                        </div>
                                                                                    </div>  
                                                                                    <div class="col-md-2 col-sm-4 pad-left-none nw-cls-15 hidden-xs">
                                                                                        <a href="javascript:;" id="addnewcarepersion_<?= $key ?>" onclick="addnewcarepersion(this)" data-totalperson="<?= $key ?>" class="btn btn-2 btn-all <?= (count($family_care_person) == $key + 1) ? : 'noDisplay' ?>">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                                        <a href="javascript:;" id="removecarepersion_<?= $key ?>" onclick="removecarepersion(this)" data-totalperson="<?= $key ?>" class="btn btn-2 btn-all remove <?= (count($family_care_person) == $key + 1) ? 'noDisplay' : '' ?>">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-10">
                                                                                        <div class="form-group">
                                                                                            <label for="usr" class="nw-label-5">Description of Person in need of care</label>
                                                                                            <select class="form-control selectNeedCare" name="FamilyCarePerson[need_care][<?= $key ?>]" id="familycareperson-need_care_<?= $key ?>">
                                                                                                <option value="">Select Person in need of care</option>
                                                                                                <?php foreach ($caringExperienceType as $v) : ?>
                                                                                                    <option value="<?= $v->id ?>" <?= ($v->id == $value->need_care) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                                <?php endforeach; ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>                        
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-10">
                                                                                        <div class="form-group">
                                                                                            <label for="usr" class="nw-label-5">Needs and requirements</label>
                                                                                            <input type="text" name="FamilyCarePerson[description][<?= $key ?>]" id="familycareperson-description_<?= $key ?>" class="form-control" placeholder="Please describe needs and requirements, including disabilities, special needs, allergies or illnesses" value="<?= $value->description ?>">
                                                                                        </div>
                                                                                    </div>                        
                                                                                </div>
                                                                                <!--                                                                                <div class="row">
                                                                                                                                                                    <div class="col-sm-10">
                                                                                                                                                                        <label for="usr" class="nw-label-5">Date of Birth</label>
                                                                                                                                                                        <div class="row">
                                                                                <?php
//                                                                                            if ($user->dob != null) {
//                                                                                                $day = date('d', strtotime($value->dob));
//                                                                                                $month = date('m', strtotime($value->dob));
//                                                                                                $year = date('Y', strtotime($value->dob));
//                                                                                            } else {
//                                                                                                $day = $month = $year = 0;
//                                                                                            }
                                                                                ?>
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                    <select class="form-control selectDay" name='FamilyCarePerson[date][<?= $key ?>]' id='familycareperson-date_<?php // $key      ?>'>
                                                                                                                                                                                        <option value="">Day</option>
                                                                                <?php // for ($today = 1; $today <= 31; $today++) :  ?>
                                                                                                                                                                                            <option value='<?php // $today     ?>' <?php // ($today == $day) ? "selected" : ""     ?>><?php // $today     ?></option>
                                                                                <?php // endfor;  ?>
                                                                                                                                                                                    </select>
                                                                                                                                                                                    <div class="help-block error-date"></div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>  
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                    <select class="form-control selectMonth" name='FamilyCarePerson[month][<?php // $key      ?>]' id='familycareperson-month_<?php // $key      ?>'>
                                                                                                                                                                                        <option value="">Month</option>
                                                                                <?php // for ($crntMonth = 1; $crntMonth <= 12; $crntMonth++) :  ?>
                                                                                                                                                                                            <option value='<?php // $crntMonth     ?>' <?php // ($crntMonth == $month) ? "selected" : ""     ?>><?php // date('F', mktime(0, 0, 0, $crntMonth, 10))     ?></option>
                                                                                <?php // endfor;  ?>
                                                                                                                                                                                    </select>
                                                                                                                                                                                    <div class="help-block error-month"></div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>  
                                                                                                                                                                            <div class="col-sm-4">
                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                    <select class="form-control selectYear" name="FamilyCarePerson[year][<?php // $key      ?>]" id='familycareperson-year_<?php // $key      ?>'>
                                                                                                                                                                                        <option value="">Year</option>
                                                                                <?php // for ($crntYear = date("Y"); $crntYear >= 1947; $crntYear--) :  ?>
                                                                                                                                                                                            <option value='<?php // $crntYear     ?>' <?php // ($crntYear == $year) ? "selected" : ""     ?>><?php // $crntYear     ?></option>
                                                                                <?php // endfor;  ?>
                                                                                                                                                                                    </select>
                                                                                                                                                                                    <div class="help-block error-year"></div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div> 
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="help-block" id="family_person_dob_err_msg_<?php // $key      ?>"></div>
                                                                                                                                                                                                                <div class="form-group">
                                                                                                                                                                                                                <input type="text" name="FamilyCarePerson[dob][<?php // $key      ?>]" id="familycareperson-dob_<?php // $key      ?>" class="form-control datepicker" placeholder="Date of birth of person in need of care" autocomplete="off" value="<?php // date('m/d/Y', strtotime($value->dob))      ?>">
                                                                                                                                                                                                                </div>
                                                                                                                                                                    </div>                        
                                                                                                                                                                </div>-->
                                                                                <div class="help-block error-familycareperson-0"></div>
                                                                                <div class="col-md-2 col-sm-4 pad-left-none nw-cls-15 hidden-sm hidden-md hidden-lg">
                                                                                    <a href="javascript:;" id="mob-addnewcarepersion_<?= $key ?>" onclick="addnewcarepersion(this)" data-totalperson="<?= $key ?>" class="btn btn-2 btn-all <?= (count($family_care_person) == $key + 1) ? : 'noDisplay' ?>">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                                    <a href="javascript:;" id="mob-removecarepersion_<?= $key ?>" onclick="removecarepersion(this)" data-totalperson="<?= $key ?>" class="btn btn-2 btn-all remove <?= (count($family_care_person) == $key + 1) ? 'noDisplay' : '' ?>">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <div id="care_persons_list_0">
                                                                            <div class="row">
                                                                                <div class="col-md-10 col-sm-8">
                                                                                    <div class="form-group">
                                                                                        <label for="usr" class="nw-label-5">Please provide the details of the person(s) in need of care</label>
                                                                                        <input type="text" class="form-control" name="FamilyCarePerson[name][0]" id="familycareperson-name_0" placeholder="Name of person in need of care" autocomplete="off">
                                                                                    </div>
                                                                                </div>  
                                                                                <div class="col-md-2 col-sm-4nw-cls-15 nw-cls-15 pad-left-none hidden-xs">
                                                                                    <a href="javascript:;" id="addnewcarepersion_0" onclick="addnewcarepersion(this)" data-totalperson="0" class="btn btn-2 btn-all">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                                    <a href="javascript:;" id="removecarepersion_0" onclick="removecarepersion(this)" data-totalperson="0" class="btn btn-2 btn-all remove noDisplay">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-10">
                                                                                    <div class="form-group">
                                                                                        <label for="usr" class="nw-label-5">Description of Person in need of care</label>
                                                                                        <select class="form-control selectNeedCare" name="FamilyCarePerson[need_care][0]" id="familycareperson-need_care_0">
                                                                                            <option value="">Select Person in need of care</option>
                                                                                            <?php foreach ($caringExperienceType as $v) : ?>
                                                                                                <option value="<?= $v->id ?>"><?= $v->value ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>                        
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-10">
                                                                                    <div class="form-group">
                                                                                        <label for="usr" class="nw-label-5">Needs and requirements</label>
                                                                                        <input type="text" name="FamilyCarePerson[description][0]" id="familycareperson-description_0" class="form-control" placeholder="Please describe needs and requirements, including disabilities, special needs, allergies or illnesses">
                                                                                    </div>
                                                                                </div>                        
                                                                            </div>
                                                                            <!--                                                                            <div class="row">
                                                                                                                                                            <div class="col-sm-10">
                                                                                                                                                                <label for="usr" class="nw-label-5">Date of Birth</label>
                                                                                                                                                                <div class="row">
                                                                            <?php
//                                                                                        $day = $month = $year = 0;
                                                                            ?>
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                            <select class="form-control selectDay" name='FamilyCarePerson[date][0]' id='familycareperson-date_0'>
                                                                                                                                                                                <option value="">Day</option>
                                                                            <?php // for ($today = 1; $today <= 31; $today++) :  ?>
                                                                                                                                                                                    <option value='<?php // $today    ?>' <?php // ($today == $day) ? "selected" : ""    ?>><?php // $today    ?></option>
                                                                            <?php // endfor;  ?>
                                                                                                                                                                            </select>
                                                                                                                                                                            <div class="help-block error-date"></div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>  
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                            <select class="form-control selectMonth" name='FamilyCarePerson[month][0]' id='familycareperson-month_0'>
                                                                                                                                                                                <option value="">Month</option>
                                                                            <?php // for ($crntMonth = 1; $crntMonth <= 12; $crntMonth++) :  ?>
                                                                                                                                                                                    <option value='<?php // $crntMonth    ?>' <?php // ($crntMonth == $month) ? "selected" : ""    ?>><?php // date('F', mktime(0, 0, 0, $crntMonth, 10))    ?></option>
                                                                            <?php // endfor;  ?>
                                                                                                                                                                            </select>
                                                                                                                                                                            <div class="help-block error-month"></div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>  
                                                                                                                                                                    <div class="col-sm-4">
                                                                                                                                                                        <div class="form-group">
                                                                                                                                                                            <select class="form-control selectYear" name="FamilyCarePerson[year][0]" id='familycareperson-year_0'>
                                                                                                                                                                                <option value="">Year</option>
                                                                            <?php // for ($crntYear = date("Y"); $crntYear >= 1947; $crntYear--) :  ?>
                                                                                                                                                                                    <option value='<?php // $crntYear    ?>' <?php // ($crntYear == $year) ? "selected" : ""    ?>><?php // $crntYear    ?></option>
                                                                            <?php // endfor;  ?>
                                                                                                                                                                            </select>
                                                                                                                                                                            <div class="help-block error-year"></div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div> 
                                                                                                                                                                </div>
                                                                                                                                                                <div class="help-block" id="family_person_dob_err_msg_0"></div>
                                                                                                                                                                                                            <div class="form-group">
                                                                                                                                                                                                            <input type="text" name="FamilyCarePerson[dob][0]" id="familycareperson-dob_0" class="form-control datepicker" placeholder="Date of birth of person in need of care" autocomplete="off">
                                                                                                                                                                                                            </div>
                                                                                                                                                            </div>                        
                                                                                                                                                        </div>-->
                                                                            <div class="help-block error-familycareperson-0"></div>
                                                                            <div class="col-md-2 col-sm-4nw-cls-15 nw-cls-15 pad-left-none hidden-sm hidden-md hidden-lg">
                                                                                <a href="javascript:;" id="mob-addnewcarepersion_0" onclick="addnewcarepersion(this)" data-totalperson="0" class="btn btn-2 btn-all">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                                <a href="javascript:;" id="mob-removecarepersion_0" onclick="removecarepersion(this)" data-totalperson="0" class="btn btn-2 btn-all remove noDisplay">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
<!--                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-all">Save</button>
                                                                    <a href="#" class="btn btn-all">Next</a>
                                                                </div>-->
<div class="form-actions">
                                            <div class="row">
                                                <div class="text-center">
                                                <div class="admin-btn-submit">
                                                    <?= Html::submitButton($user->isNewRecord ? 'Create' : 'Next', ['class' => 'btn green']) ?>
                                                    <?php
                                                    if ($user->isNewRecord) {
                                                        ?>
                                                        <a href="<?= Url::to(['family/index']); ?>" class="btn default">Back</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="<?= Url::to(['family/view', 'id' => $user->id]); ?>" class="btn default">Back</a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                                            </form> 
                                        </section>
                                        
                                </div>
                                <div class="tab-pane" id="service-two">
                                    <form role="form" id="care-info-form" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="UserMaster[id]" id="usermaster-id" class="form-control" placeholder="id" value="<?= $user->id ?>"/>
                                                                <div class="row mrg-55">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <label for="usr" class="nw-label-5">Are you currently looking for a carer?</label>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="row">
                                                                                <div class="col-sm-12" style="margin-left: 20px;">
                                                                                    <div class="radio ">
                                                                                        <input type="radio" id="familydetails_is_looking_found_0" name="FamilyDetails[is_looking_found]" value="0" <?= ($family->is_looking_found == 0) ? 'checked="checked"' : ''; ?> value="0">
                                                                                        <label for="familydetails_is_looking_found_0">
                                                                                            I am currently looking for a carer
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-12" style="margin-left: 20px;">
                                                                                    <div class="radio ">
                                                                                        <input type="radio" id="familydetails_is_looking_found_1" name="FamilyDetails[is_looking_found]" value="1" <?= ($family->is_looking_found == 1) ? 'checked="checked"' : ''; ?> value="1">
                                                                                        <label for="familydetails_is_looking_found_1">
                                                                                            I have successfully found a carer
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="help-block error-is_looking_found"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="third-step">
                                                                    <h2>On which days do you need care</h2>
                                                                    <div class="custom-table">
                                                        <div class="custom-table-top clearfix">
                                                            <div class="col-sm-6">
                                                                <h3>Select day</h3>
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
                                                                        <div class="col-sm-4">
                                                                            <div class="checkbox chk-new">
                                                                                <input <?= (count($v)>0 && $v->status == 1) ? 'checked' : '' ?> class="day_master_id" id="day_master_id_<?= $value->id ?>" name="DayMaster[id][<?= $value->id ?>]" type="checkbox" value="<?= $value->id ?>" onchange="daymastercheckboxclick(this)">
                                                                                <label for="day_master_id_<?= $value->id ?>" class="cst-lbl-chk">
                                                                                    <?= $value->name ?>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="row">
                                                                                <div class="form-group clearfix">
                                                                                    <div class="col-md-2">
                                                                                        <div class="checkbox chk-new">
                                                                                            <input <?= (count($v)>0 && $v->all_day == 1 && $v->status == 1) ? 'checked' : '' ?> id="day_master_all_day_<?= $value->id ?>" name="DayMaster[all_day][<?= $value->id ?>]" type="checkbox" value="<?= $value->id ?>" onchange="alldaycheckboxclick(this)">
                                                                                            <label for="day_master_all_day_<?= $value->id ?>" class="cst-lbl-chk">
                                                                                                All Day
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control cst-frm-control-8 clockpicker" placeholder="Start time" id="day_master_start_time_<?= $value->id ?>" name="DayMaster[start_time][<?= $value->id ?>]" value="<?= (isset($v->start_time) && $v->start_time != '' && $v->status == 1) ? date('h:i A', strtotime($v->start_time)) : '' ?>">
                                                                                    </div>
                                                                                    <div class="col-md-5">
                                                                                        <input type="text" class="form-control cst-frm-control-9 clockpicker" placeholder="End time" id="day_master_end_time_<?= $value->id ?>" name="DayMaster[end_time][<?= $value->id ?>]" value="<?= (isset($v->end_time) && $v->end_time != '' && $v->status == 1) ? date('h:i A', strtotime($v->end_time)) : '' ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="error_<?= $value->id ?>" class="help-block clearfix" style="padding: 0 15px;"></div>
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
                                                                </div>
                                        
                                        
                                        
                                        
                                        
                                                                <div class="row mrg-55">
                                                                    <div class="col-sm-12">
                                                                        <label for="usr" class="nw-label-5">What type of care do you need?</label>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="col-sm-3">
                                                                            <input id="familydetails-care_needed_1" onclick="checkVisiblePrntChild(this)" type="checkbox" name="FamilyDetails[care_needed][]" value="1" <?= (is_array($family->care_needed) && (count($family->care_needed) > 0) && in_array(1, $family->care_needed)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="familydetails-care_needed_1" class="cst-lbl-chk">
                                                                                Childcare
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input id="familydetails-care_needed_2" type="checkbox" name="FamilyDetails[care_needed][]" value="2" <?= (is_array($family->care_needed) && (count($family->care_needed) > 0) && in_array(2, $family->care_needed)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="familydetails-care_needed_2" class="cst-lbl-chk">
                                                                                Aged care
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <input id="familydetails-care_needed_3" type="checkbox" name="FamilyDetails[care_needed][]" value="3" <?= (is_array($family->care_needed) && (count($family->care_needed) > 0) && in_array(3, $family->care_needed)) ? 'checked="checked"' : ''; ?> onchange="openDisablityCareContent(this)">
                                                                            <label for="familydetails-care_needed_3" class="cst-lbl-chk">
                                                                                Disability care
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block error-care_needed"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mrg-55 type_dis" id="family_disability_cont" style="display: <?= (is_array($family->care_needed) && (count($family->care_needed) > 0) && in_array(3, $family->care_needed)) ? 'block' : 'none'; ?>;">
                                                                    <div class="col-sm-12">
                                                                        <label for="usr" class="nw-label-5">Type of disability</label>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="checkbox chk-new">
                                                                            <input id="familydetails-disability_type_1" name="FamilyDetails[disability_type][]" type="checkbox" value="1" <?= (is_array($family->disability_type) && (count($family->disability_type) > 0) && in_array(1, $family->disability_type)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="familydetails-disability_type_1" class="cst-lbl-chk">
                                                                                Physical
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox chk-new">
                                                                            <input id="familydetails-disability_type_2" name="FamilyDetails[disability_type][]" type="checkbox" value="2" <?= (is_array($family->disability_type) && (count($family->disability_type) > 0) && in_array(2, $family->disability_type)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="familydetails-disability_type_2" class="cst-lbl-chk">
                                                                                Intellectual
                                                                            </label>
                                                                        </div>
                                                                        <div class="checkbox chk-new">
                                                                            <input id="familydetails-disability_type_3" name="FamilyDetails[disability_type][]" type="checkbox" value="3" <?= (is_array($family->disability_type) && (count($family->disability_type) > 0) && in_array(3, $family->disability_type)) ? 'checked="checked"' : ''; ?>>
                                                                            <label for="familydetails-disability_type_3" class="cst-lbl-chk">
                                                                                Sensory
                                                                            </label>
                                                                        </div>
                                                                        <div class="help-block error-disability_type"></div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Please tell us what best describes the care you are looking for</label>
                                                                            <select class="form-control select2-multiple" onchange="toogleCareDescribeTypeOptions(this)"  multiple="multiple" name="FamilyDetails[care_describe_type][]" id="familydetails-care_describe_type">
                                                                                <option value="">Select care you are looking for</option>
                                                                                <?php if (isset($lookingcare) && count($lookingcare) > 0) : ?>
                                                                                    <?php foreach ($lookingcare as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $family->care_describe_type)) ? "selected" : "" ?>><?= $v->type ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-care_describe_type"></div>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What other tasks would you like your carer to undertake</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="FamilyDetails[other_task][]" id="familydetails-other_task">
                                                                                <?php if (isset($all_other_duties) && count($all_other_duties) > 0) : ?>
                                                                                    <?php foreach ($all_other_duties as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $family->other_task)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-other_task"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row childcare" id="carer_parent_status_cont" style="display: <?= ((count($family->care_needed) > 0) && in_array(1, $family->care_needed)) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Would you prefer a carer who is a parent themselves?</label>
                                                                            <select class="form-control cst-frm-control-5" name="FamilyDetails[carer_parent_status]">
                                                                                <option value="1" <?= ($family->carer_parent_status == 1) ? "selected" : "" ?>>Yes</option>
                                                                                <option value="0" <?= ($family->carer_parent_status == 0) ? "selected" : "" ?>>Don’t mind</option>
                                                                            </select>
                                                                            <div class="help-block error-carer_parent_status"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row childcare" id="carer_child_work_cont" style="display: <?= ((count($family->care_needed) > 0) && in_array(1, $family->care_needed)) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Are you happy for your carer to take their own children to work? </label>
                                                                            <p class="frm-message frm-message-2">Allowing a child carer to bring their own children to work will attract more quality carers, with the best experience. Your little one will also make a new BFF!</p>
                                                                            <select class="form-control cst-frm-control-5" name="FamilyDetails[carer_child_work]">
                                                                                <option value="0" <?= ($family->carer_child_work == 0) ? "selected" : "" ?>>No</option>
                                                                                <option value="1" <?= ($family->carer_child_work == 1) ? "selected" : "" ?>>Yes</option>
                                                                            </select>
                                                                            <div class="help-block error-carer_child_work"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row care_describe_type_live_in care_describe_type_long_term" id="familydetails-accomodation_type_cont" style="display: <?= ((count($family->care_describe_type) > 0) && (in_array(1, $family->care_describe_type) || in_array(3, $family->care_describe_type))) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">What type of accommodation can you provide for your live-in carer</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="FamilyDetails[accomodation_type][]" id="familydetails-accomodation_type">
                                                                                <?php if (isset($all_accomodations) && count($all_accomodations) > 0) : ?>
                                                                                    <?php foreach ($all_accomodations as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $family->accomodation_type)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-accomodation_type"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5 lb-forblk">How much are you able to pay for care?</label>
                                                                            <div class="row">
                                                                                <div class="col-md-3 col-sm-4">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon cust-input-addon" id="basic-addon1">$</span>
                                                                                        <input type="text" class="form-control cst-frm-control-50 cust-input-addon-input" id="familydetails-pay_amount" placeholder="10.00" name="FamilyDetails[pay_amount]" value="<?= $family->pay_amount ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-4">
                                                                                    <select class="form-control cst-frm-control-50" name="FamilyDetails[pay_type]">
                                                                                        <option value="1" <?= (($family->pay_type) == 1) ? "selected" : "" ?>>Hour</option>
                                                                                        <option value="2" <?= (($family->pay_type) == 2) ? "selected" : "" ?>>Day</option>
                                                                                        <option value="3" <?= (($family->pay_type) == 3) ? "selected" : "" ?>>Week</option>
                                                                                        <option value="4" <?= (($family->pay_type) == 4) ? "selected" : "" ?>>Month</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 col-sm-4">
                                                                                    <div class="checkbox chk-new-2">
                                                                                        <input id="checkbox30" type="checkbox" name="FamilyDetails[negotiable]" <?= ($family->negotiable == 1) ? 'checked="checked"' : ''; ?>>
                                                                                        <label for="checkbox30" class="cst-lbl-chk">
                                                                                            Negotiable
                                                                                        </label>
                                                                                    </div>
                                                                                </div></div>


                                                                            <div class="help-block error-pay"></div>
                                                                        </div>                        
                                                                    </div>
                                                                </div>
                                                                <div class="row care_describe_type_live_in" id="familydetails-other_perk_cont" style="display: <?= ((count($family->care_describe_type) > 0) && in_array(3, $family->care_describe_type)) ? 'block"' : 'none'; ?>">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">Can you provide any other perks for your carer?</label>
                                                                            <select class="form-control select2-multiple"  multiple="multiple" name="FamilyDetails[other_perk][]" id="familydetails-other_perk">
                                                                                <?php if (isset($all_perks) && count($all_perks) > 0) : ?>
                                                                                    <?php foreach ($all_perks as $v) : ?>
                                                                                        <option value="<?= $v->id ?>" <?= (in_array($v->id, $family->other_perk)) ? "selected" : "" ?>><?= $v->value ?></option>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </select>
                                                                            <div class="help-block error-other_perk"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="usr" class="nw-label-5">About your Family</label>
                                                                            <textarea name="FamilyDetails[description]" placeholder="Please write a brief description of your family and what you are looking for so that our carers can best accommodate your needs" class="form-control cst-txt-box" rows="6"><?= $family->description ?></textarea>
                                                                            <div class="help-block error-description"></div>
                                                                        </div>
                                                                    </div>                        
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn btn-all">Save</button>
                                                                </div>
                                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function easyautocompleteInit(id) {
        $('#usermaster-suburb').val('');
    var csrfToken = '<?= Yii::$app->request->csrfToken ?>';
    var options1 = {
            url: function (phrase1) {
                return full_path + 'admin/autosuggestion';
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
//function initMap() {
//       
//    }
//    $('#usermaster-zipcode').keyup(function () {
//        var geocoder= new google.maps.Geocoder();
//        var zipcode=$('#usermaster-zipcode').val();
//    var lat = '';
//    var lng = '';
//    var address = zipcode;
//    geocoder.geocode( { 'address': address}, function(results, status) {
//      if (status == google.maps.GeocoderStatus.OK) {
//         lat = results[0].geometry.location.lat();
//         lng = results[0].geometry.location.lng();
//         $('#usermaster-latitude').val(lat);
//         $('#usermaster-longitude').val(lng);
//      } else {
//        console.log("Geocode was not successful for the following reason: " + status);
//        $('#usermaster-latitude').val('');
//         $('#usermaster-longitude').val('');
//      }
//    });
//});
//function initMap() {
//        var input = document.getElementById('usermaster-address');
//        var autocomplete = new google.maps.places.Autocomplete(input);
//        autocomplete.addListener('place_changed', function () {
//            var place = autocomplete.getPlace();
//            $("#usermaster-latitude").val(place.geometry.location.lat());
//            $("#usermaster-longitude").val(place.geometry.location.lng());
//        })
//    }
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
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGEk6mRz_61JBeGGGg-VmWz2vmxmCutJU&libraries=places&callback=initMap" async defer></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript">
//    var input = $('.clockpicker').clockpicker({
//        twelvehour: true,
//        placement: 'bottom',
//        align: 'left',
////    autoclose: true,
//        'default': 'now',
//        donetext: 'Done'
//    });
//src https://weareoutman.github.io/clockpicker/
</script>
<!-- *****************Join-end****************** -->
<script>
    $(function ()
    {
        $(".datepicker").datepicker({
            autoclose: true,
            dateFormat: 'mm/dd/yy'
        });
    });
</script>
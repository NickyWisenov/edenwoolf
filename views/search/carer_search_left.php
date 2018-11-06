<?php
$all_languages= \app\models\Languages::find()->where(['status'=>1])->all();
$all_job_descriptions= \app\models\JobDescription::find()->where(['status'=>1])->all();
$all_qualifications= \app\models\Qualifications::find()->where(['status'=>1])->all();
$all_caring_exp_type= \app\models\CaringExperienceType::find()->where(['status'=>1])->all();
$all_other_duties= \app\models\OtherDuties::find()->where(['status'=>1])->all();
?>
<div class="bottom-part">
    <div class="api-menu">
        <div class="panel-group" id="accordion" role="tablist">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed"> 
                        <h4 class="panel-title">
                            Type of Job
                        </h4> 
                    </a>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <?php if (isset($all_job_descriptions) && count($all_job_descriptions) > 0) : ?>
                            <?php foreach ($all_job_descriptions as $k=>$v) : 
                                if($v->search_form_value!=''){
                                ?>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="CarerDetails[job_type][]" value="<?=$v->id?>">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""><?= $v->search_form_value ?></span>
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
                           Carer qualifications
                        </h4> 
                    </a>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <?php if (isset($all_qualifications) && count($all_qualifications) > 0) : ?>
                            <?php foreach ($all_qualifications as $k=>$v) : 
                                if($v->value!=''){
                                ?>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="CarerDetails[certifications][]" value="<?=$v->id?>">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""><?= $v->value ?></span>
                                    </label>
                                </div>
                            </li>
                                <?php } endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading3">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed"> 
                        <h4 class="panel-title">
                           Type of Care
                        </h4> 
                    </a>
                </div>
                <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="CarerDetails[care_type][]" value="1">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class="">Childcare</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="CarerDetails[care_type][]" value="2">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class="">Aged Care</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="CarerDetails[care_type][]" value="3">
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
                <div class="panel-heading" role="tab" id="heading4">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed"> 
                        <h4 class="panel-title">
                           Number of Children
                        </h4> 
                    </a>
                </div>
                <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <?php
                            for($i=1;$i<=5;$i++){
                            ?>
                            <li>
                                <div class="radio ">
                                    <input type="radio" name="CarerDetails[number_care]" id="number_care<?=($i==5)?6:$i?>" value="<?=($i==5)?6:$i?>">
                                    <label for="number_care<?=($i==5)?6:$i?>">
                                       <?=($i==5)?'5+':$i?>
                                    </label>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading5">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" class="collapsed"> 
                        <h4 class="panel-title">
                            Carer availability
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
                                        <input type="checkbox" name="DayMaster[id][<?= $value->id ?>]">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> <?= $value->name ?></span>
                                    </label>
                                </div>
                                <div class="row avel-box">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Start time" name="DayMaster[start_time][<?= $value->id ?>]">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="End time" name="DayMaster[end_time][<?= $value->id ?>]">
                                    </div>
                                </div> 
                            </li>
                            <?php } } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading6">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" class="collapsed"> 
                        <h4 class="panel-title">
                           Caring Experience
                        </h4> 
                    </a>
                </div>
                <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <?php
                            for($i=1;$i<=5;$i++){
                            ?>
                            <li>
                                <div class="radio ">
                                    <input type="radio" name="CarerDetails[caring_experience]" id="caring_experience<?=($i==5)?6:$i?>" value="<?=($i==5)?6:$i?>">
                                    <label for="caring_experience<?=($i==5)?6:$i?>">
                                       <?=($i==5)?'5+':$i?>
                                    </label>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

<!--            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" class="collapsed"> 
                        <h4 class="panel-title">
                            Type of care
                        </h4> 
                    </a>
                </div>
                <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="radio ">
                                    <input type="radio" name="radio2" id="radio4" value="option1">
                                    <label for="radio4">
                                        Child care
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="radio ">
                                    <input type="radio" name="radio2" id="radio5" value="option2">
                                    <label for="radio5">
                                        Aged care
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="radio ">
                                    <input type="radio" name="radio2" id="radio6" value="option3">
                                    <label for="radio6">
                                        Disability care
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default disable">
                <div class="panel-heading" role="tab" id="headingThree">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" class="collapsed"> 
                        <h4 class="panel-title">
                            Number and age of children 
                        </h4> 
                    </a>
                </div>
                <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> Wifi</span></span>
                                    </label>
                                </div>
                            </li>
                            <li><div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> Wifi</span></span>
                                    </label>
                                </div></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFour">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="collapsed"> 
                        <h4 class="panel-title">
                            Carer availability
                        </h4> 
                    </a>
                </div>
                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> Monday</span>
                                    </label>
                                </div>
                                <div class="row avel-box">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Start time">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="End time">
                                    </div>
                                </div> 
                            </li>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> Tuesday</span>
                                    </label>
                                </div>
                                <div class="row avel-box">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Start time">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="End time">
                                    </div>
                                </div> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFive">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" class="collapsed"> 
                        <h4 class="panel-title">
                            Carer experience 
                        </h4> 
                    </a>
                </div>
                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <ul>
                            <li>
                                <div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> sample 1</span>
                                    </label>
                                </div>
                            </li>
                            <li><div class="checkbox">
                                    <label>
                                        <input value="" type="checkbox">
                                        <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                        <span class=""> sample 1</span>
                                    </label>
                                </div></li>
                        </ul>
                    </div>
                </div>
            </div>-->

        </div>
    </div>
</div>
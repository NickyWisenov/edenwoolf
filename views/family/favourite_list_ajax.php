<?php

use yii\helpers\Html;
use yii\helpers\Url;

if (count($model) > 0) {
    foreach ($model as $key => $val) {
        if ($key < $limit) {
            ?>
            <div class="job-list-1 carers-list-box">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="blog-list-box-left">
                            <a href="javascript:;"><img src="<?= $this->context->getUserProfileImage($val->fav_id) ?>" alt="" class="img-responsive"></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <div class="blog-list-box-right">
                            <div class="fav-h active">
                                <a href="javascript:;" onclick="removefromFav(this, '1');" data-id="<?= $val->fav_id; ?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </div>
                            <h1> <a href="javascript:;"><?= $val->user->display_name ?></a></h1>
                            <h2>5 Reviews <span>( 3.5 )</span></h2>
                            <ul class="list-inline top-feature-grp new-family-fav">
                                <?php
                                if ($val->user->carerdetails->care_type != '') {
                                    $care_type = explode(',', $val->user->carerdetails->care_type);
                                    ?>
                                    <li><i class="fa fa-tag" aria-hidden="true"></i><span>
                                            <?php
                                            foreach ($care_type as $ckey => $cvalue) {
                                                if ($ckey == 0) {
                                                    if ($cvalue == 1) {
                                                        echo "Child care";
                                                    } else if ($cvalue == 2) {
                                                        echo "Aged Care";
                                                    } else if ($cvalue == 3) {
                                                        echo "Disablity Care";
                                                    }
                                                } else {
                                                    if ($cvalue == 1) {
                                                        echo ", Child care";
                                                    } else if ($cvalue == 2) {
                                                        echo ", Aged Care";
                                                    } else if ($cvalue == 3) {
                                                        echo ", Disablity Care";
                                                    }
                                                }
                                            }
                                            ?>
                                        </span></li>
                                <?php } ?>
                                <?php
                                if ($val->user->carerdetails->job_type != '') {
                                    $job_type = explode(',', $val->user->carerdetails->job_type);
                                    ?>
                                    <li>
                                        <i class="fa fa-puzzle-piece" aria-hidden="true"></i> <span>
                                            <?php
                                            foreach ($job_type as $ckey => $cvalue) {
                                                $job_desc = \app\models\JobDescription::findOne($cvalue);
                                                if ($ckey == 0) {
                                                    echo $job_desc->search_form_value;
                                                } else {
                                                    echo ', ' . $job_desc->search_form_value;
                                                }
                                            }
                                            ?>
                                        </span>
                                    </li>
                                <?php } ?>
                                <li>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <span>
                                        Experience <?= ($val->user->carerdetails->caring_experience > 4) ? '5+' : ($val->user->carerdetails->caring_experience == NULL) ? '0' : $val->user->carerdetails->caring_experience; ?><?= ($val->user->carerdetails->caring_experience >= 1) ? ' years' : ' year' ?>
                                    </span>
                                </li>
                            </ul>
                            <p>
                                <!--<? $val->user->carerdetails->description ?>-->
                                <?= (strlen($val->user->carerdetails->description)>200)?substr($val->user->carerdetails->description, 0,200).' [..]':$val->user->carerdetails->description; ?>
                            </p>
                            <div class="text-center row fav-btn22">
                                <div class="col-sm-6 col-xs-6">
                                    <a class="style-btn blue-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(["search/carerprofile", "car_id" => base64_encode($val->fav_id)]) ?>"><span>View profile</span></a>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <a class="style-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(["joblog/index", "car_id" => base64_encode($val->fav_id)]) ?>"><span>Log a job</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
} else {
    echo '<div class="job-list-1 carers-list-box text-center"><p>No Result Found</p></div>';
}
?>
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
                                if ($val->user->familydetails->care_needed != '') {
                                    $care_type = explode(',', $val->user->familydetails->care_needed);
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
                            </ul>
                            <p>
                                <!--<? $val->user->familydetails->description ?>-->
                                <?= (strlen($val->user->familydetails->description)>300)?substr($val->user->familydetails->description, 0,300).' [..]':$val->user->familydetails->description; ?>
                            </p>
                            <div class="text-center row fav-btn22">
                                <div class="col-sm-12 col-xs-12">
                                    <a class="style-btn blue-btn" href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["search/familyprofile", "user_id" => base64_encode($val->fav_id)]) ?>"><span>View profile</span></a>
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
<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Carer Search';
if (count($result) > 0) {
    foreach ($result as $key => $value) {
        $val = (object) $value;
        ?>
        <div class="job-list-1 carers-list-box clb-new">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-left-box">
                        <div class="media">
                            <div class="media-left">
                                <a href="javascript:;"><img src="<?= $this->context->getUserProfileImage($val->id) ?>" alt="" class="media-object"></a>
                            </div>
                            <div class="media-body">
                                <div class="heading-area">
                                    <h1><?= $val->display_name ?></h1>
                                    <h2>
                                        <?php
                                        if ($val->care_type != '') {
                                            $care_type = explode(',', $val->care_type);
                                            ?>
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
                                                        echo ", Childcare";
                                                    } else if ($cvalue == 2) {
                                                        echo ", Aged Care";
                                                    } else if ($cvalue == 3) {
                                                        echo ", Disablity Care";
                                                    }
                                                }
                                            }
                                            ?>
                                        <?php } else {
                                            echo "";
                                        } ?>
                                    </h2>
                                    <?php
                                    if (isset($val->distance)) {
                                        $distance = round($val->distance, 2);
                                        echo "<h2>Distance: $distance km(s)</h2>";
                                    }
                                    ?>
                                </div>
                                <div class="rateing">
                                    <ul>
                                        <li><i class="fas fa fa-star"></i></li>
                                        <li><i class="fas fa fa-star"></i></li>
                                        <li><i class="fas fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                    </ul>
                                    <h1>5 Reviews </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-mid-box">
                        <ul>
                            <li class="tbl-new-area">
                                <span class="tbl-cell-new-area"> <i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                <span class="tbl-cell-new-area">Experience <?= ($val->caring_experience > 4) ? '5+' : ($val->caring_experience == NULL) ? '0' : $val->caring_experience; ?><?= ($val->caring_experience >= 1) ? ' years' : ' year' ?></span>
                            </li>
                            <li class="tbl-new-area">
                                <span class="tbl-cell-new-area"> <i class="fa fa-location-arrow" aria-hidden="true"></i></span>
                                <span class="tbl-cell-new-area"><?= $val->suburb . ', ' . $val->zipcode ?></span>
                            </li>
                            <li>
                                <span class="tbl-cell-new-area"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> </span>
                                <span class="tbl-cell-new-area">
                                    <?php
                                    if ($val->job_type != '') {
                                        $job_type = explode(',', $val->job_type);
                                        ?>
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
                                    <?php
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="blbt-btn">

                        <?php
                        $fav = \app\models\FavouriteMaster::find()->where(['user_id' => Yii::$app->user->id, 'fav_id' => $val->id, 'status' => "1"])->count();
//                        if ($val->id != Yii::$app->user->id && isset(Yii::$app->user->identity->type_id) && Yii::$app->user->identity->type_id != '2') {
                        if ($val->id != Yii::$app->user->id) {
                            ?>
                            <div class="new-text-right">
                                <div id="fav_<?= $val->id ?>" class="fav-h fav-h-2 fav-h-3 <?= (($fav > 0) ? 'active' : ''); ?>">
                                    <a href="javascript:;" onclick="<?= (($fav > 0) ? 'removefromFav(this);' : 'addtoFav(this);'); ?>" data-id="<?= $val->id; ?>">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                                    <?php
                                }
                                ?>
                        <div class="top-para">
                            <p>
                        <?= (($val->description != '') && strlen($val->description) > 130) ? substr($val->description, 0, 130) . ' [..]' : $val->description ?>
                            </p>
                        </div>
        <?php
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->type_id == 3) {
            ?>
                            <div class="text-center row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a class="style-btn blue-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(["search/carerprofile", "car_id" => base64_encode($val->id)]) ?>"><span>View profile</span></a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a class="style-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(["joblog/index", "car_id" => base64_encode($val->id)]) ?>"><span>Log a job</span></a>
                                </div>
                            </div>
        <?php } else { ?>
                            <div class="text-center row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <a class="style-btn blue-btn" href="<?= Yii::$app->urlManager->createAbsoluteUrl(["search/carerprofile", "car_id" => base64_encode($val->id)]) ?>"><span>View profile</span></a>
                                </div>
                            </div>
        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="job-list-1 carers-list-box text-center">
        <p>No Result Found</p>
    </div>
<?php } ?>
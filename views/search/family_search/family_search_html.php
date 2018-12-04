<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Family Search';
if (count($result) > 0) {
    foreach ($result as $key => $value) {
        $val = (object) $value;
        ?>

        <div class="job-list-1 carers-list-box clb-new">
            <div class="row">
                <div class="col-md-5 col-sm-12">
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
                                        if ($val->care_needed != '') {
                                            $care_type = explode(',', $val->care_needed);
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
                                                        echo ", Child care";
                                                    } else if ($cvalue == 2) {
                                                        echo ", Aged Care";
                                                    } else if ($cvalue == 3) {
                                                        echo ", Disablity Care";
                                                    }
                                                }
                                            }
                                            ?>
                                        <?php } ?>
                                    </h2>
                                    <?php
                                    if(isset($val->distance)){
                                        $distance=round($val->distance,2);
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
                <div class="col-md-4 col-sm-12">
                    <div class="fm-md-area">
                        <p><i class="fa fa-location-arrow" aria-hidden="true"></i> <?= $val->suburb.', '.$val->zipcode ?></p>
                        <p>
                            <?= (strlen($val->description)>152)?substr($val->description, 0,152).' [..]':$val->description; ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <!--favorite section-->
                    <?php
                    $fav = \app\models\FavouriteMaster::find()->where(['user_id' => Yii::$app->user->id, 'fav_id' => $val->id, 'status' => "1"])->count();
//                    if ($val->id != Yii::$app->user->id && isset(Yii::$app->user->identity->type_id) && Yii::$app->user->identity->type_id != '3') {
                    if ($val->id != Yii::$app->user->id) {
                    ?>
                    <div id="fav_<?=$val->id?>" class="fav-h <?= (($fav > 0) ? 'active' : ''); ?>">
                        <a href="javascript:;" onclick="<?= (($fav > 0) ? 'removefromFav(this);' : 'addtoFav(this);'); ?>" data-id="<?= $val->id; ?>">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                    <!--favorite section-->
                    <div class="blbt-btn">
                        <div class="top-para">
                        </div>
                        <div class="text-center row">
                            <div class="col-sm-12">
                                <a class="style-btn blue-btn" href="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["search/familyprofile", "user_id" => base64_encode($val->id)]) ?>"><span>View profile</span></a>
                            </div>
                        </div>
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
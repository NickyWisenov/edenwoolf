<?php
$session = Yii::$app->session;

use yii\helpers\Html;
use yii\helpers\Url;

if(isset($session['user_id']) && $session['user_id']!='')
{
    $profile = $this->context->getUserProfileImage();
    $profile_pic = 'http://edenwoolf.com/web'.$profile;
}

$this->title = 'Family Details';
?>
<link rel="shortcut icon" href="https://s3.amazonaws.com/sendbird-static/favicon/favicon.ico" type="image/x-icon">

<link href='https://fonts.googleapis.com/css?family=Exo+2:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300'
rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300'
rel='stylesheet' type='text/css'>

<!-- <link rel="stylesheet" href="/web/frontend/static/bootstrap/bootstrap.min.css"> -->
<link rel="stylesheet" href="/web/frontend/static/css/sample-chat.css">
<link rel="shortcut icon" href="/favicon.ico">
<style type="text/css">
#chat,#chat:after,.chatbox{transition:all .4s ease-in-out}
#chat,#close-chat,.minim-button,.maxi-button,.chat-text{font-weight:700;cursor:pointer;font-family:Arial,sans-serif;text-align:center;height:20px;line-height:20px}
#chat,#close-chat,.chatbox{border: none;}
#chat:after,#chat:before{position:absolute; content:""}
.chatbox{position:fixed;bottom:0;right:5px;margin:0 0 -1500px;background:#fff;border-bottom:none;padding:28px 10px 10px;z-index:100000}
#close-chat{position:absolute;top:2px;right:2px;font-size:24px;border:1px solid #dedede;width:20px;background:#fefefe;z-index:2}
#minim-chat,#maxi-chat{position:absolute;top:0;left:0;width:100%;height:20px;line-height:20px;cursor:pointer;z-index:1}
.minim-button{position:absolute;top:2px;right:26px;font-size:24px;border:1px solid #dedede;width:20px;background:#fefefe}
.maxi-button{position:absolute;top:2px;right:26px;font-size:24px;border:1px solid #dedede;width:20px;background:#fefefe;}
.chat-text{position:absolute;top:5px;left:10px;font-size:16px;}
/*#chat{width:40px;border-radius:3px;padding:2px 8px;font-size:12px;background:#fff;-webkit-transform:translateZ(0);transform:translateZ(0)}
#chat:before{border-width:10px 11px 0 0;border-color:#A8A8A8 transparent transparent;left:7px;bottom:-10px}
#chat:after{border-width:9px 8px 0 0;border-color:#fff transparent transparent;left:8px;bottom:-8px}
#chat:hover{background:#ddd;-webkit-animation-name:hvr-pulse-grow;animation-name:hvr-pulse-grow;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-timing-function:linear;animation-timing-function:linear;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-animation-direction:alternate;animation-direction:alternate}
#chat:hover:after{border-color:#ddd transparent transparent!important}
.animated-chat{-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}*/
@-webkit-keyframes tada{0%{-webkit-transform:scale(1)}
10%,20%{-webkit-transform:scale(.9)rotate(-3deg)}
30%,50%,70%,90%{-webkit-transform:scale(1.1)rotate(3deg)}
40%,60%,80%{-webkit-transform:scale(1.1)rotate(-3deg)}
100%{-webkit-transform:scale(1)rotate(0)}
}
@keyframes tada{0%{transform:scale(1)}
10%,20%{transform:scale(.9)rotate(-3deg)}
30%,50%,70%,90%{transform:scale(1.1)rotate(3deg)}
40%,60%,80%{transform:scale(1.1)rotate(-3deg)}
100%{transform:scale(1)rotate(0)}
}
.tada{-webkit-animation-name:tada;animation-name:tada}
@-webkit-keyframes hvr-pulse-grow{to{-webkit-transform:scale(1.1);transform:scale(1.1)}
}
@keyframes hvr-pulse-grow{to{-webkit-transform:scale(1.1);transform:scale(1.1)}
}

body{
    background:#dedede
}
</style>


<section class="prof-inner-bnr">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Family Profile</h2>

                <!--                    <ul class="bred-cramb">
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(["/"]) ?>">Home</a>
                                        </li>
                                        <li>
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(["search/familysearch"]) ?>">Family</a>
                                        </li>
                                    </ul>-->
                <?php
                if (isset($session['all_family']) && $session['all_family'] != '') {
                    $index = array_search(base64_encode($familyDetails->user_id), $session['all_family']);
                    $prev_index = $index - 1;
                    $next_index = $index + 1;
                    $prev_id = isset($session['all_family'][$prev_index]) ? $session['all_family'][$prev_index] : '';
                    $next_id = isset($session['all_family'][$next_index]) ? $session['all_family'][$next_index] : '';
                    ?>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul class="small-55">
                            <li>
                                <a href="javascript:;" onclick='<?= ($prev_id == '') ? 'javascript:;' : 'getfamilyProfile("' . $prev_id . '")' ?>' class="no-decor homepage-button booking-link prev-next" style="<?= ($prev_id == '') ? 'cursor:no-drop' : '' ?>"><span>Previous</span></a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick='<?= ($next_id == '') ? 'javascript:;' : 'getfamilyProfile("' . $next_id . '")' ?>' class="style-btn blue-btn prev-next" style="<?= ($next_id == '') ? 'cursor:no-drop' : '' ?>"><span>Next</span></a>
                            </li>
                        </ul>
                    </div>
<?php } ?>

            </div>
        </div>
    </div>
</section>
<section class="career-details">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="left-part">
                    <div class="top-box">
                        <div class="top-part-img">
                            <a href="javascript:;"><img src="<?= $this->context->getOriginalUserProfileImage($familyDetails->user_id) ?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="bottom-ul">
                            <div class="name-dg-grp">
                                <div class="heding-1"><?= $familyDetails->user_details->display_name ?>
                                    <span>
                                        <?php
                                        $fav = \app\models\FavouriteMaster::find()->where(['user_id' => Yii::$app->user->id, 'fav_id' => $familyDetails->user_id, 'status' => "1"])->count();
//                                            if ($familyDetails->user_id != Yii::$app->user->id && isset(Yii::$app->user->identity->type_id) && Yii::$app->user->identity->type_id != '3') {
                                        if ($familyDetails->user_id != Yii::$app->user->id) {
                                            ?>
                                            <div class="new-text-right-5">
                                                <div id="fav_<?= $familyDetails->user_id ?>" class="fav-h fav-h-2 <?= (($fav > 0) ? 'active' : ''); ?>">
                                                    <a href="javascript:;" onclick="<?= (($fav > 0) ? 'removefromFav(this);' : 'addtoFav(this);'); ?>" data-id="<?= $familyDetails->user_id; ?>">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="show-review review-new">
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <h1>5 Reviews <span>( 3.5 )</span></h1>
                                        </div>
                                    </div>  
                                </div>

                            </div>
                            <ul class="nw-list nw-lst-25">
                                <li class="clearfix">
                                    <span class="col-sm-6 col-xs-6 left-span"><i class="fa fa-location-arrow" aria-hidden="true"></i>Location</span>
                                    <span class="col-sm-6 col-xs-6 right-span"><?= (isset($familyDetails->user_details) && $familyDetails->user_details->suburb != '') ? $familyDetails->user_details->suburb . ', ' : '' ?><?= (isset($familyDetails->user_details) && $familyDetails->user_details->zipcode != '') ? $familyDetails->user_details->zipcode : '' ?></span>
                                </li>
                                <li class="text-center">
                                    <?php
                                    if ($familyDetails->is_looking_found == 0) {
                                        ?>
                                        <span class="grn-text-55">
                                            Currently looking for a carer  
                                        </span>
<?php } else { ?>
                                        <span class="grn-text-55">
                                            Successfully found a carer
                                        </span>
<?php } ?>
                                </li>
                                <li class="text-center blog-box">
                                    <div class="box-step bx-step-1">
                                        <ul class="tick-list">
                                            <?= ($familyDetails->carer_parent_status == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>We would prefer carers who are parents themselves</li>" : "" ?>
<?= ($familyDetails->carer_child_work == 1) ? "<li><i class='fa fa-check' aria-hidden='true'></i>We are happy for carers to take their own children to jobs</li>" : "" ?>    
                                        </ul>
                                    </div>
                                </li>


                            </ul>
                            <?php
//                                if (Yii::$app->user->isGuest || Yii::$app->user->identity->type_id == 2) {
                            ?>
                            <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                                <ul>
                                    
                                    <li>
                                        <?php  
                                            if(isset($session['user_id']) && $session['user_id']!='' && isset($session['user_name']) && $session['user_name']!='')  
                                            {
                                            ?>
                                            <input type="hidden" name="user_id" value="<?php echo $session['user_id'];?>" id="">
                                                <input type="hidden" name="user_name" value="<?php echo $session['user_name'];?>" id="">
                                                 <input type="hidden" name="cid" value="<?php echo $familyDetails->user_id;?>" id="">
                                                <input type="hidden" name="cname" value="<?php echo $familyDetails->user_details->first_name;?>" id=""> 
                                                <input type="hidden" name="profile_pic" value="<?php echo $profile_pic;?>" id="">
                                            <a href="#" id="chat" onclick="loadChatbox()"  class="style-btn blue-btn" style="height: 40px"><span>Message</span></a>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                            <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(["joblog/chatcheck", "car_id" => base64_encode($familyDetails->user_id)]) ?>" onclick="" class="style-btn blue-btn"><span>Message</span></a>
                                            <?php
                                            }
                                            ?>
                                    </li>
                                </ul>
                            </div>
<?php // }  ?>

                        </div>
                    </div>
                    <div class="bottom-box">
                        <div class="box-step">
                            <h3>Type of Care Required :</h3>
                                <?php $carerType = (trim($familyDetails->care_needed) != "") ? explode(',', $familyDetails->care_needed) : [] ?>
                            <ul class="tags">
                                <?php if (count($carerType) > 0) : ?>
                                    <?php foreach ($carerType as $v) : ?>
                                        <?php if ($v == 1) : ?>
                                            <li>Child care</li>
                                        <?php elseif ($v == 2) : ?>
                                            <li>Aged care</li>
                                        <?php elseif ($v == 3) : ?>
                                            <li>Disability care</li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li></li>
<?php endif; ?>
                            </ul>

                        </div>


                        <div class="box-step">
                            <h3>About Our Family: </h3>
                            <ul>
                                <li>
                                    <span>Number of people in need of care:&nbsp;<?= count($family_care_person) ?></span> 
                                </li>
                            </ul><br>
                            <?php if (count($family_care_person) > 0) { ?>

                                <?php foreach ($family_care_person as $key => $value) {
                                    ?>
                                    <ul>
                                        <li>

                                            <?php
                                            $caringExperienceType = \app\models\CaringExperienceType::findOne($value->need_care);
                                            if (count($caringExperienceType) > 0) {
                                                ?>
                                                <span><?= $key + 1 ?>.&nbsp;<?= $caringExperienceType->value ?>
                                                <?= ($value->description != '') ? '[' . $value->description . ']' : '' ?>
                                                </span>
                                            <?php
                                            } else {
                                                echo "";
                                            }
                                            ?>

                                        </li>
                                    </ul>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="box-step">
                            <h3>We are looking for :</h3>
                            <ul>
                                <?php if ($familyDetails->care_describe_type != '') { ?>
                                    <?php if (isset($lookingcare) && count($lookingcare) > 0) : ?>
                                        <?php foreach ($lookingcare as $v) : ?>
                                            <?php if (in_array($v->id, explode(',', $familyDetails->care_describe_type))) { ?>
                                                <li><?= $v->family_profile ?></li>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
<?php } else { ?>
                                    <li></li>
<?php } ?>
                            </ul>
                        </div>
                        <div class="box-step">
                                <h3>Accomodations :</h3>
                                <ul>
                                    <?php if ($familyDetails->accomodation_type != '') { ?>
                                        <?php if (isset($all_accomodations) && count($all_accomodations) > 0) : ?>
                                            <?php foreach ($all_accomodations as $v) : ?>
                                                <?php if (in_array($v->id, explode(',', $familyDetails->accomodation_type))) { ?>
                                                    <li><?= $v->value ?></li>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php } else { ?>
                                        <li></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="box-step">
                                <h3>Other perks :</h3>
                                <ul>
                                    <?php if ($familyDetails->other_perk != '') { ?>
                                        <?php if (isset($all_perks) && count($all_perks) > 0) : ?>
                                            <?php foreach ($all_perks as $v) : ?>
                                                <?php if (in_array($v->id, explode(',', $familyDetails->other_perk))) { ?>
                                                    <li><?= $v->value ?></li>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php } else { ?>
                                        <li></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <div class="box-step">
                            <h3>Other tasks required :</h3>
                            <ul>
                                <?php if ($familyDetails->other_task != '') { ?>
                                    <?php if (isset($all_other_duties) && count($all_other_duties) > 0) : ?>
                                        <?php foreach ($all_other_duties as $v) : ?>
                                            <?php if (in_array($v->id, explode(',', $familyDetails->other_task))) { ?>
                                                <li><?= $v->value ?></li>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
<?php } else { ?>
                                    <li></li>
<?php } ?>
                            </ul>
                        </div>
                        <div class="box-step">
                            <h3>We are able to pay :</h3>
                            <ul>
                                <?php
                                if ($familyDetails->pay_type == 1) {
                                    $pay_type = 'Hour';
                                } else if ($familyDetails->pay_type == 2) {
                                    $pay_type = 'Day';
                                } else if ($familyDetails->pay_type == 3) {
                                    $pay_type = 'Week';
                                } else {
                                    $pay_type = 'Month';
                                }
                                ?>
                                <li>
                                    <?php
                                    if ($familyDetails->pay_amount != '') {
                                        ?>
                                        $<?= $familyDetails->pay_amount ?>/<?= $pay_type ?>
<?php } ?>
                                    <span><?= ($familyDetails->negotiable == 1) ? 'Negotiable' : '' ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8 col-sm-7">
                <div class="prof-right-part">
                    <div class="top-part">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="left-part">
                                    <h1 class="prof-heading">About <i class="fa fa-user" aria-hidden="true"></i></h1>
                                    <p><?= $familyDetails->description ?></p>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="right-prt">
                                    <div class="availability blog-box-outer">
                                        <h1 class="prof-heading">Care Required <i class="fa fa-calendar" aria-hidden="true"></i></h1>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
<?php foreach ($day_master as $v) : ?>
                                                        <tr>
                                                            <td><?= $v->name ?></td>
                                                            <td class="text-right"><?= $this->context->getCarerAvailableTime($familyDetails->user_id, $v->id) ?></td>
                                                        </tr>
<?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- availability -->
                                </div>  
                            </div>
                        </div>
                    </div>

                    <div class="bottom-part">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="prof-heading">Reviews <i class="fa fa-comments" aria-hidden="true"></i></h1>
                                <div class="scroll-div">
                                    <div class="reviews-short-dtls">
                                        <div class="col-md-2 col-sm-2 no-padding">
                                            <div class="auth-img">
                                                <a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 no-padding">
                                            <div class="heading-area">
                                                <h1> <a href="#">AJ Clarke</a></h1>
                                                <h2><i class="fa fa-calendar" aria-hidden="true"></i> 4th January 2018</h2>
                                            </div>
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <p>
                                                Cras non laoreet purus, id mattis ipsum. Integer imperdiet mi non sapien vulputate iaculis. Vestibulum sed mauris mi. Vivamus sodales interdum commodo. In mattis tortor eu malesuada dapibus. Nam condimentum metus eu leo maximus ullamcorper. Etiam viverra dui vel turpis volutpat, vitae eleifend augue convallis.
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="reviews-short-dtls">
                                        <div class="col-md-2 col-sm-2 no-padding">
                                            <div class="auth-img">
                                                <a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 no-padding">
                                            <div class="heading-area">
                                                <h1> <a href="#">AJ Clarke</a></h1>
                                                <h2><i class="fa fa-calendar" aria-hidden="true"></i> 4th January 2018</h2>
                                            </div>
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <p>
                                                Cras non laoreet purus, id mattis ipsum. Integer imperdiet mi non sapien vulputate iaculis. Vestibulum sed mauris mi. Vivamus sodales interdum commodo. In mattis tortor eu malesuada dapibus. Nam condimentum metus eu leo maximus ullamcorper. Etiam viverra dui vel turpis volutpat, vitae eleifend augue convallis.
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="reviews-short-dtls">
                                        <div class="col-md-2 col-sm-2 no-padding">
                                            <div class="auth-img">
                                                <a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 no-padding">
                                            <div class="heading-area">
                                                <h1> <a href="#">AJ Clarke</a></h1>
                                                <h2><i class="fa fa-calendar" aria-hidden="true"></i> 4th January 2018</h2>
                                            </div>
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <p>
                                                Cras non laoreet purus, id mattis ipsum. Integer imperdiet mi non sapien vulputate iaculis. Vestibulum sed mauris mi. Vivamus sodales interdum commodo. In mattis tortor eu malesuada dapibus. Nam condimentum metus eu leo maximus ullamcorper. Etiam viverra dui vel turpis volutpat, vitae eleifend augue convallis.
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>  <div class="reviews-short-dtls">
                                        <div class="col-md-2 col-sm-2 no-padding">
                                            <div class="auth-img">
                                                <a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 no-padding">
                                            <div class="heading-area">
                                                <h1> <a href="#">AJ Clarke</a></h1>
                                                <h2><i class="fa fa-calendar" aria-hidden="true"></i> 4th January 2018</h2>
                                            </div>
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <p>
                                                Cras non laoreet purus, id mattis ipsum. Integer imperdiet mi non sapien vulputate iaculis. Vestibulum sed mauris mi. Vivamus sodales interdum commodo. In mattis tortor eu malesuada dapibus. Nam condimentum metus eu leo maximus ullamcorper. Etiam viverra dui vel turpis volutpat, vitae eleifend augue convallis.
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="reviews-short-dtls">
                                        <div class="col-md-2 col-sm-2 no-padding">
                                            <div class="auth-img">
                                                <a href="#"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-sm-10 no-padding">
                                            <div class="heading-area">
                                                <h1> <a href="#">AJ Clarke</a></h1>
                                                <h2><i class="fa fa-calendar" aria-hidden="true"></i> 4th January 2018</h2>
                                            </div>
                                            <ul>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fas fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <p>
                                                Cras non laoreet purus, id mattis ipsum. Integer imperdiet mi non sapien vulputate iaculis. Vestibulum sed mauris mi. Vivamus sodales interdum commodo. In mattis tortor eu malesuada dapibus. Nam condimentum metus eu leo maximus ullamcorper. Etiam viverra dui vel turpis volutpat, vitae eleifend augue convallis.
                                            </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>



                                </div><!-- style-2 end -->


                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
<div class="chatbox" id="chatbox">
    <span class="chat-text"><?php echo $familyDetails->user_details->display_name; ?></span>
    <div id="smartchatbox_img901621879" style="width: 280px; height: 400px; overflow: hidden; margin: auto; padding: 0;">
        <div id="smartchatbox901621879" style="width: 280px; height: 390px; margin: auto; padding: 0; border:0; ">
             <!-- <div scrolling="yes" frameborder="0" width="280px" height="450px" style="border:0; margin:0; padding: 0;">  -->
 
<!-- <script type="text/javascript">
// Let the library know where WebSocketMain.swf is:
window.WEB_SOCKET_SWF_LOCATION = "static/lib/WebSocketMain.swf";  
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xdomain/0.7.5/xdomain.js"></script>
<script>
  xdomain.slaves({
    "https://api-us-1.sendbird.com": "/xdomain.html",
    "https://api-p.sendbird.com": "/xdomain.html"
  });
</script>
<script src="/web/frontend/static/lib/swfobject.js"></script>
<script src="/web/frontend/static/lib/web_socket.js"></script>
<script src="/web/frontend/static/lib/moxie.js"></script>
<script>moxie.core.utils.Env.swf_url = 'static/lib/Moxie.min.swf';</script> -->

<!-- <script src="/web/frontend/static/js/jquery-1.11.3.min.js"></script> -->
<link rel="shortcut icon" href="https://s3.amazonaws.com/sendbird-static/favicon/favicon.ico" type="image/x-icon">

<link href='https://fonts.googleapis.com/css?family=Exo+2:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300'
rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,800italic,800,700italic,700,600italic,600,500italic,500,400italic,300italic,200italic,200,100italic,100,300'
rel='stylesheet' type='text/css'>

<!-- <link rel="stylesheet" href="/web/frontend/static/bootstrap/bootstrap.min.css"> -->
<link rel="stylesheet" href="/web/frontend/static/css/sample-chat.css">
<link rel="shortcut icon" href="/favicon.ico">




 <div class="init-check"></div>

  <div class="sample-body">

    <!-- left nav -->
    <div class="left-nav">
      
      <div class="site-logo">
        <a href="/site/index" class="brand"><img class="img-responsive" src="/frontend/images/logo.png" alt="EdenWoolf"/></a>                                                   
      </div>
      <div class="left-nav-channel-select">
        <button type="button" class="left-nav-button left-nav-open" id="btn_open_chat">
          OPEN CHANNEL
          <div class="left-nav-button-guide"></div>
        </button>
        <button type="button" class="left-nav-button left-nav-messaging" id="btn_messaging_chat">
          FIND USER
          <div class="left-nav-button-guide"></div>
        </button>
      </div>

      <div class="left-nav-channel-section">
     

      <div class="left-nav-channel-title title-messaging">Conversation</div>
      <div id="messaging_channel_list"></div>
    </div>

  </div> <!-- // end left nav -->


  <!-- chat section -->
  <div class="right-section" style="height: 60vh">
    <!-- modal-bg -->
    <div class="right-section__modal-bg"></div>

    <!-- top -->
    <div class="chat-top">
        <!-- <div class="chat-top__title"></div> -->
      <div class="chat-top-button">

        <div class="chat-top__button chat-top__button-invite">INVITE</div>
        <div class="modal-guide-user">
          user list
        </div>

        <div class="chat-top__button chat-top__button-member"></div>
        <div class="modal-guide-member">
          Current member list
        </div>

        <div class="chat-top__button chat-top__button-hide"></div>
        <div class="chat-top__button chat-top__button-leave"></div>
        <div class="modal-guide-leave">
          Leave
        </div>
        <input type="hidden" name="block" id="block" value="0">
        <!-- <div class="chat-top__button chat-top__button-block"></div> -->
       <!--  <div class="modal-guide-member">
          Block
        </div> -->
       <!--  <div class="chat-top__button chat-top__button-member"></div>
        <div class="modal-guide-member">
          Current member list
        </div> -->

      </div>
    </div>

    <!-- channel empty -->
    <div class="chat-empty">
      <div class="chat-empty chat-empty__tile">WELCOME TO EdenWoolf CHAT</div>
      <div class="chat-empty chat-empty__icon"></div>
      <div class="chat-empty chat-empty__desc">
        Create or select a channel to chat in.<br>
        If you don't have a channel to participate,<br>
        go ahead and create your first channel now.
      </div>
    </div>

    <!-- chat -->
    <div class="chat" style="padding-top: 70px; padding-bottom: 5px;">
      <div class="chat-canvas"></div>

      <div class="chat-input">
        <div id="container">
        </div>
        <label class="chat-input-file" for="chat_file_input">
          <input type="file" name="file" id="chat_file_input" style="display: none;">
        </label>  
        <!--[if gt IE 7]>
        <script>
           $('.chat-input-file').remove();
        </script>
        <a class="chat-input-file" id="chat_file_input2" href="javascript:;">
        </a>
      <![endif]-->
      <div class="chat-input-text">
        <textarea class="chat-input-text__field" placeholder="Write a chat" disabled="true" autofocus></textarea>
      </div>
    </div>
    <label class="chat-input-typing"></label>
  </div>

</div> <!-- // end chat section -->

</div>
<!-----------------------
          modal
          ------------------------>
<!-- <div class="modal-guide-create">
  <div class="modal-guide-create__title">Create Chat</div>
  <div class="modal-guide-create__desc">
    Click on any button to create a new channel<br>
    and start sending your first message!
  </div>
  <button type="button" class="modal-guide-create__button" id="guide_create">GOT IT!</button>
</div> -->

<div class="modal-open-chat">
  <div class="modal-messaging-top">
    <label class="modal-messaging-top__title">Open Channel</label>
    <button class="modal-messaging-top__btn" id="btn_create_open_channel"></button>
  </div>
  <div class="modal-open-chat-list"></div>
  <div class="modal-open-chat-more">
    <div class="modal-open-chat-more__text">MORE<div class="modal-open-chat-more__icon"></div></div>
  </div>
</div>

<div class="modal-messaging">
  <div class="modal-messaging-top">
    <label class="modal-messaging-top__title">Start Chat</label>
    <label class="modal-messaging-top__desc">Member list shows people inside the application.</label>
  </div>
  <div class="modal-messaging-list">
    <div class="modal-messaging-list__item">Username1<div class="modal-messaging-list__icon"></div></div>
    <div class="modal-messaging-list__item">Username2<div class="modal-messaging-list__icon modal-messaging-list__icon--select"></div></div>

    <div class="modal-messaging-more">MORE<div class="modal-messaging-more__icon"></div></div>
  </div>
  <div class="modal-messaging-bottom">
    <button type="button" class="modal-messaging-bottom__button" onclick="startMessaging()">START MESSAGE</button>
  </div>
</div>

<div class="modal-member">
  <div class="modal-member-title">CURRENT MEMBER LIST</div>
  <div class="modal-member-list"></div>
</div>

<div class="modal-invite">
  <div class="modal-invite-title">USER LIST</div>
  <div class="modal-invite-top">
    <label class="modal-messaging-top__title modal-invite-top__title">Start Chat</label>
    <label class="modal-invite-top__desc">Member list shows people inside the application.</label>
  </div>
  <div class="modal-messaging-list modal-invite-list" style="height: 358px">

  </div>
  <div class="modal-invite-bottom">
    <button type="button" class="modal-invite-bottom__button" onclick="inviteMember()">INVITE</button>
  </div>
</div>

<div class="modal-leave-channel">
  <div class="modal-leave-channel-card">
    <div class="modal-leave-channel-title">Are you Sure?</div>
    <div class="modal-leave-channel-desc">Do you want to leave this channel?</div>
    <div class="modal-leave-channel-separator"></div>
    <div class="modal-leave-channel-bottom">
      <button type="button" class="modal-leave-channel-button modal-leave-channel-close">CANCEL</button>
      <button type="button" class="modal-leave-channel-button modal-leave-channel-submit">YES</button>
    </div>
  </div>
</div>

<div class="modal-hide-channel">
  <div class="modal-hide-channel-card">
    <div class="modal-hide-channel-title">Are you Sure?</div>
    <div class="modal-hide-channel-desc">Do you want to hide this channel?</div>
    <div class="modal-hide-channel-separator"></div>
    <div class="modal-hide-channel-bottom">
      <button type="button" class="modal-hide-channel-button modal-hide-channel-close">CANCEL</button>
      <button type="button" class="modal-hide-channel-button modal-hide-channel-submit">YES</button>
    </div>
  </div>
</div>

<div class="modal-confirm">
  <div class="modal-confirm-card">
    <div class="modal-confirm-title">Are you Sure?</div>
    <div class="modal-confirm-desc">Do you want to hide this channel?</div>
    <div class="modal-confirm-separator"></div>
    <div class="modal-confirm-bottom">
      <button type="button" class="modal-confirm-button modal-confirm-close">CANCEL</button>
      <button type="button" class="modal-confirm-button modal-confirm-submit">YES</button>
    </div>
  </div>
</div>

<div class="modal-input">
  <div class="modal-input-card">
    <div class="modal-input-title">Type info</div>
    <div class="modal-input-desc">Create Open Channel</div>
    <div class="modal-input-box">
      <input type="text" class="modal-input-box-elem" />
    </div>
    <div class="modal-input-separator"></div>
    <div class="modal-input-bottom">
      <button type="button" class="modal-input-button modal-input-close">CANCEL</button>
      <button type="button" class="modal-input-button modal-input-submit">CREATE</button>
    </div>
  </div>
</div>
 <script src="/web/frontend/static/lib/SendBird.min.js"></script> 
<script src="/web/frontend/static/js/util.js"></script>
<!-- <script src="/web/frontend/static/js/chat.js"></script> -->
</div></div>
<div id="close-chat" onclick="closeChatbox()">&times;</div>
<div id="minim-chat" onclick="minimChatbox()"><span class="minim-button">&minus;</span></div>
<div id="maxi-chat" onclick="loadChatbox()"><span class="maxi-button">&plus;</span></div>
</div>
<script>
//<![CDATA[
function loadChatbox(){var e=document.getElementById("minim-chat");e.style.display="block";var e=document.getElementById("maxi-chat");e.style.display="none";var e=document.getElementById("chatbox");e.style.margin="0";}
function closeChatbox(){var e=document.getElementById("chatbox");e.style.margin="0 0 -1500px 0";}
function minimChatbox(){var e=document.getElementById("minim-chat");e.style.display="none";var e=document.getElementById("maxi-chat");e.style.display="block";var e=document.getElementById("chatbox");e.style.margin="0 0 -460px 0";}
//]]>
</script>
<script type="text/javascript">
    //alert("hiii");
var nickname = document.getElementsByName('user_name')[0].value;
var userId = document.getElementsByName('user_id')[0].value;
var pic = document.getElementsByName('profile_pic')[0].value;
var appId = '1188D09F-B3E5-4969-B1DC-6F61314059EA';
var currScrollHeight = 0;
var MESSAGE_TEXT_HEIGHT = 27;

var nickname = nickname;
var userId = userId;
var cid = document.getElementsByName('cid')[0].value;
var cname = document.getElementsByName('cname')[0].value;
var channelListPage = 0;
var currChannelUrl = null;
var currChannelInfo = null;
var leaveChannelUrl = '';
var leaveMessagingChannelUrl = '';
var hideChannelUrl = '';
var userListToken = '';
var userListNext = 0;
var targetAddGroupChannel = null;

var isOpenChat = false;
var memberList = [];
var muser = '';
var mname = '';
// 3.0.x
var currentUser;

var userIds = cid;


//var cid = decodeURI(decodeURIComponent(getUrlVars()['cid']));
//var cname = decodeURI(decodeURIComponent(getUrlVars()['cname']));

$('#guide_create').click(function () {
  $('.modal-guide-create').hide();
});

/***********************************************
 *                OPEN CHAT
 **********************************************/
 //alert(cid);
 if(cid!='undefined')
 {
 startSendBird(userId, nickname);
}
// For typical 1-to-1 chat which is unique between two users
/*var users = [];
 var users = cid;
 var isDistinct = true;
sb.GroupChannel.createChannelWithUserIds([users], isDistinct, 'test_name','','', function(createdChannel, error){
    if (error) {
        alert(error);
        return;
    }

});*/

$('#btn_open_chat').click(function () {
  popupInit();
  $('.modal-guide-create').hide();
  $('.left-nav-button-guide').hide();
  $('.modal-messaging').hide();
  $('#btn_messaging_chat').removeClass('left-nav-messaging--active');

  if ($(this).hasClass('left-nav-open--active')) {
    $('.right-section__modal-bg').hide();
    $(this).removeClass('left-nav-open--active');
    $('.modal-open-chat').hide();
  } else {
    $('.right-section__modal-bg').show();
    $(this).addClass('left-nav-open--active');
    getChannelList(true);
  }
});

$('.modal-open-chat-more').click(function () {
  getChannelList(false);
});

// Create OpenChannel
$('#btn_create_open_channel').click(function () {
  modalInput("Create Open Channel", "", function (channelName) {
    sb.OpenChannel.createChannel(channelName, '', '', function (channel, error) {
      joinChannel(channel.url);
    });
  });
});

/*$(document).on('click', '.chat-canvas__list-name', function (e) {
  var userId = $(this).data('userid');
  if (isCurrentUser(userId)) {
    console.log('can not block, current user');
    return;
  }

  modalConfirm('Are you Sure?', 'Do you want to block this user?', function () {
    sb.blockUserWithUserId(userId, function (response, error) {
      console.log(response, error);
    });
  });
})*/;


$(document).on('click', '.chat-canvas__list-text', function (e) {
  var userId = $(this).prev().prev().data('userid');
  var messageId = $(this).data('messageid');
  var channelUrl = currChannelInfo.url;
  var messageObject = $(this);

  modalConfirm('Are you Sure?', 'Do you want to delete message?', function () {
    currChannelInfo.deleteMessage(channelMessageList[channelUrl][messageId]['message'], function (response, error) {
      if (!error) {
        delete(channelMessageList[channelUrl][messageId]);
        messageObject.parent().remove();
      }
    });
  });
});


function modalConfirm(title, desc, submit, close) {
  $('.modal-confirm-title').html(title);
  $('.modal-confirm-desc').html(desc);

  // $('.modal-confirm-submit').unbind('click');
  // $('.modal-confirm-close').unbind('click');

  $('.modal-confirm-close').click(function () {
    if (close) {
      close();
    }
    $('.modal-confirm').hide();
    $('.modal-confirm-close').unbind('click');
  });

  $('.modal-confirm-submit').click(function () {
    if (submit) {
      submit();
    }
    $('.modal-confirm').hide();
    $('.modal-confirm-submit').unbind('click');
  });

  $('.modal-confirm').show();
}

function modalInput(title, desc, submit, close) {
  $('.modal-input-title').html(title);
  $('.modal-input-desc').html(desc);

  // $('.modal-confirm-submit').unbind('click');
  // $('.modal-confirm-close').unbind('click');

  $('.modal-input-box-elem').keydown(function (e) {
    var keyCode = e.which;
    switch (keyCode) {
      case 13: // enter
        if (submit) {
          submit($('.modal-input-box-elem').val());
        }
        $('.modal-input').hide();
        $('.modal-input-close').unbind('click');
        $('.modal-input-box-elem').unbind('keydown');
        break;
      case 27: // esc
        if (close) {
          close();
        }
        $('.modal-input').hide();
        $('.modal-input-close').unbind('click');
        $('.modal-input-box-elem').unbind('keydown');
        break;
    }
  });

  $('.modal-input-close').click(function () {
    if (close) {
      close();
    }
    $('.modal-input').hide();
    $('.modal-input-close').unbind('click');
  });

  $('.modal-input-submit').click(function () {
    if (submit) {
      submit($('.modal-input-box-elem').val());
    }
    $('.modal-input').hide();
    $('.modal-input-submit').unbind('click');
  });

  $('.modal-input').show(0, function () {
    $('.modal-input-box-elem').focus();
  });
}



function getChannelList(isFirstPage) {
  if (isFirstPage) {
    $('.modal-open-chat-list').html('');
    OpenChannelListQuery = sb.OpenChannel.createOpenChannelListQuery();
  }

  if (OpenChannelListQuery.hasNext) {
    OpenChannelListQuery.next(function (channels, error) {
      if (error) {
        return;
      }

      $('.modal-open-chat-list').append(createChannelList(channels));
      channelListPage = channels['page'];
      if (channels['next'] != 0) {
        $('.modal-open-chat-more').show();
      } else {
        $('.modal-open-chat-more').hide();
      }
      $('.modal-open-chat').show();
    });
  }
}

function createChannelList(channels) {
  var channelListHtml = '';

  for (var i in channels) {
    var channel = channels[i];
    var item = '<div class="modal-open-chat-list__item" onclick="joinChannel(\'%channelUrl%\')">%channelImage% &nbsp;%channelName%</div>';
    item = item.replace(/%channelUrl%/, channel.url).replace(/%channelName%/, xssEscape(channel.name));
    item = item.replace(/%channelImage%/, '<img src="' + channel.coverUrl + '" /> ');

    channelListHtml += item;
  }
  return channelListHtml;
}

function joinChannel(channelUrl) {
  if (channelUrl == currChannelUrl) {
    navInit();
    popupInit();
    return false;
  }

  PreviousMessageListQuery = null;
  sb.OpenChannel.getChannel(channelUrl, function (channel, error) {
    if (error) {
      return;
    }

    channel.enter(function (response, error) {
      if (error) {
        if (error.code == 900100) {
          alert('Oops...You got banned out from this channel.');
        }
        return;
      }

      $('.chat-top__button-hide').hide();

      currChannelInfo = channel;
      currChannelUrl = channelUrl;

      $('.chat-empty').hide();
      initChatTitle(xssEscape(currChannelInfo.name), 0);

      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').show();

      navInit();
      popupInit();

      isOpenChat = true;
      loadMoreChatMessage(scrollPositionBottom);
      /*setWelcomeMessage(xssEscape(currChannelInfo.name));*/
      addChannel();
      $('.chat-input-text__field').attr('disabled', false);

    });
  });
}

function addChannel() {
  if ($('.left-nav-channel-open').length == 0) {
    $('.left-nav-channel-empty').hide();
  }

  $.each($('.left-nav-channel'), function (index, channel) {
    $(channel).removeClass('left-nav-channel-open--active');
    $(channel).removeClass('left-nav-channel-messaging--active');
    $(channel).removeClass('left-nav-channel-group--active');
  });

  var addFlag = true;
  $.each($('.left-nav-channel-open'), function (index, channel) {
    if (currChannelUrl == $(channel).data('channel-url')) {
      $(channel).addClass('left-nav-channel-open--active');
      addFlag = false;
    }
  });

  if (addFlag) {
    $('#open_channel_list').append(
      '<div class="left-nav-channel left-nav-channel-open left-nav-channel-open--active" ' +
      '     onclick="joinChannel(\'' + currChannelInfo.url + '\')"' +
      '     data-channel-url="' + currChannelInfo.url + '"' +
      '>' +
      (currChannelInfo.name.length > 12 ? xssEscape(currChannelInfo.name.substring(0, 12)) + '...' : xssEscape(currChannelInfo["name"])) +
      '</div>'
    );
  }

  $('.modal-guide-create').hide();
  $('.left-nav-button-guide').hide();
}

function leaveChannel(channel, obj) {
  popupInit();

  leaveChannelUrl = channel['channel_url'];

  if ($('.chat-top__button-invite').is(':visible')) {
    $('.modal-leave-channel-desc').html('Do you want to leave this messaging channel?');
  } else {
    $('.modal-leave-channel-desc').html('Do you want to leave this channel?');
  }

  $('.modal-leave-channel').show();
  return false;
}

$('.chat-top__button-leave').click(function () {
  if ($('.chat-top__button-invite').is(':visible')) {
    endMessaging(currChannelInfo, $(this))
  } else {
    leaveChannel(currChannelInfo, $(this));
  }
});

$('.chat-top__button-hide').click(function () {
  if (currChannelInfo.isOpenChannel()) {
    return;
  }

  hideChannel(currChannelInfo);
});

$('.chat-top__button-member').click(function () {
  if ($('.modal-member').is(":visible")) {
    $(this).removeClass('chat-top__button-member--active');
    $('.modal-member').hide();
  } else {
    popupInit();
    $(this).addClass('chat-top__button-member--active');
    getMemberList(currChannelInfo);
    $('.modal-member').show();
  }
});

$('.chat-top__button-invite').click(function () {
  if ($('.modal-invite').is(":visible")) {
    $(this).removeClass('chat-top__button-invite--active');
    $('.modal-invite').hide();
  } else {
    popupInit();
    $(this).addClass('chat-top__button-invite--active');
    getUserList();
    $('.modal-invite').show();
  }
});

$('.chat-top__button-block').click(function () {
  var bub = document.getElementById('block').value;
  var isBlock = true;
  
    return new Promise((resolve, reject) => {
    if (bub == 0 && cid!=userId) 
    {
      modalConfirm('Are you Sure?', 'Do you want to block this user?', function () {
        UserListQuery = sb.createUserListQuery();
         UserListQuery.next(function (userList, error) {
          if (error) {
            return;
          }
          var users = userList;
           $.each(users, function (index, user) { 
            });
       sb.blockUserWithUserId(cid, function (response, error) {
          if (error) {
            //alert("hi");
          } else {
            document.getElementById('block').value = 1;
            //alert("hello");
            //alert(isBlock);
          }
        });
    });
    });
  }
  else 
  {
    modalConfirm('Are you Sure?', 'Do you want to unblock this user?', function () {
       sb.unblockUserWithUserId(cid, function (response, error) {
          if (error) {
            //alert("hoo");
          } else {
             document.getElementById('block').value = 0;   
            //alert("hellooo");
          }
        });
     });
      }
  });
  });


function getMemberList(channel) {
  if (channel.isOpenChannel()) {
    OpenChannelParticipantListQuery = channel.createParticipantListQuery(channel);
    OpenChannelParticipantListQuery.next(function (members, error) {
      if (error) {
        return;
      }

      $('.modal-member-list').html('');
      var memberListHtml = '';
      members.forEach(function (member) {
        memberListHtml += '' +
          '<div class="modal-member-list__item">' +
          '<div class="modal-member-list__icon modal-member-list__icon--online"></div>' +
          '  <div class="modal-member-list__name">' +
          (member.nickname.length > 13 ? xssEscape(member.nickname.substring(0, 12)) + '...' : xssEscape(member.nickname)) +
          '  </div>' +
          '</div>';
      });
      $('.modal-member-list').html(memberListHtml);
    });
  }

  if (channel.isGroupChannel()) {
    var members = channel.members;
    $('.modal-member-list').html('');

    var memberListHtml = '';
    members.forEach(function (member) {
      if (member.connectionStatus == 'online') {
        var isOnline = 'online';
        var dateTimeString = '';
      } else {
        var isOnline = '';
        var dateTime = new Date(member.lastSeenAt);
        var dateTimeString = (dateTime.getMonth() + 1) + '/' + dateTime.getDate() + ' ' + dateTime.getHours() + ':' + dateTime.getMinutes();
      }


      memberListHtml += '' +
        '<div class="modal-member-list__item">' +
        '<div class="modal-member-list__icon"><img src="' + member.profileUrl + '" /></div>' +
        '  <div class="modal-member-list__name ' + isOnline + '">' +
        (member.nickname.length > 13 ? xssEscape(member.nickname.substring(0, 12)) + '...' : xssEscape(member.nickname)) +
        '  </div>' +
        '<div class="modal-member-list__lastseenat">' + dateTimeString + '</div>' +
        '</div>';
    });
    $('.modal-member-list').html(memberListHtml);
  }
}

$('.modal-leave-channel-close').click(function () {
  $('.modal-leave-channel').hide();
  leaveChannelUrl = '';
  return false;
});

$('.modal-leave-channel-submit').click(function () {
  $('#open_channel_list').removeClass('chat-top__button-leave--active');

  leaveCurrChannel();
});

$('.modal-hide-channel-close').click(function () {
  $('.modal-hide-channel').hide();
  leaveChannelUrl = '';
  return false;
});

$('.modal-hide-channel-submit').click(function () {
  // $('#open_channel_list').removeClass('chat-top__button-leave--active');
  // leaveCurrChannel();
  hideCurrChannel();
});
/***********************************************
 *              // END OPEN CHAT
 **********************************************/


/***********************************************
 *                MESSAGING
 **********************************************/
$('#btn_messaging_chat').click(function () {
  popupInit();
  $('.modal-guide-create').hide();
  $('.left-nav-button-guide').hide();
  $('.modal-open-chat').hide();
  $('#btn_open_chat').removeClass('left-nav-open--active');

  if ($(this).hasClass('left-nav-messaging--active')) {
    $('.right-section__modal-bg').hide();
    $(this).removeClass('left-nav-messaging--active');
    $('.modal-messaging').hide();
  } else {
    $('.right-section__modal-bg').show();
    $(this).addClass('left-nav-messaging--active');
    userListToken = '';
    userListNext = 0;
    $('.modal-messaging-list').html('');
    getUserList(true);
    $('.modal-messaging').show();
  }
});

function getUserList(isFirstPage) {
  if (isFirstPage) {
    $('.modal-messaging-list').html('');
    UserListQuery = sb.createUserListQuery();
    //alert(userId);
  }

  if (UserListQuery.hasNext) {
    UserListQuery.next(function (userList, error) {
      if (error) {
        return;
      }
      var users = userList;
      var cid = decodeURI(decodeURIComponent(getUrlVars()['cid']));
      //alert(userId);

      $('.modal-messaging-more').remove();
      $.each(users, function (index, user) {
        UserList[user.userId] = user;
        // if(cid!='')
        // {
             if(user.userId != userId)
             {
            if (!isCurrentUser(user.userId)) {
              $('.modal-messaging-list').append(
                '<div class="modal-messaging-list__item" onclick="userClick($(this))">' +
                (user.nickname.length > 12 ? xssEscape(user.nickname.substring(0, 12)) + '...' : xssEscape(user.nickname)) +
                '  <div class="modal-messaging-list__icon" data-guest-id="' + user.userId + '"></div>' +
                '</div>'
              );
            }
           }
    // }
       // else
       // {
       //    if (!isCurrentUser(user.userId)) {
       //    $('.modal-messaging-list').append(
       //      '<div class="modal-messaging-list__item" onclick="userClick($(this))">' +
       //      (user.nickname.length > 12 ? xssEscape(user.nickname.substring(0, 12)) + '...' : xssEscape(user.nickname)) +
       //      '  <div class="modal-messaging-list__icon" data-guest-id="' + user.userId + '"></div>' +
       //      '</div>'
       //    );
       //  }
       // }
      });

      if (UserListQuery.hasNext) {
        $('.modal-messaging-list').append(
          '<div class="modal-messaging-more" onclick="userListLoadMore()">MORE<div class="modal-messaging-more__icon"></div></div>'
        );
      } else {
        $('.modal-messaging-more').remove();
      }
    });
  }

}

function userListLoadMore() {
  getUserList(false);
}

function userClick(obj) {
  var el = obj.find('div');
  if (el.hasClass('modal-messaging-list__icon--select')) {
    el.removeClass('modal-messaging-list__icon--select');
  } else {
    el.addClass('modal-messaging-list__icon--select');
  }

  var selectCount = $('.modal-messaging-list__icon--select').length;
  if (selectCount > 1) {
    $('.modal-messaging-top__title').html('Group Chat ({})'.format(selectCount));
  } else {
    $('.modal-messaging-top__title').html('Group Channel');
  }
}

function startMessaging() {
  if ($('.modal-messaging-list__icon--select').length == 0) {
    alert('Please select user');
    return false;
  }

  var startMessagingProcess = function () {
    var users = [];
    $.each($('.modal-messaging-list__icon--select'), function (index, user) {
      users.push(UserList[$(user).data("guest-id")]);
    });

    PreviousMessageListQuery = null;
    sb.GroupChannel.createChannel(users, isDistinct, 'test_name', '', '', function (channel, error) {
      if (error) {
        return;
      }

      currChannelInfo = channel;
      currChannelUrl = channel.url;

      var members = channel.members;
      var channelTitle = '';

      $.each(members, function (index, member) {
        if (!isCurrentUser(member.userId)) {
          channelTitle += xssEscape(member.nickname) + ', ';
        }
      });

      channelTitle = channelTitle.slice(0, -2);
      var channelMemberList = channelTitle;
      if (channelTitle.length > 20) {
        channelTitle = channelTitle.substring(0, 20);
        channelTitle += '...'
      }
      var titleType = 1;
      var isGroup = true;
      if (members.length > 2) {
        channelTitle += '({})'.format(members.length);
        titleType = 2;
      }

      $('.chat-empty').hide();
      initChatTitle(channelTitle, titleType);
      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').show();

      navInit();
      popupInit();
      makeMemberList(members);
      isOpenChat = false;
      loadMoreChatMessage(scrollPositionBottom);
      /*setWelcomeMessage('Messaging Channel');*/
      addGroupChannel(true, channelMemberList, currChannelInfo);
      $('.chat-input-text__field').attr('disabled', false);
    });
  };

  var isDistinct;
  modalConfirm('Create Channel', 'Do you want to create distinct channel?', function () {
    isDistinct = true;
    startMessagingProcess();
  }, function () {
    isDistinct = false;
    startMessagingProcess();
  });

  return;
}

function startMessaging1() {
  // if ($('.modal-messaging-list__icon--select').length == 0) {
  //   alert('Please select user');
  //   return false;
  // }
 var startMessagingProcess = function () {
    var users = [];
    var users = cid;
  
    PreviousMessageListQuery = null;
    sb.GroupChannel.createChannelWithUserIds([users], isDistinct, 'test_name', '', '', function (channel, error) {
      if (error) {
        //alert(error);
        return;
      }
      currChannelInfo = channel;
      currChannelUrl = channel.url;

      var members = channel.members;
      //alert(members);
      var channelTitle = '';

      $.each(members, function (index, member) {
        if (!isCurrentUser(member.userId)) {
          muser += member.userId;
          mname += member.nickname;
          channelTitle += xssEscape(member.nickname) + ', ';
        }
      });
      channelTitle = channelTitle.slice(0, -2);
      var channelMemberList = channelTitle;
      if (channelTitle.length > 20) {
        channelTitle = channelTitle.substring(0, 20);
        channelTitle += '...'
      }
      var titleType = 1;
      var isGroup = true;
      if (members.length > 2) {
        channelTitle += '({})'.format(members.length);
        titleType = 2;
      }

      $('.chat-empty').hide();
      initChatTitle(channelTitle, titleType);
      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').show();

      navInit();
      popupInit();
      makeMemberList(members);

      isOpenChat = false;
      loadMoreChatMessage(scrollPositionBottom);
      /*setWelcomeMessage('Messaging Channel');*/
      addGroupChannel(true, channelMemberList, currChannelInfo);
      $('.chat-input-text__field').attr('disabled', false);
    });
  };
  var isDistinct;
    
modalConfirm('start messaging', 'Do you want to Start Chat?', function () {
    isDistinct = true;
    startMessagingProcess();
  }, function () {
    // isDistinct = false;
    // startMessagingProcess();
    return;
  });

  return;
}
function deleteChannel(channel) {
  var channelUrl = channel.url;

  if (channel.isGroupChannel()) {
    $('.left-nav-channel-group[data-channel-url=' + channelUrl + ']').remove();
    delete(groupChannelLastMessageList[channelUrl]);
  }

  if (channel.isOpenChannel()) {
    $('.left-nav-channel-open[data-channel-url=' + channelUrl + ']').remove();
  }

  try {
    delete(channelMessageList[channelUrl]);
  } catch (e) {
    // pass
  }

  if (channel == currChannelInfo) {
    leaveCurrChannel();
  }
}

function hideCurrChannel() {
  console.log('hideCurrChannel called');
  if (currChannelInfo.isGroupChannel()) {
    currChannelInfo.hide(function (response, error) {
      if (error) {
        return;
      }

      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').hide();
      initChatTitle('', -1);
      $('.chat-empty').show();

      $('.left-nav-channel-messaging--active').remove();
      $('.left-nav-channel-group--active').remove();

      $('.modal-hide-channel').hide();
      channelListPage = 0;
      currChannelUrl = null;
      currChannelInfo = null;
      leaveMessagingChannelUrl = '';

      $('.chat-input-text__field').attr('disabled', true);
    });
  }
}

function leaveCurrChannel() {
  console.log('leaveCurrChannel called');
  if (currChannelInfo.isOpenChannel()) {
    currChannelInfo.exit(function (response, error) {
      if (error) {
        return;
      }
      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').hide();
      initChatTitle('', -1);
      $('.chat-empty').show();

      $('.left-nav-channel-open--active').remove();

      if ($('.left-nav-channel-open').length == 0) {
        $('.left-nav-channel-empty').show();
      }

      $('.modal-leave-channel').hide();
      channelListPage = 0;
      currChannelUrl = null;
      currChannelInfo = null;
      leaveChannelUrl = '';

      $('.chat-input-text__field').attr('disabled', true);
    });
  } else if (currChannelInfo.isGroupChannel()) {
    currChannelInfo.leave(function (response, error) {
      if (error) {
        return;
      }

      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').hide();
      initChatTitle('', -1);
      $('.chat-empty').show();

      $('.left-nav-channel-messaging--active').remove();
      $('.left-nav-channel-group--active').remove();

      $('.modal-leave-channel').hide();
      channelListPage = 0;
      currChannelUrl = null;
      currChannelInfo = null;
      leaveMessagingChannelUrl = '';

      $('.chat-input-text__field').attr('disabled', true);
    });
  }
}


function moveToTopGroupChat(channelUrl) {
  $('.left-nav-channel-group[data-channel-url=' + channelUrl + ']').prependTo('#messaging_channel_list');
}

function updateGroupChannelLastMessage(message) {
  var lastMessage = '';
  var lastMessageDateString = '';
  if (message) {
    lastMessage = xssEscape(message.message);
    var calcSeconds = (new Date().getTime() - message.createdAt) / 1000;
    var parsedValue;

    if (calcSeconds < 60) {
      parsedValue = parseInt(calcSeconds);
      if (parsedValue == 1) {
        lastMessageDateString = parsedValue + ' sec ago';
      } else {
        lastMessageDateString = parsedValue + ' secs ago';
      }
    } else if (calcSeconds / 60 < 60) {
      parsedValue = parseInt(calcSeconds / 60);
      if (parsedValue == 1) {
        lastMessageDateString = parsedValue + ' min ago';
      } else {
        lastMessageDateString = parsedValue + ' mins ago';
      }
    } else if (calcSeconds / (60 * 60) < 24) {
      parsedValue = parseInt(calcSeconds / (60 * 60));
      if (parsedValue == 1) {
        lastMessageDateString = parsedValue + ' hour ago';
      } else {
        lastMessageDateString = parsedValue + ' hours ago';
      }
    } else {
      parsedValue = parseInt(calcSeconds / (60 * 60 * 24));
      if (parsedValue == 1) {
        lastMessageDateString = parsedValue + ' day ago';
      } else {
        lastMessageDateString = parsedValue + ' days ago';
      }
    }

    if (lastMessageDateString) {
      lastMessageDateString = '<div><img src="/web/frontend/static/img/icon-time.png" style="vertical-align: moddle; padding-bottom: 2px;" /> <span> ' + lastMessageDateString + '</span></div>';
    }

    $('.left-nav-channel-group[data-channel-url=' + message.channelUrl + '] .left-nav-channel-lastmessage').html(lastMessage);
    $('.left-nav-channel-group[data-channel-url=' + message.channelUrl + '] .left-nav-channel-lastmessagetime').html(lastMessageDateString);
  }
}

function updateGroupChannelListAll() {
  for (var i in groupChannelLastMessageList) {
    var message = groupChannelLastMessageList[i];
    updateGroupChannelLastMessage(message);
  }
}


function addGroupChannel(isGroup, channelMemberList, targetChannel) {
  if (isGroup) {
    groupChannelLastMessageList[targetChannel.url] = targetChannel.lastMessage;
  }

  $.each($('.left-nav-channel'), function (index, channel) {
    $(channel).removeClass('left-nav-channel-open--active');
    $(channel).removeClass('left-nav-channel-messaging--active');
    $(channel).removeClass('left-nav-channel-group--active');
  });

  var addFlag = true;
  $.each($('.left-nav-channel-messaging'), function (index, channel) {
    if (currChannelUrl == $(channel).data('channel-url')) {
      $(channel).addClass('left-nav-channel-messaging--active');
      $(channel).find('div[class="left-nav-channel__unread"]').remove();
      addFlag = false;
    }
  });
  $.each($('.left-nav-channel-group'), function (index, channel) {
    if (currChannelUrl == $(channel).data('channel-url')) {
      $(channel).addClass('left-nav-channel-group--active');
      $(channel).find('div[class="left-nav-channel__unread"]').remove();
      addFlag = false;
    }
  });

  if (channelMemberList.length > 9) {
    channelMemberList = channelMemberList.substring(0, 9) + '...';
  }

  targetAddGroupChannel = targetChannel;
  if (addFlag && !isGroup) {
    $('#messaging_channel_list').append(
      '<div class="left-nav-channel left-nav-channel-messaging left-nav-channel-messaging--active" ' +
      '     onclick="joinGroupChannel(\'' + targetChannel.url + '\')"' +
      '     data-channel-url="' + targetChannel.url + '"' +
      '>' +
      channelMemberList +
      '</div>'
    );

    //groupChannelListMembersAndProfileImageUpdate(targetChannel);
  } else if (addFlag && isGroup) {
    $('#messaging_channel_list').append(
      '<div class="left-nav-channel left-nav-channel-group left-nav-channel-group--active" ' +
      '     onclick="joinGroupChannel(\'' + targetChannel.url + '\')"' +
      '     data-channel-url="' + targetChannel.url + '"' +
      '>' +
      '<div class="left-nav-channel-members">' + channelMemberList + '</div>' +
      '<div class="left-nav-channel-lastmessage"></div>' +
      '<div class="left-nav-channel-lastmessagetime"></div>' +
      '</div>'
    );
    targetAddGroupChannel = null;
   // groupChannelListMembersAndProfileImageUpdate(targetChannel);
  }

  $('.modal-guide-create').hide();
  $('.left-nav-button-guide').hide();
}

/*function groupChannelListMembersAndProfileImageUpdate(targetChannel) {
  // select profileImage
  var members = targetChannel.members;
  // console.log(members);

  var membersProfileImageUrl = [];
  var membersNickname = '';
  for (var i in members) {
    var member = members[i];
    if (sb.currentUser.userId != member.userId) {
      membersProfileImageUrl.push(member.profileUrl);
    }

    membersNickname += xssEscape(member.nickname) + ', ';
  }
  membersNickname = membersNickname.substring(0, membersNickname.length - 2);

  if (membersNickname.length > 22) {
    membersNickname = membersNickname.substring(0, 22) + '...';
  }

  // console.log(membersProfileImageUrl);
  var selectSequence = parseInt(Math.random() * membersProfileImageUrl.length);
  // console.log(selectSequence);
  var selectedProfileImageUrl = membersProfileImageUrl[selectSequence];
  // console.log(selectedProfileImageUrl);

  var targetElem = $('.left-nav-channel-group[data-channel-url=' + targetChannel.url + ']');
  // $('.left-nav-channel-group[data-channel-url='+targetChannel.url+']')

  targetElem.css('background-image', 'url(' + selectedProfileImageUrl + ')');

  // member nickname update
  targetElem.find('.left-nav-channel-members').html(membersNickname);

}
*/
function joinGroupChannel(channelUrl, callback) {
  // console.log('joinGroupChannel:', channelUrl);

  if (channelUrl == currChannelUrl) {
    navInit();
    popupInit();
    $.each($('.left-nav-channel'), function (index, channel) {
      if ($(channel).data('channel-url') == channelUrl) {
        $(channel).find('div[class="left-nav-channel__unread"]').remove();
      }
    });
    return false;
  }

  PreviousMessageListQuery = null;
  sb.GroupChannel.getChannel(channelUrl, function (channel, error) {
    if (error) {
      console.error(error);
      return;
    }

    channel.markAsRead();

    currChannelInfo = channel;
    currChannelUrl = channelUrl;

    var members = channel.members;
    var channelTitle = '';

    channel.refresh(function () {
      // TODO
    });

    $.each(members, function (index, member) {
      if (!isCurrentUser(member.userId)) {
        channelTitle += xssEscape(member.nickname) + ', ';
      }
    });

    channelTitle = channelTitle.slice(0, -2);
    var channelMemberList = channelTitle;
    if (channelTitle.length > 20) {
      channelTitle = channelTitle.substring(0, 20);
      channelTitle += '...';
    }
    var titleType = 1;
    var isGroup = false;
    if (members.length > 2) {
      channelTitle += '({})'.format(members.length);
      titleType = 2;
      isGroup = true;
    }

    $('.chat-empty').hide();
    initChatTitle(channelTitle, titleType);
    $('.chat-canvas').html('');
    $('.chat-input-text__field').val('');
    $('.chat').show();

    navInit();
    popupInit();
    makeMemberList(members);

    isOpenChat = false;
    loadMoreChatMessage(scrollPositionBottom);
    /*setWelcomeMessage('Group Channel');*/
    addGroupChannel(isGroup, channelMemberList, currChannelInfo);
    $('.chat-input-text__field').attr('disabled', false);

    $('.chat-top__button-hide').show();
    if (callback) {
      callback();
    }
  });

  return;

}

function endMessaging(channel, obj) {
  popupInit();
  leaveMessagingChannelUrl = channel.url;
  $('.modal-leave-channel-desc').html('Do you want to leave this messaging channel?');
  $('.modal-leave-channel').show();
  return false;
}

function hideChannel(channel) {
  popupInit();
  hideChannelUrl = channel.url;
  $('.modal-hide-channel-desc').html('Do you want to hide this channel?');
  $('.modal-hide-channel').show();
  return false;
}

function inviteMember() {
  if ($('.modal-messaging-list__icon--select').length == 0) {
    alert('Please select user');
    return false;
  }

  var userIds = [];
  $.each($('.modal-messaging-list__icon--select'), function (index, user) {
    if ($(user).data("guest-id")) {
      userIds.push($(user).data("guest-id"));
    }
  });

  currChannelInfo.inviteWithUserIds(userIds, function (response, error) {
    if (error) {
      return;
    }

    popupInit();
  });

}

function getGroupChannelList() {
  GroupChannelListQuery.next(function (channels, error) {
    if (error) {
      return;
    }

    channels.forEach(function (channel) {
      var channelMemberList = '';
      var members = channel.members;
      members.forEach(function (member) {
        if (currentUser.userId != member.userId) {
          channelMemberList += xssEscape(member.nickname) + ', ';
        }
      });

      channelMemberList = channelMemberList.slice(0, -2);
      addGroupChannel(true, channelMemberList, channel);

      $.each($('.left-nav-channel'), function (index, item) {
        $(item).removeClass('left-nav-channel-messaging--active');
        $(item).removeClass('left-nav-channel-group--active');
      });

      var targetUrl = channel.url;
      var unread = channel.unreadMessageCount > 9 ? '9+' : channel.unreadMessageCount;
      if (unread != 0) {
        $.each($('.left-nav-channel'), function (index, item) {
          if ($(item).data("channel-url") == targetUrl) {
            addUnreadCount(item, unread, targetUrl);
          }
        });
      }
    });

  });

}

function makeMemberList(members) {
  var item = {};
  //Clear memberList before updating it
  memberList = [];
  $.each(members, function (index, member) {
    item = {};
    if (!isCurrentUser(member['user_id'])) {
      item["user_id"] = member["user_id"];
      item["name"] = xssEscape(member["name"]);
      memberList.push(item);
    }
  });
}
/***********************************************
 *            // END MESSAGING
 **********************************************/


/***********************************************
 *            SendBird Settings
 **********************************************/
var sb;

var GroupChannelListQuery;
var OpenChannelListQuery;
var OpenChannelParticipantListQuery;

var UserListQuery;
var SendMessageHandler;

var UserList = {};
var isInit = false;

var channelMessageList = {};
var groupChannelLastMessageList = {};


function startSendBird(userId, nickName) {
  sb = new SendBird({
    appId: appId
  });

  sb.connect(userId, function (user, error) {
    if (error) {
      return;
    } else {
    //function createNewChannel(userIds) {
    this.sb = new window.SendBird({ appId:'1188D09F-B3E5-4969-B1DC-6F61314059EA'});
    this.sb.GroupChannel.createChannelWithUserIds([userIds], true, 'test_name', '', '', function(channel, error) {
      if (error) {
        alert(error);
        return;
      }
      else
      {
        currChannelInfo = channel;
      currChannelUrl = channel.url;

      var members = channel.members;
      //alert(members);
      var channelTitle = '';

      $.each(members, function (index, member) {
        if (!isCurrentUser(member.userId)) {
          muser += member.userId;
          mname += member.nickname;
          channelTitle += xssEscape(member.nickname) + ', ';
        }
      });
      channelTitle = channelTitle.slice(0, -2);
      var channelMemberList = channelTitle;
      if (channelTitle.length > 20) {
        channelTitle = channelTitle.substring(0, 20);
        channelTitle += '...'
      }
      var titleType = 1;
      var isGroup = true;
      if (members.length > 2) {
        channelTitle += '({})'.format(members.length);
        titleType = 2;
      }

      $('.chat-empty').hide();
      initChatTitle(channelTitle, titleType);
      $('.chat-canvas').html('');
      $('.chat-input-text__field').val('');
      $('.chat').show();

      navInit();
      popupInit();
      makeMemberList(members);

      isOpenChat = false;
      loadMoreChatMessage(scrollPositionBottom);
      /*setWelcomeMessage('Messaging Channel');*/
      addGroupChannel(true, channelMemberList, currChannelInfo);
      $('.chat-input-text__field').attr('disabled', false);
      }
    });
 // }
      initPage(user);
    }
  });

  var initPage = function (user) {
    isInit = true;
    $('.init-check').hide();

    currentUser = user;
    sb.updateCurrentUserInfo(nickName, '', function (response, error) {
      // console.log(response, error);
    });

    GroupChannelListQuery = sb.GroupChannel.createMyGroupChannelListQuery();
    OpenChannelListQuery = sb.OpenChannel.createOpenChannelListQuery();
    UserListQuery = sb.createUserListQuery();

    GroupChannelListQuery.limit = 100;
    GroupChannelListQuery.includeEmpty = true;
    OpenChannelListQuery.limit = 100;

    UserListQuery.limit = 100;

    getGroupChannelList();

    setTimeout(function () {
      updateGroupChannelListAll();
      setInterval(function () {
        updateGroupChannelListAll();
      }, 1000);
    }, 500);
  };

  var ConnectionHandler = new sb.ConnectionHandler();
  ConnectionHandler.onReconnectStarted = function (id) {
    console.log('onReconnectStarted');
  };

  ConnectionHandler.onReconnectSucceeded = function (id) {
    console.log('onReconnectSucceeded');
    if (!isInit) {
      initPage();
    }

    // OpenChannel list reset
    if ($('.right-section__modal-bg').is(':visible')) {
      var withoutCache = true;
      getChannelList(withoutCache);
    }

    // GroupChannel list reset
    GroupChannelListQuery = sb.GroupChannel.createMyGroupChannelListQuery();
    $('#messaging_channel_list').html('');
    getGroupChannelList();

    setTimeout(function () {
      updateGroupChannelListAll();
      setInterval(function () {
        updateGroupChannelListAll();
      }, 1000);
    }, 500);
  };

  ConnectionHandler.onReconnectFailed = function (id) {
    console.log('onReconnectFailed');
  };
  sb.addConnectionHandler('uniqueID', ConnectionHandler);

  var ChannelHandler = new sb.ChannelHandler();
  ChannelHandler.onMessageReceived = function (channel, message) {
    var isCurrentChannel = false;

    if (currChannelInfo == channel) {
      isCurrentChannel = true;
    }

    channel.refresh(function () {});

    // update last message
    if (channel.isGroupChannel()) {
      groupChannelLastMessageList[channel.url] = message;
      updateGroupChannelLastMessage(message);
      moveToTopGroupChat(channel.url);
    }

    if (isCurrentChannel && channel.isGroupChannel()) {
      channel.markAsRead();
    } else {
      if (channel.isGroupChannel()) {
        unreadCountUpdate(channel);
      }
    }

    if (!document.hasFocus()) {
      notifyMessage(channel, xssEscape(message.message));
    }

    if (message.isUserMessage() && isCurrentChannel) {
      setChatMessage(message);
    }

    if (message.isFileMessage() && isCurrentChannel) {
      $('.chat-input-file').removeClass('file-upload');
      $('#chat_file_input').val('');

      if (message.type.match(/^image\/.+$/)) {
        setImageMessage(message);
      } else {
        setFileMessage(message);
      }
    }

    if (message.isAdminMessage() && isCurrentChannel) {
      setBroadcastMessage(message);
    }
  };

  SendMessageHandler = function (message, error) {
    if (error) {
      if (error.code == 900050) {
        setSysMessage({
          'message': 'This channel is freeze.'
        });
        return;
      } else if (error.code == 900041) {
        setSysMessage({
          'message': 'You are muted.'
        });
        return;
      }
    }

    // update last message
    if (groupChannelLastMessageList.hasOwnProperty(message.channelUrl)) {
      groupChannelLastMessageList[message.channelUrl] = message;
      updateGroupChannelLastMessage(message);
    }


    if (message.isUserMessage()) {
      setChatMessage(message);
    }

    if (message.isFileMessage()) {
      $('.chat-input-file').removeClass('file-upload');
      $('#chat_file_input').val('');

      if (message.type.match(/^image\/.+$/)) {
        setImageMessage(message);
      } else {
        setFileMessage(message);
      }
    }

  };

  ChannelHandler.onMessageDeleted = function (channel, messageId) {
    console.log('ChannelHandler.onMessageDeleted: ', channel, messageId);
  };

  ChannelHandler.onReadReceiptUpdated = function (channel) {
    console.log('ChannelHandler.onReadReceiptUpdated: ', channel);
    updateChannelMessageCacheAll(channel);
  };

  ChannelHandler.onTypingStatusUpdated = function (channel) {
    console.log('ChannelHandler.onTypingStatusUpdated: ', channel);

    if (channel == currChannelInfo) {
      showTypingUser(channel);
    }
  };

  ChannelHandler.onUserJoined = function (channel, user) {
    console.log('ChannelHandler.onUserJoined: ', channel, user);
  };

  ChannelHandler.onUserLeft = function (channel, user) {
    console.log('ChannelHandler.onUserLeft: ', channel, user);
    setSysMessage({
      'message': '"' + xssEscape(user.nickname) + '" user is left.'
    });

    if (channel.isGroupChannel()) {
      //groupChannelListMembersAndProfileImageUpdate(channel);
    }
  };

  ChannelHandler.onUserEntered = function (channel, user) {
    console.log('ChannelHandler.onUserEntered: ', channel, user);
  };

  ChannelHandler.onUserExited = function (channel, user) {
    console.log('ChannelHandler.onUserExited: ', channel, user);
  };

  ChannelHandler.onUserMuted = function (channel, user) {
    console.log('ChannelHandler.onUserMuted: ', channel, user);
  };

  ChannelHandler.onUserUnmuted = function (channel, user) {
    console.log('ChannelHandler.onUserUnmuted: ', channel, user);
  };

  ChannelHandler.onUserBanned = function (channel, user) {
    console.log('ChannelHandler.onUserBanned: ', channel, user);
    if (isCurrentUser(user.userId)) {
      alert('Oops...You got banned out from this channel.');
      navInit();
      popupInit();
    } else {
      setSysMessage({
        'message': '"' + xssEscape(user.nickname) + '" user is banned.'
      });
    }
  };

  ChannelHandler.onUserUnbanned = function (channel, user) {
    console.log('ChannelHandler.onUserUnbanned: ', channel, user);
    setSysMessage({
      'message': '"' + xssEscape(user.nickname) + '" user is unbanned.'
    });
  };

  ChannelHandler.onChannelFrozen = function (channel) {
    console.log('ChannelHandler.onChannelFrozen: ', channel);
  };

  ChannelHandler.onChannelUnfrozen = function (channel) {
    console.log('ChannelHandler.onChannelUnfrozen: ', channel);
  };

  ChannelHandler.onChannelChanged = function (channel) {
    console.log('ChannelHandler.onChannelChanged: ', channel);
    if (channel.isGroupChannel()) {
     // groupChannelListMembersAndProfileImageUpdate(channel);
    }
  };

  ChannelHandler.onChannelDeleted = function (channel) {
    console.log('ChannelHandler.onChannelDeleted: ', channel);
    deleteChannel(channel);
  };

  sb.addChannelHandler('channel', ChannelHandler);
}

var showTypingUser = function (channel) {
  if (!channel.isGroupChannel()) {
    return;
  }

  if (!channel.isTyping()) {
    $('.chat-input-typing').hide();
    $('.chat-input-typing').html('');
    return;
  }

  var typingUser = channel.getTypingMembers();

  var nicknames = '';
  for (var i in typingUser) {
    var nickname = xssEscape(typingUser[i].nickname);
    nicknames += nickname + ', ';
  }
  if (nicknames.length > 2) {
    nicknames = nicknames.substring(0, nicknames.length - 2);
    var fields = nicknames.split(',');
    $('.chat-input-typing').html('{} typing...'.format(fields[0]));
    $('.chat-input-typing').show();
  } else {
    $('.chat-input-typing').hide();
    $('.chat-input-typing').html('');
  }
};


/***********************************************
 *          // END SendBird Settings
 **********************************************/


/***********************************************
 *              Common Function
 **********************************************/
function initChatTitle(title, index) {
  $('.chat-top__title').html(title);
  $('.chat-top__title').show();
  $('.chat-top-button').show();
  $('.chat-top__button-invite').hide();
  $('.chat-top__title').removeClass('chat-top__title--messaging');
  $('.chat-top__title').removeClass('chat-top__title--group');
  if (index == -1) {
    $('.chat-top__title').hide();
    $('.chat-top-button').hide();
  } else if (index == 0) {
    $('.chat-top__button-member').removeClass('chat-top__button-member__all');
    $('.chat-top__button-member').addClass('chat-top__button-member__right');
  } else {
    if (index == 1) {
      $('.chat-top__title').addClass('chat-top__title--messaging');
    } else {
      $('.chat-top__title').addClass('chat-top__title--group');
    }
    $('.chat-top__button-member').removeClass('chat-top__button-member__right');
    $('.chat-top__button-member').addClass('chat-top__button-member__all');
    $('.chat-top__button-invite').show();
  }
}

var scrollPositionBottom = function () {
  var scrollHeight = $('.chat-canvas')[0].scrollHeight;
  $('.chat-canvas')[0].scrollTop = scrollHeight;
  currScrollHeight = scrollHeight;
};

function afterImageLoad(obj) {
  $('.chat-canvas')[0].scrollTop = $('.chat-canvas')[0].scrollTop + obj.height + $('.chat-canvas__list').height();
}

function setChatMessage(message) {
  $('.chat-canvas').append(messageList(message));

  updateChannelMessageCache(currChannelInfo, message);
  scrollPositionBottom();
}

var PreviousMessageListQuery = null;

function loadMoreChatMessage(func) {
  if (!PreviousMessageListQuery) {
    PreviousMessageListQuery = currChannelInfo.createPreviousMessageListQuery();
  }

  PreviousMessageListQuery.load(30, false, function (messages, error) {
    if (error) {
      return;
    }

    var moreMessage = messages;
    var msgList = '';
    messages.forEach(function (message) {
      switch (message.MESSAGE_TYPE) {
        case message.MESSAGE_TYPE_USER:
          msgList += messageList(message);
          break;
        case message.MESSAGE_TYPE_FILE:
          $('.chat-input-file').removeClass('file-upload');
          $('#chat_file_input').val('');

          if (message.type.match(/^image\/.+$/)) {
            msgList += imageMessageList(message);
          } else {
            msgList += fileMessageList(message);
          }
          break;
        default:
      }
    });

    $('.chat-canvas').prepend(msgList);
    $('.chat-canvas')[0].scrollTop = (moreMessage.length * MESSAGE_TEXT_HEIGHT);

    for (var i in messages) {
      var message = messages[i];
      updateChannelMessageCache(currChannelInfo, message);
    }

    if (func) {
      func();
    }
  });
}

function messageList(message) {
  var msgList = '';
  var user = message.sender;
  var channel = currChannelInfo;

  if (message.isAdminMessage()) {
    console.log(message);
  } else {
    if (isCurrentUser(user.userId)) {
        var fields = user.nickname.split(',');
      var readReceiptHtml = '  <label class="chat-canvas__list-readreceipt"></label>';

      var msg = '' +
        '<div class="chat-canvas__list">' +
        '  <label class="chat-canvas__list-name chat-canvas__list-name__user" data-userid="%userid%">' +
        xssEscape(fields[0]) +
        '  </label>' +
        '  <label class="chat-canvas__list-separator">:</label>' +
        '  <label class="chat-canvas__list-text" data-messageid="%messageid%">%message%</label>' +
        readReceiptHtml +
        '</div>';
      msg = msg.replace('%message%', convertLinkMessage(xssEscape(message.message)));
      msg = msg.replace('%userid%', user.userId).replace('%messageid%', message.messageId);

      msgList += msg;
    } else {
        var fields = user.nickname.split(',');
      var msg = '' +
        '<div class="chat-canvas__list">' +
        '  <label class="chat-canvas__list-name" data-userid="%userid%" data-nickname="%nickname%">' +
        xssEscape(fields[0]) +
        '  </label>' +
        '  <label class="chat-canvas__list-separator">:</label>' +
        '  <label class="chat-canvas__list-text" data-messageid="%messageid%">' +
        convertLinkMessage(xssEscape(message.message)) +
        '  </label>' +
        '</div>';
      msgList += msg.replace('%userid%', user.userId).replace('%nickname%', xssEscape(user.nickname)).replace('%messageid%', message.messageId);
    }
  }

  return msgList;
}

function updateChannelMessageCache(channel, message) {
  var readReceipt = -1;
  if (channel.isGroupChannel()) {
    readReceipt = channel.getReadReceipt(message);
  }
  if (!channelMessageList.hasOwnProperty(channel.url)) {
    channelMessageList[channel.url] = {};
  }

  if (!channelMessageList[channel.url].hasOwnProperty(message.messageId)) {
    channelMessageList[channel.url][message.messageId] = {};
  }

  channelMessageList[channel.url][message.messageId]['message'] = message;

  if (channel.isGroupChannel() && readReceipt >= 0) {
    channelMessageList[channel.url][message.messageId]['readReceipt'] = readReceipt;

    var elemString = '.chat-canvas__list-text[data-messageid=' + message.messageId + ']';
    var elem = $(elemString).next();
    if (readReceipt == 0) {
      elem.html('').hide();
    } else {
      elem.html(readReceipt);
      if (!elem.is(':visible')) {
        elem.show();
      }
    }
  } else {
    return;
  }
}

function updateChannelMessageCacheAll(channel) {
  for (var i in channelMessageList[channel.url]) {
    var message = channelMessageList[channel.url][i]['message'];
    updateChannelMessageCache(channel, message);
  }
}

function fileMessageList(message) {
  var msgList = '';
  var user = message.sender;
  if (isCurrentUser(user.userId)) {
     var fields = user.nickname.split(',');
    msgList += '' +
      '<div class="chat-canvas__list">' +
      '  <label class="chat-canvas__list-name chat-canvas__list-name__user">' +
      xssEscape(fields[0]) +
      '  </label>' +
      '  <label class="chat-canvas__list-separator">:</label>' +
      '  <label class="chat-canvas__list-text" data-messageid="%messageid%">'.replace('%messageid%', message.messageId) +
      '    <label class="chat-canvas__list-text-file">FILE</label>' +
      '    <a href="' + xssEscape(message.url) + '" target="_blank">' + xssEscape(message.name) + '</a>' +
      '  </label>' +
      '</div>';
  } else {
     var fields = user.nickname.split(',');
    msgList += '' +
      '<div class="chat-canvas__list">' +
      '  <label class="chat-canvas__list-name" data-userid="%userid%" data-nickname="%nickname%">'.replace('%userid%', user.userId).replace('%nickname%', xssEscape(user.nickname)) +
      xssEscape(fields[0]) +
      '  </label>' +
      '  <label class="chat-canvas__list-separator">:</label>' +
      '  <label class="chat-canvas__list-text" data-messageid="%messageid%">'.replace('%messageid%', message.messageId) +
      '    <label class="chat-canvas__list-text-file">FILE</label>' +
      '    <a href="' + xssEscape(message.url) + '" target="_blank">' + xssEscape(message.name) + '</a>' +
      '  </label>' +
      '</div>';
  }

  // var channel = currChannelInfo;
  // updateChannelMessageCache(channel, message);

  return msgList;
}

function imageMessageList(obj) {
  var msgList = '';
  var message = obj;
  var user = message.sender;
  if (isCurrentUser(user.userId)) {
     var fields = user.nickname.split(',');
    msgList += '' +
      '<div class="chat-canvas__list">' +
      '  <label class="chat-canvas__list-name chat-canvas__list-name__user">' +
      xssEscape(fields[0]) +
      '  </label>' +
      '  <label class="chat-canvas__list-separator">:</label>' +
      '  <label class="chat-canvas__list-text" data-messageid="%messageid%">'.replace('%messageid%', message.messageId) +
      xssEscape(message.name) +
      '  </label>' +
      '  <div class="chat-canvas__list-file" onclick="window.open(\'' + xssEscape(message.url) + '\', \'_blank\');">' +
      '    <img src="' + xssEscape(message.url) + '" class="chat-canvas__list-file-img" onload="afterImageLoad(this)">' +
      '  </div>' +
      '</div>';
  } else {
     var fields = user.nickname.split(',');
    msgList += '' +
      '<div class="chat-canvas__list">' +
      '  <label class="chat-canvas__list-name" data-userid="%userid%" data-nickname="%nickname%">'.replace('%userid%', user.userId).replace('%nickname%', xssEscape(user.nickname)) +
      xssEscape(fields[0]) +
      '  </label>' +
      '  <label class="chat-canvas__list-separator">:</label>' +
      '  <label class="chat-canvas__list-text" data-messageid="%messageid%">'.replace('%messageid%', message.messageId) +
      xssEscape(message.name) +
      '  </label>' +
      '  <div class="chat-canvas__list-file" onclick="window.open(\'' + xssEscape(message.url) + '\', \'_blank\');">' +
      '    <img src="' + xssEscape(message.url) + '" class="chat-canvas__list-file-img" onload="afterImageLoad(this)">' +
      '  </div>' +
      '</div>';
  }

  return msgList;
}

function setWelcomeMessage(name) {
  $('.chat-canvas').append(
    '<div class="chat-canvas__list-notice">' +
    '  <label class="chat-canvas__list-system">' +
    'Welcome to {}!'.format(name) +
    '  </label>' +
    '</div>'
  );
}

$('.chat-input-text__field').keydown(function (event) {
  if (event.keyCode == 13 && !event.shiftKey) {
    event.preventDefault();
    if (!$.trim(this.value).isEmpty()) {
      event.preventDefault();
      this.value = $.trim(this.value);

      currChannelInfo.sendUserMessage($.trim(this.value), '', SendMessageHandler);

      scrollPositionBottom();
    }
    this.value = "";
  } else {
    if (!$.trim(this.value).isEmpty()) {
      if (!currChannelInfo.isOpenChannel()) {
        currChannelInfo.startTyping();
      }
    }
  }
});

$('#chat_file_input').change(function () {
  if ($('#chat_file_input').val().trim().length == 0) return;
  var file = $('#chat_file_input')[0].files[0];
  $('.chat-input-file').addClass('file-upload');

  currChannelInfo.sendFileMessage(file, SendMessageHandler);
});

function setImageMessage(obj) {
  $('.chat-canvas').append(imageMessageList(obj));
  scrollPositionBottom();
}

function setFileMessage(obj) {
  $('.chat-canvas').append(fileMessageList(obj));
  scrollPositionBottom();
}

$('.chat-canvas').on('scroll', function () {
  setTimeout(function () {
    var currHeight = $('.chat-canvas').scrollTop();
    if (currHeight == 0) {
      if ($('.chat-canvas')[0].scrollHeight > $('.chat-canvas').height()) {
        loadMoreChatMessage();
      }
    }
  }, 200);
});

function setSysMessage(obj) {
  $('.chat-canvas').append(
    '<div class="chat-canvas__list-notice">' +
    '  <label class="chat-canvas__list-system">' +
    xssEscape(obj['message']) +
    '  </label>' +
    '</div>'
  );
  scrollPositionBottom();
}

function setBroadcastMessage(obj) {
  $('.chat-canvas').append(
    '<div class="chat-canvas__list">' +
    '  <label class="chat-canvas__list-broadcast">' +
    xssEscape(obj['message']) +
    '  </label>' +
    '</div>'
  );
  scrollPositionBottom();
}

function unreadCountUpdate(channel) {
  var targetUrl = channel.url;

  var callAdd = true;
  var unread = channel.unreadMessageCount > 9 ? '9+' : channel.unreadMessageCount;
  if (unread > 0 || unread == '9+') {
    $.each($('.left-nav-channel'), function (index, item) {
      if ($(item).data("channel-url") == targetUrl) {
        addUnreadCount(item, unread, targetUrl);
        callAdd = false;
      }
    });

    if (callAdd) {
      showChannel(channel, unread, targetUrl);
    }
  } else {
    showChannel(channel, unread, targetUrl);
  }
}

function addUnreadCount(item, unread, targetUrl) {
  //alert(muser);
  if (targetUrl == currChannelUrl) {
    if (document.hasFocus()) {
      return;
    }
  }

  if ($(item).find('div[class="left-nav-channel__unread"]').length != 0) {
    $(item).find('div[class="left-nav-channel__unread"]').html(unread);
  } else {
    $('<div class="left-nav-channel__unread">' + unread + '</div>')
      .prependTo('.left-nav-channel-group[data-channel-url=' + targetUrl + ']');
  }
}

function showChannel(channel, unread, targetUrl) {
  var members = channel.members;
  var channelMemberList = '';
  $.each(members, function (index, member) {
    if (currentUser.userId != member.userId) {
      channelMemberList += xssEscape(member.nickname) + ', ';
    }
  });
  channelMemberList = channelMemberList.slice(0, -2);
  addGroupChannel(true, channelMemberList, channel);

  if (unread != 0) {
    $.each($('.left-nav-channel'), function (index, item) {
      if ($(item).data("channel-url") == targetUrl) {
        addUnreadCount(item, unread, targetUrl);
      }
    });
  }
}
/***********************************************
 *          // END Common Function
 **********************************************/


$('.right-section__modal-bg').click(function () {
  navInit();
  popupInit();
});

function navInit() {
  $('.right-section__modal-bg').hide();

  // OPEN CHAT
  $('#btn_open_chat').removeClass('left-nav-open--active');
  $('.modal-open-chat').hide();

  // MESSAGING
  $('#btn_messaging_chat').removeClass('left-nav-messaging--active');
  $('.modal-messaging').hide();
}

function popupInit() {
  $('.modal-member').hide();
  $('.chat-top__button-member').removeClass('chat-top__button-member--active');
  $('.modal-invite').hide();
  $('.chat-top__button-invite').removeClass('chat-top__button-invite--active');
}

function init() {
  // userId = decodeURI(decodeURIComponent(getUrlVars()['userid']));
  // userId = checkUserId(userId);
  // nickname = decodeURI(decodeURIComponent(getUrlVars()['nickname']));

  $('.init-check').show();  
  // alert(cid);
  // alert(cname);
  //startSendBird1(cid,cname);
  //startSendBird(userId, nickname);
  $('.left-nav-user-nickname').html(xssEscape(nickname));
}

$(document).ready(function () {
  notifyMe();
  init();
});

window.onfocus = function () {
  if (currChannelInfo && !currChannelInfo.isOpenChannel()) {
    currChannelInfo.markAsRead();
  }
  $.each($('.left-nav-channel'), function (index, item) {
    if ($(item).data("channel-url") == currChannelUrl) {
      $(item).find('div[class="left-nav-channel__unread"]').remove();
    }
  });
};
</script>
<!-- *****************Join-end****************** -->
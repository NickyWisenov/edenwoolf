<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Family Details';
?>

<!-- ***************** career details ****************** -->
<section class="carer-search-1 career-details">
    <div class="container">
        <div style="margin:15px 0px;text-align: center;font-size: 20px;font-weight: bold;"><?= $familyDetails->user_details->display_name ?></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <!--<h1 class="mn-heading">Carers</h1>-->
                                        <div class="job-list-grp">
                                            <div class="job-list-1 carers-list-box blog-box-outer">

                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3 padding-rt">
                                                        <div class="blog-list-box-left">
                                                            <a href="javascript:;"><img src="<?= $this->context->getUserProfileImage($familyDetails->user_id) ?>" alt="" class="img-responsive"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="blog-list-box-right blog-box right-top-scroll">
                                                            <div id="style-2" class="scroll-div">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="show-review">
                                                                            <ul>
                                                                                <li><i class="fas fa fa-star"></i></li>
                                                                                <li><i class="fas fa fa-star"></i></li>
                                                                                <li><i class="fas fa fa-star"></i></li>
                                                                                <li><i class="fas fa fa-star"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <h2>About:</h2>
                                                                            <?php if (strlen($familyDetails->description) > 288) : ?>
                                                                                <p class="read_more_carer_desc_p"><?= substr($familyDetails->description, 0, 288) ?> ... <a href="javascript:;" class="read_more_carer_desc read-more">read more</a></p>
                                                                                <p class="read_less_carer_desc_p" style="display: none;"><?= $familyDetails->description ?> ... <a href="javascript:;" class="read_less_carer_desc read-more">read less</a></p>
                                                                            <?php else : ?>
                                                                                <p><?= $familyDetails->description ?></p>
                                                                            <?php endif; ?>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <h2>Type of Care required</h2>
                                                                            <?php $carerType = (trim($familyDetails->care_needed) != "") ? explode(',', $familyDetails->care_needed) : [] ?>
                                                                            <ul>
                                                                                <?php if (count($carerType) > 0) { ?>
                                                                                    <?php foreach ($carerType as $v) : ?>
                                                                                        <?php if ($v == 1) { ?>
                                                                                            <li>Child</li>
                                                                                        <?php } ?>
                                                                                        <?php if ($v == 2) { ?>
                                                                                            <li>Aged</li>
                                                                                        <?php } ?>
                                                                                        <?php if ($v == 3) { ?>
                                                                                            <li>Disability</li>
                                                                                        <?php } ?>
                                                                                    <?php endforeach; ?>
                                                                                <?php } else { ?>
                                                                                    <li>Record doesn't found</li>
                                                                                <?php } ?>
                                                                            </ul>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <h2>Location</h2>
                                                                            <ul>
                                                                                <li><?= (isset($familyDetails->user_details) && $familyDetails->user_details->city != '') ? $familyDetails->user_details->city . ', ' : '' ?><?= (isset($familyDetails->user_details) && $familyDetails->user_details->zipcode != '') ? $familyDetails->user_details->zipcode : '' ?></li>
                                                                            </ul>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <?php
                                                                            if ($familyDetails->is_looking_found == 0) {
                                                                                ?>
                                                                                <span class="green-txt">
                                                                                    Currently looking for a carer  
                                                                                </span>
                                                                            <?php } else { ?>
                                                                                <span class="green-txt">
                                                                                    Successfully found a carer
                                                                                </span>
                                                                            <?php } ?>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- end of career details box -->


                                            <div class="career-info-sec blog-box-outer blog-box right-bottom-scroll">
                                                <div id="style-2" class="scroll-div">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="box-step">
                                                                <div class="career-info-dtls">
                                                                    <h3>About Our Family</h3>
                                                                    <span><strong>Number of people in need of care:<?= count($family_care_person) ?><strong></span>
                                                                                <?php if (count($family_care_person) > 0) { ?>

                                                                                    <?php foreach ($family_care_person as $key => $value) {
                                                                                        ?>
                                                                                        <ul>
                                                                                            <li>
                                                                                                <span>Description of Person in need of care:&nbsp; </span>
                                                                                                <?php
                                                                                                $caringExperienceType = \app\models\CaringExperienceType::findOne($value->need_care);
                                                                                                if (count($caringExperienceType) > 0) {
                                                                                                    echo $caringExperienceType->value;
                                                                                                } else {
                                                                                                    echo "Not given";
                                                                                                }
                                                                                                ?>
                                                                                            </li>
                                                                                            <li>
                                                                                                <span>Needs and Requirements:</span> <?= $value->description ?>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="box-step">
                                                                                        <div class="career-info-dtls">
                                                                                            <h3>We are looking for</h3>
                                                                                            <ul class="bullet-list">
                                                                                                <?php if ($familyDetails->care_describe_type != '') { ?>
                                                                                                    <?php if (isset($lookingcare) && count($lookingcare) > 0) : ?>
                                                                                                        <?php foreach ($lookingcare as $v) : ?>
                                                                                                            <?php if (in_array($v->id, explode(',', $familyDetails->care_describe_type))) { ?>
                                                                                                                <li><?= $v->family_profile ?></li>
                                                                                                            <?php } ?>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                <?php } else { ?>
                                                                                                    <li>Record doesn't found</li>
                                                                                                <?php } ?>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>Other tasks required:</h3>
                                                                                                <ul class="bullet-list">
                                                                                                    <?php if ($familyDetails->other_task != '') { ?>
                                                                                                        <?php if (isset($all_other_duties) && count($all_other_duties) > 0) : ?>
                                                                                                            <?php foreach ($all_other_duties as $v) : ?>
                                                                                                                <?php if (in_array($v->id, explode(',', $familyDetails->other_task))) { ?>
                                                                                                                    <li><?= $v->value ?></li>
                                                                                                                <?php } ?>
                                                                                                            <?php endforeach; ?>
                                                                                                        <?php endif; ?>
                                                                                                    <?php } else { ?>
                                                                                                        <li>Record doesn't found</li>
                                                                                                    <?php } ?>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>How much they can pay for care</h3>
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
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="box-step">
                                                                                            <ul class="tick-list">
                                                                                                <?= ($familyDetails->carer_parent_status == 1) ? "<li>We would prefer carers who are parents themselves</li>" : "" ?>
                                                                                                <?= ($familyDetails->carer_child_work == 1) ? "<li>We are happy for carers to take their own children to jobs</li>" : "" ?>    
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div> <!-- end of left part -->
                                                                                <div class="col-md-3 col-sm-4 padding-lt-rt">
                                                                                    <div class="career-right-part">
                                                                                        <div class="availability blog-box-outer">
                                                                                            <h2 class="sidebar-heading"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/availability.png" alt="" class="img-responsive"> Care Required</h2>
                                                                                            <hr/>
                                                                                            <div class="table-responsive">
                                                                                                <table class="table">
                                                                                                    <tbody>
                                                                                                        <?php foreach ($dayMaster as $v) : ?>
                                                                                                            <tr>
                                                                                                                <td><?= $v->name ?></td>
                                                                                                                <td class="text-right"><?= $this->context->getCarerAvailableTime($familyDetails->user_id, $v->id) ?></td>
                                                                                                            </tr>
                                                                                                        <?php endforeach; ?>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div><!-- availability -->

                                                                                        <div class="reviews-right blog-box-outer">
                                                                                            <h2 class="sidebar-heading"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/review-icon.png" alt="" class="img-responsive"> Reviews</h2>
                                                                                            <hr/>
                                                                                            <div id="style-2" class="scroll-div">
                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                                <hr />

                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                                <hr />

                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                                <hr />

                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                                <hr />

                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                                <hr />

                                                                                                <div class="reviews-short-dtls">
                                                                                                    <div class="col-md-2 col-sm-2 no-padding">
                                                                                                        <div class="auth-img">
                                                                                                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/details-person.jpg" alt="" class="img-responsive">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-10 col-sm-10 no-padding">
                                                                                                        <h2>AJ Clarke</h2>
                                                                                                        <ul>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li><i class="fas fa fa-star"></i></li>
                                                                                                            <li class="pull-right"><span>4th January 2018</span></li>
                                                                                                        </ul>
                                                                                                        <p>Lorem ipsum  dolor sit amet, conse ctetur adipiscing elit. Nam commo do dapibus neque rutrum.</p>
                                                                                                    </div>
                                                                                                    <div class="clearfix"></div>
                                                                                                </div>
                                                                                            </div><!-- style-2 end -->
                                                                                        </div><!-- end of reviews-right -->
                                                                                    </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </div>
                                                                                </section>
                                                                                <!-- *****************Join-end****************** -->
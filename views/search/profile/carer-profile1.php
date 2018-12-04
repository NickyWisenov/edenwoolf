<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Carer Details';
?>

<!-- ***************** career details ****************** -->
<section class="carer-search-1 career-details">
    <div class="container">
        <div style="margin:15px 0px;text-align: center;font-size: 20px;font-weight: bold;"><?= $carerDetails->user_details->display_name ?></div>
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
                                                            <a href="javascript:;"><img src="<?= $this->context->getUserProfileImage($carerDetails->user_id) ?>" alt="" class="img-responsive"></a>
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
                                                                            <?php if (strlen($carerDetails->description) > 288) : ?>
                                                                                <p class="read_more_carer_desc_p"><?= substr($carerDetails->description, 0, 288) ?> ... <a href="javascript:;" class="read_more_carer_desc read-more">read more</a></p>
                                                                                <p class="read_less_carer_desc_p" style="display: none;"><?= $carerDetails->description ?> ... <a href="javascript:;" class="read_less_carer_desc read-more">read less</a></p>
                                                                            <?php else : ?>
                                                                                <p><?= ($carerDetails->description=='')?$carerDetails->description:'-' ?></p>
                                                                            <?php endif; ?>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <h2>Experience</h2>
                                                                            <ul>
                                                                            <?php 
                                                                            if($carerDetails->caring_experience==0){
                                                                                echo "<li>Not yet</li>";
                                                                            }else if($carerDetails->caring_experience>4){
                                                                                echo "<li>5+ Years</li>";
                                                                            }else{
                                                                                echo '<li>'.$carerDetails->caring_experience."Year(s)</li>";
                                                                            }
                                                                            ?>
                                                                            </ul>
                                                                        </div>  
                                                                    </div>  
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="box-step">
                                                                            <h2>Location</h2>
                                                                            <ul>
                                                                                <li><?= (isset($carerDetails->user_details) && $carerDetails->user_details->city != '') ? $carerDetails->user_details->city . ', ' : '' ?><?= (isset($carerDetails->user_details) && $carerDetails->user_details->zipcode != '') ? $carerDetails->user_details->zipcode : '' ?></li>
                                                                            </ul>
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
                                                                    <h3>Type of care</h3>
                                                        <?php $carerType = (trim($carerDetails->care_type) != "") ? explode(',', $carerDetails->care_type) : [] ?>
                                                        <ul>
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
                                                                <li>Record doesn't found</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                                                </div>

                                                                                </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="box-step">
                                                                                        <div class="career-info-dtls">
                                                                                             <h3>Type of experience</h3>
                                                        <?php $caringExpType = (trim($carerDetails->type_of_experience) != "") ? explode(",", $carerDetails->type_of_experience) : [] ?>
                                                        <ul>
                                                            <?php if (count($caringExpType) > 0) : ?>
                                                                <?php foreach ($carerAllExpType as $vE) : ?>
                                                                    <?php if (in_array($vE->id, $caringExpType)) : ?>
                                                                        <li><?= $vE->value ?></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <li>Record doesn't found</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>Qualifications</h3>
                                                        <?php $certification = (trim($carerDetails->certifications) != "") ? explode(",", $carerDetails->certifications) : [] ?>
                                                        <ul>
                                                            <?php if (count($certification) > 0) : ?>
                                                                <?php foreach ($qualification as $vQ) : ?>
                                                                    <?php if (in_array($vQ->id, $certification)) : ?>
                                                                        <?php if ($vQ->id == 14) : ?>
                                                                            <li><?= $carerDetails->other_certifications ?></li>
                                                                        <?php else : ?>
                                                                            <li><?= $vQ->value ?></li>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <li>Record doesn't found</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>Other duties</h3>
                                                        <?php $otherDuties = (trim($carerDetails->other_task) != "") ? explode(",", $carerDetails->other_task) : [] ?>
                                                        <ul>
                                                            <?php if (count($otherDuties) > 0) : ?>
                                                                <?php foreach ($carerOtherDuties as $vOD) : ?>
                                                                    <?php if (in_array($vOD->id, $otherDuties)) : ?>
                                                                        <li><?= $vOD->value ?></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <li>No Other Duties</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                    
                                                    <div class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>Languages known</h3>
                                                                <span><?= $this->context->carerKnownLanguages($carerDetails->user_id) ?></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="box-step">
                                                                                            <div class="career-info-dtls">
                                                                                                <h3>Type of jobs</h3>
                                                                                                <?php
                                                                                                $all_job_descriptions = \app\models\JobDescription::find()->where(['status' => 1])->all();
                                                                                                ?>
                                                        <?php $job_type = (trim($carerDetails->job_type) != "") ? explode(',', $carerDetails->job_type) : []; ?>
                                                        <ul>
                                                            <?php if (count($job_type) > 0) : ?>
                                                                <?php foreach ($all_job_descriptions as $v) : ?>
                                                                    <?php if (in_array($v->id, $job_type)) : ?>
                                                                        <li><?= $v->value ?></li>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <li>No Data Found</li>
                                                            <?php endif; ?>
                                                        </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-sm-12">
                                                                                        <div class="box-step">
                                                                                            <ul class="tick-list">
                                                                                                <?= ($carerDetails->user_details->id_proofimage != "") ? "<li>Drivers license</li>" : "" ?>
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
                                                                                                                <td class="text-right"><?= $this->context->getCarerAvailableTime($carerDetails->user_id, $v->id) ?></td>
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
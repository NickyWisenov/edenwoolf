<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>

<!-- *****************Join-start****************** -->
<section class="dash-main-body db-mn-bdy-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        <?= Yii::$app->controller->renderPartial('@app/views/partials/left_family.php'); ?>
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <?= Yii::$app->controller->renderPartial('@app/views/partials/family-top-menu.php'); ?>
                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <!--<h1 class="mn-heading">Family Dashboard</h1>-->
                                        <div class="blue-hding-panel">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-8">
                                                    <h2>My jobs</h2>
                                                </div>
                                                <div class="col-md-3 col-sm-4">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-2">
                                                            <option>My Jobs</option>
                                                            <option>Complete</option>
                                                            <option>Pending</option>
                                                            <option>Cancelled</option>
                                                            <option>Current</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="job-list-grp">
                                            <div class="job-list-1">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="blog-list-box-left">
                                                            <a href="javascript:;"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dashboard_thum_img_1.jpg" alt="" class="img-responsive"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="blog-list-box-right">
                                                            <h1> <a href="javascript:;">Care for my 5 year old kid</a></h1>
                                                            <h2><i class="fa fa-users" aria-hidden="true"></i>Family name here</h2>

                                                            <ul class="list-inline top-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-tag" aria-hidden="true"></i> Child care
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Current
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> One-off, fixed term care
                                                                </li>
                                                            </ul>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  
                                                            </p>
                                                            <ul class="btm-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i> Start Date:1-Mar-2017
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-usd" aria-hidden="true"></i> Budget - $30.50 / Week
                                                                </li>

                                                            </ul>
                                                            <div class="text-center">
                                                                <a class="style-btn" href="javascript:;" onclick=""><span>View Job</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_3.png" alt="" class="img-responsive ribon">
                                            </div>

                                            <div class="job-list-1">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="blog-list-box-left">
                                                            <a href="javascript:;"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dashboard_thum_img_3.jpg" alt="" class="img-responsive"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="blog-list-box-right">
                                                            <h1> <a href="javascript:;">Carer for 60 year old Men.</a></h1>
                                                            <h2><i class="fa fa-users" aria-hidden="true"></i>Family name here</h2>

                                                            <ul class="list-inline top-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-tag" aria-hidden="true"></i> Aged care
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Cancelled
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> One-off, fixed term care
                                                                </li>
                                                            </ul>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  
                                                            </p>
                                                            <ul class="btm-feature-grp">
                                                                <!--                                                                            <li>
                                                                                                                                                <i class="fa fa-calendar-o" aria-hidden="true"></i> Start Date:1-Mar-2017
                                                                                                                                            </li>-->
                                                                <li>
                                                                    <i class="fa fa-usd" aria-hidden="true"></i> Budget - $30.50 / Week
                                                                </li>

                                                            </ul>
                                                            <div class="text-center">
                                                                <a class="style-btn" href="javascript:;" onclick=""><span>View Job</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_2.png" alt="" class="img-responsive ribon">
                                            </div>

                                            <div class="job-list-1">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="blog-list-box-left">
                                                            <a href="javascript:;"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dashboard_thum_img_2.jpg" alt="" class="img-responsive"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="blog-list-box-right">
                                                            <h1> <a href="javascript:;">Care for 1 old disabled person..</a></h1>
                                                            <h2><i class="fa fa-users" aria-hidden="true"></i>Family name here</h2>

                                                            <ul class="list-inline top-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-tag" aria-hidden="true"></i> Disability care
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Complete
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> One-off, fixed term care
                                                                </li>
                                                            </ul>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  
                                                            </p>
                                                            <ul class="btm-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i> End date: 1-Mar-2018
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-usd" aria-hidden="true"></i> Budget - $45.00 / Week
                                                                </li>

                                                            </ul>
                                                            <div class="text-center">
                                                                <a class="style-btn" href="javascript:;" onclick=""><span>View Job</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_1.png" alt="" class="img-responsive ribon">
                                            </div>

                                            <div class="job-list-1">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-3">
                                                        <div class="blog-list-box-left">
                                                            <a href="javascript:;"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dashboard_thum_img_1.jpg" alt="" class="img-responsive"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-sm-9">
                                                        <div class="blog-list-box-right">
                                                            <h1> <a href="javascript:;">Care for my 5 year old kid</a></h1>
                                                            <h2><i class="fa fa-users" aria-hidden="true"></i>Family name here</h2>

                                                            <ul class="list-inline top-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-tag" aria-hidden="true"></i> Child care
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Pending
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i> One-off, fixed term care
                                                                </li>
                                                            </ul>
                                                            <p>
                                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.  
                                                            </p>
                                                            <ul class="btm-feature-grp">
                                                                <!--                                                                            <li>
                                                                                                                                                <i class="fa fa-calendar-o" aria-hidden="true"></i> Start Date:1-Mar-2017
                                                                                                                                            </li>-->
                                                                <li>
                                                                    <i class="fa fa-usd" aria-hidden="true"></i> Budget - $30.50 / Week
                                                                </li>

                                                            </ul>
                                                            <div class="text-center">
                                                                <a class="style-btn" href="javascript:;" onclick=""><span>View Job</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_4.png" alt="" class="img-responsive ribon">
                                            </div>
                                        </div>


                                        <div class="text-center new-btn-cent ">
                                            <a class="style-btn blue-btn" href="javascript:;" onclick=""><span>View All Jobs <i class="fa fa-long-arrow-down" aria-hidden="true"></i></span></a>
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
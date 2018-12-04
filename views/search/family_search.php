<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'family Search';
?>

<!-- *****************Join-start****************** -->
<section class="dash-main-body dash-main-body-bg-four">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="panel-body-main">
                    <div class="clearfix">
                        <?= Yii::$app->controller->renderPartial('@app/views/partials/search_left_family.php'); ?>
                        <div class="col-md-9 col-sm-8 padding-lt-rt">
                            <div class="right-part">
                                <div class="top-part">
                                    <div class="clearfix">

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-1.png" class="media-object">
                                                    <h1>4.5</h1>
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">Read Reviews</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle spl-shade-1">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-2.png" class="media-object">
                                                    <h1 class="spl-shade-2">6</h1>
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">Check Message</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle up-circle-cst spl-shade-2">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-5.png" class="media-object">
                                                    <!--                                                                <h1>4.5</h1>-->
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">$5652.00 earned</a> 
                                                </h1>
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-xs-6 padding-lft-10">
                                            <div class="top-part-box">
                                                <div class="up-circle spl-shade-3">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash-fm-sml-ico-4.png" class="media-object">
                                                    <!--                                                                <h1>4.5</h1>-->
                                                </div>
                                                <h1>
                                                    <a href="javascript:;">$675.00 Wallet Balance</a> 
                                                </h1>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom-part">
                                    <div class="clearfix">
                                        <h1 class="mn-heading">Carer Dashboard</h1>
                                        <div class="blue-hding-panel">
                                            <div class="row">
                                                <div class="col-md-9 col-sm-8">
                                                    <h2>Jobs</h2>
                                                </div>
                                                <div class="col-md-3 col-sm-4">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-2">
                                                            <option>All Jobs</option>
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
                                                                <button class="btn" type="button">View Job</button>
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
                                                                <button class="btn" type="button">View Job</button>
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
                                                                <button class="btn" type="button">View Job</button>
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
                                                                <button class="btn" type="button">View Job</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_4.png" alt="" class="img-responsive ribon">
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
                                                            <h1> <a href="javascript:;">Carer for 60 year old Men</a></h1>
                                                            <h2><i class="fa fa-users" aria-hidden="true"></i>Family name here</h2>

                                                            <ul class="list-inline top-feature-grp">
                                                                <li>
                                                                    <i class="fa fa-tag" aria-hidden="true"></i> Aged care
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Ongoing
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
                                                                    <ul class="list-inline">
                                                                        <li>
                                                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>Next shift: 2-Jan-2018, 6:00pm
                                                                        </li>
                                                                        <li>
                                                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>End date: 1-Mar-2018
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-usd" aria-hidden="true"></i> Budget - $30.50 / Week
                                                                </li>

                                                            </ul>
                                                            <div class="text-center">
                                                                <button class="btn" type="button">View Job</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/dash_ribbon_5.png" alt="" class="img-responsive ribon">
                                            </div>

                                        </div>


                                        <div class="btm-btm-bx text-center">
                                            <a href="javascript:;" class="btn btn-all">View All Jobs</a>
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
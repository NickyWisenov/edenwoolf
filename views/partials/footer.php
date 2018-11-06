<?php

use yii\helpers\Url;
use app\modules\admin\modules\settings\models\Settings;
use app\controllers\FrontController;
use app\assets\frontend\CookieAsset;

CookieAsset::register($this);

$facebook_url = Settings::find()->where(['slug' => 'facebook_url'])->one();
$twitter_url = Settings::find()->where(['slug' => 'twitter_url'])->one();
?>

<footer>
<!--    <div class="foot-up <?= FrontController::Route() != 'site/index' ? 'foot-up-inner' : ''; ?> text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-inline">
                        <li><a href="javascript:;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->
    <div  class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-3 col-sm-6">
                            <div class="ftr-single-sec">
                                <h4 class="ftr-heading">Company</h4>
                                <ul class="foot-nav">
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Join</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Log-in</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">About</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Search Families</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Search Carers</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="ftr-single-sec">
                                <h4 class="ftr-heading">Browse by city</h4>
                                <ul class="foot-nav">
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Austin</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i></i><a href="javascript:;">Melbourne</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Sydney</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Adelaide</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">New South Wales</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="ftr-single-sec">
                                <h4 class="ftr-heading">Popular topics</h4>
                                <ul class="foot-nav">
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Babysitter services  </a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Nany jobs</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Babysitter</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Nany jobs</a></li>
                                    <li><i class="fa fa-caret-right" aria-hidden="true"></i><a href="javascript:;">Nany jobs</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="ftr-single-sec">
                                <h4 class="ftr-heading">Contact</h4>
                                <div class="ftr-address clearfix">
                                    <ul class="clearfix">
                                        <li>Eden Woolf Pty Ltd Suite 2, Level 2</li> 
                                        <li>16-18 Cross Street Double Bay, NSW 2028</li>
                                        <li>Tel: +61 2 9300 2000 </li>
                                        <li>Email: admin@edenwoolf.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </div>
    <!--- ftr-btm-sec--->
    <div class="foot-bottom">
        <div class="container">
            <div class="row bdr-1">
                <div class="col-sm-6">
                    <div  class="copy-right">© Copyright Eden Woolf Pty Ltd 2018</div>
                </div>
                <div class="col-sm-6">
                    <div class="foot-rt-prt">
                        <ul class="list-inline">
                            <li><a href="javascript:;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="javascript:;"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- ftr-btm-sec--->
</footer>

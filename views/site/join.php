<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Eden Woolf - Join';
?>

<!-- *****************Join-start****************** -->
 <section class="img-text-sec text-prt-join">
        <div class="container">
            <div class="text-center new-common-heading">
                <div class="clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="top-part-heading-abt text-center">
                           <h5>Join Eden Woolf</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btm-part row">
                <div class="col-md-6 col-sm-6 animated bounceInLeft">
                    <div class="img-thum-smi">
                        <div class="img-thum-border">
                            <div class="img-thum-sami-border">
                                <a href="javascript:;">
                                    <img src="<?= Yii::$app->request->baseUrl . '/uploads/frontend/cms/pictures/' . $join_family->content; ?>" alt="" class="img-responsive">
                                </a>
                                <h1>Join as a family</h1>
                                <div class="btn-rap cmn-grn-new-btn-wrp text-center">
        <!--                            <a href="<?= Url::toRoute(['site/regfamily']); ?>" class="btn btn-all">Join as a Family</a>-->
                                    <ul>
                                        <li>
                                            <a href="<?= Url::toRoute(['site/regfamily']); ?>" class="no-decor homepage-button booking-link"><span>GET STARTED</span></a>
                                        </li>
                                    </ul>
                                    <p><?= $join_family_help_text->content; ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 animated bounceInLeft">
                    <div class="img-thum-smi">
                        <div class="img-thum-border">
                            <div class="img-thum-sami-border">
                                <a href="javascript:;">
                                    <img src="<?= Yii::$app->request->baseUrl . '/uploads/frontend/cms/pictures/' . $join_carer->content; ?>" alt="" class="img-responsive">
                                </a>
                                <h1>Join as a carer</h1>
                                <div class="btn-rap cmn-grn-new-btn-wrp text-center">
        <!--                            <a href="<?= Url::toRoute(['site/regcarer']); ?>" class="btn btn-all">Join as a Carer</a>-->
                                    <ul>
                                        <li>
                                            <a href="<?= Url::toRoute(['site/regcarer']); ?>" class="no-decor homepage-button booking-link"><span>GET STARTED</span></a>
                                        </li>
                                    </ul>
                                    <p><?= $join_carer_help_text->content; ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- *****************Join-end****************** -->
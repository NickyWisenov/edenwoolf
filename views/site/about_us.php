<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Eden Woolf - About us';
?>

<div class="new-about-body">
    <section class="prof-inner-bnr inner-bnr-abt pad-top-55">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="about_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="top-part-heading-2 text-center">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                                <?= $about_us_heading->content; ?>
                            </div>
                        </div>
                    </div>
                    <div class="cont-area">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="cont-top-thum">
                                    <div class="top-img-part">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum-2.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="bottom-text-part">
                                        <?= $about_us_step_1->content; ?>
                                    </div>
                                </div>
                                <div class="cont-top-thum">
                                    <div class="top-img-part">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum-1.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="bottom-text-part">
                                        <?= $about_us_step_2->content; ?>
                                    </div>
                                </div>
                                <div class="cont-top-thum">
                                    <div class="top-img-part">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum-3.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="bottom-text-part">
                                        <?= $about_us_step_3->content; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about_top_menu">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="list-inline">
                            <li>
                                <div class="top-part-img">
                                    <a href="#child-care"> <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt_top_mny_1.png" alt="" class="img-responsive"></a>
                                </div>
                                <h1><a href="#child-care">Child care</a></h1>
                            </li>
                            <li>
                                <div class="top-part-img">
                                    <a href="#aged-care"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt_top_mny_2.png" alt="" class="img-responsive"></a>
                                </div>
                                <h1><a href="#aged-care">Aged care</a></h1>
                            </li>
                            <li>
                                <div class="top-part-img">
                                    <a href="#disabilty-care"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt_top_mny_3.png" alt="" class="img-responsive"></a>
                                </div>
                                <h1><a href="#disabilty-care">Disability care</a></h1>
                            </li>
                            <li>
                                <div class="top-part-img">
                                    <a href="#share-sec"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt_top_mny_5.png" alt="" class="img-responsive"></a>
                                </div>
                                <h1><a href="#share-sec">Sharing unpaid care</a></h1>
                            </li>
                            <li>
                                <div class="top-part-img">
                                    <a href="#share-sec-2"><img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt_top_mny_6.png" alt="" class="img-responsive"></a>
                                </div>
                                <h1><a href="#share-sec-2">Nanny & carer sharing</a></h1>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="disabilty-care-top-2 new-abt-20">
        <div class="container">
            <div class="child-care-top-2-smi"></div>
        </div>
    </div>
    <section class="child-care" id="child-care">
        <div class="child-care-top-1">
            <div class="container">
                <div class="top-part-heading-abt text-center">
                    <h5><?= $about_us_child_care->content_name; ?></h5>
                </div>
                <div class="cont-txt-prt text-leftr">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $about_us_child_care->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="disabilty-care-top-2 new-abt-16">
        <div class="container">
            <div class="child-care-top-2-smi"></div>
        </div>
    </div>
    <section class="disabilty-care" id="disabilty-care">
        <div class="disabilty-care-top-1">
            <div class="container">
                <div class="top-part-heading-abt text-center">
                    <h5><?= $about_us_disability_care->content_name; ?></h5>
                </div>
                <div class="cont-txt-prt text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $about_us_disability_care->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="disabilty-care-top-2 new-abt-15">
        <div class="container">
            <div class="child-care-top-2-smi"></div>
        </div>
    </div>

    <section class="aged-care" id="aged-care">
        <div class="aged-care-top-1">
            <div class="container">
                <div class="top-part-heading-abt text-center">
                    <h5><?= $about_us_aged_care->content_name; ?></h5>
                </div>
                <div class="cont-txt-prt text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $about_us_aged_care->content; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="aged-care-top-2">
            <div class="container">
                <div class="child-care-top-2-smi"></div>
            </div>
        </div>
    </section>

    <section class="share-sec">
        <div id="share-sec">
            <div class="share-top-1">
                <div class="container">
                    <div class="top-part-heading-abt text-center">
                        <h5><?= $about_us_sharing_unpaid_care->content_name; ?></h5>
                    </div>
                    <div class="cont-txt-prt">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cont-txt-prt-sm">
                                    <p><?= $about_us_sharing_unpaid_care->content; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="new-zigzag-section">
        <div class="row">
            <div class="col-sm-6 no-padding disp-new-tbl-cell hidden-sm hidden-md hidden-lg">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-1.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-text">
                    <h3><?=$about_us_exchange_unpaid_care->content_name?></h3>
                    <p><?=$about_us_exchange_unpaid_care->content?></p>
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell hidden-xs">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-1.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="new-zigzag-section">
        <div class="row">
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-2.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-text zigzag-text-2">
                    <h3><?=$about_us_sharing_unpaid_care_example->content_name?></h3>
                    <p><?=$about_us_sharing_unpaid_care_example->content?></p>
                </div>
            </div>            
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="new-box-section nw-box-55">
        <div class="container">
            <div class="col-sm-4">
                <div class="new-box new-height-cls">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                         <h1>1</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/family-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?= $sharing_unpaid_care_step_1->content; ?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>GET STARTED</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="new-box new-height-cls">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                         <h1>2</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/search-person-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?= $sharing_unpaid_care_step_2->content; ?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>FIND FAMILY</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="new-box new-height-cls">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                         <h1>3</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/job-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?= $sharing_unpaid_care_step_3->content; ?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>LOG A JOB</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="disabilty-care-top-2 new-abt-35">
        <div class="container">
            <div class="child-care-top-2-smi"></div>
        </div>
    </div>
    <section class="share-sec">
        <div id="share-sec">
            <div class="share-top-1">
                <div class="container">
                    <div class="top-part-heading-abt text-center">
                        <h5><?=$about_us_nanny_carer_sharing->content_name?></h5>
                    </div>
                    <div class="cont-txt-prt">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cont-txt-prt-sm">
                                    <p><?=$about_us_nanny_carer_sharing->content?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <div class="new-zigzag-section">
        <div class="row disp-new-tbl">
            <div class="col-sm-6 no-padding disp-new-tbl-cell hidden-sm hidden-md hidden-lg">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-3.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-text top-padding">
                    <h3><?=$about_us_nanny_carer_sharing_example->content_name?></h3>
                    <?=$about_us_nanny_carer_sharing_example->content?>                   
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell hidden-xs">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-3.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="new-zigzag-section">
        <div class="row disp-new-tbl">
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-image">
                    <div class="zigzag-image-overlay"></div>
                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/zigzag-img-4.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-sm-6 no-padding disp-new-tbl-cell">
                <div class="zigzag-text zigzag-text-2">
                    <h3><?=$about_us_nanny_carer_sharing_advantage->content_name?></h3>
                    <?=$about_us_nanny_carer_sharing_advantage->content?>
                </div>
            </div>            
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="new-box-section small-text">
        <div class="container">
            <div class="col-md-3 col-sm-6">
                <div class="new-box">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                        <h1>1</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/family-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?=$nanny_carer_sharing_step_1->content?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>GET STARTED</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="new-box">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                        <h1>2</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/search-person-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?=$nanny_carer_sharing_step_2->content?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>FIND FAMILY</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="new-box">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                        <h1>3</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/non-trimmed.png" alt="" class="img-responsive">
                    </div>
                    <p><?=$nanny_carer_sharing_step_3->content?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>FIND CARER</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="new-box">
                    <div class="box-icon">
<!--                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/box-wolf-logo.png" alt="" class="img-responsive">-->
                        <h1>4</h1>
                    </div>
                    <div class="box-image">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/job-icon.png" alt="" class="img-responsive">
                    </div>
                    <p><?=$nanny_carer_sharing_step_4->content?></p>
                    <div class="btn-rap cmn-grn-new-btn-wrp text-center">
                        <ul>
                            <li>
                                <a href="#" class="no-decor homepage-button booking-link"><span>LOG A JOB</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <section class="share-sec faq-section">
        <div id="share-sec">
            <div class="share-top-1">
                <div class="container">
                    <div class="top-part-heading-abt text-center">
                        <h5><?=$about_us_faq->content_name?></h5>
                    </div>
                    <div class="cont-txt-prt">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cont-txt-prt-sm">
                                    <h2><?=$about_us_faq_1->content_name?></h2>
                                    <p><?=$about_us_faq_1->content?></p>
                                    
                                    <h2><?=$about_us_faq_2->content_name?></h2>
                                    <p><?=$about_us_faq_2->content?></p>
                                    
                                    <h2><?=$about_us_faq_3->content_name?></h2>
                                    <p><?=$about_us_faq_3->content?></p>
                                    
                                    <h2><?=$about_us_faq_4->content_name?></h2>
                                    <p><?=$about_us_faq_4->content?></p>
                                    
                                    <h2><?=$about_us_faq_5->content_name?></h2>
                                    <p><?=$about_us_faq_5->content?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="disabilty-care-top-2 new-abt-25">
        <div class="container">
            <div class="child-care-top-2-smi"></div>
        </div>
    </div>

    <!--    <div class="disabilty-care-top-2 new-abt-18">
            <div class="container">
                <div class="child-care-top-2-smi"></div>
            </div>
        </div>-->


    <?php
    if (Yii::$app->user->isGuest) {
        ?>
        <section class="img-text-sec">
            <div class="container">
                <div class="text-center new-common-heading nw-on">
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
                                        <!--<a href="<?= Url::toRoute(['site/regfamily']); ?>" class="btn btn-all">Join as a Family</a>-->
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
                                        <!--<a href="<?= Url::toRoute(['site/regcarer']); ?>" class="btn btn-all">Join as a Carer</a>-->
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
        <?php
    }
    ?>
</div>
<script>

    $('a[href*="#"]:not([href="#"]):not([href="#show"]):not([href="#hide"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });
</script>
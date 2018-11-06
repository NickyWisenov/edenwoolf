<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'EdenWoolf - About us';
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
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum_new-1.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="bottom-text-part">
                                        <?= $about_us_step_1->content; ?>
                                    </div>
                                </div>
                                <div class="cont-top-thum">
                                    <div class="top-img-part">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum_new-2.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="bottom-text-part">
                                        <?= $about_us_step_2->content; ?>
                                    </div>
                                </div>
                                <div class="cont-top-thum">
                                    <div class="top-img-part">
                                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/abt-thum_new-3.png" alt="" class="img-responsive">
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
                                    <p>
                                        <span>
                                            Australia is home to close to 3&nbsp;million unpaid carers, and almost all primary carers (96%) care for a family member. Looking after a loved one is not easy -&nbsp;unpaid carers do not enjoy benefits such as study leave, annual leave or sick leave and plans to study or go on holiday often get postponed indefinitely.
                                        </span>
                                    </p>

                                    <p>
                                        <span>
                                            While caring for a loved one is one of the most rewarding jobs in the world, it can limit employment prospects, with many mothers leaving the workforce all together. Eden Woolf provides a platform for unpaid stay-at-home mums to meet peers in their area to exchange unpaid care. Such arrangements lead to mums having the freedom&nbsp;to return to part-time work, undertake study or simply have a day off (yes, really!)&nbsp;
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--            <div class="share-new-design-1">
                            <div class="container-fulid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="left-part">
                                            <div class="grp-text">
                                            <h1>
                                                How do I exchange unpaid care?
                                            </h1>
                                            <p>
                                                It's easy! All you need to do is find a family like yours who is also looking to exchange unpaid care. Discuss your needs and availability and arrange what days you will provide care, and what days your peer will provide care.
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
            
                        <div class="share-top-3 about_top">
                            <div class="container cover" >
                                <div class="top-part-heading-abt text-center">
                                    <h5><?= $about_us_sharing_unpaid_care->content_name; ?></h5>
                                </div>
                                <div class="btm-part clearfix cont-area" >
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_1.png" alt="" class="">
                                                </div>
                                                <div class="media-body color-1 new-font-class">
            <?= $sharing_unpaid_care_step_1->content; ?>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_2.png" alt="" class="">
                                                </div>
                                                <div class="media-body color-2 new-font-class">
            <?= $sharing_unpaid_care_step_2->content; ?>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_3.png" alt="" class="">
                                                </div>
                                                <div class="media-body color-3 new-font-class">
            <?= $sharing_unpaid_care_step_3->content; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
        </div>
        <!--        <div id="share-sec-2">
                    <div class="share-top-6">
                        <div class="container">
                            <div class="top-part-heading-abt text-center">
                                <h5><?= $about_us_nanny_carer_sharing->content_name; ?></h5>
                            </div>
                            <div class="cont-txt-prt text-left">
                                <div class="row">
                                    <div class="col-md-12">
        <?= $about_us_nanny_carer_sharing->content; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="share-top-2 about_top">
                        <div class="container cover" >
                            <div class="top-part-heading-abt text-center">
                                <h5><?= $about_us_nanny_carer_sharing->content_name; ?></h5>
                            </div>
                            <div class="btm-part clearfix cont-area" >
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_1.png" alt="" class="">
                                            </div>
                                            <div class="media-body color-1 new-font-class">
        <?= $nanny_carer_sharing_step_1->content; ?>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_2.png" alt="" class="">
                                            </div>
                                            <div class="media-body color-2 new-font-class">
        <?= $nanny_carer_sharing_step_2->content; ?>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_3.png" alt="" class="">
                                            </div>
                                            <div class="media-body color-3 new-font-class">
        <?= $nanny_carer_sharing_step_3->content; ?>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_4.png" alt="" class="">
                                            </div>
                                            <div class="media-body color-1 new-font-class">
        <?= $nanny_carer_sharing_step_4->content; ?>
                                            </div>
                                        </div> 
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/drk_step_5.png" alt="" class="">
                                            </div>
                                            <div class="media-body color-2 new-font-class">
        <?= $nanny_carer_sharing_step_5->content; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
        <?php
        if (count($faqs) > 0) {
            ?>
            <!--            <div class="faq-abt">
                            <div class="container">
                                <div class="top-part-heading-abt text-center">
                                    <h5>FAQs</h5>
                                </div>
                                <div class="cont-txt-prt">
                                    <div class="row">
                                        <div class="col-md-12">
            <?php
            foreach ($faqs as $key => $value) {
                ?>
                                                                                            <div class="cont-txt-prt-sm">
                                                                                                <h1 class="fnt-raleway"><?= $value->question; ?></h1>
                                                                                                <p><?= $value->answer; ?></p>
                                                                                            </div>
                <?php
            }
            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
            <?php
        }
        ?>
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
                    <h3>How do I exchange unpaid care?</h3>
                    <p>It's easy! All you need to do is find a family like yours who is also looking to exchange unpaid care. Discuss your needs and availability and arrange what days you will provide care, and what days your peer will provide care.</p>
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
                    <h3>For example:</h3>
                    <p>Sarah from Greenwich works part-time and stays at home to look after her two-year-old son every Thursday and Friday, and pays for childcare Monday to Wednesday.</p>
                    <p>Julie, also from Greenwich, works part time and stays at ho me to look after her one-year-old daughter on Monday and Tuesday, and pays for childcare on Wednesday to Friday. </p>
                    <p>Both Sarah and Julie are finding it challenging to pay for childcare, but do not want to take more time off work. Sarah and Julie meet each other through the Eden Woolf Search Families function. Together they arrange for Sarah to mind both children on Thursday and Friday, and Julie to mind both children on Monday and Tuesday. Each mum saves $340 per week, saving a total of $32,600 per year for both families</p>
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
                    <p>Create a Family Profile</p>
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
                    <p>Use the Eden Woolf Find a Family tool to find a family who also wants to share a unpaid care – make sure you agree on the place where the care will take place, what type of needs your family has.</p>
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
                    <p>For your own records, log a job(specifying that the payment amount is $0.00). Then enjoy halving your workload!</p>
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
                        <h5>Nanny & Carer Sharing</h5>
                    </div>
                    <div class="cont-txt-prt">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cont-txt-prt-sm">
                                    <p>
                                        <span>
                                            Many parents love the idea of having a nanny, but don't need one full-time, or think it might cost too much. Some families may find that having a nanny is more convenient than traditional child care, but they want their child to socialise with other children. Nanny sharing lets you share the nanny's time, and the cost of employing the nanny with another family and allows your child to socialise with other children.
                                        </span>
                                    </p>
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
                    <h3>Here are some examples of nanny sharing situations:</h3>
                    <ul>
                        <li>You are working part-time and only need a nanny for the days that you are at work</li>  
                        <li>You have children at school and need a nanny in the afternoons after school</li>  
                        <li>You can't afford a full-time nanny just for your child, and decide to share a full-time nanny with another family to split the cost</li>  
                        <li>You want to combine a couple of days a week of a nanny with other existing
                            child care When sharing a nanny with another family, to avoid disputes each family should Log a Job with the chosen nanny.</li>  
                    </ul>                    
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
                    <h3>Advantages of nanny sharing:</h3>
                    <ul>
                        <li>hildren are cared for in a home environment with a consistent carer. Children are therefore less likely to become ill</li>  
                        <li>Nannies in nanny sharing arrangements are paid more than carers in a child care centre, and are therefore more likely to stay in the position longer, and enjoy their work more</li>  
                        <li>Children make close bonds with another family</li>  
                        <li>There are no late fees if you are running late</li>  
                        <li>Care is available when you need it, unlike childcare centres which close at 5:00pm</li>  
                        <li>There is less travelling to and from child care centres for pick-up and drop-off</li>  
                        <li>More information about In Home Care Eligibility is available from the Department of Education and Training</li>  
                    </ul> 
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
                    <p>Create a Family Profile</p>
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
                    <p>Use the Eden Woolf Find a Family tool to find a family who also wants to share a unpaid care – make sure you agree on the place where the care will take place, what type of needs your family has.</p>
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
                    <p>Once you and your buddy family are agreed, use the Eden Woolf Find a Carer tool to search for a carer who suits your needs. Correspond with your carer by sending an Eden Woolf in-mail</p>
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
                    <p>For your own records, log a job(specifying that the payment amount is $0.00). Then enjoy halving your workload!</p>
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
                        <h5>Frequently Asked Questions</h5>
                    </div>
                    <div class="cont-txt-prt">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cont-txt-prt-sm">
                                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat nunc?</h2>
                                    <p>
                                        <span>
                                            Many parents love the idea of having a nanny, but don't need one full-time, or think it might cost too much.†Some†families may find that having a nanny is more convenient than traditional child care, but they want their child to socialise with other children. Nanny sharing lets you share the nanny's time, and the cost of employing the nanny with another family and allows your child.
                                        </span>
                                    </p>
                                    <h2>Maecenas ornare justo et nulla fringilla ultrices?</h2>
                                    <p>
                                        <span>
                                            Many parents love the idea of having a nanny, but don't need one full-time, or think it might cost too much.†Some†families may find that having a nanny is more.
                                        </span>
                                    </p>
                                    <h2>Suspendisse sed ullamcorper erat?</h2>
                                    <p>
                                        <span>
                                            Vivamus bibendum molestie lectus, id pulvinar lacus convallis sit amet. Mauris quis lacus elementum, mollis diam ac, porttitor elit. In hac habitasse platea dictumst. Proin et metus vel nunc dictum euismod sed tincidunt turpis. Vestibulum a lacus erat. Sed pretium risus nec laoreet tempus.
                                        </span>
                                    </p>
                                    <h2>Suspendisse sed ullamcorper erat?</h2>
                                    <p>
                                        <span>
                                            Vivamus bibendum molestie lectus, id pulvinar lacus convallis sit amet. Mauris quis lacus elementum, mollis diam ac, porttitor elit. In hac habitasse platea dictumst. Proin et metus vel nunc dictum euismod sed tincidunt turpis. Vestibulum a lacus erat. Sed pretium risus nec laoreet tempus.
                                        </span>
                                    </p>
                                    <h2>Proin ut purus imperdiet neque condimentum?</h2>
                                    <p>
                                        <span>
                                            Vivamus bibendum molestie lectus, id pulvinar lacus convallis sit amet. Mauris quis lacus elementum, mollis diam ac, porttitor elit. In hac habitasse platea dictumst.
                                        </span>
                                    </p>
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
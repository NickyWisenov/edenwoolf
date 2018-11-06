<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Eden Woolf';
?>
<?php
use app\assets\frontend\MaterialAsset;
use app\assets\frontend\AutocompleteAsset;

MaterialAsset::register($this);
AutocompleteAsset::register($this);
?>

<!-- *****************Banner-start****************** -->
<div class="scro">

    <a href="#" class="scroll-down" id="downClick" address="true"></a>
</div>
<section class="banner-sec">
    <video poster="<?= Yii::$app->request->baseUrl; ?>/frontend/images/banner_mn-1.jpg" id="bgvid" playsinline autoplay muted loop>
        <source src="<?= Yii::$app->request->baseUrl . '/uploads/frontend/cms/videos/' . $banner_video->content; ?>" type="video/mp4">
        
    </video>
    <div class="drk-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12">
                <h1><?= $banner_content->content; ?></h1>
                
                <!--<form class="header-job-search" action="search_listing.html">-->
                <?php
                $form = \yii\widgets\ActiveForm::begin([
                            'id' => 'carer_search_form_index',
                            'action' => ['search/carersearch'],
                            'method' => 'GET',
                            'options' => [
                                'class' => 'header-job-search',
                            ],
                        ])
                ?>
                <div class="header-job-search-1 clearfix"> 
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="btn-group btn-group-justified" data-toggle="buttons">

                                <label class="btn active">
                                    <input type="radio" name="SearchCarer[care_type][]" value="2" id="option1" autocomplete="off" checked>Aged
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SearchCarer[care_type][]" value="3" id="option2" autocomplete="off">Disability
                                </label>
                                <label class="btn">
                                    <input type="radio" name="SearchCarer[care_type][]" value="1" id="option3" autocomplete="off">Child
                                </label>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="header-job-search-2 clearfix">  
                    <div class="row">
                        <div class="input-keyword col-sm-9 col-xs-12 no-pad-both-2">
                            <input type="hidden" id="autocomplete-init" value="0">
                                    <input type="hidden" id="carer-address_postcode1" class="form-control" name="SearchCarer[address_postcode1]" value="">
                                    <input class="form-control" type="text" name="SearchCarer[address_postcode]" id="carer-address_postcode" onkeyup="indexeasyautocompleteInit('carer-address_postcode')" placeholder="Enter postcode">
                                    <input type="hidden" name="SearchCarer[latitude]" id="carer-latitude" placeholder="latitude">
                                    <input type="hidden" name="SearchCarer[longitude]" id="carer-longitude" placeholder="longitude">
                            
                            
                            <!--<input class="form-control" name="SearchCarer[address_postcode]" placeholder="Enter your post code" type="text">-->
                        </div>
                        <div class="btn-search col-sm-3 col-xs-12 no-pad-both-1 no-pad-lft">
                            <!--                            <button class="btn btn-primary new-btn-stl" type="submit">Search Carers</button>-->

                            <div class="btn-rap new-btn-wrp btn-mobi-1 text-center">

                                <ul>
                                    <li>
                                        <a href="javascript:;" onclick="$('#carer_search_form_index').submit();" class="no-decor homepage-button booking-link"><span><i class="fa fa-search" aria-hidden="true"></i><span class="text">SEARCH</span></span></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <?php \yii\widgets\ActiveForm::end(); ?>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ************************Banner-end**************** -->

<!-- *****************welcome-start-1****************** -->
<section class="welcome-start">
    <div class="container">
        <div class="text-center new-common-heading">
            <div class="clearfix">
                <div class="col-md-12 col-sm-12">
                    <div class="top-part-heading-abt text-center">
                        <h5><?=$home_page_heading->content_name?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="btm-part">
            <div class="row new-disp-tbl">
                <div class="col-sm-6 new-disp-tbl-cell hidden-sm hidden-md hidden-lg">
                    <div class="right-part">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/child_img_1.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="col-sm-6 new-disp-tbl-cell">
                    <div class="left-part">
                        <div class="para-grp-on">
                            <p><?=$home_page_heading->content?></p>
                        </div>
                        <div class="btn-rap cmn-grn-new-btn-wrp text-left">
                            <ul>
                                <li>
                                    <a href="#" class="no-decor homepage-button booking-link"><span>LEARN MORE</span></a>
                                </li>
                            </ul>
                            <p> </p>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 new-disp-tbl-cell hidden-xs">
                    <div class="right-part">
                        <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/child_img_1.png" alt="" class="img-responsive">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- *****************welcome-end-1****************** -->

<section class="height-imgt-sec himn-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?=$banner_content_2->content?></h1>
                <div class="btn-rap cmn-grn-new-btn-wrp text-left">
                    <ul>
                        <li>
                            <a href="<?= Url::to(['search/familysearch']); ?>" class="no-decor homepage-button booking-link"><span>SEARCH FAMILIES</span></a>
                        </li>
                        <li>
                            <a href="javascript:;" onclick="searchAllCarers();" class="no-decor homepage-button booking-link"><span>SEARCH CARERS</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>







<!-- *****************how_it-start****************** -->
<section class="new-step-sec">
    <div class="container">
        <div class="text-center new-common-heading">
            <div class="clearfix">
                <div class="col-md-12 col-sm-12">
                    <div class="top-part-heading-abt text-center">
                        <h5>How It Works</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="btm-part">
            <div class="row">
                <div class="col-sm-3">
                    <div class="how-thum">
                        <div class="top-part-img">
                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/how_it_icon_1.png" alt="" class="img-responsive">
                        </div>
                        <h1>
                            <?=$how_it_works_step_1->content?>
                        </h1>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="how-thum">
                        <div class="top-part-img">
                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/how_it_icon_2.png" alt="" class="img-responsive">
                        </div>
                        <h1>
                            <?=$how_it_works_step_2->content?>
                        </h1>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="how-thum">
                        <div class="top-part-img">
                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/how_it_icon_3.png" alt="" class="img-responsive">
                        </div>
                        <h1>
                           <?=$how_it_works_step_3->content?>
                        </h1>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="how-thum">
                        <div class="top-part-img">
                            <img src="<?= Yii::$app->request->baseUrl; ?>/frontend/images/how_it_icon_4.png" alt="" class="img-responsive">
                        </div>
                        <h1>
                            <?=$how_it_works_step_4->content?>
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- *****************how_it-end****************** -->
<!-- *****************Join-start****************** -->
<section class="height-imgt-sec" style="background-image: url(<?= Yii::$app->request->baseUrl . '/uploads/frontend/cms/pictures/' . $backgorund_image->content; ?>);">
    <div class="row">
    </div>
</section>
<!-- *****************Join-end****************** -->

<?php
if (Yii::$app->user->isGuest) {
    ?>
    <!-- *****************Join-start****************** -->
    <section class="img-text-sec">
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
    <?php
}
?>

<script>
    function indexeasyautocompleteInit(id) {
    var csrfToken = '<?= Yii::$app->request->csrfToken ?>';
    var options1 = {
            url: function (phrase1) {
                return full_path + 'site/autosuggestionbysuburborpostcode';
            },
            getValue: function (element) {
                $("#eac-container-" + id).show();
                return element.name;
            },
            ajaxSettings: {
                headers: {'X-CSRF-TOKEN': csrfToken},
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },
            preparePostData: function (data) {
                data.phrase1 = $("#" + id).val();
                return data;
            },
            template: {
                type: "custom",
                method: function (value, item) {
                        return '<table border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr><td width="100%"><p><span class="ss-result-title" data-type="countries" data-id="' + item.postcode + '">' + value + '</span></p></td></tr></tbody></table>';
                }
            },
            requestDelay: 1000,
            list: {
                onMouseOverEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                },
                onSelectItemEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                        $('#carer-latitude').val(result.lat);
                        $('#carer-longitude').val(result.lon);
                        $('#carer-address_postcode1').val(result.postcode);
                },
                onChooseEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                        $('#carer-latitude').val(result.lat);
                        $('#carer-longitude').val(result.lon);
                        $('#carer-address_postcode1').val(result.postcode);
                }
            }
        };
 var autoval=$('#autocomplete-init').val();
 if(autoval==0){
     $('#autocomplete-init').val('1');
    $("#" + id).easyAutocomplete(options1); 
    $("#" + id).focus(); 
 }
     }
     
    $(function () {
        $('.scroll-down').click(function () {
            $('html, body').animate({scrollTop: $('section.ok').offset().top}, 'slow');
            return false;
        });
    });
    var scrolled = 0;

    $(document).ready(function () {
        $("#downClick").on("click", function () {
            console.log("hello");
            scrolled = scrolled + 750;

            $(".cover").animate({
                scrollTop: scrolled
            });

        });
        $("#downClick").on('click', function () {
            $('html, body').animate({
                scrollTop: scrolled
            });
        });
    });
</script>
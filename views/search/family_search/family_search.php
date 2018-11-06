<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Family Search';
?>

<!-- *****************Join-start****************** -->
<div class="mrg-6">
    <section class="prof-inner-bnr pad-top-55">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Family</h2>

<!--                    <ul class="bred-cramb">
                        <li>
                            <a href="<? Yii::$app->urlManager->createAbsoluteUrl(["/"]) ?>">Home</a>
                        </li>
                        <li>
                            <a href="<? Yii::$app->urlManager->createAbsoluteUrl(["search/familysearch"]) ?>">Family</a>
                        </li>
                    </ul>-->
                </div>
            </div>
        </div>
    </section>
</div>
<section class="carer-search-1 dash-main-body-bg-four new-search-box">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">

                <div class="panel-body-main">
                    <!--                    <h1 class="mn-heading search-heading">Family</h1>-->
                    <div class="clearfix">
                        <div class="col-md-3 col-sm-4">
                            <div class="left-part">
                                <?= Yii::$app->controller->renderPartial('family_search/family_search_left.php', ['searchPostData' => $searchPostData,'limit' => $limit, 'offset' => $offset]); ?>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="right-part">
                                <!--loader-->
                                <div id="searchloader" class="searchloader" style="width: 100%;
                                     height: 100%;
                                     position: absolute;
                                     z-index: 5;
                                     top: 0px;
                                     left: 0px;
                                     right: 0px;
                                     bottom: 0px;
                                     margin: auto;
                                     display: block;
                                     background-color: rgba(255, 248, 248, 0.1);"><div style="width: 250px;
                                       height: auto;
                                       text-align: center;
                                       position: absolute;
                                       top: 20%;
                                       left: 0px;
                                       right: 0px;
                                       bottom: 0px;
                                       margin: auto;
                                       font-size: 16px;
                                       z-index: 10;
                                       color: rgb(255, 255, 255);
                                       background-color: #0000;
                                       background-color: rgba(0, 0, 0, 0);"><i style="font-size: 46px;color: #8EB849; " class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden="true"></i></div><div class="bg" style="background: rgba(0, 0, 0, 0.13);
                                        opacity: 0.6;
                                        width: 100%;
                                        height: 100%;
                                        position: absolute;
                                                                                                                                                                  top: 0px;"></div></div>
                                <!--loader-->

                                <div class="bottom-part">
                                    <div class="clearfix">


                                        <div class="job-list-grp" id="div_search_result">
                                        </div>
                                         <div class="text-center row load_more" style="display:none;">
                                            
                                                <a class="btn" href="javascript:;" onclick="loadMoreFamily();"><span>Load More <i class="fa fa-long-arrow-down" aria-hidden="true"></i></span></a>
                                            
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
<script>
    function easyautocompleteInit(id) {
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
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-zipcode1').val(result.postcode);
                },
                onChooseEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                        $('#usermaster-latitude').val(result.lat);
                        $('#usermaster-longitude').val(result.lon);
                        $('#usermaster-zipcode1').val(result.postcode);
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
    $(document).ready(function () {
        familyCheckedUnchecked();
        setTimeout(function () {
//            searchFamilies();
        }, 300);
        __init_clockpicker_in_hour('.clockpicker');
    });
    function initMap() {

    }
//    $('#usermaster-zipcode').keyup(function () {
//        var geocoder = new google.maps.Geocoder();
//        var zipcode = $('#usermaster-zipcode').val();
//        var lat = '';
//        var lng = '';
//        var address = zipcode;
//        geocoder.geocode({componentRestrictions: {
//                country: 'AU',
//                postalCode: address
//            }}, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                lat = results[0].geometry.location.lat();
//                lng = results[0].geometry.location.lng();
//                $('#usermaster-latitude').val(lat);
//                $('#usermaster-longitude').val(lng);
//            } else {
//                console.log("Geocode was not successful for the following reason: " + status);
//                $('#usermaster-latitude').val('');
//                $('#usermaster-longitude').val('');
//            }
////      if(zipcode.length>=4 || zipcode.length==0){
////           searchFamilies();
////      }
//        });
//    });
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGEk6mRz_61JBeGGGg-VmWz2vmxmCutJU&libraries=places&callback=initMap" async defer></script>-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>-->
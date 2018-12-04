<?php

use app\assets\frontend\AutocompleteAsset;

AutocompleteAsset::register($this);

if (Yii::$app->user->isGuest) {
    ?>
    <div class="modal fade cust-my-modal2" id="signin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <!--<div class="modal-content">-->
            <div class="modal-content search-carer">
                <div class="cont-holder">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title nw_log_in" id="myModalLabel">Log In</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <form id="user_login_form" action="" method="POST">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <input id="LoginForm_email" class="form-control" placeholder="Email id *" type="email" name="LoginForm[email]">
                                        </div>
                                        <div class="errorMsg" id="err_email"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            <input id="LoginForm_password" class="form-control" placeholder="Password *" type="password" name="LoginForm[password]">
                                        </div>
                                        <div class="errorMsg" id="err_password"></div>
                                    </div>
                                    <div class="checkbox">
                                        <input id="LoginForm_rememberMe" type="checkbox" name="LoginForm[remember_me]" value="1">
                                        <label for="LoginForm_rememberMe" class="cst-lbl-chk-2">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="text-center new-btn-cent">
                                        <a class="style-btn blue-btn" href="javascript:;" onclick="$('#user_login_form').submit()"><span>Login</span></a>
                                    </div>
                                    <div class="fotget-pass text-center">
                                        <a class="cast-sign-link" href="javascript:void(0);" onclick="showForgotPasswordModal();">Forgot password ?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cust-my-modal2" id="forgot_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content search-carer">
                <div class="cont-holder">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title nw_log_in" id="myModalLabel">Forgot Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <form id="user_forgot_form" action="" method="POST">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            <input class="form-control" placeholder="Email id *" type="email" name="UserMaster[email]">
                                        </div>
                                        <div class="errorMsg" id="error_email"></div>
                                    </div>
                                    <div class="text-center new-btn-cent">
                                        <a class="style-btn blue-btn" href="javascript:;" onclick="$('#user_forgot_form').submit()"><span>Submit</span></a>
                                    </div>
                                    <div class="fotget-pass text-center">
                                        <a class="cast-sign-link" href="javascript:void(0);" onclick="showSigninModal();">Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade cust-my-modal2" id="reset_password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content search-carer">
                <div class="cont-holder">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title nw_log_in" id="myModalLabel">Reset Password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <form id="user_reset_form" action="" method="POST">
                                    <input type="hidden" name="UserMaster[id]" id="user_id" value="<?= isset($_GET['id']) && $_GET['id'] != null ? $_GET['id'] : ''; ?>">
                                    <input type="hidden" name="UserMaster[reset_password_token]" id="forgot_token" value="<?= isset($_GET['token']) && $_GET['token'] != null ? $_GET['token'] : ''; ?>">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            <input class="form-control" placeholder="New password *" type="password" name="UserMaster[new_password]">
                                        </div>
                                        <div class="errorMsg" id="err_new_password"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon3"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                            <input class="form-control" placeholder="Confirm password *" type="password" name="UserMaster[confirm_password]">
                                        </div>
                                        <div class="errorMsg" id="err_confirm_password"></div>
                                    </div>
                                    <div class="text-center new-btn-cent">
                                        <a class="style-btn blue-btn" href="javascript:;" onclick="$('#user_reset_form').submit()"><span>Submit</span></a>
                                    </div>
                                    <div class="fotget-pass text-center">
                                        <a class="cast-sign-link" href="javascript:void(0);" onclick="showSigninModal();">Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<!--==== starting popup ===========-->
<div class="modal fade cust-my-modal2" id="carer_search_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content search-carer">
            <div class="cont-holder">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title nw_log_in" id="myModalLabel">Search for a Carer</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $form = \yii\widgets\ActiveForm::begin([
                                'id' => 'carer_search_form',
                                'action' => ['search/carersearch'],
                                'method' => 'GET',
                                'options' => [
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data'
                                ],
                            ])
                    ?>
                    <!--<form id="carer_search_form" action="<?= Yii::$app->urlManager->createUrl(["search/carersearch"]) ?>" method="post">-->
                    <div class="search-step1" id="carer_search_step_1" style="display:block;">
                        <div class="row">
                            <div class="col-sm-10 col-md-offset-1">
                                <div class="check-heading">Postcode</div>
                                <div class="form-group">
                                    <input type="hidden" id="search-autocomplete-init" value="0">
                                    <input type="hidden" id="searchcarer-address_postcode1" class="form-control" name="SearchCarer[address_postcode1]" value="">
                                    <input type="text" name="SearchCarer[address_postcode]" id="searchcarer-address_postcode" onkeyup="modaleasyautocompleteInit('searchcarer-address_postcode')" placeholder="Enter postcode">
                                    <input type="hidden" name="SearchCarer[latitude]" id="searchcarer-latitude" placeholder="latitude">
                                    <input type="hidden" name="SearchCarer[longitude]" id="searchcarer-longitude" placeholder="longitude">
                                </div>
                                <div class="distance-check">
                                    <span>Within</span>
                                    <div class="chk-new">
                                        <input type="radio" name="SearchCarer[distance_within][]" id="searchcarer-distance_within_1" value="5">
                                        <label for="searchcarer-distance_within_1" class="cst-lbl-chk">
                                            5 km
                                        </label>
                                    </div>
                                    <div class="chk-new">
                                        <input type="radio" id="searchcarer-distance_within_2" name="SearchCarer[distance_within][]" value="10">
                                        <label for="searchcarer-distance_within_2" class="cst-lbl-chk">
                                            10 km
                                        </label>
                                    </div>
                                    <div class="chk-new">
                                        <input type="radio" id="searchcarer-distance_within_3" name="SearchCarer[distance_within][]" value="50">
                                        <label for="searchcarer-distance_within_3" class="cst-lbl-chk">
                                            50 km
                                        </label>
                                    </div>
                                </div>
                                <!--                                <div class="btn-sec">
                                                                    <button type="button" id="openpreviouscarersearchtab_3" onclick="opennextcarersearchtab(this)" data-target="previous" data-tabId="3">Back</button>
                                                                    <button type="button" id="opennextcarersearchtab_3" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="3">Next</button>
                                                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-offset-1">
                                <div class="check-heading">Type of Care</div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_1" type="checkbox" id="care_type" name="SearchCarer[care_type][]" value="1">
                                    <label for="searchcarer-care_type_1" class="cst-lbl-chk">
                                        Child care
                                    </label>
                                </div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_2" type="checkbox" name="SearchCarer[care_type][]" value="2">
                                    <label for="searchcarer-care_type_2" class="cst-lbl-chk">
                                        Aged care
                                    </label>
                                </div>
                                <div class="checkbox chk-new">
                                    <input id="searchcarer-care_type_3" type="checkbox" name="SearchCarer[care_type][]" value="3">
                                    <label for="searchcarer-care_type_3" class="cst-lbl-chk">
                                        Disability care
                                    </label>
                                </div>

                                <!--                                <div class="btn-sec">
                                                                    <button type="button" id="opennextcarersearchtab_1" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="1">Next</button>
                                                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-md-offset-1">
                                <div class="check-heading">Type of Job:</div>
                                <?php
                                $lookingcare = $this->context->getCarerLookingTypes();
                                ?>
                                <?php if (isset($lookingcare) && count($lookingcare) > 0) : ?>
    <?php foreach ($lookingcare as $v) : ?>
        <?php if ($v->id != 4) { ?>
                                            <div class="checkbox chk-new">
                                                <input id="searchcarer-job_type_<?= $v->id ?>" type="checkbox" name="SearchCarer[job_type][]" value="<?= $v->id ?>">
                                                <label for="searchcarer-job_type_<?= $v->id ?>" class="cst-lbl-chk"><?= $v->search_form_value ?></label>
                                            </div>
                                        <?php } ?>
                                        <br>
    <?php endforeach; ?>
<?php endif; ?>
                                <!--                                <div class="btn-sec">
                                                                    <button type="button" id="openpreviouscarersearchtab_2" onclick="opennextcarersearchtab(this)" data-target="previous" data-tabId="2">Back</button>
                                                                    <button type="button" id="opennextcarersearchtab_2" onclick="opennextcarersearchtab(this)" data-target="next" data-tabId="2">Next</button>
                                                                </div>-->
                            </div>
                        </div>

                        <div class="text-center new-btn-cent">
                            <a class="style-btn" href="javascript:;" onclick="submitCarerSearchModal();"><span>Search</span></a>
                        </div>

                    </div>
                    <!--</form>-->
<?php \yii\widgets\ActiveForm::end(); ?>
                    <div class="modal-body-pic"><img src="<?= $this->context->getThemeImage("carer-modal-img.png") ?>"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function initMap() {

    }
    function modaleasyautocompleteInit(id) {
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
                    $('#searchcarer-latitude').val(result.lat);
                    $('#searchcarer-longitude').val(result.lon);
                    $('#searchcarer-address_postcode1').val(result.postcode);
                },
                onChooseEvent: function () {
                    var result = $("#" + id).getSelectedItemData();
                    $("#" + id).val(result.name);
                    $('#searchcarer-latitude').val(result.lat);
                    $('#searchcarer-longitude').val(result.lon);
                    $('#searchcarer-address_postcode1').val(result.postcode);
                }
            }
        };
        var autoval = $('#search-autocomplete-init').val();
        if (autoval == 0) {
            $('#search-autocomplete-init').val('1');
            $("#" + id).easyAutocomplete(options1);
            $("#" + id).focus();
        }
    }

//    $('#searchcarer-address_postcode').keyup(function () {
//        var geocoder = new google.maps.Geocoder();
//        var zipcode = $('#searchcarer-address_postcode').val();
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
//                $('#searchcarer-latitude').val(lat);
//                $('#searchcarer-longitude').val(lng);
//            } else {
//                console.log("Geocode was not successful for the following reason: " + status);
//                $('#searchcarer-latitude').val('');
//                $('#searchcarer-longitude').val('');
//            }
//        });
//    });
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGEk6mRz_61JBeGGGg-VmWz2vmxmCutJU&libraries=places&callback=initMap" async defer></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>
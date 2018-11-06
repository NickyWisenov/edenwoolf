<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\frontend\MaterialAsset;

MaterialAsset::register($this);

$this->title = 'EdenWoolf - Register as Carer';
?>

<!-- *****************Join-start****************** -->

<div class="new-register-total">
    <section class="prof-inner-bnr pad-top-55">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Register as a Carer</h2>

                    <ul class="bred-cramb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Join</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>





    <section class="registration-body new-register-form">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-body-main-top-1">
                    <div class="panel-body-main">
                        <form class="form" role="form" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="display_name" type="text" class="validate">
                                    <label for="display_name">Display Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="first_name" type="text" class="validate">
                                    <label for="first_name">Your first name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Your last name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email_address" type="text" class="validate">
                                    <label for="email_address">Email address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="phone_number" type="text" class="validate">
                                    <label for="phone_number">Phone number</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12 new-column">
                                    <h3 class="lable-new">Date of birth</h3>
                                </div>
                                <div class="input-field col m4 s12">
                                    <select>
                                        <option value="" disabled selected>Day</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>

                                </div>
                                <div class="input-field col m4 s12">
                                    <select>
                                        <option value="" disabled selected>Month</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="input-field col m4 s12">
                                    <select>
                                        <option value="" disabled selected>Year</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="col s12">
                                    <span class="helper-text new-class-text" data-error="wrong" data-success="right">Your date of birth will not be displayed publicly</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <div class="group-radio">
                                        <p>
                                            <label>
                                                <input type="checkbox" class="filled-in" />
                                                <span>I would prefer to keep my age private</span>
                                            </label>
                                        </p>  
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="address" type="text" class="validate">
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col m6 s12">
                                    <input id="Suburd" type="text" class="validate">
                                    <label for="Suburd">Suburd/Town</label>
                                </div>
                                <div class="input-field col m6 s12">
                                    <input id="Post" type="text" class="validate">
                                    <label for="Post">Post code</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Only your postcode will be displayed publicly</span>
                                </div>
                            </div>


                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="retype-password" type="password" class="validate">
                                    <label for="retype-password">Retype password </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">ABN</label>
                                    <span class="helper-text new-txt-5" data-error="wrong" data-success="right">For more information about how to apply for an ABN, please visit <a href="#">https://www.business.gov.au</a></span>
                                </div>
                            </div>
                            <div class="up-img-area">
                                <img class="img-responsive" src="images/picture.png" alt="">
                                <label class="btn btn-all">
                                    <input type="file"/><i class="fa fa-upload" aria-hidden="true"></i>Upload a photo of yourself                                    
                                </label>
                            </div>

                            <div class="btn-rap new-btn-wrp text-center">
                                <!--                            <a href="/edenwoolf/site/regfamily" class="btn btn-all">Join as a Family</a>-->
                                <ul>
                                    <li>
                                        <a href="/edenwoolf/site/regfamily" class="no-decor homepage-button booking-link"><span>Signup</span></a>
                                    </li>
                                </ul>

                            </div>
                        </form>


                        <p class="bottom-para"> By signing up, you agree to Eden Woolf <span>Terms of use</span> and <span>Privacy policy.</span></p>


                    </div>


                </div>
            </div>
        </div>
    </section>

</div>
<!-- *****************Join-end****************** -->

<script>
    $(document).on('click', '#close-preview', function () {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
        );
    });

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom',
            trigger: 'hover',
        });
        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });

    $(document).ready(function () {
        if ($('#usermaster-display_name').val() != "") {
            $('.fa-spin').show();
            $('.fa-check').hide();
            $('.fa-times').hide();
            $("#usermaster-display_name").parent().removeClass('has-error').find('.help-block').html('');
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            $.ajax({
                url: full_path + 'site/checkname',
                headers: {'X-CSRF-TOKEN': csrfToken},
                type: 'POST',
                dataType: 'json',
                data: {name: $('#usermaster-display_name').val(), type: $('#usermaster-type_id').val()},
                success: function (data) {
                    if (data.res == 1) {
                        $('.fa-check').show();
                    } else if (data.res == 0) {
                        $.each(data.error, function (key, val) {
                            $('.fa-times').show();
                            $("#usermaster-display_name").parent().addClass('has-error').find('.help-block').html(val);
                        });
                    }
                    $('.fa-spin').hide();
                }
            })
        }
    })
    function initMap() {
    }
    $('#usermaster-address').keyup(function () {
        var input = document.getElementById('usermaster-address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $("#usermaster-latitude").val(place.geometry.location.lat());
            $("#usermaster-longitude").val(place.geometry.location.lng());
        })
    });
</script>
<script>
    $(document).ready(function () {
        $('select').formSelect();
    });
</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>-->
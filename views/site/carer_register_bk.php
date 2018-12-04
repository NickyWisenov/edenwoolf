<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\frontend\MaterialAsset;
MaterialAsset::register($this);

$this->title = 'EdenWoolf - Register as Carer';
?>

<!-- *****************Join-start****************** -->
<section class="registration-body">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body-main-top-1">
                <div class="panel-body-main">
                    <div class="pay-sm-area text-center">
                        <h1>Register as a Carer</h1>
                    </div>
                    <?php
                    $form = ActiveForm::begin([
                                'options' => ['role' => "form", 'enctype' => 'multipart/form-data'],
                                'enableClientValidation' => true
                            ])
                    ?>
                    <?= $form->field($model, 'type_id')->hiddenInput(['value' => "2"])->label(false); ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group relative-cls">
                                <label for="display_name" class="nw-label">Display Name</label>
                                <?= $form->field($model, 'display_name')->textInput(['class' => "form-control", 'placeholder' => "Carer display name"])->label(false); ?>
                                <i class="fa fa-spinner fa-spin" style="display: none;"></i>
                                <i class="fa fa-check" style="display: none; color: green;"></i>
                                <i class="fa fa-times" style="display: none; color: red;"></i>
                                <span class="errorMsg" id="err_display_name"></span>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="first_name" class="nw-label">Your Name</label>
                                <?= $form->field($model, 'first_name')->textInput(['class' => "form-control", 'placeholder' => "First name"])->label(false); ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!--<label for="last_name" class="nw-label">Last Name</label>-->
                                <?= $form->field($model, 'last_name')->textInput(['class' => "form-control", 'placeholder' => "Last name"])->label(false); ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email" class="nw-label">Email</label>
                                <?= $form->field($model, 'email')->input('email', ['class' => "form-control", 'placeholder' => "Email address"])->label(false); ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="phone" class="nw-label">Phone</label>
                                <?= $form->field($model, 'phone')->textInput(['class' => "form-control", 'placeholder' => "Phone number"])->label(false); ?>
                            </div>
                        </div>                        
                    </div>
                    <div class="row pos-relative">
                        <div class="col-sm-12">
                            <label for="usr" class="nw-label-20">Date of birth</label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    $dateData[$i] = $i;
                                }
                                echo $form->field($model, 'date')->dropDownList(
                                        $dateData, ['prompt' => 'Day'])->label(false);
                                ?>
                            </div>
                        </div>  
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php
                                for ($i = 1; $i <= 12; $i++) {
                                    $monthData[$i] = date('F', mktime(0, 0, 0, $i, 10));
                                }
                                echo $form->field($model, 'month')->dropDownList(
                                        $monthData, ['prompt' => 'Month'])->label(false);
                                ?>
                            </div>
                        </div>  
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php
                                for ($i = date('Y'); $i >= 1900; $i--) {
                                    $yearData[$i] = $i;
                                }
                                echo $form->field($model, 'year')->dropDownList(
                                        $yearData, ['prompt' => 'Year'])->label(false);
                                ?>
                            </div>
                        </div>  
                        <div class="col-sm-12 pos-absulute">
                            <p class="frm-message-23">Your date of birth will not be displayed publicly</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="checkbox cst-lbl-chk-3">
                                <input id="checkbox1" type="checkbox" name="UserMaster[age_privacy]" value="1" <?= ($model->age_privacy == 1) ? 'checked="checked"' : ''; ?>>
                                <label for="checkbox1">
                                    I would prefer to keep my age private
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="usr" class="nw-label">Address</label>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?= $form->field($model, 'address')->textInput(['class' => "form-control", 'placeholder' => "Type your full address"])->label(false); ?>
                                <?= $form->field($model, 'latitude')->hiddenInput(['class' => "form-control"])->label(false); ?>
                                <?= $form->field($model, 'longitude')->hiddenInput(['class' => "form-control"])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?= $form->field($model, 'city')->textInput(['class' => "form-control", 'placeholder' => "Suburb/Town"])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?= $form->field($model, 'zipcode')->textInput(['class' => "form-control", 'placeholder' => "Post code"])->label(false); ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p class="frm-message-2">Only your postcode will be displayed publicly</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="usr" class="nw-label">Password</label>
                                <?= $form->field($model, 'password')->input('password', ['class' => "form-control", 'placeholder' => "Password"])->label(false); ?>
                            </div>
                        </div>    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!--<label for="usr" class="nw-label">Retype Password</label>-->
                                <?= $form->field($model, 'retype_password')->input('password', ['class' => "form-control", 'placeholder' => "Retype password"])->label(false); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="usr" class="nw-label">ABN</label>
                                <?= $form->field($model, 'abn')->textInput(['class' => "form-control", 'placeholder' => "ABN"])->label(false); ?>
                                <p class="frm-message">For more information about how to apply for an ABN, please visit <a href="https://www.business.gov.au">https://www.business.gov.au</a></p>
                            </div>
                        </div>      
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename cst-frm-file" placeholder="Upload a photo of yourself" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                                    <!-- image-preview-clear button -->
                                    <button type="button" class="btn btn-default image-preview-clear clr-1" style="display:none;">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    <!-- image-preview-input -->
                                    <div class="btn btn-default image-preview-input cst-img-prv-1">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        <span class="image-preview-input-title">Upload</span>
                                        <input type="file" class="form-control" accept="image/png, image/jpeg, image/gif" name="UserMaster[image]"/> <!-- rename it -->
                                    </div>
                                </span>
                            </div><!-- /input-group image-preview [TO HERE]--> 
                        </div>      
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <button class="btn" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> SIGN UP</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="sgn-foot-text">
                                <p>By signing up, you agree to Eden Woolf</p>
                                <p><a href="#">Terms of use</a> and <a href="#">Privacy policy.</a></p>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</section>
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
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1fPzwnI1OEQX81BE84DJviQak0Ukllmg&libraries=places&callback=initMap" async defer></script>-->
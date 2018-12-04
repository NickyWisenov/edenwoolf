$(document).ready(function () {
    if ($('.clockpicker').length > 0) {
        $.each($('.clockpicker'), function (item, event) {
            var _this = $("#" + event.id);
            var value = _this.val();
            $('.clockpicker').timepicker({
                focusOnShow: false,
                ignoreReadonly: true,
                timeFormat: 'g:i A',
                interval: '60',
                minTime: '0',
                maxTime: '11:59pm',
                defaultTime: '11',
                startTime: '00:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
        $('.clockpicker').on('focus', function () {
            $(this).trigger('blur');
        });
    }
});
$(document.body).on("change", "#carerdetails-certifications", function () {
    var str1 = ($('#carerdetails-certifications').val());
    if (str1 != null) {
        var str = str1.toString();
        var split_str = str.split(",");
        if (split_str.indexOf("14") !== -1) {
            $('.other_qualification').show();
        } else {
            $('.other_qualification').hide();
            $('#carerdetails-other_certifications').val('');
        }
    } else {
        $('.other_qualification').hide();
    }
});
daymastercheckboxclick = function (event) {
    var _selector = $("#" + event.id);
    var value = _selector.val();
    setTimeout(function () {
        if (_selector.is(":checked")) {
        } else {
            $('#select_all_day').prop('checked', false);
            $('#day_master_all_day_' + value).prop('checked', false);
            $("#day_master_start_time_" + value).val('');
            $("#day_master_end_time_" + value).val('');
        }
    }, '50');
};
alldaycheckboxclick = function (event) {
    var _selector = $("#" + event.id);
    var value = _selector.val();
    setTimeout(function () {
        if (_selector.is(":checked")) {
            $('#day_master_id_' + value).prop('checked', true);
            $("#day_master_start_time_" + value).val('12:00 AM');
            $("#day_master_end_time_" + value).val('11:30 PM');
        } else {
        }
    }, '50');
};
selectalldayclick = function (event) {
    var _selector = $("#" + event.id);
    var value = _selector.val();
    setTimeout(function () {
        if (_selector.is(":checked")) {
            $('.day_master_id').prop('checked', true);
        } else {
            $('.day_master_id').prop('checked', false);
        }
    }, '50');
};

$(".select2-single, .select2-multiple").select2({
    theme: "bootstrap",
    placeholder: "Select",
    maximumSelectionSize: 6,
    containerCssClass: ':all:'
});

updateProfilePicture = function (event) {
    var ext = $('#usermaster-image').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $('#usermaster-image').parent().addClass('has-error');
        $('#usermaster-image').parent().find(".help-block").html("Sólo se aceptan archivos con las siguientes extensiones: png, jpg, jpeg, gif");
    } else {
        if ($('#usermaster-image').parent().hasClass('has-error')) {
            $('#usermaster-image').parent().removeClass('has-error')
        }
        $('#usermaster-image').parent().find(".help-block").html("");
        if (event.files && event.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploaded-image')
                        .attr('src', e.target.result)
                        .width(120)
                        .height(120);
            };
            reader.readAsDataURL(event.files[0]);
        }
    }
};
updateIDproofimage = function (event) {
    var ext = $('#usermaster-id_proofimage').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
        $('#usermaster-id_proofimage').parent().addClass('has-error');
        $('#usermaster-id_proofimage').parent().find(".help-block").html("Sólo se aceptan archivos con las siguientes extensiones: png, jpg, jpeg, gif");
    } else {
        if ($('#usermaster-id_proofimage').parent().hasClass('has-error')) {
            $('#usermaster-id_proofimage').parent().removeClass('has-error')
        }
        $('#usermaster-id_proofimage').parent().find(".help-block").html("");
        if (event.files && event.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploaded-id_proofimage')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(130);
            };
            reader.readAsDataURL(event.files[0]);
        }
    }
};

$('form#carer-edit-profile-basic-form').submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();

    _this.find('.has-error').removeClass('has-error');
    _this.find('.help-block').html('');
    $('.image-error').html('');
    $('.id_proofimage-error').html('');
    var url = full_path + "carer/updatebasicform";

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop();
            if (resp.flag == true) {
                if (resp.imgError == true) {
                    $('.image-error').parent("div").addClass("has-error");
                    $('.image-error').html(resp.imgErrorMsg);
                }
                if (resp.id_proofimageError == true) {
                    $('.id_proofimage-error').parent("div").addClass("has-error");
                    $('.id_proofimage-error').html(resp.id_proofimageErrorMsg);
                } else {
                    notie.alert({type: 1, text: resp.msg, time: 5});
                    if (resp.childcare) {
                        $('.adv_childcare').show();
                    } else {
                        $('.adv_childcare').hide();
                    }
                    $('#advanced_tab').click();
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: $("#myTab").offset().top - 140
                        }, 1000);
                    }, 100)
                }
            } else {
                ajaxindicatorstop();
                notie.alert({type: 3, text: resp.msg, time: 5});
                $.each(resp.errors, function (item, value) {
                    if (item == 'image' || item == 'id_proofimage') {
                        $('.' + item + '-error').parent("div").addClass("has-error");
                        $('.' + item + '-error').html(value);
                    }
                    $('#usermaster-' + item).parent("div").addClass("has-error");
                    $('#usermaster-' + item).parent("div").find('.help-block').html(value);
                });
                $.each(resp.carer_errors, function (item, value) {
                    $('.error-' + item).html(value);
                });
            }
        },
        error: function () {}
    });
});
$('form#carer-edit-profile-advanced-form').submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();
    _this.find('.has-error').removeClass('has-error');
    _this.find('.help-block').html('');
    $('.image-error').html('');
    $('.id_proofimage-error').html('');
    var url = full_path + "carer/updateadvancedform";

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop();
            if (resp.flag == true) {
                notie.alert({type: 1, text: resp.msg, time: 5});
                $('#available_tab').click();
                setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: $("#myTab").offset().top - 140
                    }, 1000);
                }, 100)
            } else {
                ajaxindicatorstop();
                notie.alert({type: 3, text: resp.msg, time: 5});
                $.each(resp.errors, function (item, value) {
                    $('.error-' + item).html(value);
                });
            }
        },
        error: function () {}
    });
});
$('form#carer-edit-profile-availablity-form').submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();
    _this.find('.has-error').removeClass('has-error');
    _this.find('.help-block').html('');
    $('.image-error').html('');
    $('.id_proofimage-error').html('');
    var url = full_path + "carer/updateavailablityform";

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop();
            if (resp.flag == true) {
                notie.alert({type: 1, text: resp.msg, time: 5});
                setTimeout(function () {
                    $('html, body').animate({
                        scrollTop: $("#myTab").offset().top - 140
                    }, 1000);
                }, 100)
            } else {
                ajaxindicatorstop();
                notie.alert({type: 3, text: resp.msg, time: 5});
                if (resp.day_master_checkbox_err) {
                    $('#no_checkbox_error_div').html(resp.day_master_checkbox_err_msg);
                }
                if (resp.start_time_err) {
                    $.each(resp.start_time_error, function (item, value) {
                        $('#error_' + item).html(value);
                    });
                }
                if (resp.end_time_err) {
                    $.each(resp.end_time_error, function (item, value) {
                        $('#error_' + item).html(value);
                    });
                }
            }
        },
        error: function () {}
    });
});

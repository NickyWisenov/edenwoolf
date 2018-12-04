//$(window).load(function () {
//    if ($(".clockpicker").length > 0) {
//        $(".clockpicker").val("");
//    }
//});
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
//var input = $('.clockpicker').datetimepicker({
//    datepicker: false,
//    format: 'g:i A',
//    formatTime: 'g:i A',
//    mask: '29:59 99',
//    ampm: true,
//    step: 15
//});
//var input = $('.clockpicker').datetimepicker({
//    pickDate: false,
//    minuteStep: 15,
//    pickerPosition: 'bottom-right',
//    format: 'HH:ii p',
//    autoclose: true,
//    showMeridian: true,
//    startView: 1,
//    maxView: 1
//});
//var input = $('.clockpicker').clockpicker({
//    twelvehour: true,
//    placement: 'bottom',
//    align: 'left',
////    autoclose: true,
//    'default': 'now',
//    donetext: 'Done'
//});

$(function ()
{
    $(".datepicker").datepicker({
        autoclose: true,
        dateFormat: 'mm/dd/yy'
    });
});

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

openDisablityCareContent = function (event) {
    var _selector = $("#" + event.id);
    setTimeout(function () {
        if (_selector.is(":checked")) {
            $("#family_disability_cont").css("display", "block");
        } else {
            $("#family_disability_cont").css("display", "none");
        }
    }, '50');
};

addnewcarepersion = function (event) {
    var selectNeedCare = $("select.selectNeedCare:first").html();
    selectNeedCare = selectNeedCare.replace("selected", "");

    var _selector = $("#" + event.id);
    var _selectorPerson_no = _selector.attr("data-totalperson");

    var new_person_no = parseInt(_selectorPerson_no) + 1;

    var newCarePersonHtml = '<div id="care_persons_list_' + new_person_no + '">' +
            '<div class="row">' +
            '<div class="col-sm-10">' +
            '<div class="form-group">' +
            '<label for="usr" class="nw-label-5">Add another person(s) in need of care</label>' +
            '<input type="text" class="form-control" name="FamilyCarePerson[name][' + new_person_no + ']" id="familycareperson-name_' + new_person_no + '" placeholder="Name of person in need of care" autocomplete="off">' +
            '</div>' +
            '</div> ' +
            '<div class="col-sm-2 pad-left-none hidden-xs">' +
            '<a href="javascript:;" id="addnewcarepersion_' + new_person_no + '" onclick="addnewcarepersion(this)" data-totalperson="' + new_person_no + '" class="btn btn-2 btn-all">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>' +
            '<a href="javascript:;" id="removecarepersion_' + new_person_no + '" onclick="removecarepersion(this)" data-totalperson="' + new_person_no + '" class="btn btn-2 btn-all remove noDisplay">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-sm-10">' +
            '<div class="form-group">' +
            '<label for="usr" class="nw-label-5">Description of Person in need of care</label>' +
            '<select class="form-control selectNeedCare" name="FamilyCarePerson[need_care][' + new_person_no + ']" id="familycareperson-need_care_0">' +
            '<option value="">Select Person in need of care</option>' + selectNeedCare +
            '</select>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-sm-10">' +
            '<div class="form-group">' +
            '<label for="usr" class="nw-label-5">Needs and requirements</label>' +
            '<input type="text" name="FamilyCarePerson[description][' + new_person_no + ']" id="familycareperson-description_' + new_person_no + '" class="form-control" placeholder="Please describe needs and requirements, including disabilities, special needs, allergies or illnesses">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="help-block error-familycareperson-' + new_person_no + '"></div>' +
            '<div class="col-sm-2 pad-left-none hidden-sm hidden-md hidden-lg">' +
            '<a href="javascript:;" id="mob-addnewcarepersion_' + new_person_no + '" onclick="addnewcarepersion(this)" data-totalperson="' + new_person_no + '" class="btn btn-2 btn-all">Add more <i class="fa fa-plus" aria-hidden="true"></i></a>' +
            '<a href="javascript:;" id="mob-removecarepersion_' + new_person_no + '" onclick="removecarepersion(this)" data-totalperson="' + new_person_no + '" class="btn btn-2 btn-all remove noDisplay">Remove <i class="fa fa-minus-circle" aria-hidden="true"></i></a>' +
            '</div>' +
            '</div>';
    $("#care_persons_container").append(newCarePersonHtml);
    $("#addnewcarepersion_" + _selectorPerson_no).css("display", 'none');
    $("#removecarepersion_" + _selectorPerson_no).css("display", 'block');
    $("#mob-addnewcarepersion_" + _selectorPerson_no).css("display", 'none');
    $("#mob-removecarepersion_" + _selectorPerson_no).css("display", 'block');
    $(".datepicker").datepicker({
        autoclose: true,
        dateFormat: 'mm/dd/yy'
    });
};

removecarepersion = function (event) {
    var _selector = $("#" + event.id);
    var _selectorPerson_no = _selector.attr("data-totalperson");
    _selector.closest("#care_persons_list_" + _selectorPerson_no).remove();
};

//var input = $('.clockpicker').datetimepicker({
//    datepicker: false,
//    format: 'g:i A',
//    formatTime: 'g:i A',
//    mask: '29:59 99',
//    ampm: true,
//    step: 15
//});
//var input = $('.clockpicker').clockpicker({
//    twelvehour: true,
//    placement: 'bottom',
//    align: 'left',
////    autoclose: true,
//    'default': 'now',
//    donetext: 'Done'
//});
$(function ()
{
    $(".datepicker").datepicker({
        autoclose: true,
        dateFormat: 'mm/dd/yy'
    });
});

$('form#family-info-form').submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();

    _this.find('.has-error').removeClass('has-error');
    _this.find('.help-block').html('');
    $('.image-error').html('');
    var url = full_path + "family/updatefamilyinfoform";

    $.ajax({
        url: url,
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: "POST",
        data: new FormData(this),
        contentType: false,
//        cache: false,
        processData: false,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop();
            if (resp.flag == true) {
                if (resp.imgError == true) {
                    $('.image-error').parent("div").addClass("has-error");
                    $('.image-error').html(resp.imgErrorMsg);
                } else {
                    notie.alert({type: 1, text: resp.msg, time: 5});
                    if (resp.childcare) {
                        $('.childcare').show();
                    } else {
                        $('.childcare').hide();
                    }
                    if (resp.care_describe_type_live_in) {
                        $('.care_describe_type_live_in').show();
                    } else {
                        $('.care_describe_type_live_in').hide();
                        if (resp.care_describe_type_long_term) {
                            $('.care_describe_type_long_term').show();
                        } else {
                            $('.care_describe_type_long_term').hide();
                        }
                    }
                    $('#care_info_tab').click();
                    setTimeout(function () {
                        $('html, body').animate({
                            scrollTop: $("#myTab").offset().top - 140
                        }, 1000);
                    }, 100)
                }
            } else {
                notie.alert({type: 3, text: resp.msg, time: 5});
                $.each(resp.errors, function (item, value) {
                    if (item == 'image' || item == 'id_proofimage') {
                        $('.' + item + '-error').parent("div").addClass("has-error");
                        $('.' + item + '-error').html(value);
                    }
                    $('#usermaster-' + item).parent("div").addClass("has-error");
                    $('#usermaster-' + item).parent("div").find('.help-block').html(value);
                });
                if (resp.family_errors) {
                    $.each(resp.family_errors, function (item, value) {
                        $('.error-' + item).html(value);
                    });
                }
                if (resp.care_person_err) {
                    $.each(resp.care_person_err_msg, function (item, value) {
                        $('.error-familycareperson-' + item).html(value);
                    });
                }
                if (resp.family_person_dob_err) {
                    $.each(resp.family_person_err_msg_, function (item, value) {
                        $('#family_person_dob_err_msg_' + item).html(value);
                    });
                }
                ajaxindicatorstop();
            }
        },
        error: function () {}
    });
});
$('form#care-info-form').submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();
    _this.find('.has-error').removeClass('has-error');
    _this.find('.help-block').html('');
    var url = full_path + "family/updatecareinfoform";

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
                $.each(resp.family_errors, function (item, value) {
                    if (item == 'pay_amount' || item == 'pay_type') {
                        $('.error-pay').html(value);
                    }
                    $('.error-' + item).html(value);
                });
            }
        },
        error: function () {}
    });
});

$('form#family-change-password').submit(function (e) {
    e.preventDefault();
    ajaxindicatorstart();
    var _this = $(this);

    _this.find(".has-error").removeClass('has-error');
    _this.find(".help-block").html('');
    var data = _this.serialize();
    var url = full_path + "family/changepassword";
    $.post(url, data,
            function (resp) {
                if (resp.flag == true) {
                    success_msg(resp.msg);
                    setTimeout(function () {
                        window.location.reload();
                    }, '3000');
                } else {
                    $.each(resp.errors, function (item, value) {
                        window.console.log(item);
                        window.console.log(value);
                        $("#usermaster-" + item).parent().addClass("has-error");
                        $("#usermaster-" + item).parent().find("help-block").html('ddd');
                        $(".error-" + item).html(value);
                    });
                    ajaxindicatorstop();
                }
            }, "json");

});

checkVisiblePrntChild = function (event) {
    var _selector = $("#" + event.id);
    if ((_selector.val() == '1' && _selector.is(":checked")) || $("#familydetails-care_needed_1").is(":checked")) {
        $("#carer_parent_status_cont").css("display", 'block');
        $("#carer_child_work_cont").css("display", 'block');
    } else {
        if ($("#carer_parent_status_cont").is(":visible")) {
            $("#carer_parent_status_cont").css("display", 'none');
            $("#carer_parent_status_cont").find("select option").attr('selected', false);
        }
        if ($("#carer_child_work_cont").is(":visible")) {
            $("#carer_child_work_cont").css("display", 'none');
            $("#carer_child_work_cont").find("select option").attr('selected', false);
        }
    }
};

//toogleCareDescribeTypeOptions = function (event) {
//    var _selector = $("#" + event.id);
//    var selectedString = (_selector.val()==''|| _selector.val()==null)?'':',' + _selector.val().join() + ',';
//    if (selectedString.indexOf(',3,') >= 0) {
//        $("#familydetails-accomodation_type_cont").css("display", "block");
//        $("#familydetails-other_perk_cont").css("display", "block");
//    } else if (selectedString.indexOf(',1,') >= 0) {
//        if (!$("#familydetails-accomodation_type_cont").is(":visible")) {
//            $("#familydetails-accomodation_type_cont").css("display", "block");
//        }
//
//        if ($("#familydetails-other_perk_cont").is(":visible")) {
//            $("#familydetails-other_perk_cont").css("display", "none");
//            $("#familydetails-other_perk_cont").find("select option").attr('selected', false);
//        }
//    } else {
//        if ($("#familydetails-accomodation_type_cont").is(":visible")) {
//            $("#familydetails-accomodation_type_cont").css("display", "none");
//            $("#familydetails-accomodation_type_cont").find("select option").attr('selected', false);
//        }
//
//        if ($("#familydetails-other_perk_cont").is(":visible")) {
//            $("#familydetails-other_perk_cont").css("display", "none");
//            $("#familydetails-other_perk_cont").find("select option").attr('selected', false);
//        }
//    }
//};
toogleCareDescribeTypeOptions = function (event) {
    var _selector = $("#" + event.id);
    var selectedString = (_selector.val()==''|| _selector.val()==null)?'':',' + _selector.val().join() + ',';
        if(selectedString.indexOf(',3,') == -1){
           $("#familydetails-accomodation_type_cont").css("display", "none");
            $("#familydetails-accomodation_type_cont").find("select option").attr('selected', false);
             $("#familydetails-other_perk_cont").css("display", "none");
            $("#familydetails-other_perk_cont").find("select option").attr('selected', false);
            $('#familydetails-accomodation_type, #familydetails-other_perk').select2({
		theme: "bootstrap",
		placeholder: "Select",
		maximumSelectionSize: 6,
		containerCssClass: ':all:'
	}); 
        }
    if (selectedString.indexOf(',3,') >= 0) {
        $("#familydetails-accomodation_type_cont").css("display", "block");
        $("#familydetails-other_perk_cont").css("display", "block");
    } else if (selectedString.indexOf(',1,') >= 0) {
//        if (!$("#familydetails-accomodation_type_cont").is(":visible")) {
//            $("#familydetails-accomodation_type_cont").css("display", "block");
//        }

//        if ($("#familydetails-other_perk_cont").is(":visible")) {
            $("#familydetails-other_perk_cont").css("display", "none");
            $("#familydetails-other_perk_cont").find("select option").attr('selected', false);
//        }
    } else {
//        if ($("#familydetails-accomodation_type_cont").is(":visible")) {
            $("#familydetails-accomodation_type_cont").css("display", "none");
            $("#familydetails-accomodation_type_cont").find("select option").attr('selected', false);
//        }

//        if ($("#familydetails-other_perk_cont").is(":visible")) {
            $("#familydetails-other_perk_cont").css("display", "none");
            $("#familydetails-other_perk_cont").find("select option").attr('selected', false);
//        }
    }
};

$("#familydetails-pay_amount").keyup(function () {
    var amountValue = $(this).val();

    amountValue = amountValue.replace(/[^\d.-]/g, '');
    $(this).val(amountValue);
});
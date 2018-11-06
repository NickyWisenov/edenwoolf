$(document).ready(function () {
    if ($('.clockpicker').length > 0) {
        $.each($('.clockpicker'), function (item, event) {
            var _this = $("#" + event.id);
            var value = _this.val();
            $('.clockpicker').datetimepicker({
                datepicker: false,
                format: 'H:i',
                ampm: true,
                step: 1,
                setTime: value
            });
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

$(function ()
{
    $(".datepicker").datepicker({
        autoclose: true,
        dateFormat: 'mm/dd/yy'
    });
});

openOtherQualificationDiv = function (event) {
    var _selector = $("#" + event.id);
    if ((_selector.val() == '14' && _selector.is(":checked")) || $("#loggingjobsmaster-carer_qualification_14").is(":checked")) {
        $("#other_qualification_cont").css("display", "block");
    } else {
        if ($("#other_qualification_cont").is(":visible")) {
            $("#other_qualification_cont").css("display", "none");
            $("#other_qualification_cont").find("input").val("");
        }
    }
};
openDutiesOtherOptionDiv = function (event) {
    var _selector = $("#" + event.id);
    if ((_selector.val() == '14' && _selector.is(":checked")) || $("#loggingjobsmaster-carer_other_duties_9").is(":checked")) {
        $("#other_duties_cont").css("display", "block");
    } else {
        if ($("#other_duties_cont").is(":visible")) {
            $("#other_duties_cont").css("display", "none");
            $("#other_duties_cont").find("input").val("");
        }
    }
};
toogleChildCareDependencies = function (event) {
    var _selector = $("#" + event.id);
    if ((_selector.val() == '1' && _selector.is(":checked")) || $("#loggingjobsmaster-carer_type_1").is(":checked")) {
        $("#child_care_dis_cont").css("display", "block");
        $("#experiene_type_cont").css("display", "block");
        $("#carering_exp_cont").css("display", "block");
        $("#children_age_cont").css("display", "block");
    } else {
        if ($("#child_care_dis_cont").is(":visible")) {
            $("#child_care_dis_cont").css("display", "none");
            $("#child_care_dis_cont").find("select option").attr('selected', false);
        }
        if ($("#open_prefer_care_who_parent_cont").is(":visible")) {
            $("#open_prefer_care_who_parent_cont").css("display", "none");
            $("#open_prefer_care_who_parent_cont").find("select option").attr('selected', false);
        }
        if ($("#experiene_type_cont").is(":visible")) {
            $("#experiene_type_cont").css("display", "none");
            $("#experiene_type_cont").find('input[type=checkbox]:checked').removeAttr('checked');
        }
        if ($("#carering_exp_cont").is(":visible")) {
            $("#carering_exp_cont").css("display", "none");
            $("#carering_exp_cont").find("select option").attr('selected', false);
        }
        if ($("#children_age_cont").is(":visible")) {
            $("#children_age_cont").css("display", "none");
            $("#children_age_cont").find('input[type=checkbox]:checked').removeAttr('checked');
        }
    }
};
openPreferCareWhoParentDiv = function (event) {
    var _selector = $("#" + event.id);
    if (_selector.val() == '1') {
        $("#open_prefer_care_who_parent_cont").css("display", "block");
    } else {
        if ($("#open_prefer_care_who_parent_cont").is(":visible")) {
            $("#open_prefer_care_who_parent_cont").css("display", "none");
            $("#open_prefer_care_who_parent_cont").find("select option").attr('selected', false);
        }
    }
};

$("#logging-job-form").submit(function (e) {
    e.preventDefault();
    var _this = $(this);
    ajaxindicatorstart();
    _this.find(".has-error").removeClass('has-error');
    _this.find(".help-block").html('');

    var _formData = _this.serialize();
    var url = full_path + "joblog/createjoblog";

    $.post(url, _formData,
            function (resp) {
                if (resp.flag == true) {
                    success_msg(resp.respMessage);
                    setTimeout(function () {
                        window.location.reload();
                    }, '3000');
                } else {
                    var focus = "";
                    var topheight = $("header.header").height() + 100;
                    $.each(resp.errors, function (item, value) {
                        if (focus === "") {
                            if (item == "carer_availability") {
                                focus = "." + item;
                            } else {
                                focus = "#loggingjobsmaster-" + item;
                            }
                        }

                        if (item == "carer_availability") {
                            $("#no_checkbox_error_div").html(value);
                        } else {
                            $("#loggingjobsmaster-" + item).parent().addClass("has-error");
                            $("#loggingjobsmaster-" + item).parent().find(".help-block").html(value);
                        }
                    });
                    if (resp.day_master_checkbox_err) {
                        if (focus === "") {
                            focus = '#no_checkbox_error_div';
                        }
                        $('#no_checkbox_error_div').html(resp.day_master_checkbox_err_msg);
                    }
                    if (resp.start_time_err) {
                        $.each(resp.start_time_error, function (item, value) {
                            if (focus === "") {
                                focus = '#error_' + item;
                            }
                            $('#error_' + item).html(value);
                        });
                    }
                    if (resp.end_time_err) {
                        $.each(resp.end_time_error, function (item, value) {
                            if (focus === "") {
                                focus = '#error_' + item;
                            }
                            $('#error_' + item).html(value);
                        });
                    }
                    if (focus !== "") {
                        $('html, body').animate({
                            scrollTop: $(focus).offset().top - topheight
                        }, 2000);
                    }
                    ajaxindicatorstop();
                }
            }, "json");
});
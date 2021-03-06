//===== search modal functions ==================
searchAllCarers = function () {
    $('#carer_search_modal').find("input[type='text']").val("");
    $('#carer_search_modal').find("input[type='checkbox']").attr("checked", false);
    $('#carer_search_modal').modal('show');
    setTimeout(function () {
        __init_clockpicker('#carer_search_modal .clockpicker');
    }, '800');
};

opennextcarersearchtab = function (event) {
    var _this = $("#" + event.id);
    var searchTabId = _this.attr("data-tabId");
    var searchTarget = _this.attr("data-target");
    if (searchTarget == "next") {
        var nextTabId = parseInt(searchTabId) + 1;
        $("#carer_search_step_" + searchTabId).slideToggle();
        $("#carer_search_step_" + nextTabId).slideToggle();
    } else if (searchTarget == "previous") {
        var preTabId = parseInt(searchTabId) - 1;
        $("#carer_search_step_" + preTabId).slideToggle();
        $("#carer_search_step_" + searchTabId).slideToggle();
    }
};

submitCarerSearchModal = function () {
    if ($('input[name="SearchCarer[distance_within][]"]:checked').length > 0) {
        if ($("#searchcarer-address_postcode").val() == "") {
            error_msg("Please provide your postcode");
            $("#carer_search_step_3").slideToggle();
            $("#carer_search_step_4").slideToggle();
            setTimeout(function () {
                $("#searchcarer-address_postcode").focus();
            }, '300');
        } else {
            $("#carer_search_form").submit();
        }
    } else {
        $("#carer_search_form").submit();
    }
};

//===== search page filtaration functions ==================
function changeTimeCarer(id){
    var id_value = 'day_time_'+id;
    var data_type = $('#' + id_value).attr('data-type');
    var data_val = $('#' + id_value).attr('data-val');
    if ($('#' + id_value).prop('checked')) {
            if (data_type == 'Carer availability') {
                var data_key = $('#' + id_value).attr('data-key');
                var start_time = $('#start_time_' + data_key).val();
                var end_time = $('#end_time_' + data_key).val();
                if (start_time == '') {
                    start_time = '12:00 AM';
                }
                if (end_time == '') {
                    end_time = '11:30 PM';
                }
                data_val = data_val + ' ( ' + start_time + ' - ' + end_time + ' )';
            }
            if($('#li_' + id_value).length>0){
            $('#li_' + id_value).remove();
            }
            $('#filter_selection').append('<li id="li_' + id_value + '">' +
                    '<span>' + data_type + '</span>' +
                    '<h3>' + data_val + '</h3>' +
                    '<div class="close-filter"><a href="javascript:;" id="a_' + id_value + '" data-id="' + id_value + '" onclick="removeCarerFilter(this)"><i class="fa fa-times"></i></a></div>' +
                    '</li>');
            searchCarers();
        }else{
            $('#li_' + id_value).remove();
        }
}
$('form#searchform input[type=checkbox],form#searchform input[type=radio]').change(function () {
    var id_value = this.id;
    var data_type = $('#' + id_value).attr('data-type');
    var data_val = $('#' + id_value).attr('data-val');
    var d_type = this.type;
    if (d_type == 'checkbox') {
        if ($('#' + id_value).prop('checked')) {
            if (data_type == 'Carer availability') {
                var data_key = $('#' + id_value).attr('data-key');
                var start_time = $('#start_time_' + data_key).val();
                var end_time = $('#end_time_' + data_key).val();
                if (start_time == '') {
                    start_time = '12:00 AM';
                }
                if (end_time == '') {
                    end_time = '11:30 PM';
                }
                data_val = data_val + ' ( ' + start_time + ' - ' + end_time + ' )';
            }
            $('#filter_selection').append('<li id="li_' + id_value + '">' +
                    '<span>' + data_type + '</span>' +
                    '<h3>' + data_val + '</h3>' +
                    '<div class="close-filter"><a href="javascript:;" id="a_' + id_value + '" data-id="' + id_value + '" onclick="removeCarerFilter(this)"><i class="fa fa-times"></i></a></div>' +
                    '</li>');
        } else {
            $('.' + id_value).val('');
            $('#li_' + id_value).remove();
        }
    } else {
        var parent_ul = $('#' + id_value).attr('data-class');
        $('#li_' + parent_ul).remove();
        if (parent_ul == 'ul-location') {
            data_val = $('#usermaster-zipcode').val() + ' (' + data_val + ')';
        }
        if ($('#' + id_value).prop('checked')) {
            $('#filter_selection').append('<li id="li_' + parent_ul + '">' +
                    '<span>' + data_type + '</span>' +
                    '<h3>' + data_val + '</h3>' +
                    '<div class="close-filter"><a href="javascript:;" id="a_' + parent_ul + '" data-id="' + parent_ul + '" onclick="removeCarerFilterRadio(this)"><i class="fa fa-times"></i></a></div>' +
                    '</li>');
        } else {
            $('#li_' + parent_ul).remove();
        }
    }
    searchCarers();
});
function carerCheckedUnchecked() {
    $('form#searchform input[type=checkbox],form#searchform input[type=radio]').each(function () {
        if (this.checked) {
            var id_value = this.id;
            var data_type = $('#' + id_value).attr('data-type');
            var data_val = $('#' + id_value).attr('data-val');
            var d_type = this.type;
            if (d_type == 'checkbox') {
                if ($('#' + id_value).prop('checked')) {
                    if (data_type == 'Carer availability') {
                        var data_key = $('#' + id_value).attr('data-key');
                        var start_time = $('#start_time_' + data_key).val();
                        var end_time = $('#end_time_' + data_key).val();
                        if (start_time == '') {
                            start_time = '12:00 AM';
                        }
                        if (end_time == '') {
                            end_time = '11:30 PM';
                        }
                        data_val = data_val + ' ( ' + start_time + ' - ' + end_time + ' )';
                    }
                    $('#filter_selection').append('<li id="li_' + id_value + '">' +
                            '<span>' + data_type + '</span>' +
                            '<h3>' + data_val + '</h3>' +
                            '<div class="close-filter"><a href="javascript:;" id="a_' + id_value + '" data-id="' + id_value + '" onclick="removeCarerFilter(this)"><i class="fa fa-times"></i></a></div>' +
                            '</li>');
                } else {
                    $('#li_' + id_value).remove();
                }
            } else {
                var parent_ul = $('#' + id_value).attr('data-class');
                $('#li_' + parent_ul).remove();
                if (parent_ul == 'ul-location') {
                    data_val = $('#usermaster-zipcode').val() + ' (' + data_val + ')';
                }
                if ($('#' + id_value).prop('checked')) {
                    $('#filter_selection').append('<li id="li_' + parent_ul + '">' +
                            '<span>' + data_type + '</span>' +
                            '<h3>' + data_val + '</h3>' +
                            '<div class="close-filter"><a href="javascript:;" id="a_' + parent_ul + '" data-id="' + parent_ul + '" onclick="removeCarerFilterRadio(this)"><i class="fa fa-times"></i></a></div>' +
                            '</li>');
                } else {
                    $('#li_' + parent_ul).remove();
                }
            }
        }
    });
    setTimeout(function () {
        searchCarers();
    }, 300);
}
function removeCarerFilterRadio(val) {
    var a_id = val.id;
    var li_id = $('#' + a_id).attr('data-id');
    $('#li_' + li_id).remove();
    $('.' + li_id).find("input[type='radio']").prop('checked', false);
    if (li_id == 'ul-location') {
        $('#usermaster-zipcode').val('');
        $('#usermaster-latitude').val('');
        $('#usermaster-longitude').val('');
    }
    searchCarers();
}
function removeCarerFilter(val) {
    var a_id = val.id;
    var li_id = $('#' + a_id).attr('data-id');
    $('#li_' + li_id).remove();
    $('#' + li_id).prop('checked', false);
    $('.' + li_id).val('');


    searchCarers();
}

searchCarers = function () {
    ajaxindicatorstart_search();
    if ($('#usermaster-zipcode').val() == '') {
        $('#usermaster-zipcode1').val('');
    }
    $('#offset').val(0);
    var data = $("form#searchform").serialize();
    var url = full_path + "search/submitcarersearch";
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop_search();
            $('#div_search_result').html(resp.html);
            $('#offset').val(resp.offset);
            if (resp.more_data == 'yes') {
                $('.load_more').show();
            } else {
                $('.load_more').hide();
            }
        },
        error: function () {
            ajaxindicatorstop_search();
        }
    });
};

function loadMoreCarer() {
    ajaxindicatorstart_search();
    var data = $("form#searchform").serialize();
    var url = full_path + "search/submitcarersearch";
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        dataType: 'json',
        success: function (resp) {
            ajaxindicatorstop_search();
            $('#div_search_result').append(resp.html);
            $('#offset').val(resp.offset);
            if (resp.more_data == 'yes') {
                $('.load_more').show();
            } else {
                $('.load_more').hide();
            }
        },
        error: function () {
            ajaxindicatorstop_search();
        }
    });
}

//============== carer profile page functions ===================
$(".read_more_carer_desc").click(function () {
    $(".read_more_carer_desc_p").slideToggle();
    $(".read_less_carer_desc_p").slideToggle();
});
$(".read_less_carer_desc").click(function () {
    $(".read_less_carer_desc_p").slideToggle();
    $(".read_more_carer_desc_p").slideToggle();
});


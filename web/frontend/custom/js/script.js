success_msg = function (msg, time = 5) {
    notie.alert({type: 'success', text: msg, time: time});
};

error_msg = function (msg, time = 5) {
    notie.alert({type: 'error', text: msg, time: time});
};

warning_msg = function (msg, time = 5) {
    notie.alert({type: 'warning', text: msg, time: time});
};


function showSigninModal() {
    var cookie = $.cookie('edenwoolf_loginSuccess');
    if (typeof (cookie) != "undefined" && cookie !== null) {
        var cookieArr = [];
        var cookieArr = cookie.split(",");
        $("#LoginForm_email").val(cookieArr[0]);
        $("#LoginForm_password").val(cookieArr[1]);
        $('#LoginForm_rememberMe').prop('checked', true);
    } else {
        $("#user_login_form")[0].reset();
    }
    $(".errorMsg").html('').removeClass('help-block').parent().removeClass('has-error');
    $("#forgot_modal").modal('hide');
    $("#signin_modal").modal('show');
}

function showForgotPasswordModal() {
    $(".errorMsg").html('').removeClass('help-block').parent().removeClass('has-error');
    $("#user_forgot_form")[0].reset();
    $("#signin_modal").modal('hide');
    $("#forgot_modal").modal('show');
}

$(document).ready(function () {
    $('img').error(function () {
        $.each($('body').find('img'), function (k, v) {
            if ($(v).attr('src').split('/')[1] == 'dev') {
                $(v).attr('src', $(v).attr('src').replace('dev', 'apps'));
            } else if ($(v).attr('src').split('/')[1] == 'apps') {
                $(v).attr('src', $(v).attr('src').replace('apps', 'dev'));
            }
        });
    });

    $('#usermaster-display_name').blur(function () {
        $('.fa-check').hide();
        $('.fa-times').hide();
        if (this.value != "") {
            $('.fa-spin').show();
            $("#usermaster-display_name").parent().removeClass('has-error').find('.help-block').html('');
            $.ajax({
                url: full_path + 'site/checkname',
                headers: {'X-CSRF-TOKEN': csrf_token},
                type: 'POST',
                dataType: 'json',
                data: {name: this.value, type: $('#usermaster-type_id').val()},
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

    $("form#user_login_form").submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $(".errorMsg").html('').removeClass('help-block').parent().removeClass('has-error');
        var data = new FormData($("#user_login_form")[0]);
        $.ajax({
            url: full_path + 'site/login',
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                if (data.res == 1) {
                    if ($("#LoginForm_rememberMe").is(":checked")) {
                        $.cookie('edenwoolf_loginSuccess', data.account_data, {expires: 7});
                    } else {
                        $.removeCookie('edenwoolf_loginSuccess');
                    }
//                    window.location.reload();
                    window.location.href = data.link;
                } else if (data.res == 0) {
                    $.each(data.error, function (key, val) {
                        $("#err_" + key).html(val);
                        $("#err_" + key).addClass('help-block');
                        $("#err_" + key).parent().addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            }
        })
    });

    $("form#user_forgot_form").submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $(".errorMsg").html('').removeClass('help-block').parent().removeClass('has-error');
        var data = new FormData($("#user_forgot_form")[0]);
        $.ajax({
            url: full_path + 'site/forgotpassword',
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data) {
                if (data.res == 1) {
                    $("#forgot_modal").modal('hide');
                    notie.alert({type: 1, text: data.msg, time: 5});
                } else if (data.res == 0) {
                    $.each(data.error, function (key, val) {
                        $("#error_" + key).html(val);
                        $("#error_" + key).addClass('help-block');
                        $("#error_" + key).parent().addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            }
        })
    });

    $("form#user_reset_form").submit(function (event) {
        event.preventDefault();
        ajaxindicatorstart();
        $(".errorMsg").html('').removeClass('help-block').parent().removeClass('has-error');
        var data = new FormData($("#user_reset_form")[0]);
        $.ajax({
            url: full_path + 'site/resetpassword',
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'POST',
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.res == 1) {
                    window.location.href = data.link;
                } else if (data.res == 0) {
                    $.each(data.error, function (key, val) {
                        $("#err_" + key).html(val);
                        $("#err_" + key).addClass('help-block');
                        $("#err_" + key).parent().addClass('has-error');
                    });
                }
                ajaxindicatorstop();
            }
        })
    });

    if ($('#forgot_token').val() != '' && logged_in == false) {
        ajaxindicatorstart();
        var data = new FormData($("#user_reset_form")[0]);
        $.ajax({
            url: full_path + 'site/showresetmodal',
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'POST',
            dataType: 'json',
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data.res == 1) {
                    $("#user_reset_form")[0].reset();
                    $("#reset_password_modal").modal('show');
                } else if (data.res == 0) {
                    notie.alert({type: 3, text: data.msg, time: 5});
                }
                ajaxindicatorstop();
            }
        })
    }
})

redirectToLogAJobLink = function () {
    ajaxindicatorstart();
    var url = full_path + "site/generatelogajoblink";
    $.post(url, {},
            function (resp) {
                if (resp.isLoggedin == true) {
                    if (resp.isFamily == true) {
                        window.location.href = resp.redirectUrl;
                    } else {
                        error_msg(resp.respMessage, 10);
                        ajaxindicatorstop();
                    }
                } else {
                    error_msg(resp.respMessage, 10);
                    showSigninModal();
                    ajaxindicatorstop();
                }
            }, "json");
};

function myFavList(type) {
    $("#load_btn").hide();
    $('#loader_img_property').show();
    var data = new FormData($("#loadListField")[0]);
    $.ajax({
        url: full_path + type + '/favlistajax',
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: 'post',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: data,
        success: function (data) {
            $('#all_list').append(data.content);
            $("#offset").val(data.offset);
            if (data.total <= data.limit) {
                $("#load_btn").hide();
            } else {
                $("#load_btn").show();
            }
            $('#loader_img_property').hide();
        }
    })
}
function myFavListFamilies(type) {
    $("#load_btn").hide();
    $('#loader_img_property').show();
    var data = new FormData($("#loadListField")[0]);
    $.ajax({
        url: full_path + type + '/favlistfamiliesajax',
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: 'post',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: data,
        success: function (data) {
            $('#all_list').append(data.content);
            $("#offset").val(data.offset);
            if (data.total <= data.limit) {
                $("#load_btn").hide();
            } else {
                $("#load_btn").show();
            }
            $('#loader_img_property').hide();
        }
    })
}

function addtoFav(obj) {
    ajaxindicatorstart();
    if (logged_in == true) {
        var id = $(obj).attr('data-id');
        $.ajax({
            url: full_path + 'site/addfav',
            headers: {'X-CSRF-TOKEN': csrf_token},
            type: 'post',
            dataType: 'json',
            data: {id: id},
            success: function (data) {
               $('#fav_'+id).addClass('active');
               $('#fav_'+id).html('<a href="javascript:;" onclick="removefromFav(this);") data-id="'+id+'">'+
                                    '<i class="fa fa-heart" aria-hidden="true"></i>'+
                                '</a>');
               notie.alert({type: 1, text: 'Successfully added to your favorite list', time: 5});
                ajaxindicatorstop();
                
//                window.location.href = data.link;
            }
        })
    } else {
        showSigninModal();
        ajaxindicatorstop();
    }
}

function removefromFav(obj, type) {
    ajaxindicatorstart();
    var id = $(obj).attr('data-id');
    $.ajax({
        url: full_path + 'site/removefav',
        headers: {'X-CSRF-TOKEN': csrf_token},
        type: 'post',
        dataType: 'json',
        data: {id: id, type: type},
        success: function (data) {
            if(type == 1)
                window.location.reload();
            else{
                $('#fav_'+id).removeClass('active');
                $('#fav_'+id).html('<a href="javascript:;" onclick="addtoFav(this);") data-id="'+id+'">'+
                                    '<i class="fa fa-heart" aria-hidden="true"></i>'+
                                '</a>');
//                $(obj).attr('onclick', "addtoFav(this);").parent().removeClass('active');
                notie.alert({type: 1, text: 'Successfully removed from your favorite list', time: 5});
            }
            ajaxindicatorstop();
        }
    })
}
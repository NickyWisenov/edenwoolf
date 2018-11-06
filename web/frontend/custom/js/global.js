__init_clockpicker = function (selector) {
    if ($(selector).length > 0) {
        $.each($(selector), function (item, event) {
            var _this = $("#" + event.id);
            var value = _this.val();
            $(selector).datetimepicker({
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
};
//__init_clockpicker_in_hour = function (selector) {
//    if ($(selector).length > 0) {
//        $.each($(selector), function (item, event) {
//            var _this = $("#" + event.id);
//            var value = _this.val();
//            $(selector).datetimepicker({
//                controlType: 'select',
//                datepicker: false,
//                format: 'g:i A',
//                formatTime: 'g:i A',
//                ampm: true,
//                step: 60,
//                setTime: value
//            });
//        });
//    }
//};
__init_clockpicker_in_hour = function (selector) {
    if ($(selector).length > 0) {
        $.each($(selector), function (item, event) {
            var _this = $("#" + event.id);
            var value = _this.val();
            $(selector).timepicker({
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
};




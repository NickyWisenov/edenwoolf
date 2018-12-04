var $animation_elements = $('.animated');
var $window = $(window);
$window.on('scroll', check_if_in_view);

function check_if_in_view() {
    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = (window_top_position + window_height);

    $.each($animation_elements, function () {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top + 200;
        var element_bottom_position = (element_top_position + element_height);
        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
            if ($element.hasClass('heading')) {
                $element.addClass('zoomIn');
            } else if ($element.hasClass('bounceInDown-1')) {
                $('.content-step-1').fadeIn('slow');
                $element.addClass('bounceInDown');
            } else if ($element.hasClass('bounceInRight-1')) {
                $('.content-step-mdl, .content-step-2').fadeIn('slow');
                $element.addClass('bounceInRight');
//                $('.content-step-mdl-2,.content-step-3').fadeIn('slow');
//                $('.content-step-mdl-2,.content-step-3').fadeIn('slow');
//                $('.content-step-4').fadeIn('slow');
//                $('.content-step-5').fadeIn('slow');
            }
        }
    });
}

//jQuery(function ($) {
//
//    $(window).load(function () {
//        'use strict';
//        var $portfolio_selectors = $('.trade-filter >li>a');
//        var $portfolio = $('.trade-items');
//        $portfolio.isotope({
//            itemSelector: '.trade-item',
//            layoutMode: 'fitRows'
//        });
//
//        $portfolio_selectors.on('click', function () {
//            $portfolio_selectors.removeClass('active');
//            $(this).addClass('active');
//            var selector = $(this).attr('data-filter');
//            $portfolio.isotope({filter: selector});
//            return false;
//        });
//    });
//});


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
                setTimeout(function () {
                    $('.content-step-1').fadeIn('slow');
                    $element.addClass('bounceInDown');
                }, 1000);
            } else if ($element.hasClass('bounceInRight-1')) {
                setTimeout(function () {
                    $('.content-step-mdl, .content-step-2').fadeIn('slow');
                    $element.addClass('bounceInRight');
                }, 2000);
                setTimeout(function () {
                    $('.content-step-mdl-2,.content-step-3').fadeIn('slow');
                }, 3000);
                setTimeout(function () {
                    $('.content-step-mdl-2,.content-step-3').fadeIn('slow');
                }, 4000);
                setTimeout(function () {
                    $('.content-step-4').fadeIn('slow');
                }, 5000);
                setTimeout(function () {
                    $('.content-step-5').fadeIn('slow');
                }, 6000);
            }
        }
    });
}

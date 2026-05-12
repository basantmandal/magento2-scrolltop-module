define([
    'jquery'
], function ($) {
    'use strict';

    return function (config, element) {
        var $element = $(element);
        var scrollOffset = config.scrollOffset || 20;
        var scrollSpeed = config.scrollSpeed || 600;
        var position = config.position || 'bottom-right';

        // Apply position class
        $element.addClass('hk2-scrolltop-' + position);

        $(window).on('scroll', function () {
            if ($(window).scrollTop() > scrollOffset) {
                $element.fadeIn();
            } else {
                $element.fadeOut();
            }
        });

        $element.on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, scrollSpeed);
            return false;
        });
    };
});

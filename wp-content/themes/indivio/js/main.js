$(document).ready(function() {
    // Navigation Toggle
    function toggleElements() {
        $('body').toggleClass('toggled');
        $('.nav-toggle').toggleClass('toggled');
        $('.eb-nav').toggleClass('toggled');
        $('.eb-content').toggleClass('toggled');
        $('.eb-page-image').toggleClass('toggled');
    }

    $('.nav-toggle').on('click', function() {
        toggleElements();
    });

    // Navigation Mobile Position
    var navHeight = $('.eb-nav').outerHeight();
    $('.eb-nav ul').css('top', navHeight);

    // Profile Image Position
    $('.eb-profile-image').css('top', navHeight);
    $('.eb-profile-image span').css('height', 'calc(100% - ' + (navHeight + 40) + 'px)');

    // Page Image Position
    $('.eb-page-image').css('margin-top', navHeight);
    if ($('.eb-single').length > 0) {
        $('.eb-single').css('margin-top', navHeight);
    }

    // Blog Item Clickable
    $('.eb-blog-item').on('click', function() {
        var blogUrl = $(this).find('a').attr('href');
        window.location.href = blogUrl;
    });

    // Twitch Live Label
    if ($('.eb-nav').find('.twitch-label').length) {
        $('.eb-footer .twitch').append('<span class="live-bullet"></span>');
    }

    // Select wrapper
    if ($('.eb-form').find('select').length) {
        $('.eb-form select').wrap('<div class="select-wrapper"></div>');
    }

    $('.button--donation').on('click', function() {
        $('body').addClass('no-scroll');
        $('.eb-dialog--donation').show();
    });

    $('.eb-dialog__close, .eb-dialog__overlay').on('click', function() {
        $('body').removeClass('no-scroll');
        $(this).closest('.eb-dialog').hide();
    });

});

// Resize Function
var resizeId;
$(window).resize(function() {
    clearTimeout(resizeId);
    resizeId = setTimeout(doneResizing, 500);
});

function doneResizing(){
    // Navigation Mobile Position
    var navHeight = $('.eb-nav').outerHeight();
    $('.eb-nav ul').css('top', navHeight);

    // Profile Image Position
    $('.eb-profile-image').css('top', navHeight);
    $('.eb-profile-image span').css('height', 'calc(100% - ' + navHeight + 'px)');

    // Page Image Position
    $('.eb-page-image').css('margin-top', navHeight);
    if ($('.eb-single').length > 0) {
        $('.eb-single').css('margin-top', navHeight);
    }
}

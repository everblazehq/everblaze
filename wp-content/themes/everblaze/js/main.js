$(document).ready(function() {
    var red_block = new Waypoint.Inview({
        element: $('.eb-services')[0],
        enter: function(direction) {
            $('.eb-services').addClass('is-inview');
        }
    })

    var about_image = document.querySelector('.eb-about__image img');
    new simpleParallax(about_image, {
    	overflow: true,
        breakpoint: 992,
    });

    var projects_image = document.querySelector('.eb-projects img');
    new simpleParallax(projects_image, {
    	breakpoint: 992,
        scale: 1.2
    });
});

if(jQuery.browser.mobile) {
    $('.eb-header__bg').addClass('mobile');
} else {
    if ($('#eb-video').length) {
        var sources = document.querySelectorAll('video#eb-video source');
        // Define the video object this source is contained inside
        var video = document.querySelector('video#eb-video');
        for(var i = 0; i<sources.length;i++) {
          sources[i].setAttribute('src', sources[i].getAttribute('data-src'));
        }
        // If for some reason we do want to load the video after, for desktop as opposed to mobile (I'd imagine), use videojs API to load
        video.load();
        $('#eb-video').addClass('lazyload');
    }
}

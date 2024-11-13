var $window = $(window);
var $videoWrap = $('.video-wrap');
var $video = $('.video');
var videoHeight = $video.outerHeight();
var $frame = document.querySelector("iframe");
$window.on('scroll', function() {
    var windowScrollTop = $window.scrollTop();
    var videoBottom = videoHeight + $videoWrap.offset().top;

    if (windowScrollTop > videoBottom) {

        $videoWrap.height(videoHeight);
        $video.addClass('stuck');
        $frame.setAttribute("allow", "autoplay");
    } else {
        $video.autoplay = true;
        $videoWrap.height('auto');
        $video.removeClass('stuck');
    }
});

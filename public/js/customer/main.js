$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.navbar').addClass('sticky-top shadow-sm');
    } else {
        $('.navbar').removeClass('sticky-top shadow-sm');
    }
});
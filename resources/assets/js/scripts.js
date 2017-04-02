var plugins = {
    // owlCarousel: $("#slider"),
    // menu: $("#menu"),
    spQuanAoNam: $('.wrap-san-pham-danh-muc')
};

$(document).ready(function () {
    function spQuanAoNam() {
        plugins.spQuanAoNam.not('.slick-initialized').slick({
            autoplay: false,
            autoplaySpeed: 2000,
            prevArrow: '.arrow-prev1',
            nextArrow: '.arrow-next1',
            mobileFirst: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            }, {

                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }, {
                breakpoint: 480,
                slidesToShow: 1,
                slidesToScroll: 1,
            }]
        });
    }
    if (plugins.spQuanAoNam.length) {
        spQuanAoNam();
    }
});
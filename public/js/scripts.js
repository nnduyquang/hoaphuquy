var plugins = {
    // owlCarousel: $("#slider"),
    menu: $("#menu"),
    spQuanAoNam: $('.wrap-san-pham-danh-muc'),
    slider:$('#slider')
};

$(document).ready(function () {
    function loadMenu() {
        plugins.menu.mmenu({
            //option
            autoHeight: false
        }, {
            // configuration
            // offCanvas: {
            //     pageSelector: "#menubar"
            // }
        });
    }
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
    function runSlider(){
        plugins.slider.nivoSlider({
            effect:'fade',
            animSpeed:500,
            pauseTime:3000,
            pauseOnHover:true,
            controlNav:false,
        });
    }
    if (plugins.menu.length) {
        loadMenu();
    }
    if (plugins.spQuanAoNam.length) {
        spQuanAoNam();
    }
    if(plugins.slider.length){
        runSlider();
    }
    var menubar = $('.menu-bar').position();
    $(window).scroll(function (event) {
        if ($(this).scrollTop() > (menubar.top + 100)) {
            $('.menu-bar').css( { 'position' : 'fixed', 'top' : '0px','z-index' : '9999999', 'left':'0px', } );
            $('.menu-bar').addClass('nav');

            // $('.home-logo').show();
        }else{
            $('.menu-bar').css( { 'position' : '', 'top' : '','border-bottom':'none' } );
            $('.menu-bar').removeClass('nav');

            // $('.home-logo').hide();

        }
    });
    // $('#chitietsanpham').summernote({
    //     toolbar: false,
    //     dialogsInBody:false,
    //     disableResizeEditor: true,
    //     contenteditable:false,
    //     popover:false
    //
    // });
    // var container = $('#chitietsanpham').nextAll('div.note-editor:first').find('.panel-body');
    // if ($(container).length)
    // {
    //     $(container).prop('contenteditable', 'false');
    // }

});
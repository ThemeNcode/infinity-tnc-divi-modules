jQuery(document).ready(function($){

    $('.inftnc_carousels_logo_wrapper').each(function() {

        var slidesToShow    = $(this).data('slides-to-show'); 
        var slidesToScroll  = $(this).data('slide-scroll');
        var animationSpeed  = $(this).data('animation-speed');
        var autoplay        = $(this).data('autoplay');
        var autoplaySpeed   = $(this).data('autoplay-speed');
        var useNavigation   = $(this).data('navigation');
        var usePagination   = $(this).data('pagination');
        var infinite        = $(this).data('infinite');
        var pauseHover      = $(this).data('pause-hover');
        var swipe           = $(this).data('swipe');
        var rtl             = $(this).data('rtl');
       
    
        $(this).slick({
            dots: true,
            infinite: false,
            speed: animationSpeed,
            slidesToShow: slidesToShow ? slidesToShow : 3, 
            slidesToScroll: 1,
            autoplay: autoplay,
            autoplaySpeed: autoplaySpeed,
            arrows: useNavigation,
            dots: usePagination,
            infinite: infinite,
            rtl:rtl,
            swipe: swipe,
            pauseOnHover: pauseHover,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: slidesToShow ? slidesToShow : 3,
                        slidesToScroll: slidesToScroll ? slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: slidesToShow ? slidesToShow : 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

});

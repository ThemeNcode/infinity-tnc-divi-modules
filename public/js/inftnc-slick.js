jQuery(document).ready(function($){

    $('.inftnc_carousels_logo_wrapper').each(function() {

        var slidesToShow            = $(this).data('slides-to-show'); 
        var slidesToScroll          = $(this).data('slide-scroll');
        var animationSpeed          = $(this).data('animation-speed');
        var autoplay                = $(this).data('autoplay');
        var autoplaySpeed           = $(this).data('autoplay-speed');
        var useNavigation           = $(this).data('navigation');
        var usePagination           = $(this).data('pagination');
        var infinite                = $(this).data('infinite');
        var pauseHover              = $(this).data('pause-hover');
        var swipe                   = $(this).data('swipe');
        var rtl                     = $(this).data('rtl');
        var slidesToShowTablet      = $(this).data('slide-tablet');
        var slidesToShowPhone       = $(this).data('slide-phone'); 
        var slidesToScrolTablet     = $(this).data('scroll-tablet');
        var slidesToScrollPhone     = $(this).data('scroll-phone'); 
        
        $(this).slick({
            dots: true,
            infinite: false,
            speed: animationSpeed,
            slidesToShow: slidesToShow ? slidesToShow : 3, 
            slidesToScroll: slidesToScroll ? slidesToScroll : 1,
            autoplay: autoplay,
            autoplaySpeed: autoplaySpeed,
            arrows: useNavigation,
            dots: usePagination,
            infinite: infinite,
            rtl:rtl,
            swipe: swipe,
            pauseOnHover: pauseHover,
            prevArrow: '<button type="button" class="slick-inftnc-arrow slick-prev" data-icon="&#x34;"></button>',
            nextArrow: '<button type="button" class="slick-inftnc-arrow slick-next" data-icon="&#x35;"></button>',
            responsive: [
                {
                    breakpoint: 980,
                    settings: {
                        slidesToShow: slidesToShowTablet ? slidesToShowTablet : 3,
                        slidesToScroll: slidesToScrolTablet ? slidesToScrolTablet: 1,
                    }
                },
                {
                    breakpoint:767,
                    settings: {
                        slidesToShow: slidesToShowPhone ? slidesToShowPhone : 1,
                        slidesToScroll: slidesToScrollPhone ? slidesToScrollPhone : 1,
                    }
                },
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

});

jQuery(document).ready(function($){

    $('.inftnc_carousels_logo_wrapper').each(function() {
        var slidesToShow = $(this).data('slides-to-show'); // Assuming you have a data attribute named "slides-to-show"
        
        $(this).slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: slidesToShow ? slidesToShow : 3, // Default value if data attribute is not provided
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: slidesToShow ? slidesToShow : 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
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
                        slidesToShow: slidesToShow ? slidesToShow : 1,
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

jQuery(function($) {
    jQuery(".intftnc-rating").starRating({
        totalStars: 5,
        emptyColor: 'lightgray',
        hoverColor: 'salmon',
        activeColor: 'cornflowerblue',
        initialRating: 4,
        strokeWidth: 0,
        useGradient: false,
        minRating: 1,
        starSize: 25,
        readOnly: true
      });
});
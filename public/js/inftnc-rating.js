
jQuery(function($) {
  jQuery(".intftnc-rating").each(function() {
      var initialRating = jQuery(this).data('initial-rating');
      var initialStar   = jQuery(this).data('initial-start');
      var initialEmpty   = jQuery(this).data('initial-empty');
      var initialActive   = jQuery(this).data('initial-active');
      var initialSize   = jQuery(this).data('initial-size');
      jQuery(this).starRating({
          totalStars: initialStar,
          emptyColor: initialEmpty,
          activeColor: initialActive,
          initialRating: initialRating,
          strokeWidth: 0,
          useGradient: false,
          starSize: initialSize,
          readOnly: true
      });
  });
});
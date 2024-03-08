jQuery(".inftnc_typewriter_text").each(function(){
    var typeText = jQuery(this).data('initial-text');
    var typeSpped = jQuery(this).data('initial-speed');
    var typeBackSpeed = jQuery(this).data('nitial-backspeed');
    var typeDelay = jQuery(this).data('initial-delay');
    var typePause = jQuery(this).data('initial-pause');
    var typeCursor = jQuery(this).data('initial-cursor');
    var typeLoop = jQuery(this).data('initial-loop');
    console.log(typeText);
    new Typewriter(jQuery(this)[0], {
        strings:[typeText],
        autoStart: true
    });
});
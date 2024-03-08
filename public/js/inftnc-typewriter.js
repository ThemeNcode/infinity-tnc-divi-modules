jQuery(".inftnc_typewriter_text").each(function(){
    var typeText = jQuery(this).data('initial-text');
    var typeSpeed = jQuery(this).data('initial-speed');
    var typeBackSpeed = jQuery(this).data('initial-backspeed');
    var typePause = jQuery(this).data('initial-pause');
    var typeCursor = jQuery(this).data('initial-cursor');
    var typeLoop = jQuery(this).data('initial-loop');

     typewriter = new Typewriter(jQuery(this)[0], {
        loop: typeLoop,
        delay: typeSpeed,
        cursor: typeCursor,
    });

    typewriter
    .pauseFor(typePause)
    .typeString(typeText)
    .pauseFor(typePause)
    .deleteAll(typeBackSpeed)
    .start();
   
});


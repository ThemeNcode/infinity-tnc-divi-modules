jQuery(".inftnc_typewriter_text").each(function(){
    var typeText = jQuery(this).data('initial-text');
    console.log(typeText);
    new Typewriter(jQuery(this)[0], {
        strings:[typeText],
        autoStart: true
    });
});
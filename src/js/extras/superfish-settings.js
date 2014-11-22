

/** ! Custom Scritps
**********************************************/

/**
 * Custom Superfish Settings
 */

jQuery(document).ready(function($) {
    var breakout = 600;
    var sf = $('ul.nav-menu');

    if( $(document).width() >= breakout ) {
            sf.superfish({
            delay: 200,
            speed: 'fast'
        });
    }

    $(window).resize(function(){
        if($(document).width() >= breakout & !sf.hasClass('sf-js-enabled')) {
            sf.superfish({
            delay: 200,
            speed: 'fast'
        } else if($(document).width() < breakout) {
            sf.superfish('distroy');
        }
    });
});
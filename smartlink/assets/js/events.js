/* globals jQuery */
'use strict';

var $jqbody = false;
jQuery(document).ready(function jq_domready() {
    $jqbody = jQuery('body');
    $jqbody.removeClass('no-js');

    /* Mobile navigation */
    jQuery('.nav-toggle').on('click', function(e) {
        e.preventDefault();
        $jqbody.toggleClass('has--opened-main-menu');
    });

    /* Masonry Gifs page */
    jQuery('.gifs-grid').masonry({
        itemSelector: '.gif-item',
        columnWidth: '.gif-item--size',
        percentPosition: true
    });

    /* Search */
    smartlink__set_search();

    /* Load more */
    smartlink__set_loadmore();

    /* Gradients */
    smartlink__set_gradients();

    /* Home strates : Slider */
    smartlink_home__set_slider();

    /* Home strates : Slider video */
    smartlink_home__set_videoslider();

    /* Quotes slider */
    smartlink__set_quotes_slider();

    /* Top posts slider & tabs */
    smartlink__set_top_posts();

    /* Slider gallery  */
    smartlink__set_gallery();

    /* Cookie banner */
    smartlink__set_cookies();

    /* Slider tweets */
    smartlink_home__set_twitterslider();

});
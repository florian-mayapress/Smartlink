<?php
include dirname(__FILE__) . '/../../z-protect.php';

/* ----------------------------------------------------------
  Supported features
---------------------------------------------------------- */

add_action('after_setup_theme', 'wputh_custom_theme_setup');

if (function_exists('add_theme_support')) {

    function wputh_custom_theme_setup() {

        // Woocommerce
        add_theme_support( 'woocommerce' );

        // Theme style
        add_theme_support('custom-background');
        add_theme_support('custom-header', array(
            'height' => 100,
            'width' => 200
        ));

        // Supporting HTML5
        add_theme_support('html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption'
        ));

        // Supporting thumbnails
        add_theme_support('post-thumbnails');

        // Supporting RSS Links
        add_theme_support('automatic-feed-links');

        // Supporting Title
        add_theme_support('title-tag');
    }
}

/* ----------------------------------------------------------
  Excerpt
---------------------------------------------------------- */

add_filter('excerpt_length', 'wputh_excerpt_length', 999);
function wputh_excerpt_length() {
    return 15;
}

add_filter('excerpt_more', 'wputh_excerpt_more');
function wputh_excerpt_more() {
    return ' &hellip; ';
}

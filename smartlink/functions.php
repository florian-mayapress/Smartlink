<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';

/* ----------------------------------------------------------
  Theme options
---------------------------------------------------------- */

/* Lang
 -------------------------- */

add_action('after_setup_theme', 'smartlink_setup');
function smartlink_setup() {
    load_theme_textdomain('smartlink', get_stylesheet_directory() . '/inc/lang');
}

/* Social networks
 -------------------------- */

add_filter('wputheme_social_links', 'smartlink_wputheme_social_links', 10, 1);
function smartlink_wputheme_social_links($links) {
    return array(
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'youtube' => 'Youtube',
    );
}

/* Load header & footer
 -------------------------- */

add_action('wputheme_header_items', 'smartlink_header');
function smartlink_header() {
    include get_stylesheet_directory() . '/tpl/header.php';
}

add_action('wp_footer', 'smartlink_footer');
function smartlink_footer() {
    include get_stylesheet_directory() . '/tpl/footer.php';
}

/* Parent Theme
 -------------------------- */

add_filter('wputheme_display_languages', '__return_false', 1, 1);
add_filter('wputheme_display_breadcrumbs', '__return_false', 1, 1);
add_filter('wputheme_display_header', '__return_false', 1, 1);
add_filter('wputheme_display_mainwrapper', '__return_false', 1, 1);
add_filter('wputheme_display_footer', '__return_false', 1, 1);

/* Pages
 -------------------------- */

function wputh_set_pages_site($pages_site) {
    $pages_site['home__page_id'] = array(
        'post_title' => 'Accueil',
        'post_content' => '',
    );
    $pages_site['archives__page_id'] = array(
        'post_title' => 'Archives',
        'post_content' => '<p>Tous les articles</p>',
        'page_template' => 'page-archives.php',
    );
    $pages_site['chart__page_id'] = array(
        'post_title' => 'Charte éditoriale',
        'post_content' => '<p>Contenu de la charte.</p>',
    );
    $pages_site['cookie__page_id'] = array(
        'post_title' => 'Cookie',
        'post_content' => '<p>Info cookies.</p>',
    );
    $pages_site['gifs__page_id'] = array(
        'post_title' => 'Les gifs de Smartlink',
        'post_content' => '<p>Les gifs de Smartlink</p>',
        'page_template' => 'page-gifs.php',
    );
    $pages_site['mentions__page_id'] = array(
        'post_title' => 'Mentions légales',
        'post_content' => '<p>Contenu des mentions légales.</p>',
    );
    $pages_site['contact__page_id'] = array(
        'post_title' => 'Contact',
        'post_content' => '<p>Pour nous contacter.</p>',
    );
    return $pages_site;
}

/* Scripts
 -------------------------- */

$WPUJavaScripts = array(
    'jquery' => array() ,
    'vanilla-touch' => array(
        'uri' => '/assets/js/plugins/vanilla-touch.js',
        'footer' => 1
    ) ,
    'vanilla-cookies' => array(
        'uri' => '/assets/js/plugins/vanilla-cookies.js',
        'footer' => 1
    ) ,
    'dk-jsu-slider' => array(
        'uri' => '/assets/js/plugins/dk-jsu-slider.js',
        'footer' => 1
    ) ,
    'slick' => array(
        'uri' => '/assets/js/plugins/slick/slick.min.js',
        'footer' => 1
    ) ,
    'functions' => array(
        'uri' => '/assets/js/functions.js',
        'footer' => 1
    ) ,
    'events' => array(
        'uri' => '/assets/js/events.js',
        'footer' => 1
    ) ,
);

/* Styles
 -------------------------- */

define('PROJECT_CSS_DIR', get_stylesheet_directory() . '/assets/css/');
define('PROJECT_CSS_URL', get_stylesheet_directory_uri() . '/assets/css/');

function wputh_control_stylesheets() {
    wp_dequeue_style('wputhmain');

    // Add child theme
    $css_files = parse_path(PROJECT_CSS_DIR);
    foreach ($css_files as $file) {
        wpu_add_css_file($file, PROJECT_CSS_DIR, PROJECT_CSS_URL);
    }
}

add_action('admin_init', 'smartlink_add_editor_styles');
function smartlink_add_editor_styles() {
    add_editor_style('assets/css/editor.css');
}

/* Exclude all parent templates
 -------------------------- */

add_filter('theme_page_templates', 'smartlink_remove_page_templates');
function smartlink_remove_page_templates($templates) {
    unset($templates['page-templates/page-bigpictures.php']);
    unset($templates['page-templates/page-contact.php']);
    unset($templates['page-templates/page-downloads.php']);
    unset($templates['page-templates/page-faq.php']);
    unset($templates['page-templates/page-gallery.php']);
    unset($templates['page-templates/page-sitemap.php']);
    unset($templates['page-templates/page-webservice.php']);
    return $templates;
}

/* Google Fonts
 -------------------------- */

add_action('wputh_google_fonts', 'smartlink_googlefonts');
function smartlink_googlefonts() {
    return array(
        'family' => 'Roboto:400,500,700|Montserrat:400,700|Droid+Serif:400,400italic,700'
    );
}

/* Thumbnails
 -------------------------- */

add_filter('wpu_thumbnails_sizes', 'smartlink_set_wpu_thumbnails_sizes');
function smartlink_set_wpu_thumbnails_sizes($sizes) {
    $sizes['maxithumb'] = array(
        'w' => 400,
        'h' => 240,
        'crop' => true,
        'name' => 'Maxithumb',
    );
    return $sizes;
}

add_filter('wputhumb_basethumbnailurl', 'smartlink_wputhumb_basethumbnailurl', 10, 4);
function smartlink_wputhumb_basethumbnailurl($content, $url, $format, $ext) {
    return get_stylesheet_directory_uri() . '/assets/images/' . $format . '.' . $ext;
}

/* Favicon
 -------------------------- */

function wputh_head_add_favicon() {
    echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/assets/images/favicon.ico" />';
}

/* Theme support
 -------------------------- */

add_action('after_setup_theme', 'remove_invalid_custom', 99);
function remove_invalid_custom() {
    remove_theme_support('custom-header');
    remove_theme_support('custom-background');
    remove_theme_support('woocommerce');
}

/* Share methods
 -------------------------- */

add_filter('wputheme_share_methods', 'smartlink_share_methods', 10, 1);
function smartlink_share_methods($methods) {

    return array(
        'twitter' => $methods['twitter'],
        'facebook' => $methods['facebook'],
        'googleplus' => $methods['googleplus'],
        'linkedin' => $methods['linkedin'],
    );
}

/* Load more
 -------------------------- */

function wputheme_loadmore_button__default($next_page_url) {
    return sprintf('<span class="load-more"><a class="cssc-button cssc-button--loadmore" href="%s"><span>' . __('Voir plus d\'articles', 'wputh') . '</span></a></span>', $next_page_url);
}

add_filter('wputh_pagination_kind', 'smartlink__wputh_pagination_kind', 10, 1);
function smartlink__wputh_pagination_kind($content) {
    return 'load-more';
}

/* SEO auto fill
 -------------------------- */

add_action( 'save_post', 'clrz_autofill_seo' );
function clrz_autofill_seo( $post_id ) {

    global $post;
    $post = get_post( $post_id );

    if ( isset( $_REQUEST['wpuseo_post_title'] ) && empty( $_REQUEST['wpuseo_post_title'] ) ) {
        $post_title = get_the_title( $post_id );
        update_post_meta( $post_id, 'wpuseo_post_title', $post_title );
    }

    if ( isset( $_REQUEST['wpuseo_post_description'] ) && empty( $_REQUEST['wpuseo_post_description'] ) ) {
        // $post_description = get_the_excerpt();
        $post_description = wp_strip_all_tags( get_post_field('post_excerpt', $post_id) );
        if( empty($post_description) ) {
            // $post_description = get_the_content();
        $post_description = get_post_field('post_content', $post_id);
            // var_dump($post_description);
            // die;
        }
        update_post_meta( $post_id, 'wpuseo_post_description', $post_description );
    }

}

function excerpt_count_js(){

    if ('page' != get_post_type()) {

echo '<script>jQuery(document).ready(function(){
    if(jQuery("span#excerpt_counter").length) {
        jQuery("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:12px;right:34px;color:#666;\"><small>Longueur de l’extrait : </small><span id=\"excerpt_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 160</span><small><span style=\"font-weight:bold; padding-left:7px;\">caractère(s).</span></small></div>");
         jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
         jQuery("#excerpt").keyup( function() {
             if(jQuery(this).val().length > 160){
                jQuery(this).val(jQuery(this).val().substr(0, 160));
            }
         jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
       });
    }

    if(jQuery("span#title_short_counter").length) {
        jQuery("#el_id_title_short").after("<div style=\"display: inline-block;margin-left: 10px;color:#666;\"><small>Nombre de caractères : </small><span id=\"title_short_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 60</span></div>");
         jQuery("span#title_short_counter").text(jQuery("#el_id_title_short").val().length);
         jQuery("#el_id_title_short").keyup( function() {
             if(jQuery(this).val().length > 60){
                jQuery(this).val(jQuery(this).val().substr(0, 60));
            }
         jQuery("span#title_short_counter").text(jQuery("#el_id_title_short").val().length);
       });
    }
});</script>';
    }
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');
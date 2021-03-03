<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
include get_stylesheet_directory() . '/tpl/archive-switch.php';

get_header();
if (defined('IS_AJAX') && !IS_AJAX):
    $shown_title = wp_title("", false);
    if (class_exists('WPUSEO')) {
        $wpu_seo = new WPUSEO();
        $shown_title = $wpu_seo->get_displayed_title(false);
    }
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php echo $shown_title; ?></h1>
</div>
<?php
echo $archive_switch;
endif;
query_posts($archive_query);

include get_stylesheet_directory() . '/tpl/list.php';
$pagination_kind = 'load-more';
include get_template_directory() . '/tpl/paginate.php';

get_footer();

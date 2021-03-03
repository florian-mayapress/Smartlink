<?php

/* Template Name: Archives */
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
include get_stylesheet_directory() . '/tpl/archive-switch.php';

get_header();


if (defined('IS_AJAX') && !IS_AJAX):
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php the_title(); ?></h1>
</div>
<?php echo $archive_switch;
endif;
query_posts($archive_query);
include get_stylesheet_directory() . '/tpl/list.php';
$pagination_kind = 'load-more';
include get_template_directory() . '/tpl/paginate.php';
wp_reset_query();

get_footer();

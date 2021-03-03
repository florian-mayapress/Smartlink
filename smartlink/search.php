<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';

$number_results = (int) $wp_query->found_posts;
$search_results = __( '<strong>no</strong> search results', 'wputh' );
if ( $number_results == 1 ) {
    $search_results = __( '<strong>1</strong> search result', 'wputh' );
}
if ( $number_results > 1 ) {
    $search_results = sprintf( __( '<strong>%s</strong> search result', 'wputh' ), $number_results );
}

get_header();
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php echo  $search_results; ?></h1>
</div>
<?php
include get_stylesheet_directory() . '/tpl/list.php';

get_footer();

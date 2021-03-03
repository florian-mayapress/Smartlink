<?php
global $wp_query;
$queried_object = get_queried_object();
$current_url = get_page_link();
if (is_tax() || is_category() || is_tag()) {
    $current_url = get_term_link($queried_object->term_id, $queried_object->taxonomy);
}

$_filters = array(
    'wpupostviews_nbviews' => array(
        'id' => 'wpupostviews_nbviews',
        'name' => __('les plus lus', 'wputh') ,
        'url' => $current_url . '?most_viewed=1'
    ) ,
    'shares' => array(
        'id' => 'shares',
        'name' => __('les plus partagés', 'wputh') ,
        'url' => $current_url . '?most_shared=1'
    )
);
$_filter_mode = '';
$_filter_mode_id = '';
if (isset($_GET['most_viewed'])) {
    $_filter_mode_id = 'wpupostviews_nbviews';
}
if (isset($_GET['most_shared'])) {
    $_filter_mode_id = 'shares';
}
if (!empty($_filter_mode_id)) {
    $_filter_mode = $_filters[$_filter_mode_id]['id'];
}

/* ----------------------------------------------------------
  Build Query
---------------------------------------------------------- */

$archive_query = array(
    'post_type' => 'post',
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
);
if (!empty($_filter_mode)) {
    $archive_query['orderby'] = 'meta_value_num meta_value ' . $archive_query['orderby'];
    $archive_query['meta_key'] = $_filter_mode;
}
if (is_tax() || is_category() || is_tag()) {
    $archive_query['tax_query'] = array(
        array(
            'taxonomy' => $queried_object->taxonomy,
            'field' => 'id',
            'terms' => $queried_object->term_id,
        )
    );
}

/* ----------------------------------------------------------
  Switch to display
---------------------------------------------------------- */

ob_start();
?>
<div class="filter-posts">
<?php
foreach ($_filters as $_i => $_filter) {
    $_filter_active = ($_filter_mode_id == $_i);
    echo '<a class="filter-name ' . ($_filter_active ? 'active' : '') . '" href="' . ($_filter_active ? $current_url : $_filter['url']) . '">' . $_filter['name'] . '</a>';
}
?>
</div>
<?php
$archive_switch = ob_get_clean();

<?php
$categories = wp_get_post_categories(get_the_ID() , array(
    'fields' => 'ids'
));
$cat_id = isset($categories[0]) ? $categories[0] : 1;
$cat_metas = get_taxonomy_metas($cat_id);
$cat_color = isset($cat_metas['category_color']) ? $cat_metas['category_color'] : '#607d8b';
$formats = wp_get_post_terms(get_the_ID() , 'format');

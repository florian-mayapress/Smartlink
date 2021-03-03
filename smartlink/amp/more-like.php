<?php
$_similar_posts = array();

for ($i = 1;$i <= 3;$i++) {
    $_similar_post_ID = get_post_meta(get_the_ID() , 'similar_' . $i, 1);
    if (is_numeric($_similar_post_ID)) {
        $_similar_posts[] = $_similar_post_ID;
    }
}

if (empty($_similar_posts)) {
    return;
}

$_wpq_similar = new WP_Query(array(
    'orderby' => 'post__in',
    'post__in' => $_similar_posts,
    'post_type' => 'post',
    'posts_per_page' => - 1,
));
if ($_wpq_similar->have_posts()) {
?>
<div class="centered-container cc-strate-focus">
<div class="strate-focus">
<h2 class="base-title"><span><?php echo __('La rédaction vous propose', 'wputh'); ?></span></h2>
<?php
    echo '<ul class="focus-posts">';
    while ($_wpq_similar->have_posts()) {
        $_wpq_similar->the_post();
        echo '<li>';
        get_template_part('amploop', 'focus');
        echo '</li>';
    }
    echo '</ul>';
?>
<div class="focus-cta">
    <a class="cssc-button focus-button" href="<?php echo ARCHIVES__PAGE_ID__LINK; ?>"><span><?php echo __('Voir toutes les actualités', 'wputh'); ?></span></a>
</div>
</div>
</div>
<?php
}
wp_reset_postdata();

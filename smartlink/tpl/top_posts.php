<div class="centered-container cc-top-posts">
    <div class="top-posts">
        <div class="top-posts__tabs">
            <ul>
                <li>
                    <a href="#" data-for="tab--most-viewed" class="current"><?php echo __('Le top Smartlink.fr', 'wputh'); ?></a>
                </li>
                <li>
                    <a href="#" data-for="tab--most-shared"><?php echo __('Les plus partagés', 'wputh'); ?></a>
                </li>
            </ul>
        </div>
        <div class="top-posts__tabs-content">
            <div class="tab tab--most-viewed current">
                <h2 class="tab-title"><span><?php echo __('Le top Smartlink.fr', 'wputh'); ?></span></h2>
<?php
$wpq_most_viewed = new WP_Query(array(
    'posts_per_page' => 12,
    'post_type' => 'post',
    'meta_key' => 'wpupostviews_nbviews',
    'orderby' => 'meta_value_num meta_value date',
));
if ($wpq_most_viewed->have_posts()) {
    echo '<div class="top-list-container">';
        echo '<div class="top-list">';
        while ($wpq_most_viewed->have_posts()) {
            $wpq_most_viewed->the_post();
            echo '<div class="top-list__item">';
            get_template_part('loop', 'short');
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="slider-actions cf"></div>';
    echo '</div>';
}
wp_reset_postdata();
?>
            </div>
            <div class="tab tab--most-shared">
                <h2 class="tab-title"><span><?php echo __('Les plus partagés', 'wputh'); ?></span></h2>
<?php
$wpq_most_shared = new WP_Query(array(
    'posts_per_page' => 12,
    'post_type' => 'post',
    'meta_key' => 'shares',
    'orderby' => 'meta_value_num meta_value date',
));
if ($wpq_most_shared->have_posts()) {
    echo '<div class="top-list-container">';
        echo '<div class="top-list">';
        while ($wpq_most_shared->have_posts()) {
            $wpq_most_shared->the_post();
            echo '<div class="top-list__item">';
            get_template_part('loop', 'short');
            echo '</div>';
        }
        echo '</div>';
        echo '<div class="slider-actions cf"></div>';
    echo '</div>';
}
wp_reset_postdata();
?>
            </div>
        </div>
    </div>
</div>
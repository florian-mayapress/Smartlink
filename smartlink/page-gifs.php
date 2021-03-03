<?php

/* Template Name: Gifs */
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';

get_header();
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php the_title(); ?></h1>
</div>
<div class="centered-container cc-gifs-list">
    <div class="gifs-list">
<?php

$wpq_gifs = new WP_Query( array(
    'posts_per_page' => -1,
    'post_type' => 'gifs'
) );
if ( $wpq_gifs->have_posts() ) {
    echo '<ul class="gifs-grid">';
    echo '<li class="gif-item--size"></li>';
    while ( $wpq_gifs->have_posts() ) {
        $wpq_gifs->the_post();
        $gif_double_width = get_post_meta(get_the_ID(),'gif_double_width',1);
        $gif_double_height = get_post_meta(get_the_ID(),'gif_double_height',1);
        echo '<li class="gif-item '.($gif_double_height == '1' ? 'gif-item--tall' : '').' '.($gif_double_width == '1' ? 'gif-item--wide' : '').'">';
        get_template_part( 'loop', 'gifs' );
        echo '</li>';
    }
    echo '</ul>';
}
wp_reset_postdata();

?>
    </div>
</div>
<?php
get_footer();

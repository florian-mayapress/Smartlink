<?php
if (!isset($line['posts']) || !is_array($line['posts'])) {
    return;
}

$wpq_posts = new WP_Query( array(
    'orderby' => 'post__in',
    'post__in' => $line['posts'],
    'post_type' => 'post',
    'posts_per_page' => - 1,
) );
if ( $wpq_posts->have_posts() ) {
    echo '<div class="video-slider">';
    echo '<h2 class="video-slider_title"><span>' . $line['title'] . '</span></h2>';
    echo '<div class="video-slider__inner"><div class="slider">';
    ob_start();
    while ( $wpq_posts->have_posts() ) {
        $wpq_posts->the_post();
        $thumb_url = wputhumb_get_thumbnail_url('full',get_the_ID());
        $is_video = (get_post_meta(get_the_ID(),'is_video',1) == '1');
        ?>
        <div>
            <div class="slick-slide-content">
                <div class="loop-video-slider">
                    <a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $thumb_url; ?>);" class="<?php echo $is_video ? 'is-video-thumb':''; ?>"></a>
                    <div class="content">
                    <?php
                    include get_stylesheet_directory() . '/tpl/loop/cat.php';
                    echo '<a class="cat" style="background-color:' . $cat_color . '" href="' . get_category_link($cat_id) . '">' . get_cat_name($cat_id) . '</a>';
                    include get_stylesheet_directory() . '/tpl/loop/title.php';
                    include get_stylesheet_directory() . '/tpl/loop/metas.php';
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    $out = ob_get_clean();
    /* Display multiple times the content to allow a loop for the slider. */
    echo $out.$out;
    echo '</div></div>';
    if(isset($line['cta_text'],$line['cta_link']) && !empty($line['cta_text']) && !empty($line['cta_link'])): ?>
    <div class="video-slider_cta">
        <a class="cssc-button cssc-button--clear" href="<?php echo $line['cta_link']; ?>"><span><?php echo $line['cta_text']; ?></span></a>
    </div>
    <?php endif;
    echo '</div>';
}
wp_reset_postdata();


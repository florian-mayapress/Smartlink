<?php
$wpq_slider = new WP_Query(array(
    'orderby' => 'post__in',
    'post__in' => $line['posts'],
    'post_type' => 'post',
    'posts_per_page' => - 1,
));
if ($wpq_slider->have_posts()) {
    echo '<div class="centered-container cc-home-slider"><div class="home-slider">';
    echo '<ul class="slider">';
    while ($wpq_slider->have_posts()) {
        $wpq_slider->the_post();
        $is_video = (get_post_meta(get_the_ID() , 'is_video', 1) == '1');
        include get_stylesheet_directory() . '/tpl/loop/cat.php';
        $_methods = wputh_get_share_methods($post);
        echo '<li data-color="' . $cat_color . '" style="background-image: url(' . wputhumb_get_thumbnail_url('full') . ');">';
        echo ($is_video ? '<div class="video-thumb is-video-thumb"></div>' : '');
        echo '<a class="gradient" href="' . get_permalink() . '"></a>';

            echo '<div class="illu-share">';
                echo '<ul class="share-list">';
                    foreach ($_methods as $_id => $_method) {
                        echo '<li><a target="_blank" rel="nofollow" href="'.$_method['url'].'" class="'.$_id.'"><i class="icon icon_'.$_id.'"></i></a></li>';
                    }
                echo '</ul>';
            echo '</div>';

        echo '<div class="slide-content" style="text-shadow:0 0 40px #000,0 0 40px ' . $cat_color . '">';
        echo '<a class="cat" style="background-color:' . $cat_color . '" href="' . get_category_link($cat_id) . '">' . get_cat_name($cat_id) . '</a>';
        if(!empty($formats)): ?>
               <a class="format" href="<?php echo get_term_link($formats[0]) ?>"><?php echo $formats[0]->name; ?></a>
           <?php endif;
        include get_stylesheet_directory() . '/tpl/loop/title.php';
        include get_stylesheet_directory() . '/tpl/loop/metas.php';
        echo '</div>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div></div>';
}
wp_reset_postdata();

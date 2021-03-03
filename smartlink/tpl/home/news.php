<?php
$wpq_posts_var = new WP_Query(array(
    'orderby' => 'post__in',
    'post__in' => $line['posts_var'],
    'posts_per_page' => - 1,
    'post_type' => 'any'
));

if ($wpq_posts_var->have_posts()) {
    echo '<div class="centered-container cc-news"><div class="news">';
    echo '<h2 class="base-title"><span>' . $line['title'] . '</span></h2>';
    echo '<ul class="news-list">';
    $i = 0;
    while ($wpq_posts_var->have_posts()) {
        $wpq_posts_var->the_post();
        $post_type = get_post_type();
        $i++;
        echo '<li>';
        echo '<div class="news-list-wrapper news-list-wrapper--' . $post_type . '">';
        switch ($post_type) {
            case 'gifs':
                echo '<a href="' . GIFS__PAGE_ID__LINK . '" class="item-gif" style="background-color: '.get_post_meta(get_the_ID(),'gif_color',1).';background-image: url(' . wputhumb_get_thumbnail_url('full', get_the_ID()) . ');"></a>';
            break;
            case 'autopromos':
                $autopromo_targetblank = (get_post_meta(get_the_ID() , 'autopromo_targetblank', 1) == '1' ? 'target="_blank"' : '');
                echo '<a ' . $autopromo_targetblank . ' href="' . get_post_meta(get_the_ID() , 'autopromo_url', 1) . '" class="item-autopromo" title="' . esc_attr(get_the_title()) . '" style="background-image: url(' . wputhumb_get_thumbnail_url('full', get_the_ID()) . ');"></a>';
            break;
            default:
                get_template_part('loop', 'big');
            break;
        }
        echo '</div></li>';
        if ($i % 3 == 0 && $i != $wpq_posts_var->post_count) {
            echo '</ul><ul class="news-list">';
        }
    }
    echo '</ul>';
    echo '<div class="focus-cta">';
        echo '<a class="cssc-button focus-button" href="'.$line['cta_link'].'"><span>'.$line['cta_text'].'</span></a>';
    echo '</div>';
    echo '</div></div>';
}
wp_reset_postdata();

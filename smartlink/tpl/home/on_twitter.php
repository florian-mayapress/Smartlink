<?php
$wpq_twitter = new WP_Query(array(
    'posts_per_page' => 9,
    'post_type' => 'tweet',
));
if ($wpq_twitter->have_posts()) {
?><div class="centered-container cc-on-twitter">
    <div class="on-twitter">
    <h2 class="on-twitter__title"><span>Smartlink.fr sur Twitter</span></h2>
<?php
    echo '<div class="on-twitter__list-container">';
        echo '<div class="on-twitter__list">';
            while ($wpq_twitter->have_posts()) {
                $wpq_twitter->the_post();
                $screen_name = get_post_meta(get_the_ID() , 'wpuimporttwitter_screen_name', 1);
                $original_url = get_post_meta(get_the_ID() , 'wpuimporttwitter_original_url', 1);
                $screen = '<a target="_blank" href="https://twitter.com/' . $screen_name . '">@' . $screen_name . '</a>';
                echo '<div class="wrap"><div class="tweet">';
                the_content();
                echo '<div class="metas"><i class="icon icon_twitter"></i> ' . sprintf(__('<a href="%s">le %s</a> par %s', 'wputh'), $original_url , get_the_time('d/m/Y') , $screen) . '</div>';
                echo '</div></div>';
            }
        echo '</div>';
        echo '<div class="slider-actions cf"></div>';
    echo '</div>';
    if (isset($line['cta_text'], $line['cta_link']) && !empty($line['cta_text']) && !empty($line['cta_link'])): ?>
<div class="on-twitter__cta">
    <a target="_blank" class="cssc-button" href="<?php echo $line['cta_link']; ?>"><span><?php echo $line['cta_text']; ?></span></a>
</div>
<?php
    endif; ?>
    </div>
</div>
<?php
}
wp_reset_postdata();

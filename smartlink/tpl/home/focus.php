<?php
if (!isset($line['posts']) || !is_array($line['posts'])) {
    return;
}
?>
<div class="centered-container cc-strate-focus">
<div class="strate-focus">
<h2 class="base-title"><span><?php echo $line['title']; ?></span></h2>
<?php
$wpq_focus = new WP_Query(array(
    'orderby' => 'post__in',
    'post__in' => $line['posts'],
    'post_type' => 'post',
    'posts_per_page' => - 1,
));
if ($wpq_focus->have_posts()) {
    echo '<ul class="focus-posts">';
    while ($wpq_focus->have_posts()) {
        $wpq_focus->the_post();
        echo '<li>';
        get_template_part('loop', 'focus');
        echo '</li>';

    }
    echo '</ul>';
}
wp_reset_postdata();
if(isset($line['cta_text'],$line['cta_link']) && !empty($line['cta_text']) && !empty($line['cta_link'])): ?>
<div class="focus-cta">
    <a class="cssc-button focus-button" href="<?php echo $line['cta_link']; ?>"><span><?php echo $line['cta_text']; ?></span></a>
</div>
<?php endif; ?>
</div>
</div>

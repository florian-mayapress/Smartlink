<?php
if (!isset($line['post']) || !is_object($line['post'])) {
    return;
}
$thumb_url = wputhumb_get_thumbnail_url('full',$line['post']->ID);
$is_video = (get_post_meta($line['post']->ID,'is_video',1) == '1');
?>
<div class="centered-container cc-strate-videozoom">
    <div class="cc-full-image" style="background-image:url(<?php echo $thumb_url; ?>);"></div>
    <div class="cc-content strate-videozoom">
        <div class="videozoom__preview">
            <a href="<?php echo get_permalink($line['post']); ?>" class="<?php echo $is_video ? 'is-video-thumb':''; ?>"><?php echo get_the_post_thumbnail($line['post']->ID); ?></a>
        </div>
        <div class="videozoom__content">
            <div class="videozoom__title-wrapper">
                <h2 class="videozoom__title"><?php echo $line['title']; ?></h2>
            </div>
            <h3 class="videozoom__post-title"><?php echo apply_filters('the_title',$line['post']->post_title); ?></h3>
            <div class="videozoom__post-excerpt">
                <?php echo apply_filters('the_excerpt',$line['post']->post_excerpt); ?>
            </div>
            <?php if(isset($line['cta_text'],$line['cta_link']) && !empty($line['cta_text']) && !empty($line['cta_link'])): ?>
            <div class="videozoom__cta">
                <a class="cssc-button cssc-button--clear" href="<?php echo $line['cta_link']; ?>"><span><?php echo $line['cta_text']; ?></span></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
include get_stylesheet_directory() . '/tpl/loop/cat.php';
$is_video = (get_post_meta(get_the_ID(),'is_video',1) == '1');
$_methods = wputh_get_share_methods($post);

?><div class="loop__illu" data-color="<?php echo $cat_color; ?>">
    <div class="illu-share-bg"></div>
    <div class="illu-share">
        <ul class="share-list">
            <?php foreach ($_methods as $_id => $_method) { ?>
            <li><a target="_blank" rel="nofollow" href="<?php echo $_method['url']; ?>" class="<?php echo $_id; ?>"><i class="icon icon_<?php echo $_id; ?>"></i></a></li>
            <?php } ?>
        </ul>
    </div>
    <a class="illu <?php echo $is_video ? 'is-video-thumb--small':''; ?>" href="<?php the_permalink(); ?>"><span class="gradient"></span><?php the_post_thumbnail('maxithumb'); ?></a>
    <span class="cat-wrap">
    <a class="cat" style="background-color:<?php echo $cat_color; ?>;" href="<?php echo get_category_link($cat_id) ?>"><?php echo get_cat_name($cat_id); ?></a>
    <?php if(!empty($formats)): ?>
        <a class="format" href="<?php echo get_term_link($formats[0]) ?>"><?php echo $formats[0]->name; ?></a>
    <?php endif; ?>
    </span>
</div><?php

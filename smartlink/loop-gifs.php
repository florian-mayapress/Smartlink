<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
$source = get_post_meta(get_the_ID() , 'gif_source_name', 1);
$color = get_post_meta(get_the_ID() , 'gif_color', 1);
if (empty($color)) {
    $color = '#f0f0f0';
}
$thumb_url = wputhumb_get_thumbnail_url('full', get_the_ID());
$_methods = wputh_get_share_methods($post, get_the_title() , $thumb_url, $thumb_url);
?><div class="loop-gif">
    <div class="loop-gif__inside" style="background-color:<?php echo $color; ?>;">
    <div class="illu-share-bg"></div>
    <div class="illu-share">
        <ul class="share-list">
            <?php foreach ($_methods as $_id => $_method) { ?>
            <li><a target="_blank" rel="nofollow" href="<?php echo $_method['url']; ?>" class="<?php echo $_id; ?>"><i class="icon icon_<?php echo $_id; ?>"></i></a></li>
            <?php } ?>
        </ul>
    </div>
        <div class="gif" style="background-image: url(<?php echo $thumb_url; ?>);"></div>
        <div class="content"><?php
the_content();
if (!empty($source)) {
    echo '<p><small>' . sprintf(__('Source : %s', 'wputh') , $source) . '</small></p>';
}
?></div>
    </div>
</div><?php

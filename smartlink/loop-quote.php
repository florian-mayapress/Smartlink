<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
$author_name = trim(get_post_meta(get_the_ID() , 'quote_author_name', 1));
$author_role = trim(get_post_meta(get_the_ID() , 'quote_author_role', 1));
$linked_post = trim(get_post_meta(get_the_ID() , 'quote_linked_post', 1));
if (!empty($author_role)) {
    $author_name.= ', ' . $author_role;
}
$share_methods = array();
if (is_numeric($linked_post)) {
    $share_content = strip_tags(get_the_content());
    $share_methods = wputh_get_share_methods($linked_post, $share_content);
}

$quote = wputh_truncate(strip_tags(get_the_content()) , 120, ' ...');
?>
<div class="loop-quote">
    <blockquote><p><a href="<?php echo get_permalink($linked_post); ?>"><?php echo $quote; ?></a></p></blockquote>
    <footer>
        <?php echo $author_name; ?>
    </footer>
    <?php if (!empty($share_methods)): ?>
    <ul>
        <?php foreach ($share_methods as $id => $method): ?>
            <li><a class="social-<?php echo $id; ?>" target="_blank" href="<?php echo $method['url']; ?>"><i class="icon icon_<?php echo $id; ?>"></i></a></li>
        <?php
    endforeach; ?>
    </ul>
    <?php
endif; ?>
</div>

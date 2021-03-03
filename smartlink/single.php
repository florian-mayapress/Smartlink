<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
get_header();
the_post();
include get_stylesheet_directory() . '/tpl/loop/cat.php';
$is_video = (get_post_meta(get_the_ID() , 'is_video', 1) == '1');
$thumb_url = wputhumb_get_thumbnail_url('full', get_the_ID());
$banner_img = get_post_meta(get_the_ID() , 'banner_img', 1);
if (is_numeric($banner_img)) {
    $thumb_url = wputhumb_get_thumbnail_url('full', false, $banner_img);
}
$cta_text = get_post_meta(get_the_ID() , 'cta_text', 1);
$cta_link = get_post_meta(get_the_ID() , 'cta_link', 1);
// $title_short = get_post_meta(get_the_ID() , 'title_short', 1);
$_share_methods = wputh_get_share_methods($post);
?>
<div class="centered-container has-blur cc-post-banner" data-color="<?php echo $cat_color; ?>">
    <div class="cc-full-image" style="background-image:url(<?php echo $thumb_url; ?>);"></div>
    <div class="post-banner">
        <div class="cat-wrap">
        <?php
        echo '<a class="cat" style="background-color:' . $cat_color . '" href="' . get_category_link($cat_id) . '">' . get_cat_name($cat_id) . '</a>';
        if (!empty($formats)) {
            echo '<a class="format" href="' . get_term_link($formats[0]) . '">' . $formats[0]->name . '</a>';
        }
        ?>
        </div>
        <h1 class="title loop__title"><?php the_title(); ?></h1>
        <?php include get_stylesheet_directory() . '/tpl/loop/metas.php'; ?>
    </div>
</div>
<div class="main-post">
    <?php include get_stylesheet_directory() . '/tpl/post-share.php'; ?>
    <div class="centered-container cc-post-content">
        <div class="post-content post-content--share">
<?php
the_content();

$posttags = get_the_tags();
if ($posttags) {
    echo '<p class="tag-list">';
    foreach ($posttags as $tag) {
        echo '<a href="' . get_tag_link($tag->term_id) . '" class="format">' . $tag->name . '</a>';
    }
    echo '</p>';
}
?>
        </div>
    </div>
    <?php include get_stylesheet_directory() . '/tpl/post-share.php'; ?>
    <?php
    if(!empty($cta_text) && !empty($cta_link)): ?>
    <div class="post-cta">
        <a class="cssc-button" href="<?php echo $cta_link; ?>"><span><?php echo $cta_text; ?></span></a>
    </div>
    <?php endif; ?>
</div>
<?php
include get_stylesheet_directory() . '/tpl/similar.php';
include get_stylesheet_directory() . '/tpl/quote.php';
include get_stylesheet_directory() . '/tpl/top_posts.php';

get_footer();

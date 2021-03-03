<?php
$title_short = get_post_meta(get_the_ID() , 'title_short', 1);
$title = ( ! empty($title_short) ) ? $title_short : get_the_title();
?>
<h3 class="title loop__title"><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
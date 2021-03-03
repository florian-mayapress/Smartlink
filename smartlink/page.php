<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
get_header();
the_post();
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php the_title(); ?></h1>
</div>
<div class="main-post">
    <div class="centered-container cc-post-content">
        <div class="post-content"><?php the_content(); ?></div>
    </div>
</div>
<?php
get_footer();

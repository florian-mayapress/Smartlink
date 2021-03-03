<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
get_header();
?>
<div class="centered-container cc-title">
    <h1 class="title"><?php echo __( '404 Error', 'wputh' ); ?></h1>
</div>
<div class="main-post">
    <div class="centered-container cc-post-content">
        <div class="post-content">
            <p><?php echo __( 'Sorry, but this page doesn&rsquo;t exists.', 'wputh' ); ?></p>
        </div>
    </div>
</div>
<?php
get_sidebar();
get_footer();

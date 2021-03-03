<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
?><div class="loop">
    <?php include get_stylesheet_directory() . '/tpl/loop/illu.php'; ?>
    <?php include get_stylesheet_directory() . '/tpl/loop/title.php'; ?>
    <?php the_excerpt(); ?>
    <?php include get_stylesheet_directory() . '/tpl/loop/metas.php'; ?>
</div><?php

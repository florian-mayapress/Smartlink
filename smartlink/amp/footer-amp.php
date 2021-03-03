<div class="centered-container cc-footer">
    <div class="footer">
    <div class="cssc-grid fluid-grid">
        <div class="col-25p tabv--col-100p">
            <?php include get_stylesheet_directory() . '/tpl/amp/logo-smartlink.php'; ?>
        </div>
        <div class="col-25p tabv--col-100p">
            <?php
            wp_nav_menu(array(
                'depth' => 1,
                'theme_location' => 'main',
                'container_class' => 'footer-menu-container',
                'menu_class' => 'footer-menu'
            ));
            ?>
        </div>
        <div class="col-25p tabv--col-100p">
        <div class="footer-follow">
        <div><strong><?php echo __( 'Nous suivre', 'wputh' ); ?></strong></div>
        <ul class="footer-links-social">
        <?php include get_stylesheet_directory() . '/tpl/social-links.php'; ?>
        </ul>
        </div>
        <ul class="footer-links-utils">
            <li><?php echo wputh_link(COOKIE__PAGE_ID); ?></li>
            <li><?php echo wputh_link(CHART__PAGE_ID); ?></li>
            <li><?php echo wputh_link(MENTIONS__PAGE_ID); ?></li>
            <li><?php echo wputh_link(CONTACT__PAGE_ID); ?></li>
        </ul>
        </div>
        <div class="col-25p tabv--col-100p">
            <?php include get_stylesheet_directory() . '/tpl/amp/logo-partner.php'; ?>
            <div class="copy">&copy; <?php bloginfo('name') ?> <?php echo date('Y'); ?></div>
        </div>
    </div>
    </div>
</div>

<div class="centered-container cc-footer">
    <div class="footer">
    <div class="cssc-grid fluid-grid">
        <div class="col-25p tabv--col-100p">
            <?php include get_stylesheet_directory() . '/tpl/logo-smartlink.php'; ?>
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
            <?php include get_stylesheet_directory() . '/tpl/logo-partner.php'; ?>
            <div class="copy">&copy; <?php bloginfo('name') ?> <?php echo date('Y'); ?></div>
        </div>
    </div>
    </div>
</div>
<?php
$all_terms = array();
$terms_type = array(
    'post_tag',
    'category'
);
foreach ($terms_type as $term) {
    $terms = get_terms($term);
    foreach ($terms as $item) {
        $all_terms[$item->slug] = $item->name;
    }
}
asort($all_terms);

if (!empty($all_terms)):
    echo '<datalist id="header-search-list">';
    foreach ($all_terms as $term):
        echo '<option value="' . $term . '">';
    endforeach;
    echo '</datalist>';
endif;
?>
<div class="banner-cookies">
<?php echo __( 'Nous utilisons des cookies pour améliorer notre site et votre expérience. En utilisant notre site, vous acceptez notre politique de cookies.', 'wputh' ); ?>
<a href="<?php echo COOKIE__PAGE_ID__LINK; ?>"><?php echo __( 'En savoir plus.', 'wputh' ); ?></a>
<a class="close-cookies" href="#"><?php echo __( 'Fermer', 'wputh' ); ?> X</a>
</div>
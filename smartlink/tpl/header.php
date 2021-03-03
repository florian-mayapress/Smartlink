<div class="centered-container cc-header-search"><div class="header-search"><?php
include get_stylesheet_directory() . '/tpl/header-searchform.php';
?></div></div>
<div class="cc-header-wrapper">
<div class="centered-container cc-header">
    <header class="main-header">
        <h1 class="logo"><?php include get_stylesheet_directory() . '/tpl/logo-smartlink.php'; ?></h1>
        <a href="#" class="nav-toggle"><span></span></a>
        <div class="header-menu">
        <?php
wp_nav_menu(array(
    'depth' => 1,
    'theme_location' => 'main',
    'menu_class' => 'main-menu'
));

echo '<div class="header__search">';
echo '<form role="search" method="get" class="search__form" action="' . home_url() . '">
  <div class="search__inner">
      <input list="header-search-list" type="text" value="" name="s" class="search__input" placeholder="' . esc_attr__('Search', 'wputh') . '" title="' . esc_attr__('Search by keywords', 'wputh') . '" />
      <button type="submit" class="search__submit" title="' . sprintf(__('Search on %s', 'wputh') , get_bloginfo('name')) . '"><i class="icon icon_search"></i></button>
  </div>
</form>';
echo '<a href="#"><i class="icon icon_search"></i></a></div>';

echo '<ul class="header__social">';
include get_stylesheet_directory() . '/tpl/social-links.php';
echo '</ul>';

include get_stylesheet_directory() . '/tpl/logo-partner.php';
?>
        </div>
    </header>
</div>
</div>

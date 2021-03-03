<form role="search" method="get" id="header-search" class="search__form" action="<?php echo home_url(); ?>">
  <div class="search__inner">
      <label class="cssc-remove-element" for="s"><?php _e('Search for:', 'wputh'); ?></label>
      <input list="header-search-list" type="text" value="" name="s" id="s" class="search__input" placeholder="<?php echo esc_attr__('Search', 'wputh'); ?>" title="<?php echo esc_attr__('Search by keywords', 'wputh'); ?>" />
      <button type="submit" class="search__submit" id="search_submit" title="<?php echo sprintf(__('Search on %s', 'wputh') , get_bloginfo('name')); ?>"><?php _e('Search', 'wputh'); ?></button>
      <button class="reset">&times;</button>
  </div>
</form>
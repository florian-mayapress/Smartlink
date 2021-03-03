<?php
$geo = get_the_terms($id, 'geography');
$geo_name = isset($geo[0]) ? $geo[0]->name : '';
?><div class="loop__metas">
<time class="time" datetime="<?php echo get_the_time(DATE_W3C); ?>"><i class="icon icon_clock"></i> <?php echo get_the_time(__('d/m/Y', 'wputh')); ?></time>
<?php
if (isset($geo[0])):
    echo ' <span class="sep">—</span> ';
    echo '<a href="'.get_term_link( $geo[0], 'geography' ).'" class="geo"><i class="icon icon_place"></i>' . $geo[0]->name . '</a>';
endif;
?>
</div><?php

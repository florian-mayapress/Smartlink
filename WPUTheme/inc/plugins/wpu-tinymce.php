<?php

/* ----------------------------------------------------------
  Insert a table
---------------------------------------------------------- */

add_filter('wputinymce_buttons', 'wputh_set_wputinymce_buttons__insert_table');
function wputh_set_wputinymce_buttons__insert_table($buttons) {
    $buttons['insert_table'] = array(
        'title' => 'Insert a table',
        'image' => get_stylesheet_directory_uri() . '/images/tinymce/table.png',
        'html' => '<table class="wputinymce-table"><thead><tr><th>Entête</th><th>Entête</th></tr></thead><tbody><tr><td>Content</td><td>Content</td></tr></tbody></table>'
    );
    return $buttons;
}
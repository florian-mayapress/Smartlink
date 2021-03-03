<?php
include dirname(__FILE__) . '/../WPUTheme/z-protect.php';
get_header();
the_post();


if (function_exists('get_field')):
    echo '<div class="acf-contents">';
    $field = get_field('strate', get_the_ID());
    if (is_array($field)) {
        foreach ($field as $line) {
            if (!isset($line['strate_type'])) {
                continue;
            }
            switch ($line['strate_type']) {
                case 'news':
                case 'focus':
                case 'follow_us':
                case 'video_zoom':
                case 'video_slider':
                case 'on_twitter':
                case 'slider':
                    include get_stylesheet_directory() . '/tpl/home/' . $line['strate_type'] . '.php';
                break;
                case 'top_posts':
                case 'quote':
                    include get_stylesheet_directory() . '/tpl/' . $line['strate_type'] . '.php';
                break;
                default:
                break;
            }
        }
    }
    echo '</div>';
endif;

get_footer();

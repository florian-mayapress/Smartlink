<?php
$wpu_social_links = wputh_get_social_links();
foreach ($wpu_social_links as $id => $link) {
    echo '<li><a rel="me" href="' . $link['url'] . '" class="' . $id . '" title="' . sprintf(__('%s: Follow %s (open in new window)', 'wputh') , $link['name'], get_bloginfo('name')) . '" target="_blank">';
    echo '<i class="icon icon_'.$id.'"></i>';
    echo '</a></li>';
}

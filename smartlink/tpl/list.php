<?php
if (have_posts()) {
    echo '<div class="centered-container cc-list"><div class="list">';
    echo '<ul class="post-list">';
    while (have_posts()) {
        the_post();
        echo '<li>';
        get_template_part('loop', 'big');
        echo '</li>';
    }
    echo '</ul>';
    echo '</div></div>';
}

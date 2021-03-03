<?php
$wpq_quote = new WP_Query(array(
    'posts_per_page' => - 1,
    'post_type' => 'quotes'
));
if ($wpq_quote->have_posts()) {
    echo '<div class="centered-container cc-strate-quote">
    <div class="strate-quote">';
    echo '<h2 class="strate-quote__title">' . __('Ils l’ont dit sur Smartlink.fr', 'wputh') . '</h2>';
    echo '<ul class="strate-quote__list">';
    while ($wpq_quote->have_posts()) {
        $wpq_quote->the_post();
        echo '<li>';
        get_template_part('loop', 'quote');
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>
    </div>';
}
wp_reset_postdata();

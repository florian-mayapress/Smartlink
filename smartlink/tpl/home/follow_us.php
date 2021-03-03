<div class="follow-us">
    <h2 class="follow-us__title"><?php echo __( 'Suivez-nous aussi<br />sur les réseaux sociaux', 'wputh' ); ?></h2>
    <ul class="follow-us__links">
        <?php
        $wpu_social_links = wputh_get_social_links();
        foreach ($wpu_social_links as $id => $link) {
            echo '<li><a rel="me" href="' . $link['url'] . '" class="' . $id . '" title="' . sprintf(__('%s: Follow %s (open in new window)', 'wputh') , $link['name'], get_bloginfo('name')) . '" target="_blank">';
            echo '<i class="icon icon_'.$id.'"></i>';
            echo $link['name'];
            echo '</a></li>';
        }
        ?>
    </ul>
</div>
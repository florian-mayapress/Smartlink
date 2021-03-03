<div class="post-share">
    <h3 class="share-title"><?php echo __('Share this post', 'wputh'); ?></h3>
    <ul class="share-list">
        <?php foreach ($_share_methods as $_id => $_method) { ?>
        <li><a target="_blank" href="<?php echo $_method['url']; ?>" class="<?php echo $_id; ?>"><i class="icon icon_<?php echo $_id; ?>"></i></a></li>
        <?php } ?>
    </ul>
</div>
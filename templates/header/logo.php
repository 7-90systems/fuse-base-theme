<?php
    /**
     *  @package fuse_base_theme
     *
     *  @version 1.0.0
     */
?>
<?php if (has_custom_logo ()): ?>

    <?php
        the_custom_logo ();
    ?>

<?php else: ?>

    <span id="fuse-base-header-title">
        <a href="<?php echo esc_url (home_url ('/')); ?>">
            <?php echo get_bloginfo ('name'); ?>
        </a>
    </span>

<?php endif; ?>
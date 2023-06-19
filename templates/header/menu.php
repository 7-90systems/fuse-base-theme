<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  #filter fuse_base_nav_menu_class
     */
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
?>
<nav id="primary-menu-container"<?php if (array_key_exists ('use_container', $args) && $args ['use_container'] === true) echo ' class="fuse-container"'; ?>>
    <div class="wrap">
        
        <?php
            wp_nav_menu (array (
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => apply_filters ('fuse_base_nav_menu_class', 'fuse-base-nav-menu sf-menu')
            ));
        ?>
        
    </div>
</nav>
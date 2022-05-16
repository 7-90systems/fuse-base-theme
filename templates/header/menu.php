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
<nav id="primary-menu-container">
    <div class="wrap">
        
        <?php
            wp_nav_menu (array (
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => apply_filters ('fuse_base_nav_menu_class', 'fuse-base-nav-menu')
            ));
        ?>
        
    </div>
</nav>
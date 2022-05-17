<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @action fuse_base_before_user_bar
     *  @action fuse_base_after_user_bar
     *  @action fuse_base_before_user_bar_menu
     *  @action fuse_base_after_user_bar_menu
     */
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    // Check for WooCommerce
    if (function_exists ('WC')) {
        // WooCommerce exists! Use their endpoints
        $login_url = esc_url (get_permalink (get_option ('woocommerce_myaccount_page_id')));
        $register_url = $login_url;
        $profile_url = $login_url;
    } // if ()
    else {
        // Use standard endpoints
        $login_url = esc_url (wp_login_url (home_url (add_query_arg ($_GET, $wp->request))));
        $register_url = esc_url (wp_registration_url ());
        $profile_url = get_edit_profile_url (get_current_user_id ());
    } // else
    
    global $wp;
?>
<nav id="fuse-user-bar">
    <div class="wrap">
        
        <?php
            do_action ('fuse_base_before_user_bar');
        ?>
        
        <ul class="user-bar-menu">
            
            <?php
                do_action ('fuse_base_before_user_bar_menu');
            ?>
            
            <?php if (is_user_logged_in ()): ?>
            
                <li class="profile">
                    <a href="<?php echo esc_url ($profile_url); ?>"><?php _e ('My Profile', 'fuse'); ?></a>
                </li>
                <li class="logout">
                    <a href="<?php echo esc_url (wp_logout_url (home_url ('/'))); ?>"><?php _e ('Log Out', 'fuse'); ?></a>
                </li>
            
            <?php else: ?>
            
                <li class="login">
                    <a href="<?php echo $login_url; ?>"><?php _e ('Login', 'fuse'); ?></a>
                    <a href="<?php echo $register_url; ?>"><?php _e ('Register', 'fuse'); ?></a>
                </li>
            
            <?php endif; ?>
            
            <?php
                do_action ('fuse_base_after_user_bar_menu');
            ?>
            
        </ul>
        
        <?php
            do_action ('fuse_base_after_user_bar');
        ?>
        
    </div>
</nav>
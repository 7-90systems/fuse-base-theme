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
     *
     *  @filter fuse_base_profile_link_text
     *  @filter fuse_base_login_link_text
     *  @filter fuse_base_logout_link_text
     *  @filter fuse_base_register_link_text
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
        $profile_text = __ ('My Account', 'fuse');
    } // if ()
    else {
        // Use standard endpoints
        global $wp;
        
        $login_url = esc_url (wp_login_url (home_url (add_query_arg ($_GET, $wp->request))));
        $register_url = esc_url (wp_registration_url ());
        $profile_url = get_edit_profile_url (get_current_user_id ());
        $profile_text = __ ('My Profile', 'fuse');
    } // else
    
    $profile_text = apply_filters ('fuse_base_profile_link_text', $profile_text);
    $login_text = apply_filters ('fuse_base_login_link_text', __ ('Login', 'fuse'));
    $logout_text = apply_filters ('fuse_base_logout_link_text', __ ('Log Out', 'fuse'));
    $register_text = apply_filters ('fuse_base_register_link_text', __ ('Register', 'fuse'));
?>
<nav id="fuse-user-bar"<?php if (array_key_exists ('use_container', $args) && $args ['use_container'] === true) echo ' class="fuse-container"'; ?>>
    <div class="wrap">
        
        <?php
            do_action ('fuse_base_before_user_bar');
        ?>
        
        <ul class="user-bar-menu">
            
            <?php
                do_action ('fuse_base_before_user_bar_menu');
            ?>
            
            <?php
                if (function_exists ('WC')){
                    get_template_part ('templates/header/user-bar-cart');
                } // if ()
            ?>
            
            <?php if (is_user_logged_in ()): ?>
            
                <li class="profile">
                    <a href="<?php echo esc_url ($profile_url); ?>" title="<?php esc_attr_e ($profile_text); ?>">
                        <span class="show-l"><?php echo $profile_text; ?></span>
                        <span class="dashicons dashicons-admin-users hide-l"></span>
                    </a>
                </li>
                <li class="logout">
                    <a href="<?php echo esc_url (wp_logout_url (home_url ('/'))); ?>" title="<?php esc_attr_e ($logout_text); ?>">
                        <span class="show-l"><?php echo $logout_text; ?></span>
                        <span class="dashicons dashicons-exit hide-l"></span>
                    </a>
                </li>
            
            <?php else: ?>
            
                <li class="login">
                    <a href="<?php echo $login_url; ?>" title="<?php esc_attr_e ($login_text); ?>">
                        <span class="show-l"><?php echo $login_text; ?></span>
                        <span class="dashicons dashicons-lock hide-l"></span>
                    </a>
                </li>
                <li class="login register">
                    <a href="<?php echo $register_url; ?>" title="<?php esc_attr_e ($register_text); ?>">
                        <span class="show-l"><?php echo $register_text; ?></span>
                        <span class="dashicons dashicons-id-alt hide-l"></span>
                    </a>
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
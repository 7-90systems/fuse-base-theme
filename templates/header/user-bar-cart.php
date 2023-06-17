<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @filter fuse_base_header_cart_label
     *  @filter fuse_base_header_checkout_label
     */
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    $cart_items = WC ()->cart->get_cart_contents_count ();
    
    $cart_label = apply_filters ('fuse_base_header_cart_label', __ ('Shopping Cart', 'fuse'));
    $checkout_label = apply_filters ('fuse_base_header_checkout_label', __ ('Checkout', 'fuse'));
?>
<?php if (function_exists ('WC')): ?>

    <li class="cart">
        <a href="<?php echo esc_url (wc_get_cart_url ()); ?>" title="<?php esc_attr_e ($cart_label); ?>">
            <span class="show-l"><?php echo $cart_label; ?></span>
            <span class="dashicons dashicons-cart hide-l"></span>
            <span class="cart-items-display items-<?php echo $cart_items; ?>"><?php echo $cart_items; ?></span>
        </a>
    </li>
                
    <?php if ($cart_items > 0): ?>
    
        <li class="cart">
            <a href="<?php echo esc_url (wc_get_cart_url ()); ?>" title="<?php esc_attr_e ($checkout_label); ?>">
                <span class="show-l"><?php echo $checkout_label; ?></span>
                <span class="dashicons dashicons-migrate hide-l"></span>
            </a>
        </li>
                
    <?php endif; ?>
            
<?php endif; ?>
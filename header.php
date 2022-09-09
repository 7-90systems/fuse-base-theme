<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @action fuse_base_before_header
     *  @action fuse_base_start_header
     *  @action fuse_base_end_header
     *  @action fuse_base_after_header
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    $menu_bar_location = get_fuse_option ('fuse_base_header_menu_location', 'none');
    $user_bar_location = get_fuse_option ('fuse_base_header_user_bar_location', 'none');
?>
<!doctype html>
<html <?php language_attributes (); ?>>
<head>
	<meta charset="<?php bloginfo ('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head (); ?>
</head>

<body <?php body_class (); ?>>

<?php wp_body_open (); ?>

<div id="page" class="site">
    
	<a class="skip-link screen-reader-text" href="#content"><?php _e ('Skip to content', 'fuse'); ?></a>
    
    <?php
        do_action ('fuse_base_before_header');
        
        if ($user_bar_location == 'over_header') {
            get_template_part ('templates/header/user-bar');
        } // if ()
    ?>

	<header id="site-header">
        <div class="wrap">
            
            <?php
                do_action ('fuse_base_start_header');
                
                get_template_part ('templates/header/logo');
            
                if ($user_bar_location == 'in_header') {
                    get_template_part ('templates/header/user-bar');
                } // if ()
                
                if ($menu_bar_location == 'in_header') {
                    get_template_part ('templates/header/menu');
                } // if ()
                
                do_action ('fuse_base_end_header');
            ?>
    
        </div>
	</header><!-- #site-header -->
    
    <?php
        if ($user_bar_location == 'under_header') {
            get_template_part ('templates/header/user-bar');
        } // if ()
        
        if ($menu_bar_location == 'under_header') {
            get_template_part ('templates/header/menu');
        } // if ()
        
        do_action ('fuse_base_after_header');
    ?>

	<div id="content" class="site-content fuse-grid-container">
            <div class="wrap fuse-grid-col col-16">
<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
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

	<header id="site-header">
        <div class="wrap">
            Header...
        </div>
	</header><!-- #site-header -->

	<div id="content" class="site-content fuse-grid-container">
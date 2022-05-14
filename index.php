<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    fuse_get_header ();
    fuse_get_sidebar ('left');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
            if (have_posts ()) {
                while (have_posts ()) {
                    the_post ();
                    get_template_part ('templates/archive/content');
                } // while ()
                
                fuse_paging_nav ();
            } // if ()
            else {
                get_template_part ('templates/single/content', 'none');
            } // else
		?>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php
    fuse_get_sidebar ('right');
    fuse_get_footer ();
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
			while (have_posts ()) {
				the_post ();
				get_template_part ('templates/single/content', get_post_type ());

				if (comments_open () || get_comments_number ()) {
					comments_template ();
				} // if ()
            } // while ()
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
    fuse_get_sidebar ('right');
    fuse_get_footer ();
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

		<?php if (have_posts ()): ?>

			<h1 class="page-title">
				<?php _e ('Search results for: ', 'fuse'); ?>
				<span class="page-description"><?php echo get_search_query (); ?></span>
			</h1>

			<?php
                while (have_posts ()) {
                    the_post ();
                    get_template_part ('templates/search/content', get_post_type ());
                } // while ()
    
                fuse_paging_nav ();
            ?>
        
        <?php else: ?>
        
            <?php
                get_template_part ('templates/single/content', 'none');
            ?>
        
        <?php endif; ?>
        
	</main><!-- #main -->
</div><!-- #primary -->
<?php
    fuse_get_sidebar ('right');
    fuse_get_footer ();
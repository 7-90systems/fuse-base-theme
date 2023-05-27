<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  Template Name: Full-width page
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    fuse_get_header ();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
                
        <?php
            while (have_posts ()) {
                the_post ();
                get_template_part ('templates/single/content', 'page');
            } // while ()
        ?>
                
    </main><!-- #main -->
</div><!-- #primary -->
<?php
    fuse_get_footer ();
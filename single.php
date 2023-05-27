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
?>
<div id="fuse-bsae-single-content" class="fuse-container">
    <div class="wrap">
        
        <div class="fuse-grid-row">
                
            <?php
                fuse_get_sidebar ('left');
            ?>
            <div id="primary" class="content-area <?php echo fuse_base_get_primary_classes (); ?>">
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
            ?>
                
        </div>
        
    </div>
</div>
               
<?php
    fuse_get_footer ();
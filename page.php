<?php
    /**
     *  @package fuse-base-theme
     *
     *  @filter fuse_base_content_container_class
     *
     *  @version 1.0.0
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    fuse_get_header ();
?>
<div id="fuse-base-single-content" class="fuse-container">
    <div class="wrap">
        
        <div class="<?php echo apply_filters ('fuse_base_content_container_class', 'fuse-grid-row spaced'); ?>">
                
            <?php
                fuse_get_sidebar ('left');
            ?>
            <div id="primary" class="content-area <?php echo fuse_base_get_primary_classes (); ?>">
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
                fuse_get_sidebar ('right');
            ?>
                
        </div>
        
    </div>
</div>
<?php
    fuse_get_footer ();
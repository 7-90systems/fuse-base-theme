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
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
                
                    <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
                    
                    <p><?php _e ('It looks like nothing was found at this location. Maybe try a search?', 'fuse'); ?></p>
                    <?php
                        get_search_form ();
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
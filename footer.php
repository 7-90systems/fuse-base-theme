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
    </div><!-- #content -->
    
    <?php if (get_fuse_option ('fuse_base_footer_show_footer', 'yes') != 'no'): ?>
    
        <footer id="site-footer">
            <div class="wrap">
                Footer...
            </div>
        </footer><!-- #site-footer -->
    
    <?php endif; ?>
    
    <?php if (get_fuse_option ('fuse_base_footer_show_copyright', 'yes') != 'no'): ?>
        
        <footer id="site-copyright">
            <div class="wrap">
                <p class="copyright"><?php printf (__ ('&copy; Copyright %s %s.', 'fuse'), current_time ('Y'), get_bloginfo ('name')); ?></p>
                <p class="credits"><a href="https://fusecms.org"><?php _e ('Built using the Fuse CMS Framework', 'fuse'); ?></a></p>
            </div>
        </footer><!-- #site-copyright -->
    
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer (); ?>

</body>
</html>
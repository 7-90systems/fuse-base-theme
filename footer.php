<?php
    /**
     *  @package fuse-base-theme
     *
     *  @version 1.0.0
     *
     *  @filter fuse_base_footer_columns
     *  @filter fuse_base_before_footer_columns
     *  @filter fuse_base_after_footer_columns
     *  @filter fuse_base_before_footer_col_*NUM*
     *  @filter fuse_base_before_copyright
     *  @filter fuse_base_after_copyright
     *  @filter fuse_base_before_credits
     *  @filter fuse_base_after_credits
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
?>
    </div><!-- #content -->
    
    <?php if (get_fuse_option ('fuse_base_footer_show_footer', 'yes') != 'no'): ?>
    
        <footer id="site-footer">
            <div class="wrap">
                
                <?php
                    do_action ('fuse_base_before_footer_columns');
                ?>
                
                <?php for ($i = 0; $i < apply_filters ('fuse_base_footer_columns', 3); $i++) : ?>
                        
                    <ul class="footer-column footer-column-<?php echo $i + 1; ?>">
                        <?php
                            do_action ('fuse_base_before_footer_col_'.$i);
                            dynamic_sidebar ('footer_column_'.($i + 1));
                            do_action ('fuse_base_after_footer_col_'.$i);
                        ?>
                    </ul>
                
                <?php endfor; ?>
                
                <?php
                    do_action ('fuse_base_after_footer_columns');
                ?>
                
            </div>
        </footer><!-- #site-footer -->
    
    <?php endif; ?>
    
    <?php if (get_fuse_option ('fuse_base_footer_show_copyright', 'yes') != 'no'): ?>
        
        <footer id="site-copyright">
            <div class="wrap">
                
                <?php
                    do_action ('fuse_base_before_copyright');
                ?>
                <p class="copyright"><?php printf (__ ('&copy; Copyright %s %s.', 'fuse'), current_time ('Y'), get_bloginfo ('name')); ?></p>
                <?php
                    do_action ('fuse_base_after_copyright');
                    do_action ('fuse_base_before_credits');
                ?>
                <p class="credits"><a href="https://fusecms.org"><?php _e ('Built using the Fuse CMS Framework', 'fuse'); ?></a></p>
                <?php
                    do_action ('fuse_base_after_credits');
                ?>
                
            </div>
        </footer><!-- #site-copyright -->
    
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer (); ?>

</body>
</html>
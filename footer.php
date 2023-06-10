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
     *  @filter fuse_base_after_footer_col_*NUM*
     *  @filter fuse_base_before_copyright
     *  @filter fuse_base_after_copyright
     *  @filter fuse_base_before_credits
     *  @filter fuse_base_after_credits
     *
     *  @action fuse_base_before_footer
     *  @action fuse_base_after_footer
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    $footer_columns = get_fuse_option ('fuse_base_footer_columns', 4);
    $column_cells = 12 / $footer_columns;
    
    $copyright_text = get_fuse_option ('fuse_base_footer_copyright_text', '');
    $credits_text = get_fuse_option ('fuse_base_footer_credits_text', '');
    
    if (empty ($copyright_text)) {
        $copyright_text = sprintf (__ ('&copy; Copyright %s %s.', 'fuse'), current_time ('Y'), get_bloginfo ('name'));
    } // if ()
    else {
        $copyright_text = fuse_base_set_footer_text_vars ($copyright_text);
    } // else
    
    if (empty ($credits_text)) {
        $credits_text = '<a href="https://fusecms.org">'.__ ('Built using the Fuse CMS Framework', 'fuse').'</a>';
    } // if ()
    else {
        $credits_text = fuse_base_set_footer_text_vars ($credits_text);
    } // else
?>
        </div><!-- .wrap -->
    </div><!-- #content -->
    
    <?php
        do_action ('fuse_base_before_footer');
    ?>
    
    <?php if (get_fuse_option ('fuse_base_footer_show_footer', 'yes') != 'no' && $footer_columns > 0): ?>
    
        <footer id="site-footer" class="fuse-container">
            <div class="wrap fuse-grid-row spaced">
                
                <?php
                    do_action ('fuse_base_before_footer_columns');
                ?>
                
                <?php for ($i = 0; $i < $footer_columns; $i++) : ?>
                        
                    <ul class="footer-column footer-column-<?php echo $i + 1; ?> fuse-grid-cell no-padding fuse-grid-cell-m-<?php echo $column_cells ?>">
                        <?php
                            do_action ('fuse_base_before_footer_col_'.$i);
                            dynamic_sidebar ('footer_column_'.($i));
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
        
        <footer id="site-copyright" class="fuse-container">
            <div class="wrap">
                
                <?php
                    do_action ('fuse_base_before_copyright');
                ?>
                <p class="copyright"><?php echo $copyright_text; ?></p>
                <?php
                    do_action ('fuse_base_after_copyright');
                    do_action ('fuse_base_before_credits');
                ?>
                <p class="credits"><?php echo $credits_text; ?></p>
                <?php
                    do_action ('fuse_base_after_credits');
                ?>
                
            </div>
        </footer><!-- #site-copyright -->
    
    <?php endif; ?>
    
    <?php
        do_action ('fuse_base_after_footer');
    ?>

</div><!-- #page -->

<?php wp_footer (); ?>

</body>
</html>
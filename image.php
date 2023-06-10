<?php
    /**
     *  @package fuse-base-theme
     *
     *  @filter fuse_base_content_container_class
     *
     *  @version 1.0.0
     *
     *  @filter fuse_attachment_page_image_size
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    fuse_get_header ();
?>
<div id="fuse-base-single-content" class="fuse-container">
    <div class="wrap">
        
        <div class="<?php echo apply_filters ('fuse_base_content_container_class', 'fuse-grid-row'); ?>">
                
            <?php
                fuse_get_sidebar ('left');
            ?>
            <div id="primary" class="content-area <?php echo fuse_base_get_primary_classes (); ?>">
                <main id="main" class="site-main">
                
                    <?php while (have_posts ()): ?>
                        <?php
                            the_post ();
                        ?>
                        <article id="post-<?php the_ID (); ?>" <?php post_class (); ?>>
            
                            <h1 class="entry-title"><?php the_title (); ?></h1>
            
                            <div class="entry-content">
            
                                <figure class="entry-attachment wp-block-image">
                                    <?php
                                        echo wp_get_attachment_image (get_the_ID (), apply_filters ('fuse_attachment_page_image_size', 'full' ));
                                    ?>
                                    <figcaption class="wp-caption-text"><?php the_excerpt (); ?></figcaption>
                                </figure><!-- .entry-attachment -->
            
                                <?php
                                    the_content ();
                                        
                                    wp_link_pages (array (
                                        'before' => '<div class="page-links"><span class="page-links-title">'.__ ('Pages:', 'fuse').'</span>',
                                        'after' => '</div>',
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                        'pagelink' => '<span class="screen-reader-text">'.__ ('Page', 'fuse').' </span>%',
                                        'separator' => '<span class="screen-reader-text">, </span>'
                                    ));
                                ?>
                            </div><!-- .entry-content -->
            
                            <footer class="entry-footer">
                                <?php
                                    $metadata = wp_get_attachment_metadata ();
            
                                    if ($metadata) {
                                        printf (
                                            '<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
                                            _x ('Full size', 'Used before full size attachment link.', 'fuse'),
                                            esc_url (wp_get_attachment_url ()),
                                            absint ($metadata ['width']),
                                            absint ($metadata ['height'])
                                        );
                                    } // if ()
                                ?>
            
                            </footer><!-- .entry-footer -->
                            
                        </article><!-- #post-<?php the_ID (); ?> -->
            
                        <?php
                            the_post_navigation (array (
                                 'prev_text' => _x ('<span class="meta-nav">Published in</span><br><span class="post-title">%title</span>', 'Parent post link', 'fuse'),
                            ));
                
                            if (comments_open () || get_comments_number ()) {
                                comments_template ();
                            } // if ()
                        ?>
                        
                    <?php endwhile; ?>
                
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
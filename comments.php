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
<?php if (post_password_required () === false): ?>

    <div id="comments" class="comments-area">
    
        <?php if (have_comments ()): ?>
        
            <h2 class="comments-title">
                <?php
                    $comments_number = get_comments_number ();
                    
                    printf (
                        _nx (
                            '%1$s comment on &ldquo;%2$s&rdquo;',
                            '%1$s comments on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'fuse'
                        ),
                        number_format_i18n ($comments_number),
                        get_the_title ()
                    );
                ?>
            </h2>
    
            <ol class="comment-list">
                <?php
                    wp_list_comments (array (
                        'avatar_size' => 100,
                        'style' => 'ol',
                        'short_ping' => true,
                        'reply_text' => __ ('Reply', 'fuse')
                    ));
                ?>
            </ol>
    
            <?php
                fuse_comments_paging_nav ();
            ?>
        
        <?php  endif; ?>
        
        <?php if (!comments_open () && get_comments_number () && post_type_supports (get_post_type (), 'comments')): ?>
    
            <p class="no-comments"><?php _e ('Comments are closed.', 'fuse' ); ?></p>
        
        <?php endif; ?>
        
        <?php
            comment_form ();
        ?>
    
    </div><!-- #comments -->

<?php endif; ?>
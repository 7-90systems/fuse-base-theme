<?php
    /**
     *  @package fuse-bsae-theme
     *
     *  @version 1.0.0
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
?>
<section class="no-results not-found">
	
    <h1 class="page-title"><?php _e ('Nothing Found', 'fuse'); ?></h1>

	<?php if (is_home () && current_user_can ('publish_posts')): ?>
        <p><?php
			printf (
				wp_kses (
					__ ('Ready to create your masterpiece? <a href="%s">Let&rsquo;s get started here</a>.', 'fuse'),
					array(
						'a' => array (
							'href' => array ()
						)
					)
				),
				esc_url (admin_url ('post-new.php'))
			);
        ?></p>
        
    <?php elseif (is_search ()) : ?>

		<p><?php _e ('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fuse'); ?></p>
		<?php
			get_search_form ();
        ?>
        
    <?php else: ?>

		<p><?php _e ('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fuse'); ?></p>
		<?php
			get_search_form ();
        ?>
    
    <?php endif; ?>
        
</section><!-- .no-results -->
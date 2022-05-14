<?php
    /**
     *  @package fuse-bse-theme
     *
     *  @version 1.0.0
     */
    
    if (!defined ('ABSPATH')) {
        die ();
    } // if ()
    
    $link = esc_url (get_permalink ());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class (); ?>>
	
    <h2 class="entry-title"><a href="<?php echo $link; ?>" rel="bookmark"><?php the_title (); ?></a></h2>

	<?php
        the_excerpt ();
    ?>

</article><!-- #post-<?php the_ID (); ?> -->
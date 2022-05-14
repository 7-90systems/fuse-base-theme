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
<article id="post-<?php the_ID (); ?>" <?php post_class (); ?>

	<h1 class="entry-title"><?php the_title (); ?></h1>

	<?php
		the_content ();
    ?>

</article><!-- #post-<?php the_ID (); ?> -->
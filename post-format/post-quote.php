<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage waxo
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <!-- Article Start -->
<div class="blog-list-box blog-quote mb-30">
	<div class="blog-content">
		<div class="blog-content-body">
			<p class="mb-0"><?php echo get_the_content_feed(); ?></p>	
		</div>
	</div>
</div>
</article>
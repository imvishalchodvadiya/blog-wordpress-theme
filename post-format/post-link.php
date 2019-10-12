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
	<div class="blog-list-box mb-30 blog-link text-center">
		<div class="blog-content ">
			<div class="blog-content-head">
				<div class="row">
					<div class="col-sm-12">
						<div class="blog-content-date">
							<p><?php echo esc_html(get_the_date()); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="blog-content-body">
				<h2 class="blog-title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a></h2>
			</div>
		</div>
		<div class="blog-footer">
			<div class="row">
				<div class="col-sm-12">
					<p class="mb-0 blog-views text-center"><span class="text-dim"><i class="mdi mdi-link"></i></span></p>
				</div>
			</div>
		</div>
	</div>
</article> <!-- Article End -->
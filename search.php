<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage waxo
 * @since waxo 1.0
 */
global $waxo;
get_header(); ?>

<?php if ( have_posts() ) { ?>
<section class="content-section">
	<div class="container"> <!-- Container Start -->
		<div class="row"> <!-- Row Start -->
				<?php  if (isset($waxo['blog-layout'])) {
						$sidebar_position = $waxo['blog-layout'];
					} else {
						$sidebar_position = '';
					} ?>
				<?php if ($sidebar_position == 'left-sidebar') { ?>
					<div class="col-lg-4">
						<div class="page-sidebar">
							<?php if( is_active_sidebar('sidebar') ) { 
								dynamic_sidebar('sidebar'); 
							} ?>
						</div>
					</div>
					<div class="col-lg-8">
					<?php } elseif ($sidebar_position == 'right-sidebar') { ?>
						<div class="col-lg-8">
					<?php } else { ?>
						<div class="col-lg-12">
					<?php } ?>
					<!-- Display Author Blog -->
							<div class="page-main">
								<div class="page-detail-content">
									<?php while ( have_posts() ) : the_post();
										require get_parent_theme_file_path( 'post-format/post-search.php' );
									endwhile; ?>
								</div>
								<?php if (function_exists('waxo_numeric_posts_nav')) {
									waxo_numeric_posts_nav();
								} ?>

							</div>
						</div>
					<?php if ($sidebar_position == 'right-sidebar') { ?>
						<div class="col-lg-4">
							<div class="page-sidebar">
								<?php if( is_active_sidebar('sidebar') ) { 
									dynamic_sidebar('sidebar'); 
								} ?>
							</div>
						</div>
					<?php } ?>

		</div>	<!-- Row Start -->
	</div> <!-- Container Start -->
</section><!-- #primary -->

<?php } else {
    require get_parent_theme_file_path( 'post-format/post-none.php' );
} ?>
<?php get_footer(); ?>
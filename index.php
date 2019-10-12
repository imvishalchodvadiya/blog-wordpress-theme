<?php global $waxo; ?>
<?php get_header(); ?>

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
						<?php	while ( have_posts() ) : the_post();
						if (has_post_format('aside')) { 
							require get_parent_theme_file_path( 'post-format/post-aside.php' );
						} elseif(has_post_format('audio')) {
							require get_parent_theme_file_path( 'post-format/post-audio.php' );
						} elseif(has_post_format('chat')) {
							require get_parent_theme_file_path( 'post-format/post-chat.php' );
						} elseif(has_post_format('gallery')) {	
							require get_parent_theme_file_path( 'post-format/post-gallery.php' );
						} elseif(has_post_format('image')) {	
							require get_parent_theme_file_path( 'post-format/post-image.php' );
						} elseif(has_post_format('link')) {	
							require get_parent_theme_file_path( 'post-format/post-link.php' );
						} elseif(has_post_format('quote')) {	
							require get_parent_theme_file_path( 'post-format/post-quote.php' );
						} elseif(has_post_format('status')) {
							require get_parent_theme_file_path( 'post-format/post-status.php' );
						} elseif(has_post_format('video')) {
							require get_parent_theme_file_path( 'post-format/post-video.php' );
						} else {
							require get_parent_theme_file_path( 'post-format/post-standard.php' );
						}
						endwhile; ?>
						
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
</section>

<?php } else {
    require get_parent_theme_file_path( 'post-format/post-none.php' );
} ?>
<?php get_footer(); ?>
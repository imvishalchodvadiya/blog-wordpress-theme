<?php /* Template Name: Home Template */ ?>
<?php global $waxo; ?>
<?php get_header(); ?>
<section class="slider-section">
	<?php
		$the_query = new WP_Query( array(
		'post_type' =>'post',
		'posts_per_page' => 40,
		'order'=> 'ASC',
		'orderby' => 'title',
		'category_name' => 'banner'
		));
	?>
	<?php if ( $the_query->have_posts() ) : ?>
		<div class="home-main-slider owl-carousel owl-theme">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="item">
				<?php if ( has_post_thumbnail() ) { ?>
						<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" class="img-fluid" alt="<?php echo esc_attr(the_title()); ?>">
				<?php } ?>
					<div class="slide-content">
						<div class="blog-content-cate">
							<ul class="list-inline">
								<?php $categories = get_the_category();								
								foreach ($categories as $categorie) {
									 $category_id = $categorie->cat_ID;  ?>
									<li class="list-inline-item"><a href="<?php echo esc_url(get_category_link( $category_id )); ?>" class="btn-gradient-cate-info"><?php echo $categorie->name; ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<h2 class="blog-title mb-20"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a></h2>
                        <p class="mb-0 blog-author">Written by : <strong><?php echo esc_html(the_author_posts_link()); ?></strong></p>
                    </div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</section>

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
							<?php
								$paged = (get_query_var('page')) ? get_query_var('page') : 1;
								$args = array('posts_per_page' => 10, 'paged' => $paged );
								query_posts($args); ?>
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

<?php /* Template Name: Home Portfolio */ ?>
<?php global $waxo; ?>
<?php get_header(); ?>

<?php $portfolio_title = '';
	if (isset( $waxo['portfolio_title'])) { 
		$portfolio_title = $waxo['portfolio_title'];
	} 
if ($portfolio_title != '') { ?>
<section class="home-height">
	<div class="home-center">
		<div class="home-desc-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="home-title text-center">
							<h2><?php echo $portfolio_title; ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php }	?>


<?php if ( have_posts() ) { ?>		
<section class="content-section"> <!-- Primary Div Start -->
	<div class="container"> <!-- Container Start -->
	<div class="page-main">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-detail-head text-center">
					<div class="page-title">
						<h1><?php echo esc_html('Portfolio', 'waxo'); ?></h1>
					</div>						
				</div>
				<div class="portfolio-filter-box">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="port-filter">  
								<ul class="list-inline mb-0">
								  <li class="list-inline-item"><a class="filter-item current" data-filter="*"><?php echo esc_html__('All','waxo'); ?></a></li>
								    <?php 
		                            	$terms = get_categories('taxonomy=portfolio_category&type=portfolio');
									    foreach($terms as $term) { 
										$portfolio_cate = str_replace(" ","-",$term->name); ?>	
										<li class="list-inline-item"><a class="filter-item" data-filter=".<?php echo esc_attr($portfolio_cate); ?>"><?php echo esc_html($term->name); ?></a></li>
									    <?php }
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Display Portfolio -->
		<div class="portfolio-item-box">
			<div class="grid row">
				<?php  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$args = array('post_type' => 'portfolio', 'posts_per_page' => 9, 'paged' => $paged );
					query_posts($args); 
				?>
				<?php while ( have_posts() ) : the_post(); ?>
				  <div class="grid-item col-sm-6 col-md-4 <?php 
						$terms = get_the_terms( $post->ID, 'portfolio_category' ); 
						foreach($terms as $term) {
						  echo str_replace(" ","-",$term->name);
						  echo esc_html__(' ','waxo');
						}
					?>">
				  	<figure class="grid-effect">
				  		<?php if ( has_post_thumbnail() ) { ?>
							<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php echo esc_html(the_title()); ?>"/>
						<?php } ?>
						<figcaption>
							<h5><?php echo esc_html(the_title()); ?></h5>
							<a href="<?php echo esc_url(the_permalink()); ?>">View more</a>
						</figcaption>			
					</figure>
				  </div>
				<?php endwhile; ?>  
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php if (function_exists('waxo_numeric_posts_nav')) {
						waxo_numeric_posts_nav();
				} ?>
			</div>
		</div>		
	</div> <!-- Container Start -->
	</div> <!-- Container Start -->
</section><!-- #primary -->
<?php } else {
    require get_parent_theme_file_path( 'post-format/post-none.php' );
} ?>

<?php get_footer(); ?>
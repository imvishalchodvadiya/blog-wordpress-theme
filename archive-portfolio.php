<?php
/**
 * The template for displaying archive portfolio
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage waxo
 * @since waxo 1.0
 */

global $waxo;
get_header(); ?>
<?php if ( have_posts() ) { ?>
<!-- Start Portfolio -->
<section class="content-section">
	<div class="container">
		<div class="page-main">
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
			<div class="portfolio-item-box">
				<div class="grid row">
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
		</div>	
	</div>
</section>
<?php } else {
    require get_parent_theme_file_path( 'post-format/post-none.php' );
} ?>
<?php get_footer(); ?>
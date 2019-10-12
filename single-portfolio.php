<?php
/**
 * The template for displaying archive pages
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
<!-- Start Page Content -->
<section class="content-section">
	<div class="container">
		<div class="page-main">	
			<?php while ( have_posts() ) : the_post(); ?>				
				<div class="page-detail-head text-center">
					<div class="portfolio-title">
						<h1><?php echo esc_attr(the_title()); ?></h1>
					</div>
					<div class="portfolio-meta">
						<ul class="list-inline mb-0">
	                        <li class="list-inline-item"><span class="text-dim"><i class="mdi mdi-account"></i> Creator :</span> <?php echo esc_html(the_author_posts_link()); ?></li>
	                        <li class="list-inline-item"><span class="text-dim"><i class="mdi mdi-calendar-range"></i> Date :</span> <?php echo esc_html(get_the_date()); ?></li>
	                        <li class="list-inline-item"><span class="text-dim"><i class="mdi mdi-poll"></i> Category :</span> <?php
								$terms = get_the_terms( $post->ID, 'portfolio_category' ); 
								foreach($terms as $term) { 
								 echo esc_attr($term->name); ?><span class="port-det-cate"><?php echo esc_html__(',','waxo'); ?></span>
								<?php } ?>
						    </li>
	                        <li class="list-inline-item"><span class="text-dim"><i class="mdi mdi-account-outline"></i> Client :</span> <?php $port_client = 'port_client';
	                        $clientname = get_post_meta( get_the_id() ,$port_client, true );
	                        echo esc_html($clientname); ?></li>
	                    </ul>
					</div>
				</div>
				<div class="portfolio-detail-content">
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="port-featured-img">
							<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php echo esc_attr(the_title()); ?>">
						</div>
					<?php } ?>
					<div class="port-desc">
						<div class="row">
							<div class="col-lg-12">
								<p><?php echo get_the_content_feed(); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
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
<!-- End Page Content -->
<?php } else {
    require get_parent_theme_file_path( 'content/content-none.php' );
} ?>
<?php get_footer(); ?>
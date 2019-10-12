<?php
/**
 * Template Name: Single Blog Template
 *
 * @package WordPress
 * @subpackage waxo
 * @since waxo 1.0.0
 */
?>
<?php global $waxo; ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="content-section"> <!-- Blog Section Start -->
    <div class="container"> <!-- Blog Section Container Start -->
        <div class="row"> <!-- Blog Section Row Start -->
           <?php  if (isset($waxo['blog-layout'])) {
				$sidebar_position = $waxo['blog-layout'];
			} else {
				$sidebar_position = '';
			} ?>
			<?php if ($sidebar_position == 'left-sidebar') { ?>
				<div class="col-lg-4">
					<div class="sidebar">
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
				<div class="page-main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					<div class="blog-details-box <?php if (is_sticky()) { ?> sticky <?php } ?> mb-30">
						<!-- Blog Featured Image Start -->
						<?php if (has_post_format('audio')) {
					    	$audio_link = 'audio_link';
					       	$audio_link_text = get_post_meta( get_the_id() ,$audio_link, true ); 
							if  (! empty($audio_link_text) ) { ?>
								<div class="blog-head">
						            <div class="embed-responsive embed-responsive-21by9">
										<iframe width="560" height="315" src="<?php echo esc_url($audio_link_text); ?>" frameborder="0" allowfullscreen=""></iframe>
									</div>
								</div>
							<?php } 
						} elseif (has_post_format('video')) {
								$video_link = 'video_link';
					            $video_link_text = get_post_meta( get_the_id() ,$video_link, true ); 
					            $video_link_text = str_replace('watch?v=','embed/',$video_link_text);
							if  (! empty($video_link_text) ) { ?>
								<div class="blog-head">
					               <div class="embed-responsive embed-responsive-16by9">
										<iframe width="560" height="315" src="<?php echo esc_url($video_link_text); ?>" frameborder="0" allowfullscreen=""></iframe>
									</div>
								</div>
							<?php }
						} else {
							if ( has_post_thumbnail() ) { ?>
								<div class="blog-head">
									<img src="<?php echo esc_url(the_post_thumbnail_url('full')); ?>" class="img-fluid" alt="<?php echo esc_attr(the_title()); ?>">
								</div>
							<?php }
						} ?>
						<!-- Blog Featured Image End -->	
						<div class="blog-content">
							<div class="blog-content-head">
								<div class="row">
									<div class="col-sm-7">
										<div class="blog-content-cate">
											<ul class="list-inline">
												<?php $categories = get_the_category();								
												foreach ($categories as $categorie) {
													 $category_id = $categorie->cat_ID;  ?>
													<li class="list-inline-item"><a href="<?php echo esc_url(get_category_link( $category_id )); ?>" class="btn-gradient-cate-info"><?php echo $categorie->name; ?></a></li>
												<?php } ?>	
											</ul>
										</div>
									</div>
									<div class="col-sm-5">
										<div class="blog-content-date">
											<p><?php echo esc_html(get_the_date()); ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="blog-content-body">
								<div class="row">
									<div class="col-sm-12">
										<h2 class="blog-title mb-20"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html(the_title()); ?></a></h2>
										<?php echo get_the_content_feed(); ?>	
										<?php $args_pages = array(
											'before' => '<div class="pagination justify-content-center">',
											'after' => '</div>',
											'link_before' => '<span>',
											'link_after' => '</span>',
											'pagelink' => '%'
										);
										wp_link_pages($args_pages);	?>	
									</div>
								</div>																	
							</div>
							<div class="blog-content-footer">
								<div class="row">
									<div class="col-sm-5">
										<div class="blog-content-tags tagcloud">
											<p class="text-dim"><?php echo esc_html__('Tags : ','waxo'); ?></p>
											<?php echo the_tags('', ''); ?>											
										</div>
									</div>
									<div class="col-sm-7">
										<div class="blog-content-social">
											<?php require get_parent_theme_file_path('framework/config-share.php'); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-footer">
							<div class="row">
								<div class="col-sm-4">
									<p class="mb-0 blog-author"><span class="text-dim"><i class="mdi mdi-account"></i> <?php echo esc_html__('Author : ','waxo'); ?></span><?php echo esc_html(the_author_posts_link()); ?></p>
								</div>
								<div class="col-sm-4">
									<p class="mb-0 blog-views"><span class="text-dim"><i class="mdi mdi-eye"></i> <?php echo esc_html__('Views : ','waxo'); ?> </span><?php waxo_set_post_view_count(get_the_ID()); echo waxo_get_post_view_count(get_the_ID()); ?></p>
								</div>
								<div class="col-sm-4">
									<p class="mb-0 blog-comment"><span class="text-dim"><i class="mdi mdi-comment-processing"></i> <?php echo esc_html__('Comments : ','waxo'); ?> </span><?php echo esc_html(get_comments_number()); ?></p>
								</div>
							</div>
						</div>								
					</div>			
                </article> <!-- Row End -->
				
				<!-- Blog comments Start -->

					<?php comments_template(); ?>

			</div>
				<!-- Blog comments End -->
			</div> <!-- Conditional Div End -->
			<?php if ($sidebar_position == 'right-sidebar') { ?>
				<div class="col-lg-4">
					<div class="page-sidebar">
						<?php if( is_active_sidebar('sidebar') ) { 
							dynamic_sidebar('sidebar'); 
						} ?>
					</div>
				</div>
			<?php } ?>
        </div> <!-- Blog Section Row End -->
    </div> <!-- Blog Section Container End -->
</section> <!-- Blog Section End -->
<?php endwhile; ?> 
<?php get_footer(); ?>
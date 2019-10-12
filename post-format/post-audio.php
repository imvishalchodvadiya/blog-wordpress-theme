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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- Article Start -->
	<div class="blog-list-box mb-30">
		<!-- Blog Audio Start -->
		<?php	$audio_link = 'audio_link';
            	$audio_link_text = get_post_meta( get_the_id() ,$audio_link, true ); 
		if  (! empty($audio_link_text) ) { ?>
		<div class="blog-head">
		    <div class="embed-responsive embed-responsive-21by9">
				<iframe width="560" height="315" src="<?php echo esc_url($audio_link_text); ?>"></iframe>
			</div>
		</div>
		<?php } ?>
		<!-- Blog Audio End -->
		<!-- Blog Content Start -->
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
						<p class="blog-desc mb-30"><?php echo get_the_excerpt(); ?></p>
					</div>
				</div>
			</div>
			<div class="blog-content-footer">
				<div class="row">
					<div class="col-sm-5">
						<div class="blog-content-read-more">
							<a href="<?php echo esc_url(the_permalink()); ?>"><?php echo esc_html__('Read More...','waxo'); ?></a>
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
		<!-- Blog Content End -->
		<!-- Blog Footer Start -->
		<div class="blog-footer">
			<div class="row">
				<div class="col-sm-4">
					<p class="mb-0 blog-author"><span class="text-dim"><i class="mdi mdi-account"></i> <?php echo esc_html__('Author : ','waxo'); ?> </span><?php echo esc_html(the_author_posts_link()); ?></p>
				</div>
				<div class="col-sm-4">
					<p class="mb-0 blog-views"><span class="text-dim"><i class="mdi mdi-eye"></i> <?php echo esc_html__('Views : ','waxo'); ?> </span><?php echo waxo_get_post_view_count(get_the_ID()); ?></p>
				</div>
				<div class="col-sm-4">
					<p class="mb-0 blog-comment"><span class="text-dim"><i class="mdi mdi-comment-processing"></i> <?php echo esc_html__('Comments : ','waxo'); ?> </span><?php echo esc_html(get_comments_number()); ?></p>
				</div>
			</div>
		</div>
		<!-- Blog Footer End -->
	</div>
</article><!-- Article End -->
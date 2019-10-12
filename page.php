<?php get_header();//call header.php
while ( have_posts() ) : the_post();
	?>
<section class="content-section">
	<div class="container">
		<div class="page-main">	
			<div class="page-detail-head text-center">
				<div class="page-title">
					<h1><?php echo esc_html(the_title()); ?></h1>
				</div>						
			</div>
			<div class="page-detail-content">
				<?php echo get_the_content_feed();  ?>	
			</div>
				<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
		</div><!-- page-main -->
	</div><!-- container -->
</section><!-- section -->
	<?php
endwhile;
get_footer(); ?>
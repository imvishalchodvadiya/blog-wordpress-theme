<?php if ( get_post_type() == 'post' ) {  
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
} else { ?>
	
		<div class="search-box">
			<div class="search-contain">
				<header class="entry-header">
					<?php the_title( sprintf( '<h3 class="blog-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			</div>
		</div>	
<?php }
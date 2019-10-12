<?php function waxo_get_user_role($id)
{
$user = new WP_User($id);
return array_shift($user->roles);
}

function waxo_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
    
	if ( 'div' == $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-wrap">
	<?php endif; ?>
	<div class="media">
			<?php if ($args['avatar_size'] != 0) { 
				$argss = array( 'class' => 'd-flex mr-3 rounded-circle');
				echo get_avatar( $comment, 52, $defaults='', $alt='', $argss ); 
			} ?>
		<div class="media-body">			
			<?php printf('<h4 class="media-heading">%s</h4>', get_comment_author_link()); ?><?php edit_comment_link(esc_html__('(Edit)', 'waxo'),'  ','' );?>
			<p class="post-date"><?php printf( esc_html__('%1$s at %2$s', 'waxo'), get_comment_date(),  get_comment_time()) ?></p>
			<?php comment_text() ?>
			<?php comment_reply_link(array_merge( $args, array(
				'add_below'   => $add_below,
				'depth'       => $depth,
				'reply_text'  => '<i class="mdi mdi-reply mr5"></i> Reply',
				'max_depth'   => $args['max_depth']
				))) ?>			
		</div>
		<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'waxo') ?></em>
		<br />
		<?php endif; ?>

	</div>
	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }
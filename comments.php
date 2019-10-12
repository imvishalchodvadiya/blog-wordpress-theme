<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package waxo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>
<div class="comment-box mb-30">
<div id="comments" class="comments">

<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'waxo' ); ?></p>
			
<?php
		return;
	endif;
?>
    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
       <div>
            <h4 class="comment-title"><span><?php
                printf( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'waxo' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?></span></h4>
        </div>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'waxo' ); ?></h1>
            <div class="clearfix">
                <p class="nav-previous pull-left"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'waxo' ) ); ?></p>
                <p class="nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'waxo' ) ); ?></p>
            </div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <ol class="media-list list-unstyled">
            <?php wp_list_comments('type=all&callback=waxo_comments'); ?>
        </ol><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'waxo' ); ?></h1>
            <div class="clearfix">
                <p class="nav-previous pull-left"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'waxo' ) ); ?></p>
                <p class="nav-next pull-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'waxo' ) ); ?></p>
            </div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() ) :
    ?>
        <div class="no-comments alert alert-success" role="alert">
            <?php esc_html_e( 'Comments are closed.', 'waxo' ); ?>
        </div>
    <?php endif; ?>
     <?php
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $comments_args = array(
            'id_form'              => esc_html__('commentform','waxo'),
            'id_submit'            => esc_html__('submit','waxo'),
            'title_reply'          => '<span>Leave A Comment</span>',
            'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'waxo' ),
            'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'waxo' ),
            'label_submit'         => esc_html__( 'Post Comment', 'waxo' ),
            'class_submit'      => esc_html__( 'btn btn-dark', 'waxo' ),
            'class_form'      => esc_html__( 'mt-4', 'waxo' ),
            'comment_field'        =>  '<div class="comment-form-comment form-group"><textarea id="comment" name="comment" cols="45" rows="5" class="form-control" aria-required="true"  placeholder="Your Comment...">' .
            '</textarea></div>',

            'comment_notes_before' => esc_html__('','waxo'),
			'comment_notes_after' => esc_html__('','waxo'),

            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' =>                    
                    '<div class="comment-form-author form-group">
                    <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' placeholder="Your Username..." /></div>' 
                    ,
                'email' =>
                    '<div class="comment-form-email form-group">
                    <input id="email" name="email" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' placeholder="Your Email..." /></div>' ,
                  'url' =>
                    '<div class="comment-form-url form-group"><input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" placeholder="Your Website..." /></div>',
                )
            ),
        );
        comment_form($comments_args);
    ?>
  </div>
</div><!-- #comments -->
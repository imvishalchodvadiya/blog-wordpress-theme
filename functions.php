<?php

load_theme_textdomain( 'waxo', get_template_directory() . '/languages' );
require get_parent_theme_file_path('framework/init.php');
require get_parent_theme_file_path('framework/config-theme-support.php');
require get_parent_theme_file_path('framework/config-demo-data.php');
require get_parent_theme_file_path('framework/config-metabox.php');
require get_parent_theme_file_path('framework/config-redux-setting.php');
require get_parent_theme_file_path('framework/config-theme-option.php');
require get_parent_theme_file_path('include/config-breadcrumb.php');
require get_parent_theme_file_path('include/config-comment.php');
require get_parent_theme_file_path('include/config-css-js.php');
require get_parent_theme_file_path('include/config-dynamic-css.php');
require get_parent_theme_file_path('include/config-menu.php');
require get_parent_theme_file_path('include/config-pagination.php');
require get_parent_theme_file_path('include/config-title.php');
require get_parent_theme_file_path('include/config-widget.php');
require get_parent_theme_file_path('include/template-tags.php');

function waxo_scripts() {

	$waxo_l10n = array(
		'quote'          => '',
	);
	wp_localize_script( 'waxo-skip-link-focus-fix', 'waxoScreenReaderText', $waxo_l10n );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'waxo_scripts' );

// function to display number of posts.
function waxo_get_post_view_count($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function waxo_set_post_view_count($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
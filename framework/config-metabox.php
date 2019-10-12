<?php 
/* Start Post meta box */
function waxo_post_content_metabox(){
	$screen = 'post';
	add_meta_box('my-meta-box-id','Content Details','waxo_post_displayeditor',$screen,'normal','high');
}
add_action( 'add_meta_boxes', 'waxo_post_content_metabox' ) ;

function waxo_post_content_save_metabox() {	
	global $post;
	if(isset($_POST["audio_link"])){
		$audio_link = $_POST['audio_link'];
		update_post_meta(  $post->ID, 'audio_link', $audio_link);
	}
	if(isset($_POST["video_link"])){
		$video_link = $_POST['video_link'];
		update_post_meta(  $post->ID, 'video_link', $video_link);
	}
}
add_action('save_post','waxo_post_content_save_metabox');


function waxo_post_displayeditor($post) {
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
	global $wbdb;
	$audio_link = 'audio_link';
	$video_link = 'video_link';
	$audio_link_text = get_post_meta( $post->ID,$audio_link, true );  
	$video_link_text = get_post_meta( $post->ID,$video_link, true );  
?>

	 <p><label for="my_meta_box_text"><?php echo esc_html('Enter Audio Links :  ','waxo'); ?></label>
		<input type="text" name="audio_link" id="audio_link" size="100" value="<?php echo esc_attr($audio_link_text); ?>" /></p>
	 <p><label for="my_meta_box_text"><?php echo esc_html('Enter Video Links :  ','waxo'); ?></label>   <input type="text" name="video_link" id="video_link" size="100" value="<?php echo esc_attr($video_link_text); ?>" /></p>
	   <?php        
}
/* End Post meta box */

/* Start Portfolio Metabox */
function waxo_portfolio_metabox(){
	$screen = 'portfolio';
	add_meta_box('my-meta-box-id','Portfolio Details','waxo_portfolio_displayeditor',$screen,'normal','high');
}
add_action( 'add_meta_boxes', 'waxo_portfolio_metabox' ) ;

function waxo_portfolio_save_metabox() {	
	global $post;
	if(isset($_POST["port_client"])){
		$port_client = $_POST['port_client'];
		update_post_meta(  $post->ID, 'port_client', $port_client);
	}
}
add_action('save_post','waxo_portfolio_save_metabox');


function waxo_portfolio_displayeditor($post) {
	wp_nonce_field(basename(__FILE__), "meta-box-nonce");
	global $wbdb;
	$port_client = 'port_client';
	$port_client_text = get_post_meta( $post->ID,$port_client, true );    
?>
	 <p><label for="my_meta_box_text"><?php echo esc_html('Client Name :  ','waxo'); ?></label>
		<input type="text" name="port_client" id="port_client" size="100" value="<?php echo esc_attr($port_client_text); ?>" /></p>
<?php        
}
/* End Portfolio box */
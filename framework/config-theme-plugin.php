<?php 
/**
 * Register the required plugins for this theme.
 * 
 * @since 1.0.0
 * @author tommusrhodus
 */
if(!( function_exists('waxo_register_required_plugins') )){
	function waxo_register_required_plugins() {
		$plugins = array(			
			array(
				'name'     				=> esc_html__('Contact Form 7','waxo'),
				'slug'     				=> esc_html__('contact-form-7','waxo'),
				'required' 				=> false,
			),
                        array(
				'name'     				=> esc_html__('MailChimp for WordPress','waxo'),
				'slug'     				=> esc_html__('mailchimp-for-wp','waxo'),
				'required' 				=> false,
			),
			array(
                'name' 					=> esc_html__('Redux Framework','waxo'),
                'slug' 					=> esc_html__('redux-framework','waxo'),
                'required' 				=> false,
            ),
			array(
                'name' 					=> esc_html__('One Click Demo Import','waxo'),
                'slug' 					=> esc_html__('one-click-demo-import','waxo'),
                'required' 				=> false,
            ),
			array(
				'name'     				=> esc_html__('waxo Extension','waxo'),
				'slug'     				=> esc_html__('waxo-extension','waxo'),
				'source'   				=> 'waxo-extension.zip',
				'required' 				=> false,
				'external_url' 			=> '',
			),          
		);
		$config = array(
			'default_path' => get_template_directory_uri() . '/framework/plugins/',
			'is_automatic' => true,
		);
		tgmpa( $plugins, $config );
	}
	add_action( 'tgmpa_register', 'waxo_register_required_plugins' );
}
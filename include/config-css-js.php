<?php
function waxo_js_css() {

    // Load CSS File
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animate.css');
	wp_enqueue_style('materialdesignicons',get_template_directory_uri().'/assets/css/materialdesignicons.min.css');
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme-default',get_template_directory_uri().'/assets/css/owl.theme.default.min.css');

    // Load JS File
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '',true);	
    wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), '',true);
    wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '',true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '',true);	
    wp_enqueue_script('skip_link_focus_fix',get_template_directory_uri().'/assets/js/skip-link-focus-fix.js',array(),'',true);

}
add_action('wp_enqueue_scripts', 'waxo_js_css');
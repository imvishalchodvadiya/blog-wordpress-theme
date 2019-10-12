<?php
global $waxo;
?>
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage waxo
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Blog & Portfolio WordPress Themes" />
	<meta name="keywords" content="Blog, Portfolio, Bootstrap, Responsive, Creative, Travels, Photography, Personal, Modern" />
	<meta name="author" content="Websboostersolutions" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
    	<?php $favicon = '';
            if (isset( $waxo['favicon_logo'])) {
            $favicon = $waxo['favicon_logo']['url']; ?>
            <link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>">
        <?php } else { ?>
        <link rel="shortcut icon" href="<?php $logo_favicon_url = get_template_directory_uri() . '/assets/images/favicon.ico'; echo esc_url($logo_favicon_url); ?>">
        <?php } ?>
    <?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<!-- Start Sidebar Menu --> 
		<div id="menu-content" class="menu-overlay">
		  <a href="javascript:void(0)" id="menu-close-btn" class="close-btn"><i class="mdi mdi-close"></i></a>
		  <div class="menu-overlay-content">
		  	<div class="container">
				<?php if (has_nav_menu('primary')) { ?>
					<div id="fullwidthmenu">
						<?php wp_nav_menu( array( 
							'theme_location' => 'primary',
							'depth' => '5',
						) ); 
						?>
					</div>
				<?php } ?>
			</div>
		  </div>
		</div>

		<!-- Start Sidebar Search --> 
		<div id="search-content" class="search-overlay">
		  <a href="javascript:void(0)" id="search-close-btn" class="close-btn"><i class="mdi mdi-close"></i></a>
		  <div class="search-overlay-content">
		  	<div class="container">
				<?php echo get_search_form(); ?>
			</div>
		  </div>
		</div>
		
	<!-- Start Header -->
	<header class="header">			
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="topbar-left">
								<ul class="list-inline mb-0">
								    <?php 	$email_id = '';
											if (isset( $waxo['email_id'])) {
												$email_id = $waxo['email_id'];
											} else {
												$email_id = 'websbooster@gmail.com';
											}
									?>
									<li class="list-inline-item"><a href="mailto:<?php echo esc_attr($email_id); ?>" class="contact-list-item text-dim"><i class="mdi mdi-email"></i><?php echo esc_attr($email_id); ?></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="topbar-right">
								<ul class="list-inline mb-0">
									<?php 	$phone_no = '';
											if (isset( $waxo['phone_no'])) {
												$phone_no = $waxo['phone_no'];
											} else {
												$phone_no = '+01 9876543210';
											}
									?>
									<li class="list-inline-item"><a href="tel:<?php echo esc_attr($phone_no); ?>" class="contact-list-item text-dim"><i class="mdi mdi-phone"></i><?php echo esc_attr($phone_no); ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="headerbar">
				<div class="container">
					<div class="row">
						<div class="col-3 col-md-3">
							<div class="menubar">
								<a id="menu-open-btn" class="btn-header">
									<i class="mdi mdi-menu"></i>
								</a>
							</div>
						</div>
						<div class="col-6 col-md-6">
							<div class="logobar text-center">
								<a href="<?php echo esc_url(get_site_url()); ?>">
								<?php $logo = '';
									if (isset( $waxo['header_logo'])) {
									$logo = $waxo['header_logo']['url'];
								?>
									<img src="<?php echo esc_url($logo); ?>" class="img img-responsive"  alt="<?php echo esc_html__('logo','waxo') ?>">
								<?php } else { ?>
									<img src="<?php $logo_custom_url = get_template_directory_uri() . '/assets/images/logo.png'; echo esc_url($logo_custom_url); ?>" class="img img-responsive" alt="<?php echo esc_html__('logo','waxo') ?>">
								<?php  }  ?>
								</a>
							</div>
						</div>
						<div class="col-3 col-md-3">
							<div class="searchbar text-right">
								<a id="search-open-btn" class="btn-header">
									<i class="mdi mdi-magnify"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>
	<!-- End Header -->
		
	<!--Bredcrumbs-->
	<?php if (is_404() || is_category() || is_search() || is_archive() || is_month() || is_author() || is_tag() || is_single()) { ?>
		<div class="breadcrumb-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<?php if(function_exists('waxo_breadcrumbs')){ echo waxo_breadcrumbs(); } ?>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	<?php } else {
		if ( is_front_page() ) { } else { ?>
		<div class="breadcrumb-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<?php if(function_exists('waxo_breadcrumbs')){ echo waxo_breadcrumbs(); } ?>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php }
	} ?>
	<!-- BredCrumbs -->
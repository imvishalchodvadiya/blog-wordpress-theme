<?php
global $waxo;
?>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage waxo
 * @since 1.0
 * @version 1.0
 */
?>
<!-- Start Footer -->
<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
                       <?php dynamic_sidebar( 'footer-widget' ); ?>
                <?php endif; ?>			                       
				<div class="footer-copyright">
					<?php $copyright_text = '';
					if (isset( $waxo['copyright_text'])) {
						$copyright_text = $waxo['copyright_text'];
					} else {
						$copyright_text = '&copy; 2018. waxo - Designed by Websbooster Solutions';
					} ?>
					<p class="copy-rights mb-0"><?php echo esc_attr($copyright_text); ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- End Footer -->
<!-- Start Back to top -->    
	<a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>
<!-- End Back to top -->
<?php wp_footer(); ?>
</body>
</html>

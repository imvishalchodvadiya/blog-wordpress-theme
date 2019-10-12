<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage waxo
 * @since waxo 1.0
 */
get_header();
global $waxo;
?>
<section class="content-section">
    <div class="container">
        <div class="page-main"> 
            <div class="page-detail-content not-found-page text-center">
                <div class="row">
                    <div class="offset-lg-2 col-lg-8 offset-lg-2">
                        <h1 class="page-title"><?php echo esc_html__('404!','waxo'); ?></h1>
                        <?php $error_title = $error_description = '';
        				if ( isset( $waxo['404_title']) ) {
        					$error_title = $waxo['404_title'];
        				}							
        				if ( isset( $waxo['404_description']) ) {
        					$error_description = $waxo['404_description'];
        				} ?>
                        <h4 class="not-found-title"><?php echo esc_html($error_title); ?></h4>
                        <p class="not-found-text"><?php echo esc_html($error_description); ?></p>
                        <a href="<?php echo esc_url(get_home_url('/') ) ?>" class="btn btn-back-to-home"><?php echo esc_html__('BACK TO HOME PAGE', 'waxo'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<?php 

/**
 * We use LESS CSS in Pivot, don't worry, this is all parsed and cached the first time you load your page,
 * or when you change the theme options, this is not re-compiled on every page load.
 * Variables are passed to the LESS files from the enqueue section of theme_functions.php
 * If you need to you can edit the LESS files manually, though you'd be best doing this from a child theme.
 */

/**
 * Load standard areas of the theme-side framework
 * These should be loaded at all times.
 */
require get_parent_theme_file_path('framework/config-theme-plugin.php');

/**
 * Some parts of the framework only need to run on admin views.
 * These would be those.
 * Calling these only on admin saves some operation time for the theme, everything in the name of speed.
 */
if( is_admin() ){
	if (!( class_exists( 'TGM_Plugin_Activation' ) ))
        require get_parent_theme_file_path('framework/class-tgm-plugin-activation.php');
}
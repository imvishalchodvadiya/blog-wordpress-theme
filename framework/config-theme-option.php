<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "waxo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'waxo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( get_template_directory() . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( get_template_directory() . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
if ( is_dir( $sample_patterns_path ) ) {

    foreach(glob($sample_patterns_path.'*') as $sample_patterns_file) {
        if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
            $name              = explode( '.', $sample_patterns_file );
            $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
            $sample_patterns[] = array(
                'alt' => $name,
                'img' => $sample_patterns_url . $sample_patterns_file
                );
        }
    }
}
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'waxo Options', 'waxo' ),
        'page_title'           => esc_html__( 'waxo Options', 'waxo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );



    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'waxo' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>Develop by Websbooster Solutions.</p>', 'waxo' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( 'Develop by Websbooster Solutions.', 'waxo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'waxo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'waxo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'waxo' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'waxo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'waxo' );
    Redux::setHelpSidebar( $opt_name, $content );

    $site_url = get_template_directory_uri();
    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'General', 'waxo' ),
    'id'               => 'genearal',
    'customizer_width' => '400px',
    'icon'             => 'el el-dashboard',
    'fields'     => array(
        array(
            'id'       => 'general_theme_color',
            'type'     => 'color',
            'title'    => esc_html__('Theme Color', 'waxo'),
            'subtitle' => esc_html__('Set a theme color (default: #ff6e7f).', 'waxo'),
            'default'  => '#ff6e7f',
        ),
        array(
            'id'       => 'theme_color_gradient',
            'type'     => 'color_gradient',
            'title'    => __('Theme Gradient Color', 'waxo'),
            'subtitle' => __('Set a theme Gradient Color', 'waxo'),
            'validate' => 'color',
            'default'  => array(
                'from' => '#ff944d',
                'to'   => '#ff6e7f', 
            ),
        ),
    ),
) );
    // -> START Basic Fieldsht
Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'waxo' ),
        'id'               => 'basic',
        'customizer_width' => '400px',
        'icon'             => 'el el-tasks',
        'fields'     => array(
			array(
				'id'   => 'topbar_info',
				'type' => 'info',
				'desc' => __('Topbar Setting', 'waxo')
			),
			array(
                'id'       => 'phone_no',
                'type'     => 'text',
                'title'    => esc_html__('Phone No', 'waxo'),
                'subtitle' => esc_html__('Enter Topbar Phone No', 'waxo'),
                'default'  => esc_html__('+01 9876543210', 'waxo'),
            ),
			array(
                'id'       => 'email_id',
                'type'     => 'text',
                'title'    => esc_html__('Email ID', 'waxo'),
                'subtitle' => esc_html__('Enter Topbar Email ID', 'waxo'),
                'default'  => esc_html__('Websboostersolutions@gmail.com', 'waxo'),
            ),			
			array(
				'id'   => 'logo_info',
				'type' => 'info',
				'desc' => __('Logo Setting', 'waxo')
			),
            array(
                'id'       => 'header_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Logo', 'waxo'),
                'default'  => array(
                    'url'=>$site_url.'/assets/images/logo.png'
                ),
            ),
            array(
                'id'       => 'favicon_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__('Favicon Logo', 'waxo'),
                'default'  => array(
                    'url'=>$site_url.'/assets/images/favicon.ico'
                ),
            ),            
        ),
    ) );

Redux::setSection($opt_name, array(
    'title' => esc_html__('Sidebar', 'waxo'),
    'id' => esc_html__('sidebar', 'waxo'),
    'icon' => esc_html__('el el-list', 'waxo'),
    'fields' => array(
        array(
            'id'=> esc_html__('blog-layout', 'waxo'),
            'type' => esc_html__('image_select', 'waxo'),
            'title' => esc_html__('Sidebar Layout', 'waxo'),
            'options' => array(
                "without-sidebar" => array('alt' => 'Wide Width', 'img' => get_template_directory_uri().'/assets/images/full_width.jpg'),
                "left-sidebar" => array('alt' => 'Left Sidebar', 'img' => get_template_directory_uri().'/assets/images/left_sidebar.jpg'),
                "right-sidebar" => array('alt' => 'Right Sidebar', 'img' => get_template_directory_uri().'/assets/images/right_sidebar.jpg'),
            ),
            'default' => esc_html__('right-sidebar', 'waxo'),
        ),
    )
));
Redux::setSection( $opt_name, array(
        'title'            => esc_html__( '404 Page', 'waxo' ),
        'id'               => '404 page',
        'customizer_width' => '400px',
        'icon'             => 'el el-warning-sign',
        'fields'     => array(
            array(
                'id'       => '404_title',
                'type'     => 'text',
                'title'    => esc_html__('404 Title', 'waxo'),
                'subtitle' => esc_html__('404 Title', 'waxo'),
                'default'  => esc_html__('Sorry, Page Not Found', 'waxo'),
            ),
            array(
                'id'       => '404_description',
                'type'     => 'text',
                'title'    => esc_html__('404 Description', 'waxo'),
                'subtitle' => esc_html__('404 Description', 'waxo'),
                'default'  => esc_html__('Error page description', 'waxo'),
            ),
        )
) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'waxo' ),
        'id'               => 'typography_waxo',
        'customizer_width' => '400px',
        'icon' => esc_html__('el el-font', 'waxo'),
        'fields'     => array(
        array(
            'id' => esc_html__('primary_font', 'waxo'),
            'type' => esc_html__('typography', 'waxo'),
            'title' => esc_html__('Primary Font', 'waxo'),
            'subtitle' => esc_html__('Select the Property of Primary font', 'waxo'),
            'google' => true,
            'subsets' => false,
			'text-align' => false,
			'line-height' => false,
            'font-size' => false,
            'color' => false,
			'default' => array(
                'font-family' => esc_html__('Lato', 'waxo'),
                'font-weight' => esc_html__('400', 'waxo'),
            ),
        ),
		array(
            'id' => esc_html__('secondary_font', 'waxo'),
            'type' => esc_html__('typography', 'waxo'),
            'title' => esc_html__('Secondary Font', 'waxo'),
            'subtitle' => esc_html__('Select the Property of Secondary font', 'waxo'),
            'google' => true,
			'subsets' => false,
			'text-align' => false,
			'line-height' => false,
            'font-size' => false,
            'color' => false,
            'default' => array(
                'font-family' => esc_html__('Poppins', 'waxo'),
                'font-weight' => esc_html__('700', 'waxo'),
            ),
        ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'waxo' ),
        'id'               => 'footer_waxo',
        'customizer_width' => '400px',
        'icon'             => 'el el-indent-right',
        'fields'     => array(
            array(
                'id'       => 'copyright_text',
                'type'     => 'text',
                'title'    => esc_html__('Copyright Text', 'waxo'),
                'subtitle' => esc_html__('Copyright Text', 'waxo'),
                'default'  => esc_html__('&copy; 2018. waxo - Design by Websbooster Solutions', 'waxo'),
            )
        ),
    ) );

Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => esc_html__( 'Customizer Only', 'waxo' ),
        'desc'            => esc_html__( '<p class="description">This Section should be visible only in Customizer</p>', 'waxo' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => esc_html__( 'Customizer Only Option', 'waxo' ),
                'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'waxo' ),
                'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'waxo' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( get_template_directory() . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => esc_html__( 'Documentation', 'waxo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => get_template_directory() . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'waxo' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'waxo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }


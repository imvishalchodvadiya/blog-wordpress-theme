<?php
//start defualt sidebar
function waxo_sidebar_widgets_init() {
register_sidebar( array(
'name'          => esc_html__( 'Sidebar Default', 'waxo' ),
'id'            => 'sidebar',
'description'   => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'waxo' ),
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget'  => '</div>',
'before_title'  => '<h4 class="widget-title">',
'after_title'   => '</h4>',
) );

register_sidebar(array(
'name' => esc_html__('Footer','waxo'),
'id' => 'footer-widget',
'description'   => esc_html__( 'Widgets in this area will be shown on Footer.', 'waxo' ),
'before_widget' => '<div id="%1$s" class="widget %2$s list-unstyled">',
'after_widget' => '</div>',
'before_title' => '<h4 class="widget-title">',
'after_title' => '</h4>',
));

}
add_action( 'widgets_init', 'waxo_sidebar_widgets_init' );
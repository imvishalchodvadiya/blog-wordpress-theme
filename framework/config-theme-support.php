<?php 

add_action( 'after_setup_theme', 'waxo_theme_support', 11 );

function waxo_theme_support() {
  if ( ! isset( $content_width ) ) { $content_width = 600;

   add_theme_support( 'post-formats', array(
       'aside',
       'audio',
       'gallery',
       'image',
       'link',
       'quote',
       'video',
       'status',
       'chat',
   ) );   
}

//Images
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'menu' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_editor_style();
}
<?php
	function waxo_style_css_script(){
		wp_enqueue_style('editor_style',get_template_directory_uri().'/assets/css/style.css');
	}
	add_action('wp_enqueue_scripts','waxo_style_css_script');

	function waxo_primary_color(){
		global $waxo;
		$general_theme_color= '';
		
        $primary_font_family = '';
        $primary_font_weight = '';
		
		$secondary_font_family = '';
        $secondary_font_weight = '';
		
        $general_theme_color = $waxo['general_theme_color'];

        $general_theme_color_from = $waxo['theme_color_gradient']['from'];
        $general_theme_color_to = $waxo['theme_color_gradient']['to'];
		
        $primary_font_family = $waxo['primary_font']['font-family'];
        $primary_font_weight = $waxo['primary_font']['font-weight'];
		
		$secondary_font_family = $waxo['secondary_font']['font-family'];
        $secondary_font_weight = $waxo['secondary_font']['font-weight'];
        
		
		$custom_css = "
		body {
			font-family: {$primary_font_family};
			font-weight: {$primary_font_weight};
		}		
		h1,h2,h3,h4,h5,h6 {
		    font-family: {$secondary_font_family};
			font-weight: {$secondary_font_weight};
		}
		a:hover {
			color: {$general_theme_color};
		}
		.blog-list-box, 
		.blog-details-box,
		.comment-box,
		.portfolio-item-box figure.grid-effect,
		.widget {
		    border-bottom: 5px solid {$general_theme_color_to};
		    border-image-source: linear-gradient(to bottom,{$general_theme_color_from} 0%,{$general_theme_color_to} 100%);
		    border-image-slice: 20;
		}
		.sticky .blog-list-box, .blog-details-box.sticky {
			border: 5px solid {$general_theme_color_to};
		    border-image-source: linear-gradient(to bottom,{$general_theme_color_from} 0%,{$general_theme_color_to} 100%);
		    border-image-slice: 20;
		}
		.blog-quote .blog-content,
		.blog-details-box blockquote {
		    border-left: 5px solid {$general_theme_color_to};
		    border-image-source: linear-gradient(to bottom, {$general_theme_color_from} 0%,{$general_theme_color_to} 100%);
		    border-image-slice: 20;
		}
		.btn-gradient-cate-info, 
		.back-to-top,
                .circle,
		button,
		.btn,
		.btn:not(:disabled):not(.disabled),
		.form-submit input[type='submit'] {
		    background: linear-gradient(135deg, {$general_theme_color_to} 0%,{$general_theme_color_from} 100%);
		}
		.btn-gradient-cate-info:hover, 
		.back-to-top:hover,
                .circle:hover,
		 button:hover,
		.btn:hover, 
		.btn:not(:disabled):not(.disabled):active,
		.form-submit input[type='submit']:hover {
		    background: linear-gradient(135deg, {$general_theme_color_from} 0%,{$general_theme_color_to} 100%);
		} 		
		";
        
		wp_add_inline_style( 'editor_style', $custom_css );
	}	
add_action('wp_enqueue_scripts', 'waxo_primary_color');
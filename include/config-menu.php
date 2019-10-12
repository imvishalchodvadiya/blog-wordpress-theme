<?php
//Menu Register
function waxo_register_my_menus() {
register_nav_menus(
    array(
        'primary' => esc_html__( 'Primary Menu','waxo' ),
    )
);
}
add_action( 'after_setup_theme', 'waxo_register_my_menus' );
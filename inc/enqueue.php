<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package Die_Jim_Crow
 */

/**
 * Load the Parent Theme Stylesheet
 * @link https://codex.wordpress.org/Child_Themes
 *
 */
function die_jim_crow_scripts() {
    wp_enqueue_style( 'die-jim-crow',  get_template_directory_uri() . '/style.min.css' );

    wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/dist/scripts/main.js', array(), '', true );

    wp_register_script( 'recaptcha_api', 'https://www.google.com/recaptcha/api.js' );
    wp_enqueue_script( 'recaptcha_api' );
}
add_action( 'wp_enqueue_scripts', 'die_jim_crow_scripts' );

/**
 * Load a Custom Login Stylesheet
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
 *
 */
function djc_enqueue_login_styles() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/admin.css' );
}
add_action( 'login_enqueue_scripts', 'djc_enqueue_login_styles' );


// Remove WP Version From Styles
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

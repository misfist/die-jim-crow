<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function site_theme_gutenberg_setup() {
    // Adding support for core block visual styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for wide width
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
    add_editor_style( get_stylesheet_directory_uri() . '/dist/styles/editor-style.min.css' );

    // Adding support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    $color_palette = array(
        array(
            'name'  => __( 'Black', 'die-jim-crow' ),
            'slug'  => 'primary',
            'color' => '#000000',
        ),
        array(
            'name'  => __( 'Red', 'die-jim-crow' ),
            'slug'  => 'secondary',
            'color' => '#ff0000',
        ),
        array(
            'name'  => __( 'White', 'die-jim-crow' ),
            'slug'  => 'white',
            'color' => '#fff',
        ),
        array(
            'name'  => __( 'Gray', 'die-jim-crow' ),
            'slug'  => 'gray',
            'color' => '#ccc',
        ),
    );

    // Add support for a custom color scheme.
    add_theme_support( 'editor-color-palette', $color_palette );

    // Disable custom colors.
    add_theme_support( 'disable-custom-colors' );

    $font_sizes = array(
        array(
            'name' => __( 'Small', 'die-jim-crow' ),
            'size' => 14,
            'slug' => 'small'
        ),
        array(
            'name' => __( 'Normal', 'die-jim-crow' ),
            'size' => 16,
            'slug' => 'normal'
        ),
        array(
            'name' => __( 'Large', 'die-jim-crow' ),
            'size' => 24,
            'slug' => 'large'
        ),
        array(
            'name' => __( 'X-Large', 'die-jim-crow' ),
            'size' => 32,
            'slug' => 'x-large'
        ),
        array(
            'name' => __( 'Huge', 'die-jim-crow' ),
            'size' => 42,
            'slug' => 'huge'
        )
    );

    add_theme_support( 'editor-font-sizes', $font_sizes );
    
    // Disable custom sizes.
    add_theme_support( 'disable-custom-font-sizes' );

}
add_action( 'after_setup_theme', 'site_theme_gutenberg_setup' );
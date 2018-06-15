<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://docs.woocommerce.com
 *
 * @package Die_Jim_Crow
 */

/**
 * Enable WooCommerce Support
 *
 * @return void
 */
function die_jim_crow_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 460,
		'single_image_width'    => 460,

    'product_grid'          => array(
        'default_columns' => 2,
        'min_columns'     => 1,
        'max_columns'     => 2,
    ),
	) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'die_jim_crow_add_woocommerce_support' );

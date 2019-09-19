<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Die_Jim_Crow
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function die_jim_crow_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
    }

	return $classes;
}
add_filter( 'body_class', 'die_jim_crow_body_classes' );

/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Die_Jim_Crow 1.0.0
 */
if ( ! function_exists( 'die_jim_crow_the_custom_logo' ) ) {
    function die_jim_crow_the_custom_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }
    }
}


/**
 * Add Post Count Class to Post Class
 *
 * @param array $classes
 * @return array $classes
 *
 * @since Die_Jim_Crow 1.0.0
 */

if( !function_exists( 'djc_add_post_classes' ) ) {

    add_filter( 'post_class', 'djc_add_post_classes', 10 );

    function djc_add_post_classes( $classes ) {

        if ( is_singular() ) { 
            return $classes;
        }

        global $wp_query;

        // Get the number of the current post in the loop.
        $current_count = $wp_query->current_post + 1;

        // Work out whether this post is odd or even in the list.
        $oddeven = 'odd';

        if ( $current_count % 2 == 0 ) { 
            $oddeven = 'even';
        } else { 
            $oddeven = 'odd';
        }

        // Add the classes to the array of CSS classes.
        $classes[] = 'post-number-' . $current_count; // Post number.
        $classes[] = 'post-date-' . get_the_time( 'Y-m-d' ); // Post date.
        $classes[] = 'post-' . $oddeven; // Odd or even number.

        return $classes;

    } // End djc_add_post_classes()

}

/**
 * Modify Team Member Category Taxonomy Archive Title
 * 
 * @see https://developer.wordpress.org/reference/hooks/get_the_archive_title/
 * 
 * @param string $title
 * @return string $title
 */
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_tax( 'team-member-category' ) ) {

        $title = single_term_title( '', false );

    }

    return $title;

});
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Die_Jim_Crow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'bio-thumbnail' );
    }  ?>
</article><!-- #post-## -->

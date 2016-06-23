<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Die_Jim_Crow
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		?>

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'die-jim-crow' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'die-jim-crow' ),
				'after'  => '</div>',
			) );
		?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php die_jim_crow_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</li><!-- #post-## -->

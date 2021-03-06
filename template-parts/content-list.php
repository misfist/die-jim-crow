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

		<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-image">
			<?php the_post_thumbnail( 'full' ); ?>
		</figure>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php die_jim_crow_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</li><!-- #post-## -->

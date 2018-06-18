<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Die_Jim_Crow
 */
global $product;
?>

<li id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h3 class="entry-title product-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		?>

		<?php if( has_post_thumbnail() ) : ?>
			<figure class="entry-image">
				<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
					<?php the_post_thumbnail( 'medium' ); ?>
				</a>
			</figure>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php echo $product->get_price_html(); ?>
	</footer><!-- .entry-footer -->
</li><!-- #post-## -->

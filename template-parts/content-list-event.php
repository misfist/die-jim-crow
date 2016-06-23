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
		<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>

		<?php
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		?>
		<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

		<?php if( has_post_thumbnail() ) : ?>
		<figure class="entry-image">
			<?php the_post_thumbnail( 'full' ); ?>
		</figure>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

		<?php echo tribe_events_event_schedule_details(); ?>

		<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
	</footer><!-- .entry-footer -->
</li><!-- #post-## -->

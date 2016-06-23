<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.1.1
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>

	<ul class="recent-posts recent-events">

		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>

			<?php get_template_part( 'template-parts/content-list', get_post_type() ); ?>

		<?php
		endforeach;
		?>
	</ul><!-- .tribe-list-widget -->

	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'View All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
		</div>
	</nav>

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;

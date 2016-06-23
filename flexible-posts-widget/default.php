<?php
/**
 * Flexible Posts Widget: Old Default widget template
 * 
 * @since 1.0.0
 *
 * This is the ORIGINAL default template used by the plugin.
 * There is a new default template (default.php) that will be 
 * used by default if no template was specified in a widget.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;


if( $flexible_posts->have_posts() ):
	
if ( !empty($title) )
	echo $before_title . $title . $after_title;
?>
	<ul class="recent-posts">

	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>

		<?php get_template_part( 'template-parts/content-list', get_post_format() ); ?>
		
	<?php endwhile; ?>
	</ul><!-- .dpe-flexible-posts -->
<?php	
endif; // End have_posts()
	
echo $after_widget;

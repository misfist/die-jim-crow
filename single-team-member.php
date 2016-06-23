<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Die_Jim_Crow
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			?>

			<?php
			/**
			 * Output Custom Post Nav
			 *
			 * @since 1.0.0
			 *
			 * Switches order of previous/next to visually be
			 * in the same direction as listing page.
			 * Restrict to the current taxonomy
			 * Maintain the standard markup
			 *
			 */
			?>
			<nav class="navigation post-navigation" role="navigation">

                <h2 class="screen-reader-text"><?php __( 'Post Navigation', 'die-jim-crow' ) ?></h2>

                <div class="nav-links">
                    <?php next_post_link( '<div class="nav-previous">%link</div>', '%title', TRUE, ' ', 'team-member-category' ); ?>

                    <?php previous_post_link( '<div class="nav-next">%link</div>', '%title', TRUE, ' ', 'team-member-category' ); ?>
                </div>

            </nav>


			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

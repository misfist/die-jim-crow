<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Die_Jim_Crow
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php 
		// Featured Post
		$featured_args = array(
			'posts_per_page' => 1,
		);
		$featured_query = new WP_Query( $featured_args );
		?>

		<?php
		if ( $featured_query->have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif; ?>

			<div class="featured-post">

			<?php
			/* Start the Loop */
			while ( $featured_query->have_posts() ) : $featured_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>

		<?php wp_reset_query(); ?>

		<?php
		// Featured Post
		$recent_args = array(
			'posts_per_page'    => 2,
			'offset'			=> 1,
		);
		$recent_query = new WP_Query( $recent_args );
		?>

		<?php
		if ( $recent_query->have_posts() ) : ?>

			<div class="recent-posts">

			<?php
			/* Start the Loop */
			while ( $recent_query->have_posts() ) : $recent_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>

		<?php wp_reset_query(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

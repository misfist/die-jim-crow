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
		/**
		 * Display Featured Post
		 *
		 * Display the first sticky post, if none return the last post published.
		 *
		 * @since 1.0.1
		 * @link https://codex.wordpress.org/Sticky_Posts#Display_Sticky_Posts
		 *
		 */
		$featured_args = array(
			'posts_per_page' => 1,
			'post__in'  => get_option( 'sticky_posts' ),
			'ignore_sticky_posts' => 1
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

			<?php
			/* Start the Loop */
			while ( $featured_query->have_posts() ) : $featured_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-loop', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if( is_active_sidebar( 'sidebar-home' ) ) : ?>

    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-home' ); ?>
    </aside><!-- #secondary -->

<?php endif; ?>

<?php
get_footer();

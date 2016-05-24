<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Die_Jim_Crow
 */

?>

<?php
    $user               = esc_attr( get_post_meta( $post->ID, '_user_id', true ) );
    $role               = esc_attr( get_post_meta( $post->ID, '_byline', true ) );
    $url                = esc_attr( get_post_meta( $post->ID, '_url', true ) );
    $location           = esc_attr( get_post_meta( $post->ID, '_location', true ) );
    $prison_id          = esc_attr( get_post_meta( $post->ID, '_prison_id', true ) );
    $address          = esc_attr( get_post_meta( $post->ID, '_mailing_address', true ) );
    ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry-image">
        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'large' );
            }  ?>
        </a>
    </div>
    <div class="entry-content">
        <?php
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        ?>

        <?php if( isset( $role ) && '' != $role ) : ?>

            <div class="role" itemprop="jobTitle">
                <?php echo $role; ?>
            </div>

        <?php endif; ?>

        <?php the_content(); ?>
    </div><!-- .entry-content -->
        
</article><!-- #post-## -->

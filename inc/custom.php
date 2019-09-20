<?php
/**
 * Custom Theme Functions
 *
 * @package Die_Jim_Crow
 */

/**
 * Remove Fields
 * Removed `tel`, `contact_email`, `twitter`, and `user_id` fields from `team-member` post type
 * @link https://docs.woothemes.com/document/our-team-plugin/#i-do-not-need-the-role-field-can-i-disable-that
 */
add_filter( 'woothemes_our_team_member_tel', '__return_false' );

add_filter( 'woothemes_our_team_member_url', '__return_false' );

add_filter( 'woothemes_our_team_member_role', '__return_false' );

add_filter( 'woothemes_our_team_member_contact_email', '__return_false' );

add_filter( 'woothemes_our_team_member_twitter', '__return_false' );

add_filter( 'woothemes_our_team_member_user_id', '__return_false' );

add_filter( 'woothemes_our_team_member_user_search', '__return_false' );

/**
 * Add Field
 * Add `location` fields to `team-member` post type
 * @param array $fields
 * @link https://docs.woothemes.com/document/our-team-plugin/#i-need-to-add-another-field-can-i-do-it-without-touching-core-files
 */
function djc_team_add_fields( $fields ) {
    $fields['byline'] = array(
        'name'          => __( 'Role', 'die-jim-crow' ),
        'description'   => __( 'Enter person\'s role in the project (e.g. "vocals")', 'die-jim-crow' ),
        'type'          => 'text',
        'default'       => '',
        'section'       => 'info'
    );
    $fields['location'] = array(
        'name'          => __( 'Location', 'die-jim-crow' ),
        'type'          => 'text',
        'description'   => __( 'Enter person\'s location' ),
        'default'       => '',
        'section'       => 'info'
    );
    $fields['prison_id'] = array(
        'name'          => __( 'Prison #', 'die-jim-crow' ),
        'type'          => 'text',
        'description'   => __( 'Enter person\'s prison #' ),
        'default'       => '',
        'section'       => 'info'
    );
    $fields['url'] = array(
        'name'          => __( 'Website URL', 'die-jim-crow' ),
        'description'   => __( 'Enter person\'s website address (e.g. http://www.dieartwork.com/)', 'die-jim-crow' ),
        'type'          => 'url',
        'default'       => '',
        'section'       => 'info'
    );
    $fields['mailing_address'] = array(
        'name'          => __( 'Mailing Address', 'die-jim-crow' ),
        'description'   => __( 'Enter person\'s mailing address', 'die-jim-crow' ),
        'type'          => 'text',
        'default'       => '',
        'section'       => 'info'
    );
    $fields['user_search'] = array(
        'name'          => __( 'Username', 'die-jim-crow' ),
        'description'   => sprintf( __( 'Map this person to a user on this site. See the %sdocumentation%s for more info.', 'die-jim-crow' ), '<a href="' . esc_url( 'http://docs.woothemes.com/document/our-team-plugin/' ) . '" target="_blank">', '</a>' ),
        'type'          => 'text',
        'default'       => '',
        'section'       => 'info'
    );
    $fields['gravatar_email'] = array(
        'name'              => __( 'Gravatar Email', 'die-jim-crow' ),
        'description'       => '',
        'type'              => 'hidden',
        'default'           => '',
        'section'           => 'info'
    );
    return $fields;
}

add_filter( 'woothemes_our_team_member_fields', 'djc_team_add_fields' );

/**
 * Change Label Text
 * Change text displayed for `team-member` post type
 * @param array $args
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#Arguments
 *
 */
function djc_team_labels( $args ) {
    $labels['name']             = __( 'Bios', 'die-jim-crow' );
    $labels['singular_name']    = _x( 'Bio', 'post type singular name' );
    $labels['add_new_item']     = sprintf( __( 'Add New %s' ), __( 'Bio' ) );
    $labels['add_new']          = _x( 'Add New', 'bio' );
    $labels['edit_item']        = sprintf( __( 'Edit %s', 'die-jim-crow' ), __( 'Bio', 'die-jim-crow' ) );
    $labels['new_item']        = sprintf( __( 'New %s', 'die-jim-crow' ), __( 'Bio', 'die-jim-crow' ) );
    $labels['all_items']        = sprintf( __( 'All %s', 'die-jim-crow' ), __( 'Bios', 'die-jim-crow' ) );
    $labels['view_item']        = sprintf( __( 'View %s', 'die-jim-crow' ), __( 'Bio', 'die-jim-crow' ) );
    $labels['search_items']        = sprintf( __( 'Search %s', 'die-jim-crow' ), __( 'Bios', 'die-jim-crow' ) );
    $labels['not_found']        = __( 'None Found', 'die-jim-crow' );
    $labels['not_found_in_trash']        = __( 'None Found in Trash', 'die-jim-crow' );
    $labels['menu_name']        = __( 'Bios', 'die-jim-crow' );
    $args['labels']             = $labels;

    return $args;
}

add_filter( 'woothemes_our_team_post_type_args', 'djc_team_labels' );

/**
 * Modify Bio Category Labels
 * 
 * @param array $args
 * @return array $args
 */
function djc_bio_taxonomy_args( $args ) {
    $args['labels']['name']             = _x( 'Bio Categories', 'Taxonomy General Name', 'die-jim-crow' );
    $args['labels']['singular_name']    = _x( 'Bio Category', 'Taxonomy Singular Name', 'die-jim-crow' );
    $args['labels']['menu_name']        = __( 'Bio Categories', 'die-jim-crow' );
    // $args['labels']             = $labels;
    $args['show_in_nav_menus']  = true;
    $args['rewrite']['slug']    = 'bios';

    return $args;
}
add_filter( 'woothemes_our_team_taxonomy_args', 'djc_bio_taxonomy_args' );

/**
 * Modify Bio Slug
 * 
 * @param array $args
 * @return array $args
 */
function djc_bios_single_slug( $slug ) {
    $slug = _x( 'bio', 'single post url slug', 'die-jim-crow' );
    return $slug;
}
add_filter( 'woothemes_our_team_single_slug', 'djc_bios_single_slug', 10 );

/**
 * Modify Bio Slug
 * 
 * @param array $args
 * @return array $args
 */
function djc_bios_archive_slug( $slug ) {
    $slug =  _x( 'bios', 'post archive url slug', 'die-jim-crow' );
    return $slug;
}
add_filter( 'woothemes_our_team_archive_slug', 'djc_bios_archive_slug', 10 );

/**
 * Change Single Slug
 *
 * Change the post slug for single `team-member` posts to `bio`
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#rewrite
 *
 */
function djc_team_single_slug() {
    return _x( 'bio', 'single post url slug', 'die-jim-crow' );
}

add_filter( 'woothemes_our_team_single_slug', 'djc_team_single_slug' );

/**
 * Change Archive Slug
 *
 * Change the slug for `team-member` post archive to `bios`
 * @link https://codex.wordpress.org/Function_Reference/register_post_type#rewrite
 *
 */
function djc_team_archive_slug() {
    return _x( 'bios', 'post archive url slug', 'die-jim-crow' );
}

add_filter( 'woothemes_our_team_archive_slug', 'djc_team_archive_slug' );

/**
 * Remove Extra Fields from `the_content`
 *
 * Change `the_content` to only display `post_content` for `team-member` posts
 * @param string $content
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content
 *
 */
function djc_our_team_content( $content ) {

    global $post;

    if( is_post_type_archive( 'team-member' ) ) {

        $content = $post->post_content;
        return $content;
    }

    return $content;

}

add_filter( 'the_content', 'djc_our_team_content' );

/**
 * Customise the "Enter title here" text
 *
 * Customize the text that appears in the `title` field on the post edit screen
 * @param string $title
 * @return void
 */
function djc_team_enter_title_here( $title ) {
    $screen = get_current_screen();

    if ( 'team-member' == $screen->post_type ) {
        $title = __( 'Enter person\'s name here', 'die-jim-crow' );
    }
    return $title;
}

add_filter( 'enter_title_here', 'djc_team_enter_title_here' );

/**
 * Change Message Text for Bios
 * Change the message text for `team-member` posts
 *
 * @param string $translated_text
 * @return void
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */
function djc_team_message_text( $translated_text ) {
    if( 'Team Member' == $translated_text ) :
        $translated_text = 'Bio';
    elseif( 'Team Members' == $translated_text  ) :
        $translated_text = 'Bios';
    elseif( 'Team Member updated' == $translated_text  ) :
        $translated_text = 'Bio updated';
    elseif( 'Team Member Details' == $translated_text ) :
        $translated_text = 'Bio Details';
    endif;
    return $translated_text;
}

add_filter( 'gettext', 'djc_team_message_text', 20 );

/**
 * Enable Shortcodes in Widgets
 *
 * @link https://codex.wordpress.org/Shortcode#Shortcodes_in_Widgets
 */
add_filter('widget_text', 'do_shortcode');



/**
 * Page Link Shortcode
 * @link https://codex.wordpress.org/Shortcode
 */
function djc_page_link_shortcode( $atts ) {
    $output = '';
    $atts = shortcode_atts( array(
        'ids' => '',
    ), $atts );

    $ids = array_map( 'intval', explode( ',', $atts['ids'] ) );
    if( $ids ) {
        $output .= '<ul class="photo-album-links">';
        foreach( $ids as $id ) {

            $style = has_post_thumbnail( $id ) ? ' style="background-image: url(' . wp_get_attachment_image_url( get_post_thumbnail_id( $id ), 'page_link' ) . ');"' : '';
            $output .= '<li class="entry">';
            $output .= '<a href="' . get_permalink( $id ) . '" title="' . get_the_title( $id ) . '" aria-label="' . get_the_title( $id ) . '">';
            $output .= '<div class="entry-image" ' . $style . '>';
            $output .= '</div>';
            $output .= '</a>';
            $output .= '<h3 class="entry-title">' . get_the_title( $id ) . '</h3>';
            $output .= '</li>';
        }
        $output .= '</ul>';
    }

    return $output;
}
add_shortcode( 'photo-album-link', 'djc_page_link_shortcode' );


/**
 * Page Link Shortcode UI
 *
 */
function djc_page_link_shortcode_ui() {

    if( ! function_exists( 'shortcode_ui_register_for_shortcode' ) )
        return;

    shortcode_ui_register_for_shortcode( 'photo-album-link', array(
        'label'         => 'Photo Album Links',
        'listItemImage' => 'dashicons-format-image',
        'attrs'         => array(
            array(
                'label'    => 'Pages',
                'attr'     => 'ids',
                'type'     => 'post_select',
                'query'    => array( 'post_type' => 'page'),
                'multiple' => true,
            )
        )
    ) );
}
add_action( 'init', 'djc_page_link_shortcode_ui' );

/**
 * Page Link Shortcode UI
 *
 */
function djc_add_form_shortcode() {

    if( ! function_exists( 'shortcode_ui_register_for_shortcode' ) )
        return;

    shortcode_ui_register_for_shortcode( 'contact-form-7', array(
        'label'         => 'Add Form',
        'listItemImage' => 'dashicons-format-image',
        'attrs'         => array(
            array(
                'label'    => 'Title',
                'attr'     => 'title',
                'type'     => 'text',
            ),
            array(
                'label'    => 'Select Form',
                'attr'     => 'id',
                'type'     => 'post_select',
                'query'    => array( 'post_type' => 'wpcf7_contact_form'),
                'multiple' => false,
            ),
        )
    ) );
}
add_action( 'init', 'djc_add_form_shortcode' );



/**
 * Hide Password Protected Pages
 *
 * @param string
 * @return query string
 * @link https://codex.wordpress.org/Using_Password_Protection#Hiding_Password_Protected_Posts
 */
function djc_exclude_protected( $where ) {
    global $wpdb;
    return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

/**
 * Hide Password Protected Pages
 *
 * @uses @wp-hook pre_get_posts
 * @link https://codex.wordpress.org/Using_Password_Protection#Hiding_Password_Protected_Posts
 * 
 * @param query string
 * @return void
 */
function djc_exclude_protected_action( $query ) {
    if( !is_single() && !is_page() && !is_admin() ) {
        add_filter( 'posts_where', 'djc_exclude_protected' );
    }
}
add_action( 'pre_get_posts', 'djc_exclude_protected_action' );

/**
 * Sort by menu order
 * 
 * @param obj $query
 * @return void
 */
function djc_pre_get_posts( $query ) {
    if( ( is_tax( 'team-member-category' ) || is_post_type_archive( 'team-member' ) ) && !is_admin() && $query->is_main_query()  ) {
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'djc_pre_get_posts' );

/**
 * Change Password Protected Page Text
 *
 * @uses @wp-hook the_password_form
 * @param n/a
 * @return string
 * @link https://codex.wordpress.org/Using_Password_Protection#Customize_the_Protected_Text
 */
function djc_passcode_form() {
    global $post;
    $label = 'password-' . ( empty( $post->ID ) ? rand() : $post->ID );
    $output = '<form class="protected-post-form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    ' . __( "Enter the passcode to download the EP", 'die-jim-crow' ) . '
    <label class="password-label" for="' . $label . '">' . __( "Passcode", 'die-jim-crow' ) . '</label> <input name="post_password" id="' . $label . '" type="password" class="password" size="20" /> <input type="submit" name="Submit" class="button" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $output;
}

add_filter( 'the_password_form', 'djc_passcode_form' );

/**
 * Add a message to the password form.
 *
 * @wp-hook the_password_form
 * @param string $form
 * @return string
 */
function djc_passcode_password_msg( $form ) {
    // No cookie, the user has not sent anything until now.
    if ( ! isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) )
        return $form;

    // Translate and escape.
    $msg = esc_html__( 'That passcode is not correct.', 'die-jim-crow' );

    // We have a cookie, but it doesn’t match the password.
    $msg = "<p class='custom-password-message'>$msg</p>";

    return $msg . $form;
}

add_filter( 'the_password_form', 'djc_passcode_password_msg' );

/**
 * Adds a css class to the body element
 *
 * @param  array $classes the current body classes
 * @return array $classes modified classes
 */
function djc_body_classes( $classes ) {
    global $post;

    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }

    if ( is_singular( 'page' ) ) {
        $classes[] = 'page-' . $post->post_name;
    }

    if( is_singular( 'post' ) ) {
        foreach ( get_the_category( $post->ID ) as $category ) {
            $classes[] = 'single-' . $category->category_nicename;
        }
    }

    return $classes;

}
add_filter( 'body_class', 'djc_body_classes' );


// /**
//  * Adds post category classes to the body class
//  *
//  * @param  array $classes the current body classes
//  * @return array $classes modified classes
//  */
// function djc_category_class( $classes ) {

//     if( is_singular( 'post' ) ) {
//         global $post;
//         foreach ( get_the_category( $post->ID ) as $category ) {
//             $classes[] = 'single-' . $category->category_nicename;
//         }
//     }
//     return $classes;
// }

// add_filter( 'body_class', 'djc_category_class' );


// /**
//  * Add post slug to body class
//  *
//  * @link https://codex.wordpress.org/Function_Reference/body_class#Add_Classes_By_Filters
//  *
//  * @param $classes array
//  * @return void
//  */
// function djc_slug_body_class( $classes ) {
//     global $post;

//     if ( isset( $post ) ) {
//         $classes[] = $post->post_type . '-' . $post->post_name;
//     }

//     return $classes;
// }
// add_filter( 'body_class', 'djc_slug_body_class' );



/**
 * Disable Comments on Attachments
 *
 * @link https://codex.wordpress.org/Function_Reference/comments_open
 *
 * @param $open string, $post_id string
 * @return void
 */
function djc_disable_media_comments( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}
add_filter( 'comments_open', 'djc_disable_media_comments', 10 , 2 );

/**
 * Modify Events Page Title
 *
 * @link https://theeventscalendar.com/knowledgebase/altering-or-removing-titles-on-calendar-views/
 *
 * @param $original_title string, $depth string
 * @return  string $title
 */

function djc_alter_event_archive_titles( $original_title, $depth ) {
    $title_upcoming =   __( 'Tour Dates', 'die-jim-crow' ); // List View: Upcoming events
    $title_past =       __( 'Past Events', 'die-jim-crow' ); // List view: Past events

    $title = $title_upcoming;

    return $title;
}

add_filter( 'tribe_get_events_title', 'djc_alter_event_archive_titles', 11, 2 );

/**
 * Removes sticky posts from all Flexible Post Widget queries
 * @param $query
 * @return mixed
 */
function djc_fpw_remove_sticky_posts( $query ) {
    $query['post__not_in'] = get_option( 'sticky_posts' );
    return $query;
}
add_filter( 'dpe_fpw_args', 'djc_fpw_remove_sticky_posts' );

/**
 * Removes sticky posts from all Flexible Post Widget queries
 * @param array $mime_types
 * @return array $mime_types
 */
function djc_add_mime_types( $mime_types ){
    $mime_types['aiff'] = 'audio/aiff'; //Adding .aiff extension
    $mime_types['aif'] = 'audio/aif'; //Adding .aif extension
    return $mime_types;
}
add_filter('upload_mimes', 'djc_add_mime_types', 1, 1 );


function tribe_custom_theme_text ( $translation, $text, $domain ) {

	// Put your custom text here in a key => value pair
	// Example: 'Text you want to change' => 'This is what it will be changed to'
	// The text you want to change is the key, and it is case-sensitive
	// The text you want to change it to is the value
	// You can freely add or remove key => values, but make sure to separate them with a comma
	// This example changes the label "Venue" to "Location", and "Related Events" to "Similar Events"
	$custom_text = array(
		'There were no results found.' => 'Please check back in coming months for future gigs.',
	);

	// If this text domain starts with "tribe-", "the-events-", or "event-" and we have replacement text
    	if( (strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0 || strpos($domain, 'event-') === 0) && array_key_exists($translation, $custom_text) ) {
		$translation = $custom_text[$translation];
	}
    return $translation;
}
add_filter('gettext', 'tribe_custom_theme_text', 20, 3);

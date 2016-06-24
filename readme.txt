=== Die Jim Crow ===

Contributors: Pea
Tags: translation-ready, custom-background, theme-options, custom-menu, post-formats, threaded-comments

Requires at least: 4.0
Tested up to: 4.4.2
Stable tag: 1.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom WordPress theme for Die Jim Crow.
== Description ==

A custom theme for the Die Jim Crow promo site, based on _s.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

This theme includes support for Jetpack's Infinite Scroll and Site Logos, as well as other features.

== Developer Notes ==

This is a child theme of the Singl theme https://wordpress.com/themes/singl/ . It has some custom styles, functions and templates.

= File Structure =

assets/
    fonts
    images
    scripts
    styles
dist/
    scripts
    styles
inc/
    custom.php
    enqueue.php
    setup.php
functions.php
style.css

= Workflow =

This theme is set up to use gulp to process SASS, script, images, etc. The source files are in the `assets` directory and the compiled files are moved to the `dist` directory.

= SASS =

This theme used the .scss syntax. SASS variables are set-up and can be changed in `assets/styles/custom/_variables.scss`. 


== Changelog ==

= 1.0.3 June 23, 2016 =
* Added video partial to display posts with format video
* Changed content loop to display full thumbnail size
* Added new thumbnail markup for bio, using thumbnail image
* Added custom post nav for bios
* Added featured image size
* Updated front-page comments
* Updated gallery styling to have responsive columns
* Applied archive styling to blog and category classes only
* Modified bio styling
* Changed press styling
* Changed black to #000
* Added red accent color for `em` tag on About page.
* Updated archive to display 1 post.
* Added category template which displays the sticky post or the most recent post.
* Removed woocommerce templates since they weren't working
* Added woocommerce support, though it didn't seem to have any impact
* Added events title image
* Changed events page title
* Modified templates to get post_format and added video format template
* Added entry class to all article tags
* Changed entry image block to figure
* Added has_post_thumbnail conditional to all places where thumbnail should display
* Created events list and widget templates that use standard theme markup
* Created excerpt partial
* Added a little space under meta
* Made entry-image always have 0 margin and image 100% width within it
* Removed top margin on single entry-title
* Added counter to category so only 1 post is retrieved in the main page
* Added a remove sticky posts function for flexible post widget


= 1.0.2 June 20, 2016 =
* Modified home page query to display just the first sticky post, if none return the last post published
* Added function to display count in post-class
* Updated styles

= 1.0.1 May 23, 2016 =
* Updated main nav to display background images
* Updated bio styling with background images


== Credits ==

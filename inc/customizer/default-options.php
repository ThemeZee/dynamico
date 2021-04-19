<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Dynamico
 */

/**
* Get a single theme option
*
* @return mixed
*/
function dynamico_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = dynamico_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function dynamico_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'dynamico_theme_options', array() ), dynamico_default_options() );

	// Return theme options.
	return apply_filters( 'dynamico_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function dynamico_default_options() {

	$default_options = array(
		'retina_logo'            => false,
		'site_title'             => true,
		'site_description'       => true,
		'theme_layout'           => 'centered',
		'sidebar_position'       => 'right-sidebar',
		'box_shadow'             => false,
		'blog_layout'            => 'two-column-grid',
		'blog_image'             => 'dynamico-ultra-wide',
		'blog_content'           => 'excerpt',
		'excerpt_length'         => 25,
		'excerpt_more_text'      => '[...]',
		'read_more_link'         => esc_html__( 'Read more', 'dynamico' ),
		'meta_date'              => true,
		'meta_author'            => false,
		'meta_comments'          => false,
		'meta_categories'        => true,
		'single_meta_date'       => true,
		'single_meta_author'     => true,
		'single_meta_comments'   => true,
		'single_meta_categories' => true,
		'post_layout'            => 'above-title',
		'post_image'             => 'dynamico-ultra-wide',
		'meta_tags'              => true,
		'post_navigation'        => true,
		'post_image_archives'    => true,
		'post_image_single'      => true,
		'featured_posts'         => true,
		'featured_category'      => 0,
		'featured_layout'        => 1,
		'footer_text'            => '',
		'credit_link'            => true,
	);

	return apply_filters( 'dynamico_default_options', $default_options );
}

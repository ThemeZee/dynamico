<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Dynamico
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dynamico_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = dynamico_theme_options();

	// Set Theme Layout.
	if ( 'wide' === $theme_options['theme_layout'] ) {
		$classes[] = 'wide-theme-layout';
	} elseif ( 'centered' === $theme_options['theme_layout'] ) {
		$classes[] = 'centered-theme-layout';
	}

	// Enable Box Shadows.
	if ( true === $theme_options['box_shadow'] ) {
		$classes[] = 'has-box-shadow';
	}

	// Add Sidebar class.
	if ( dynamico_has_sidebar() ) {
		$classes[] = 'has-sidebar';
	}

	// Check if sidebar is displayed on the left.
	if ( dynamico_has_sidebar() && 'left-sidebar' === $theme_options['sidebar_position'] &&
		! is_page_template( 'templates/template-sidebar-right.php' ) && ! is_page_template( 'templates/template-sidebar-right-no-title.php' ) ) {
		$classes[] = 'sidebar-left';
	}

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$classes[] = 'site-title-hidden';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$classes[] = 'site-description-hidden';
	}

	// Set Blog Layout.
	if ( ( is_archive() || is_home() ) && 'post' == get_post_type() ) {
		if ( 'horizontal-list' === $theme_options['blog_layout'] || 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list';
		} elseif ( 'vertical-list' === $theme_options['blog_layout'] || 'vertical-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-vertical-list';
		} elseif ( 'two-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-two-column-grid';
		} elseif ( 'three-column-grid' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-three-column-grid';
		}

		if ( 'horizontal-list-alt' === $theme_options['blog_layout'] ) {
			$classes[] = 'blog-layout-horizontal-list-alt';
		}
	}

	// Hide Date?
	if ( ( false === $theme_options['meta_date'] && ! is_single() )
		or ( false === $theme_options['single_meta_date'] && is_single() ) ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( ( false === $theme_options['meta_author'] && ! is_single() )
		or ( false === $theme_options['single_meta_author'] && is_single() ) ) {
		$classes[] = 'author-hidden';
	}

	// Hide Categories?
	if ( ( false === $theme_options['meta_categories'] && ! is_single() )
		or ( false === $theme_options['single_meta_categories'] && is_single() ) ) {
		$classes[] = 'categories-hidden';
	}

	// Hide Comments?
	if ( ( false === $theme_options['meta_comments'] && ! is_single() )
		or ( false === $theme_options['single_meta_comments'] && is_single() ) ) {
		$classes[] = 'comments-hidden';
	}

	// Hide Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$classes[] = 'tags-hidden';
	}

	// Hide Post Navigation in Customizer for instant live preview.
	if ( is_customize_preview() && is_single() && false === $theme_options['post_navigation'] ) {
		$classes[] = 'post-navigation-hidden';
	}

	// Hide Credit Link in Customizer for instant live preview.
	if ( is_customize_preview() && false === $theme_options['credit_link'] ) {
		$classes[] = 'credit-link-hidden';
	}

	// Check for AMP pages.
	if ( dynamico_is_amp() ) {
		$classes[] = 'is-amp-page';
	}

	// Add Blog Page class?
	if ( dynamico_is_blog_page() ) {
		$classes[] = 'is-blog-page';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'dynamico_body_classes' );


/**
 * Check if we are on a blog page or single post.
 *
 * @return bool
 */
function dynamico_is_blog_page() {
	return ( 'post' === get_post_type() ) && ( is_home() || is_archive() || is_single() );
}


/**
 * Check if sidebar should be displayed.
 *
 * @return bool
 */
function dynamico_has_sidebar() {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return false;
	}

	if ( dynamico_is_blog_page() && ! is_page_template( 'templates/template-no-sidebar.php' ) ) {
		return true;
	}

	if ( is_page_template( 'templates/template-sidebar-left.php' ) or is_page_template( 'templates/template-sidebar-left-no-title.php' ) or
		is_page_template( 'templates/template-sidebar-right.php' ) or is_page_template( 'templates/template-sidebar-right-no-title.php' ) ) {
		return true;
	}

	return false;
}


/**
 * Add custom CSS to scale down logo image for retina displays.
 *
 * @return void
 */
function dynamico_retina_logo() {
	// Return early if there is no logo image or option for retina logo is disabled.
	if ( ! has_custom_logo() or false === dynamico_get_option( 'retina_logo' ) ) {
		return;
	}

	// Get Logo Image.
	$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	// Create CSS.
	$css = '.site-logo .custom-logo { width: ' . absint( floor( $logo[1] / 2 ) ) . 'px; }';

	// Add Custom CSS.
	wp_add_inline_style( 'dynamico-stylesheet', $css );
}
add_filter( 'wp_enqueue_scripts', 'dynamico_retina_logo', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function dynamico_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get excerpt length from database.
	$excerpt_length = dynamico_get_option( 'excerpt_length' );

	// Return excerpt text.
	if ( $excerpt_length >= 0 ) :
		return absint( $excerpt_length );
	else :
		return 55; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'dynamico_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function dynamico_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}

	return esc_html( ' ' . dynamico_get_option( 'excerpt_more_text' ) );
}
add_filter( 'excerpt_more', 'dynamico_excerpt_more' );


/**
 * Get Featured Content Post IDs
 *
 * @param String $cache_id        Cache Instance.
 * @param int    $category        Category ID.
 * @param int    $number_of_posts Number of posts.
 * @return array Post IDs
 */
function dynamico_get_featured_post_ids( $cache_id, $category, $number_of_posts ) {

	$cache_id = sanitize_key( $cache_id );
	$post_ids = get_transient( 'dynamico_featured_post_ids' );

	if ( ! isset( $post_ids[ $cache_id ] ) || is_customize_preview() ) {

		// Get Posts from Database.
		$query = new WP_Query( array(
			'fields'              => 'ids',
			'cat'                 => (int) $category,
			'posts_per_page'      => (int) $number_of_posts,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );

		// Create an array of all post ids.
		$post_ids[ $cache_id ] = $query->posts;

		// Set Transient.
		set_transient( 'dynamico_featured_post_ids', $post_ids );
	}

	return apply_filters( 'dynamico_featured_post_ids', $post_ids[ $cache_id ], $cache_id );
}


/**
 * Delete Cached Post IDs
 *
 * @return void
 */
function dynamico_flush_featured_post_ids() {
	delete_transient( 'dynamico_featured_post_ids' );
}
add_action( 'save_post', 'dynamico_flush_featured_post_ids' );
add_action( 'deleted_post', 'dynamico_flush_featured_post_ids' );
add_action( 'customize_save_after', 'dynamico_flush_featured_post_ids' );
add_action( 'switch_theme', 'dynamico_flush_featured_post_ids' );


/**
 * Exclude Featured Post IDs from main query
 *
 * @return array Post IDs
 */
function dynamico_exclude_featured_post_ids_from_blog( $query ) {
	if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {

		// Get Featured Posts category from Database.
		$featured_category = dynamico_get_option( 'featured_category' );
		$featured_layout   = dynamico_get_option( 'featured_layout' );

		// Get cached post ids.
		$post_ids = dynamico_get_featured_post_ids( 'featured-content', $featured_category, $featured_layout );

		// Exclude Posts
		$query->set( 'post__not_in', $post_ids );
	}
}
add_action( 'pre_get_posts', 'dynamico_exclude_featured_post_ids_from_blog' );

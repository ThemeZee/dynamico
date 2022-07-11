<?php
/**
 * Dynamico functions and definitions
 *
 * @package Dynamico
 */

/**
 * Dynamico only works in WordPress 5.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dynamico_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'dynamico', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Set default Post Thumbnail size.
	set_post_thumbnail_size( 1800, 9999 );

	// Add custom image sizes.
	add_image_size( 'dynamico-featured-content', 1800, 600, true );
	add_image_size( 'dynamico-ultra-wide', 1800, 600, true );
	add_image_size( 'dynamico-landscape', 1840, 1035, true );
	add_image_size( 'dynamico-classic', 1800, 1350, true );
	add_image_size( 'dynamico-square', 900, 900, true );
	add_image_size( 'dynamico-portrait', 900, 1200, true );

	// Register Navigation Menus.
	register_nav_menus( array(
		'primary'       => esc_html__( 'Main Navigation', 'dynamico' ),
		'social-header' => esc_html__( 'Social Icons (Header)', 'dynamico' ),
	) );

	// Switch default core markup for galleries and captions to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom logo feature.
	add_theme_support( 'custom-logo', apply_filters( 'dynamico_custom_logo_args', array(
		'height'      => 60,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	) ) );

	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'dynamico_custom_header_args', array(
		'header-text' => false,
		'width'       => 2680,
		'height'      => 600,
		'flex-width'  => true,
		'flex-height' => true,
	) ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dynamico_custom_background_args', array(
		'default-color' => 'ededef',
	) ) );

	// Add Theme Support for Selective Refresh in Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for responsive embed blocks.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'dynamico_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dynamico_content_width() {

	// Default content width.
	$content_width = 900;

	// Set global variable for content width.
	$GLOBALS['content_width'] = apply_filters( 'dynamico_content_width', $content_width );
}
add_action( 'after_setup_theme', 'dynamico_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function dynamico_scripts() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Register and Enqueue Stylesheet.
	wp_enqueue_style( 'dynamico-stylesheet', get_stylesheet_uri(), array(), $theme_version );

	// Register and enqueue navigation.js.
	if ( ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) && ! dynamico_is_amp() ) {
		wp_enqueue_script( 'dynamico-navigation', get_theme_file_uri( '/assets/js/navigation.min.js' ), array(), '20220204', true );
		$dynamico_l10n = array(
			'expand'   => esc_html__( 'Expand child menu', 'dynamico' ),
			'collapse' => esc_html__( 'Collapse child menu', 'dynamico' ),
			'icon'     => dynamico_get_svg( 'expand' ),
		);
		wp_localize_script( 'dynamico-navigation', 'dynamicoScreenReaderText', $dynamico_l10n );
	}

	// Enqueue svgxuse to support external SVG Sprites in Internet Explorer.
	if ( ! dynamico_is_amp() ) {
		wp_enqueue_script( 'svgxuse', get_theme_file_uri( '/assets/js/svgxuse.min.js' ), array(), '1.2.6' );
	}

	// Register Comment Reply Script for Threaded Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dynamico_scripts' );


/**
* Enqueue theme fonts.
*/
function dynamico_theme_fonts() {
	$fonts_url = dynamico_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'dynamico-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
	}
}
add_action( 'wp_enqueue_scripts', 'dynamico_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'dynamico_theme_fonts', 1 );


/**
 * Retrieve webfont URL to load fonts locally.
 */
function dynamico_get_fonts_url() {
	$font_families = array(
		'Ubuntu:400,400italic,700,700italic',
		'Francois One:400,400italic,700,700italic',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'dynamico_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}


/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dynamico_widgets_init() {

	// Register Blog Sidebar widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dynamico' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html_x( 'Appears on blog pages and single posts.', 'widget area description', 'dynamico' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Register Header widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'dynamico' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Appears on header area. You can add a search or an ad widget here.', 'dynamico' ),
		'before_widget' => '<aside id="%1$s" class="header-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="header-widget-title">',
		'after_title'   => '</h4>',
	) );

	// Register Footer Copyright widget area.
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'dynamico' ),
		'id'            => 'footer-copyright',
		'description'   => esc_html_x( 'Appears in the bottom footer line.', 'widget area description', 'dynamico' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'dynamico_widgets_init', 30 );


/**
 * Make custom image sizes available in Gutenberg.
 */
function dynamico_add_image_size_names( $sizes ) {
	return array_merge( $sizes, array(
		'post-thumbnail'      => esc_html__( 'Post Thumbnail', 'dynamico' ),
		'dynamico-ultra-wide' => esc_html__( 'Dynamico Ultra Wide (3:1)', 'dynamico' ),
		'dynamico-landscape'  => esc_html__( 'Dynamico Landscape (16:9)', 'dynamico' ),
		'dynamico-classic'    => esc_html__( 'Dynamico Classic (4:3)', 'dynamico' ),
		'dynamico-square'     => esc_html__( 'Dynamico Square (1:1)', 'dynamico' ),
		'dynamico-portrait'   => esc_html__( 'Dynamico Portrait (3:4)', 'dynamico' ),
	) );
}
add_filter( 'image_size_names_choose', 'dynamico_add_image_size_names' );


/**
 * Include Files
 */

// Include Theme Info page.
require get_template_directory() . '/inc/theme-info.php';

// Include Customizer Options.
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/default-options.php';

// Include SVG Icon Functions.
require get_template_directory() . '/inc/icons.php';

// Include Template Functions.
require get_template_directory() . '/inc/template-functions.php';

// Include Template Tags.
require get_template_directory() . '/inc/template-tags.php';

// Include Gutenberg Features.
require get_template_directory() . '/inc/gutenberg.php';

// Include support functions for Theme Addons.
require get_template_directory() . '/inc/addons.php';

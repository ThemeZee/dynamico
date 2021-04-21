<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Dynamico
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function dynamico_gutenberg_support() {

	// Add theme support for wide and full images.
	add_theme_support( 'align-wide' );

	// Define block color palette.
	$color_palette = apply_filters( 'dynamico_color_palette', array(
		'primary_color'    => '#e84747',
		'secondary_color'  => '#cb3e3e',
		'tertiary_color'   => '#ae3535',
		'contrast_color'   => '#4747e8',
		'accent_color'     => '#47e897',
		'highlight_color'  => '#e8e847',
		'light_gray_color' => '#eeeeee',
		'gray_color'       => '#777777',
		'dark_gray_color'  => '#333333',
	) );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'dynamico_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'dynamico' ),
			'slug'  => 'primary',
			'color' => esc_html( $color_palette['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'dynamico' ),
			'slug'  => 'secondary',
			'color' => esc_html( $color_palette['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Tertiary', 'block color', 'dynamico' ),
			'slug'  => 'tertiary',
			'color' => esc_html( $color_palette['tertiary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Contrast', 'block color', 'dynamico' ),
			'slug'  => 'contrast',
			'color' => esc_html( $color_palette['contrast_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'dynamico' ),
			'slug'  => 'accent',
			'color' => esc_html( $color_palette['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'dynamico' ),
			'slug'  => 'highlight',
			'color' => esc_html( $color_palette['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'dynamico' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'dynamico' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $color_palette['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'dynamico' ),
			'slug'  => 'gray',
			'color' => esc_html( $color_palette['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'dynamico' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $color_palette['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'dynamico' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'dynamico_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'dynamico' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'dynamico' ),
			'size' => 24,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'dynamico' ),
			'size' => 36,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'dynamico' ),
			'size' => 48,
			'slug' => 'extra-large',
		),
		array(
			'name' => esc_html_x( 'Huge', 'block font size', 'dynamico' ),
			'size' => 64,
			'slug' => 'huge',
		),
	) ) );

	// Check if block pattern functions are available.
	if ( function_exists( 'register_block_pattern' ) && function_exists( 'register_block_pattern_category' ) ) {

		// Register Dynamico block pattern category.
		register_block_pattern_category( 'dynamico', array( 'label' => esc_html__( 'Dynamico', 'dynamico' ) ) );

		// Register Block patterns.
		register_block_pattern( 'dynamico/portfolio', array(
			'title'      => esc_html__( 'Portfolio', 'dynamico' ),
			'content'    => "<!-- wp:group --><div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 1</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 2</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 3</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns --><div class=\"wp-block-columns\"><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 4</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 5</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>Project 6</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
			'categories' => array( 'dynamico' ),
		) );

		register_block_pattern( 'dynamico/services', array(
			'title'      => esc_html__( 'Services', 'dynamico' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 1</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --><!-- wp:spacer --><div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:media-text {\"mediaPosition\":\"right\"} --><div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 2</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --><!-- wp:spacer --><div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:media-text --><div class=\"wp-block-media-text alignwide is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading --><h2>Service 3</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div></div><!-- /wp:group -->",
			'categories' => array( 'dynamico' ),
		) );

		register_block_pattern( 'dynamico/about', array(
			'title'      => esc_html__( 'About', 'dynamico' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column {\"width\":30} --><div class=\"wp-block-column\" style=\"flex-basis:30%\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading --><h2>About us</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:separator {\"className\":\"is-style-wide\"} --><hr class=\"wp-block-separator is-style-wide\"/><!-- /wp:separator --><!-- wp:paragraph {\"fontSize\":\"large\"} --><p class=\"has-large-font-size\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p><!-- /wp:paragraph --><!-- wp:separator {\"className\":\"is-style-wide\"} --><hr class=\"wp-block-separator is-style-wide\"/><!-- /wp:separator --><!-- wp:spacer {\"height\":30} --><div style=\"height:30px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div><!-- /wp:spacer --><!-- wp:heading {\"level\":3} --><h3>Service 1</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Service 2</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Service 3</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
			'categories' => array( 'dynamico' ),
		) );

		register_block_pattern( 'dynamico/projects', array(
			'title'      => esc_html__( 'Projects', 'dynamico' ),
			'content'    => "<!-- wp:group {\"align\":\"full\",\"backgroundColor\":\"white\"} --><div class=\"wp-block-group alignfull has-white-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} --><div class=\"wp-block-columns alignwide\"><!-- wp:column {\"width\":20} --><div class=\"wp-block-column\" style=\"flex-basis:20%\"><!-- wp:heading --><h2>Projects</h2><!-- /wp:heading --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Project 1</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class=\"wp-block-column\"><!-- wp:image --><figure class=\"wp-block-image\"><img alt=\"\"/></figure><!-- /wp:image --><!-- wp:heading {\"level\":3} --><h3>Project 2</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div></div><!-- /wp:group -->",
			'categories' => array( 'dynamico' ),
		) );
	}
}
add_action( 'after_setup_theme', 'dynamico_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function dynamico_block_editor_assets() {

	// Get Theme Version.
	$theme_version = wp_get_theme()->get( 'Version' );

	// Enqueue Editor Styling.
	wp_enqueue_style( 'dynamico-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), $theme_version, 'all' );

	// Enqueue Page Template Switcher Editor plugin.
	wp_enqueue_script( 'dynamico-page-template-switcher', get_theme_file_uri( '/assets/js/page-template-switcher.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), $theme_version );
}
add_action( 'enqueue_block_editor_assets', 'dynamico_block_editor_assets' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function dynamico_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
add_filter( 'block_editor_settings', 'dynamico_block_editor_settings', 11 );


/**
 * Add body classes in Gutenberg Editor.
 */
function dynamico_block_editor_body_classes( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Set Theme Layout.
	if ( 'wide' === dynamico_get_option( 'theme_layout' ) ) {
		$classes .= ' dynamico-wide-theme-layout ';
	} else {
		$classes .= ' dynamico-centered-theme-layout ';
	}

	// Fullwidth Page Template?
	if ( 'templates/template-fullwidth.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' dynamico-fullwidth-page-layout ';
	}

	// No Title Page Template?
	if ( 'templates/template-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-left-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-right-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' dynamico-page-title-hidden ';
	}

	// Full-width / No Title Page Template?
	if ( 'templates/template-fullwidth-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' dynamico-fullwidth-page-layout dynamico-page-title-hidden ';
	}

	return $classes;
}
add_filter( 'admin_body_class', 'dynamico_block_editor_body_classes' );

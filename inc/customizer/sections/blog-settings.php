<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Dynamico
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function dynamico_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'dynamico_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'dynamico' ),
		'priority' => 30,
		'panel'    => 'dynamico_options_panel',
	) );

	// Get Default Settings.
	$default = dynamico_default_options();

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting( 'dynamico_theme_options[blog_layout]', array(
		'default'           => $default['blog_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dynamico_sanitize_select',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[blog_layout]', array(
		'label'    => esc_html__( 'Blog Layout', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[blog_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'horizontal-list'     => esc_html__( 'Horizontal List', 'dynamico' ),
			'horizontal-list-alt' => esc_html__( 'Horizontal List (alternative)', 'dynamico' ),
			'vertical-list'       => esc_html__( 'Vertical List', 'dynamico' ),
			'vertical-list-alt'   => esc_html__( 'Vertical List (alternative)', 'dynamico' ),
			'two-column-grid'     => esc_html__( 'Two Column Grid', 'dynamico' ),
			'three-column-grid'   => esc_html__( 'Three Column Grid', 'dynamico' ),
		),
	) );

	// Add Settings and Controls for blog image.
	$wp_customize->add_setting( 'dynamico_theme_options[blog_image]', array(
		'default'           => $default['blog_image'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dynamico_sanitize_select',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[blog_image]', array(
		'label'    => esc_html__( 'Blog Image', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[blog_image]',
		'type'     => 'select',
		'priority' => 20,
		'choices'  => array(
			'dynamico-ultra-wide' => esc_html__( 'Ultra Wide (3:1)', 'dynamico' ),
			'dynamico-landscape'  => esc_html__( 'Landscape (16:9)', 'dynamico' ),
			'dynamico-classic'    => esc_html__( 'Classic (4:3)', 'dynamico' ),
			'dynamico-square'     => esc_html__( 'Square (1:1)', 'dynamico' ),
			'dynamico-portrait'   => esc_html__( 'Portrait (3:4)', 'dynamico' ),
			'post-thumbnail'      => esc_html__( 'Flexible Height', 'dynamico' ),
			'hide-image'          => esc_html__( 'Hide Image', 'dynamico' ),
		),
	) );

	// Add Settings and Controls for blog content.
	$wp_customize->add_setting( 'dynamico_theme_options[blog_content]', array(
		'default'           => $default['blog_content'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dynamico_sanitize_select',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[blog_content]', array(
		'label'    => esc_html__( 'Blog Content', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[blog_content]',
		'type'     => 'radio',
		'priority' => 30,
		'choices'  => array(
			'full'    => esc_html__( 'Full post', 'dynamico' ),
			'excerpt' => esc_html__( 'Post excerpt', 'dynamico' ),
		),
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'dynamico_theme_options[excerpt_length]', array(
		'default'           => $default['excerpt_length'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[excerpt_length]',
		'type'     => 'number',
		'priority' => 40,
	) );

	// Add Setting and Control for Excerpt More Text.
	$wp_customize->add_setting( 'dynamico_theme_options[excerpt_more_text]', array(
		'default'           => $default['excerpt_more_text'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[excerpt_more_text]', array(
		'label'    => esc_html__( 'Excerpt More Text', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[excerpt_more_text]',
		'type'     => 'text',
		'priority' => 50,
	) );

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial( 'dynamico_blog_layout_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'dynamico_theme_options[blog_layout]',
			'dynamico_theme_options[blog_image]',
			'dynamico_theme_options[blog_content]',
			'dynamico_theme_options[excerpt_length]',
			'dynamico_theme_options[excerpt_more_text]',
			'posts_per_page',
			'dynamico_theme_options[featured_posts]',
			'dynamico_theme_options[featured_category]',
			'dynamico_theme_options[featured_layout]',
		),
		'render_callback'  => 'dynamico_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );

	// Add Setting and Control for Read More Text.
	$wp_customize->add_setting( 'dynamico_theme_options[read_more_link]', array(
		'default'           => $default['read_more_link'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[read_more_link]', array(
		'label'    => esc_html__( 'Read More Link', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'dynamico_theme_options[read_more_link]',
		'type'     => 'text',
		'priority' => 60,
	) );

	// Add Setting and Control for Number of posts.
	$wp_customize->add_setting( 'posts_per_page', array(
		'default'           => absint( get_option( 'posts_per_page' ) ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'dynamico_posts_per_page_setting', array(
		'label'    => esc_html__( 'Number of Posts', 'dynamico' ),
		'section'  => 'dynamico_section_blog',
		'settings' => 'posts_per_page',
		'type'     => 'number',
		'priority' => 70,
	) );
}
add_action( 'customize_register', 'dynamico_customize_register_blog_settings' );

/**
 * Render the blog layout for the selective refresh partial.
 */
function dynamico_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/blog/content', esc_attr( dynamico_get_option( 'blog_layout' ) ) );
	}
}

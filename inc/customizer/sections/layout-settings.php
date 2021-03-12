<?php
/**
 * Layout Settings
 *
 * Register Layout Settings section, settings and controls for Theme Customizer
 *
 * @package Dynamico
 */

/**
 * Adds Layout settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function dynamico_customize_register_layout_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'dynamico_section_layout', array(
		'title'    => esc_html__( 'Layout Settings', 'dynamico' ),
		'priority' => 10,
		'panel'    => 'dynamico_options_panel',
	) );

	// Get Default Settings.
	$default = dynamico_default_options();

	// Add Settings and Controls for Theme Layout.
	$wp_customize->add_setting( 'dynamico_theme_options[theme_layout]', array(
		'default'           => $default['theme_layout'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dynamico_sanitize_select',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[theme_layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'dynamico' ),
		'section'  => 'dynamico_section_layout',
		'settings' => 'dynamico_theme_options[theme_layout]',
		'type'     => 'select',
		'priority' => 10,
		'choices'  => array(
			'centered' => esc_html__( 'Centered Layout', 'dynamico' ),
			'wide'     => esc_html__( 'Wide Layout', 'dynamico' ),
		),
	) );

	// Add Settings and Controls for Sidebar Position.
	$wp_customize->add_setting( 'dynamico_theme_options[sidebar_position]', array(
		'default'           => 'right-sidebar',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'dynamico_sanitize_select',
	) );

	$wp_customize->add_control( 'dynamico_theme_options[sidebar_position]', array(
		'label'    => esc_html__( 'Sidebar Position', 'dynamico' ),
		'section'  => 'dynamico_section_layout',
		'settings' => 'dynamico_theme_options[sidebar_position]',
		'type'     => 'radio',
		'priority' => 20,
		'choices'  => array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'dynamico' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'dynamico' ),
		),
	) );
}
add_action( 'customize_register', 'dynamico_customize_register_layout_settings' );

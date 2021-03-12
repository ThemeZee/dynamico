<?php
/**
 * Dynamico back compat functionality
 *
 * Prevents Dynamico from running on WordPress versions prior to 5.2,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.2.
 *
 * @package Dynamico
 *
 * Original Code: Twenty Seventeen http://wordpress.org/themes/twentyseventeen
 * Original Copyright: the WordPress team and contributors.
 *
 * The following code is a derivative work of the code from the Twenty Seventeen theme,
 * which is licensed GPLv2 or later. This code therefore is also licensed under the terms
 * of the GNU Public License, version 2.
 */

/**
 * Prevent switching to Dynamico on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Dynamico 1.0
 */
function dynamico_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'dynamico_upgrade_notice' );
}
add_action( 'after_switch_theme', 'dynamico_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Dynamico on WordPress versions prior to 5.2.
 *
 * @global string $wp_version WordPress version.
 */
function dynamico_upgrade_notice() {
	$message = sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'dynamico' ), 'Dynamico', '5.2', $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.2.
 *
 * @global string $wp_version WordPress version.
 */
function dynamico_customize() {
	wp_die( sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'dynamico' ), 'Dynamico', '5.2', $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'dynamico_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.2.
 *
 * @global string $wp_version WordPress version.
 */
function dynamico_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'dynamico' ), 'Dynamico', '5.2', $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'dynamico_preview' );

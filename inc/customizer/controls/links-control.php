<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Dynamico
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Dynamico_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'dynamico' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/dynamico/', 'dynamico' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=dynamico&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'dynamico' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=dynamico&utm_source=customizer&utm_campaign=dynamico" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'dynamico' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/dynamico-documentation/', 'dynamico' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=dynamico&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'dynamico' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=dynamico/', 'dynamico' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'dynamico' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/dynamico/reviews/', 'dynamico' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'dynamico' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;

<?php
/**
 * Header Content - displays widgets and social menu
 *
 * @version 1.0
 * @package Dynamico
 */

if ( has_nav_menu( 'social' ) || is_active_sidebar( 'header' ) ) : ?>

	<div class="header-content">

		<?php if ( is_active_sidebar( 'header' ) ) : ?>

			<div class="header-widgets">

				<?php dynamic_sidebar( 'header' ); ?>

			</div><!-- .header-widgets -->

		<?php endif; ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>

			<div id="header-social-icons" class="header-social-menu dynamico-social-menu">

				<?php
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container'      => false,
					'menu_class'     => 'social-icons-menu',
					'echo'           => true,
					'fallback_cb'    => '',
					'link_before'    => '<span class = "screen-reader-text">',
					'link_after'     => '</span>',
					'depth'          => 1,
				) );
				?>

			</div><!-- .header-social-menu -->

		<?php endif; ?>

	</div>

	<?php
endif;

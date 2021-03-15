<?php
/**
 * Header Widgets
 *
 * @version 1.0
 * @package Dynamico
 */

if ( is_active_sidebar( 'header' ) ) :
	?>

	<div class="header-widgets">

		<?php dynamic_sidebar( 'header' ); ?>

	</div><!-- .header-widgets -->

	<?php
endif;

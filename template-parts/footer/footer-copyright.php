<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package Dynamico
 */


// Check if there is footer content available.
if ( is_active_sidebar( 'footer-copyright' ) || true === dynamico_get_option( 'credit_link' ) || '' !== dynamico_get_option( 'footer_text' ) ) :
	?>

	<div id="footer-line" class="site-info">

		<?php dynamic_sidebar( 'footer-copyright' ); ?>
		<?php dynamico_footer_text(); ?>
		<?php dynamico_credit_link(); ?>

	</div>

	<?php
endif;

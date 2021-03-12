<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @version 1.0
 * @package Dynamico
 */

?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #content -->

	<?php do_action( 'dynamico_before_footer' ); ?>

	<div class="footer-wrap">

		<?php do_action( 'dynamico_footer_widgets' ); ?>

		<footer id="colophon" class="site-footer">

			<?php do_action( 'dynamico_footer_menu' ); ?>
			<?php get_template_part( 'template-parts/footer/footer', 'copyright' ); ?>

		</footer><!-- #colophon -->

	</div>

	<?php do_action( 'dynamico_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

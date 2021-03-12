<?php
/**
 * The template for displaying single posts
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php dynamico_post_image_single(); ?>

	<header class="post-header entry-header">

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php dynamico_entry_meta(); ?>

		<?php dynamico_entry_categories(); ?>

	</header><!-- .entry-header -->

	<?php get_template_part( 'template-parts/entry/entry', 'single' ); ?>

</article>

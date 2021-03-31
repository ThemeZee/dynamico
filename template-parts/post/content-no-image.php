<?php
/**
 * The template for displaying single posts without a featured image
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post-header entry-header">

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php dynamico_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php get_template_part( 'template-parts/entry/entry', 'single' ); ?>

	<?php do_action( 'dynamico_after_posts' ); ?>
	<?php do_action( 'dynamico_author_bio' ); ?>

	<?php dynamico_entry_tags(); ?>
	<?php dynamico_entry_categories(); ?>

</article>

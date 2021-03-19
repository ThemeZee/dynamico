<?php
/**
 * The template for displaying articles in the two column grid layout
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="post-column">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php dynamico_post_image_archives(); ?>

		<header class="post-header entry-header">

			<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php dynamico_entry_meta(); ?>

		</header><!-- .entry-header -->

		<?php get_template_part( 'template-parts/entry/entry', esc_html( dynamico_get_option( 'blog_content' ) ) ); ?>

		<?php dynamico_entry_categories(); ?>

	</article>

</div>

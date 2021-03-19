<?php
/**
 * The template for displaying articles in the loop with the horizontal list blog layout.
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php dynamico_post_image_archives( 'dynamico-horizontal-list-post' ); ?>

	<div class="entry-wrap">

		<header class="post-header entry-header">

			<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php dynamico_entry_meta(); ?>

		</header><!-- .entry-header -->

		<?php get_template_part( 'template-parts/entry/entry', esc_html( dynamico_get_option( 'blog_content' ) ) ); ?>

		<?php dynamico_entry_categories(); ?>

	</div>

</article>

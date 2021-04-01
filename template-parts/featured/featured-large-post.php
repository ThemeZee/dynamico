<?php
/**
 * The template for displaying articles in the vertical list
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php dynamico_post_image_archives(); ?>

	<div class="post-content">

		<header class="post-header entry-header">

			<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content entry-excerpt">

			<?php the_excerpt(); ?>

		</div><!-- .entry-content -->

	</div>

</article>

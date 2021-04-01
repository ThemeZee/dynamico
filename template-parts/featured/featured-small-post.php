<?php
/**
 * The template for displaying articles in the three column grid layout
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="post-column">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-content">

			<header class="post-header entry-header">

				<?php the_title( sprintf( '<h2 class="post-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			</header><!-- .entry-header -->

		</div>

	</article>

</div>

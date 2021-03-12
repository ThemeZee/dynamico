<?php
/**
 * The template used for displaying page content in page.php
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php dynamico_post_image_page(); ?>

	<header class="page-header entry-header">

		<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>
		<?php wp_link_pages(); ?>

	</div><!-- .entry-content -->

	<?php do_action( 'dynamico_after_pages' ); ?>

</article>

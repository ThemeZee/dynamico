<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="entry-content">

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>

</div><!-- .entry-content -->

<?php do_action( 'dynamico_after_posts' ); ?>
<?php do_action( 'dynamico_author_bio' ); ?>
<?php dynamico_entry_tags(); ?>

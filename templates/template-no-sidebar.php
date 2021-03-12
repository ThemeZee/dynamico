<?php
/**
 * Template Name: No Sidebar
 * Template Post Type: post
 *
 * Description: A custom template for displaying a post without sidebar.
 *
 * @package Dynamico
 */

get_header();

while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/post/content', 'single' );

	dynamico_post_navigation();

	do_action( 'dynamico_related_posts' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();

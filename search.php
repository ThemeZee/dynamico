<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @version 1.1
 * @package Dynamico
 */

get_header();

if ( have_posts() ) :

	dynamico_search_header();
	get_search_form();

	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/page/content', 'search' );

	endwhile;

	dynamico_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();

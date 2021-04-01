<?php
/**
 * Featured Content Template
 *
 * Queries posts by selected featured category and displays featured posts
 *
 * @version 1.0
 * @package Dynamico
 */

// Get Featured Posts category from Database.
$featured_category = dynamico_get_option( 'featured_category' );

// Get cached post ids.
$post_ids = dynamico_get_featured_post_ids( 'featured-content', $featured_category, 5 );

// Fetch posts from database.
$featured_query = new WP_Query( array(
	'post__in'            => $post_ids,
	'posts_per_page'      => 4,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
) );

// Check if there are posts.
if ( $featured_query->have_posts() ) : ?>

	<div id="featured-posts-wrap" class="featured-posts-wrap">

		<div id="featured-posts" class="featured-posts">

			<?php
			// Display Posts.
			while ( $featured_query->have_posts() ) :

				$featured_query->the_post();

				// Display first post differently.
				if ( 0 === $featured_query->current_post ) :

					get_template_part( 'template-parts/featured/featured', 'large-post' );

					echo '<div class="featured-posts-grid">';

				else :

					get_template_part( 'template-parts/featured/featured', 'small-post' );

				endif;

			endwhile;

			echo '</div><!-- end .featured-posts-grid -->';
			?>

		</div>

	</div>

	<?php
endif;

// Reset Postdata.
wp_reset_postdata();

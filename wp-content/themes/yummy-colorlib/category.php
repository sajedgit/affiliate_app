<?php get_header(); ?>

<?php get_sidebar('single_page_header'); ?>

 


						
						<?php /*
						// Start the loop.
						while ( have_posts() ) : the_post();

						 //echo get_the_post_thumbnail_url($post_id, ''); 
							the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); 
							
						    echo "<br/>";
						
							if ( has_post_thumbnail() ) 
							{ // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail( 'medium_large' );
							}
							echo "<br/><br/>";
							
							//echo get_the_excerpt();
							echo the_content();
							
							echo "<br/><br/><br/>";

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						

							// End of the loop.
						endwhile;
						*/?>
						
						
	





<?php get_sidebar('category_blog'); ?>

 
 

<?php get_footer() ?>




 
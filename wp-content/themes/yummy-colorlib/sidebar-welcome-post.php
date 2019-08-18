<?php 
$args = array('numberposts' => 4);
$welcome_posts = get_posts( $args );
?>

<section class="welcome-post-sliders owl-carousel container">
    

		<?php foreach($welcome_posts as $post): ?>
		<?php 
			setup_postdata( $post );
			$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full')
		?>
        <!-- Single Slide -->
        <div class="welcome-single-slide">
            <!-- Post Thumb -->
            <img src="<?php echo $featured_img_url ?>" alt="">
            <!-- Overlay Text -->
            <div class="project_title">
                <div class="post-date-commnents d-flex">
                    <a href="#"><?php echo get_the_date( 'M d, Y' ); ?></a>
                    <a href="#"><?php echo get_comments_number($post->ID); ?> Comment</a>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <h5><?php the_title(); ?></h5>
                </a>
            </div>
        </div>
	   <?php endforeach; wp_reset_postdata(); ?>
		
		

     

      


      

    </section>
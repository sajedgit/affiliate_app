  <!-- Background Pattern Swither -->
    <div id="pattern-switcher"> <!-- js code on active.js-->
          <h6 class="block_heading">Populer Post</h6>
	   
	   
		   <?php 
				$args = array(
				  'numberposts' => 25
				);
				$popular_posts = get_posts( $args );
				foreach($popular_posts as $post):
				setup_postdata( $post );
				$featured_img = get_the_post_thumbnail_url($post->ID, 'thumb')
			?>
		                           
			<!-- Single Popular Post -->
			<div class="row fixed_sidebar">
				
				<div class="fixed_sidebar_content">
					<img src="<?php echo $featured_img ?>" width="40%"  alt="">
					<a href="<?php the_permalink(); ?>">
						<p><?php the_title(); ?></p>
					</a>
					
					<p><?php //echo get_the_date( 'M d, Y' ); ?></p>
				</div>
			</div>
			<?php endforeach; wp_reset_postdata(); ?> 

		
    </div>
    <!--<div id="patter-close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>-->
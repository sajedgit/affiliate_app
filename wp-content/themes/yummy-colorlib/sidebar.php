<!-- sticky side bar doc
 
   https://stackoverflow.com/questions/40497288/how-to-create-a-fixed-sidebar-layout-with-bootstrap-4/49436717 

 -->

<!-- ****** Blog Sidebar ****** -->
<div class="col-12 col-sm-8 col-md-6 col-lg-4" id="sticky-sidebar">
    <div class="blog-sidebar mt-5 mt-lg-0 sticky-top">


        <!-- Single Widget Area -->
        <div class="single-widget-area popular-post-widget">
            <div class="widget-title text-center">
                <h6>Populer Post</h6>

            </div>

		   
			  <?php
				// Current week's popular posts

				$query_args = array(
					'post_type' => 'post',
					'meta_key' => 'post_views_count',
					'orderby' => 'meta_value_num',
					'ignore_sticky_posts' => 1,
					'posts_per_page' => '5',
				);

				$my_query = new WP_Query( $query_args );

				if ( $my_query->have_posts() ) :
					while ( $my_query->have_posts() ) : $my_query->the_post();
					 $featured_img = get_the_post_thumbnail_url($post->ID, 'medium');
					 if($post->ID==48)
						continue;
				?>
                <!-- Single Popular Post -->
                <div class="row fixed_sidebar">

                    <div class="fixed_sidebar_content  h-100" style="width:90%;">
                        <img src="<?php echo $featured_img ?>" width="30%" alt="<?php the_title(); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <p class=" my-auto"><?php the_title(); ?></p>
                        </a>

                        <p><?php //echo get_the_date( 'M d, Y' ); ?></p>
                    </div>
                </div>
				<?php
					endwhile;
				endif;
				wp_reset_postdata();
		   ?>
           

        </div>

        <div class="single-widget-area dynamic-sidebar-widget">
            <?php if (is_active_sidebar('sidebar-1')) : ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
            <?php endif; ?>
        </div>

    </div>

</div>
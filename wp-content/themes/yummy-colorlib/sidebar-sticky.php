<section class="container">
    


<?php
						// get sticky posts from DB
						$sticky = get_option('sticky_posts');
						// check if there are any
						if (!empty($sticky)) 
						{
							// optional: sort the newest IDs first
							rsort($sticky);
							// override the query
							$args = array(
								'post__in' => $sticky
							);
							query_posts($args);
							// the loop
							while (have_posts()) 
							{
								 the_post();
								 setup_postdata( $post );
								 $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full')
								 // your code
						?>
                        <!-- stiky Post -->
                        <div class="col-12">
                            <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb sticky_image  justify-content-center">
                                      <img src="<?php echo $featured_img_url ?>" height="" alt="Merry Christmas">
                                </div>
                                <!-- Post Content -->
                              <div class="post-content intro_text row">
                                   
                                    <p><?php the_content(); ?></p>
                                </div>  
                            </div>
                        </div>
						
						<?php
							}
						}
					?>

      

</section>

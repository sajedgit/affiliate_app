
                <!-- ****** Blog Sidebar ****** -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="blog-sidebar mt-5 mt-lg-0">
                                          

                        <!-- Single Widget Area -->
                        <div class="single-widget-area popular-post-widget">
                            <div class="widget-title text-center">
                                <h6>Populer Post</h6>
							
                            </div>
                           <?php 
								$args = array(
								  'numberposts' => 5
								);
								$popular_posts = get_posts( $args );
								foreach($popular_posts as $post):
								setup_postdata( $post );
								$featured_img = get_the_post_thumbnail_url($post->ID, 'thumb')
							?>
		                           
                            <!-- Single Popular Post -->
                            <div class="single-populer-post d-flex">
                                <img src="<?php echo $featured_img ?>" width=""  alt="">
                                <div class="post-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h6><?php the_title(); ?></h6>
                                    </a>
                                    
                                    <p><?php echo get_the_date( 'M d, Y' ); ?></p>
                                </div>
                            </div>
							<?php endforeach; wp_reset_postdata(); ?>
							
                        </div>

						<div class="single-widget-area dynamic-sidebar-widget">
							<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
									<?php dynamic_sidebar( 'sidebar-1' ); ?>
							<?php endif; ?>
						</div>
					  
                    </div>
                </div>
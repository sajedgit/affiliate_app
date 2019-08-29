<section class="blog_area section_padding_0_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
				  <h3>Top Articles:</h3>
                    <div class="row">
					
						
						<?php 
							$args = array('numberposts' => 6,'orderby' => 'date','order' => 'DESC');
							$welcome_posts = get_posts( $args );
						    foreach($welcome_posts as $post):
								setup_postdata( $post );
							    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium')
						?>

                        <!-- Single Post -->
                        <div class="col-12 col-md-4">
                            <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img class="image_cover" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#"><?php  the_author(); ?></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#"><?php echo get_the_date( 'M d, Y' ); ?></a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo get_comments_number($post->ID); ?></a>
                                            </div>
                                             <!-- Post Share -->
                                            <div class="post-share">
                                                <a onClick="return popitup('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>')" href=""><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink() ?>">
                                        <h4 class="post-headline"><?php the_title(); ?></h4>
                                    </a>
                                </div>
                            </div>
                        </div>
						<?php endforeach; ?>

						<hr style="margin-bottom:35px;" class="style17 col-12 col-md-12"/>
						
						
                        <!-- ******* List Blog Area Start ******* -->
						
						<?php 
							$args = array('numberposts' => 6,'orderby' => 'date','order' => 'DESC');
							$welcome_posts = get_posts( $args );
						    foreach($welcome_posts as $post):
								setup_postdata( $post );
							    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium_large');
						
							
						?>

                        <!-- Single Post -->
                        <div class="col-12 section_padding_20_0">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img class="image_cover222" src="<?php echo $featured_img_url ?>" alt="<?php the_title(); ?>">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#"><?php the_author(); ?></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#"><?php echo get_the_date( 'M d, Y' ); ?></a>
                                            </div>
                                        </div>
                                        <!-- Post Comment & Share Area -->
                                        <div class="post-comment-share-area d-flex">
                                            <!-- Post Favourite -->
                                            <div class="post-favourite">
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                            </div>
                                            <!-- Post Comments -->
                                            <div class="post-comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo get_comments_number($post->ID); ?></a>
                                            </div>
                                          
											<!-- Post Share -->
                                            <div class="post-share">
                                                <a onClick="return popitup('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>')" href=""><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink() ?>">
                                        <h4 class="post-headline"><?php the_title(); ?></h4>
                                    </a>
                                    <p><?php echo get_excerpt(500, 'content'); ?></p>
                                   <?php /* <a href="<?php the_permalink() ?>" class="read-more">Continue Reading..</a> */?>
                                </div>
                            </div>
                        </div>

                       <?php endforeach; ?>

                      <hr class="style17 col-12 col-md-12"/>

                      

                    </div>
                </div>

                <!-- ****** Blog Sidebar ****** -->
				
				<?php //get_sidebar(); ?>
				
                <!-- ****** Blog Sidebar ****** -->
                
				
				
            </div>
        </div>
    </section>
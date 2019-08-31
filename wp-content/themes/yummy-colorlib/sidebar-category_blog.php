<section class="blog_area section_padding_80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">

                       
                        <!-- ******* List Blog Area Start ******* -->

						<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>
						
                        <!-- Single Post -->
                        <div class="col-12 category_block">
                            <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <?php 
										if ( has_post_thumbnail() ) 
										{ // check if the post has a Post Thumbnail assigned to it.
										//the_post_thumbnail(array(300) );
										$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
										echo "<img src='$featured_img_url' alt=''  >";
										}
									?>
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
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo get_comments_number($post->ID); ?> </a>
                                            </div>
                                             <!-- Post Share -->
                                            <div class="post-share">
                                                <a onClick="return popitup('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>')" href=""><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>">
                                        <h1 class="post-headline-category"><?php the_title(); ?></h1>
                                    </a>
                                    <p><?php echo get_excerpt(200, 'content'); //the_excerpt(); ?></p>
                                   <?php /* <a href="<?php the_permalink(); ?>" class="read-more">Continue Reading..</a> */ ?>
                                </div>
                            </div>
                        </div>
						
						<?php endwhile; 
						else :?>
							 <h1 class="page-title"><?php _e( 'Oops! There is no post in this category ', '' ); ?></h1>
						<?php endif; ?>

                      
                      
						
						

                    </div>
					
					 <!-- Related Post Area -->
                          <?php get_sidebar('related-post'); ?>
					
					
                </div>

                <!-- ****** Blog Sidebar ****** -->
				
				<?php get_sidebar(); ?>
				
                <!-- ****** Blog Sidebar ****** -->
                
				
				
            </div>
        </div>
    </section>
 <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area section_padding_50_20">
        <div class="container">
            <div class="row justify-content-center">
			  
                <div class="col-12 col-lg-8">
                    <div class="row no-gutters">
					
					<?php while ( have_posts() ) : the_post(); ?>

                        

                        <!-- Single Post -->
                        <div class="col col-sm-12">
                            <div class="single-post">
                                <!-- Post Thumb -->
                               <?php /* <div class="post-thumb">
                                    <?php echo the_post_thumbnail(); ?>
                                </div> */ ?>
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
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php setPostViews(get_the_ID()); echo getPostViews(get_the_ID()); ?></a>
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
                                        <h1 class="post-headline"><?php the_title(); ?></h1>
                                    </a>
									<p>   <?php echo the_content(); ?> </p>
                                    
                                    
                                    

                                 
                                </div>
                            </div>

                            <!-- Tags Area -->
                          <?php /*  <div class="tags-area">
                                <a href="#">Multipurpose</a>
                                <a href="#">Design</a>
                                <a href="#">Ideas</a>
                            </div> */ ?>

                           

                         
								
								<?php 
								$args = array(
											'status' => 'approve',
											'number' => '25',
											'orderby' => 'comment_date',
											'order' => 'DESC',
											'parent' => '0',
											'post_id' => $post->ID, // use post_id, not post_ID
										);
										$comments = get_comments($args);
										$comments_number = get_comments_number($post->ID);
								?>
							
							<?php if ( $comments_number > 0 ) : ?>
							<!-- Comment Area Start -->
                             <div class="comment_area section_padding_50 clearfix">
                                <h4 class="mb-30"><?php echo $comments_number; ?> Comments</h4>
								


                                <ol>
								
								    <?php foreach($comments as $comment) : ?>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">
                                            <!-- Comment Meta -->
                                            <div class="comment-author"> 
												 <?php echo get_avatar( $comment->comment_author_email ); ?> 
                                            </div>
                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <span class="comment-date text-muted">27 Aug 2018</span>
                                                <h5><a style="all:revert;color:#007bff; text-decoration:none;" href="<?php echo $comment->comment_author_url; ?>"><?php echo $comment->comment_author ?></a></h5>
                                                <p><?php echo $comment->comment_content ?></p>
                                              	<!--<a href="#">Like</a>
												<a class="active" href="">Reply</a> -->
                                            </div>
                                        </div>
										<?php $args = array('status' => 'approve','number' => '1','post_id' => $post->ID,'parent' => $comment->comment_ID);
											  $comments_reply = get_comments($args);
										?>
										    <?php foreach($comments_reply as $reply) : ?>
											<ol class="children">
												<li class="single_comment_area">
													<div class="comment-wrapper d-flex">
														<!-- Comment Meta -->
														<div class="comment-author">
														   <?php echo get_avatar( $reply->comment_author_email ); ?> 
														</div>
														<!-- Comment Content -->
														<div class="comment-content">
															<span class="comment-date text-muted">27 Aug 2018</span>
															<h5><a style="all:revert;color:#007bff; text-decoration:none;" href="<?php echo $reply->comment_author_url; ?>"><?php echo $reply->comment_author ?></a></h5>
															<p><?php echo $reply->comment_content ?></p>
															<!--<a href="#">Like</a>
															<a class="active" href="">Reply</a> -->
														
															
														</div>
													</div>
												</li>
											</ol>
											<?php endforeach; ?>
                                    </li>
                                 <?php endforeach; ?>
								
								
                                </ol>
                            </div>
							<?php endif; ?>

                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    

                                    <?php 
									$comments_args = array(
											// change the title of send button 
											'label_submit'=>'Post Comment',
											'class_submit' => 'btn contact-btn',
											// change the title of the reply section
											'title_reply'=>'Write a Reply or Comment',
											// remove "Text or HTML to be displayed after the set of comment fields"
											//'comment_notes_after' => '<button type="submit" id="submit-new"><span>'.__('Post Comment').'</span></button>',
											// redefine your own textarea (the comment body)
									);

									comment_form($comments_args);
								?>
								
                                </div>
								
                            </div> 
							
							
							<?php get_sidebar('related-post'); ?>
							

                        </div>
                    </div>
					<?php endwhile; ?>
                </div>

                <!-- ****** Blog Sidebar ****** -->
				
				<?php get_sidebar(); ?>
				
                <!-- ****** Blog Sidebar ****** -->
                
            </div>
        </div>
		
		
    </section>
    <!-- ****** Single Blog Area End ****** -->
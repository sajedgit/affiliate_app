<?php
get_header(); ?>




<section class="blog_area section_padding_80_0">
        <div class="container">
            <div class="content">
			
            <?php if ( have_posts() ) : ?>
			<?php get_search_form(); ?>
			<?php 
			    while ( have_posts() ) : the_post(); 
				$featured_img_url = get_the_post_thumbnail_url($post->ID, 'medium_large');?>
				
                
                        <div class="col-12 section_padding_10_0">
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
                                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php  echo getPostViews(get_the_ID()); ?></a>
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

            <?php endwhile; 
			else :
			?>
			    <header class="page-header">
					<h1 class="page-title"><?php _e( 'Nothing found.', '' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this search. Maybe try another search?', 'twentyseventeen' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			<?php
		
			endif;
			?>
        </div>
        </div>
</section>

<?php get_footer();
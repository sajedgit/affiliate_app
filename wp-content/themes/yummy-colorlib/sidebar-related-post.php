<!-- Related Post Area -->


<?php
//$thisCat = get_category(get_query_var('cat'));print_r($thisCat);die();
$categories = get_the_category();
$category_id = $categories[0]->term_id;
$category_name = $categories[0]->name;
if ($category_id):
    ?>


    <div class="related-post-area section_padding_50">
        <h4 class="mb-30">Related post</h4>


        <div class="related-post-slider owl-carousel">

            <?php
            global $post;
            $args = array('posts_per_page' => 5);
            $related_posts = get_posts($args);
            foreach ($related_posts as $post):
                setup_postdata($post);
                $featured_img = get_the_post_thumbnail_url($post->ID, 'medium')
                ?>
                <!-- Single Related Post-->
                <div class="single-post">
                    <!-- Post Thumb -->
                    <div class="post-thumb ">
                        <img src="<?php echo $featured_img ?>" alt="<?php the_title(); ?>">
                    </div>
                    <!-- Post Content -->
                    <div class="post-content">
                        <div class="post-meta d-flex">
                            <div class="post-author-date-area d-flex">
                                <!-- Post Author -->
                                <div class="post-author">
                                    <a href="#">By <?php the_author();; ?></a>
                                </div>
                                <!-- Post Date -->
                                <div class="post-date">
                                    <a href="#"><?php echo get_the_date('M d, Y'); ?></a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php the_permalink() ?>">
                            <h6><?php the_title(); ?></h6>
                        </a>
                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>

        </div>
    </div>
<?php endif; ?>
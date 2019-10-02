<?php get_header(); ?>


<section class="blog_area section_padding_80_0">
        <div class="container">
            <div class="content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                 <?php the_content(); ?>

            <?php endwhile; endif; ?>
        </div>
        </div>
    </section>



<?php get_footer() ?>




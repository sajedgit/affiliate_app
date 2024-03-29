<section class="categories_area clearfix" id="category_section">
    <div class="container">
        <h3>Categories:</h3>
        <div class="row">
            <?php

            $args = array(
                'orderby' => 'id',
                'parent' => 0,
                'exclude' => 1,
                //'hide_empty' => 0,
            );
            $categories = get_categories($args);
            $counter = 0;
            ?>
            <?php foreach ($categories as $category): ?>
                <?php
                $counter++;
                if ($counter > 6)
                    break;


                $featured_image_id = get_term_meta($category->term_id, 'featured_image_id', true);

                ?>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                        <?php /*  <img class="image_cover" src="<?php echo $cat_img; ?>" alt="<?php echo $category->name ?>"> */ ?>
                        <?php echo wp_get_attachment_image($featured_image_id, array('320', '210'), "", array("class" => "image_cover")); ?>
                        <div class="catagory-title">
                            <a href="<?php echo get_category_link($category->term_id) ?>">
                                <h5><?php echo $category->name ?> </h5>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr class="style17"/>
    </div>

</section>
	

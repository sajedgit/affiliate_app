


<section class="categories_area clearfix" id="category_section">
        <div class="container">
		    <h3>Categories:</h3>
            <div class="row">
			<?php 
			$cat = get_query_var('cat'); 
			$args = array(
						'orderby' => 'id',
						'child_of' => $cat,
						//'hide_empty' => 0,
						); 
			$categories = get_categories($args);
			$counter=0;
			?>
			<?php foreach($categories as $category): ?>
			<?php
			    $counter++;
				if($counter>9)
					break;
				$term_vals = get_term_meta($category->term_id,"featured_image_id",true);
				$post_data = get_post( $term_vals ); 
				$cat_img = $post_data->guid;
			?>
			
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_catagory wow fadeInUp" data-wow-delay=".3s">
                        <img class="image_cover" src="<?php echo $cat_img; ?>" alt="<?php echo $category->name ?>">
                        <div class="catagory-title">
                            <a href="<?php echo get_category_link( $category->term_id ) ?>">
                                <h5><?php echo $category->name ?> </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
				<hr class="style17"/>
        </div>
		
    </section>
	

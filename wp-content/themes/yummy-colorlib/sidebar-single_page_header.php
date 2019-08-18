<?php

 $sub_cat= get_queried_object_id();
 $cat_id = get_query_var('cat'); 
 
 if(isset($cat_id) && !empty($cat_id)):  
	$header_title=get_cat_name($cat_id);
 /*elseif(isset($sub_cat) && !empty($sub_cat)):
	$header_title=get_cat_name($sub_cat);*/
 else:
	$header_title=get_the_title();
 endif;
 
 ?>
 
 <!-- ****** Breadcumb Area Start ****** -->
   <div class="container">
    <?php  $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
    <div class="breadcumb-area " style="border-radius: 10px;background-image: url(<?php echo $featured_img_url ?>;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2><?php echo $header_title ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           		<?php
								if ( function_exists('yoast_breadcrumb') ) {
								  yoast_breadcrumb( '</p><p id="breadcrumbs">','</p><p>' );
								}
								?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->
	

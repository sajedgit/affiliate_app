<?php

/*
Plugin Name: Custom post type by Sajed
Plugin URI: 
Description: This plugin is used for add a custom post type as well as custom category.
Version: 1.0
Author: Md. Sajed Ahmed
Author URI: https://togetinspire.com/ 
License: GPLv2 or later
Text Domain:  Custom post type by Sajed
*/ 

/*
function plan_post_by_sajed() {
  $labels = array(
    'name'               => _x( 'Plans', 'post type general name' ),
    'singular_name'      => _x( 'Plan', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'plan' ),
    'add_new_item'       => __( 'Add New Plans' ),
    'edit_item'          => __( 'Edit Plan' ),
    'new_item'           => __( 'New Plan' ),
    'all_items'          => __( 'All Plans' ),
    'view_item'          => __( 'View Plan' ),
    'search_items'       => __( 'Search Plans' ),
    'not_found'          => __( 'No plan found' ),
    'not_found_in_trash' => __( 'No plan found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Plans'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds plans and plan specific data',
    'public'        => true,
	'menu_position'       => 6,
	'menu_icon'           => 'dashicons-screenoptions',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields','revisions' ),
    'has_archive'   => true,
  );
  

  
  register_post_type( 'plans', $args ); 
}
add_action( 'init', 'plan_post_by_sajed' );



// for custom category 

function taxonomies_plans_by_sajed() {
  $labels = array(
    'name'              => _x( 'Plans Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Plan Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Plan Categories' ),
    'all_items'         => __( 'All Plans Categories' ),
    'parent_item'       => __( 'Parent Plan Category' ),
    'parent_item_colon' => __( 'Parent Plan Category:' ),
    'edit_item'         => __( 'Edit Plan Category' ), 
    'update_item'       => __( 'Update Plan Category' ),
    'add_new_item'      => __( 'Add New Plan Category' ),
    'new_item_name'     => __( 'New Plan Category' ),
    'menu_name'         => __( 'Plan Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'leagues', 'plans', $args );
}
add_action( 'init', 'taxonomies_plans_by_sajed', 0 );

*/

/* 

///for display data  in page 

<h1>Recent Games Show</h1>
<?php 
$post_args = array( 'post_type' => 'games', 'posts_per_page' => 8 );
$post_query = new WP_Query( $post_args ); 
 
if ( $post_query->have_posts() ) : 
while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
 
<h2><?php the_title(); ?></h2>
<div class="posts-entry">
<?php the_content(); ?> 
</div>
<?php wp_reset_postdata(); ?>
 
<?php endwhile; // ending while loop ?> 
<?php else:  ?>
<p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
<?php endif; // ending condition ?>
*/




function product_post_by_sajed() {
  $labels = array(
    'name'               => _x( 'Products', 'Product type general name' ),
    'singular_name'      => _x( 'Product', 'Product type singular name' ),
    'add_new'            => _x( 'Add New', 'Product' ),
    'add_new_item'       => __( 'Add New Products' ),
    'edit_item'          => __( 'Edit Product' ),
    'new_item'           => __( 'New Product' ),
    'all_items'          => __( 'All Products' ),
    'view_item'          => __( 'View Product' ),
    'search_items'       => __( 'Search Products' ),
    'not_found'          => __( 'No Product found' ),
    'not_found_in_trash' => __( 'No Product found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Products'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds products and plan specific data',
    'public'        => true,
	'menu_position'       => 6,
	'menu_icon'           => 'dashicons-screenoptions',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt','custom-fields','revisions' ),
    'has_archive'   => true,
  );
  

  
  register_post_type( 'products', $args ); 
}
add_action( 'init', 'product_post_by_sajed' );


// for custom category 

function taxonomies_products_by_sajed() {
  $labels = array(
    'name'              => _x( 'Products Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Product Categories' ),
    'all_items'         => __( 'All Products Categories' ),
    'parent_item'       => __( 'Parent Product Category' ),
    'parent_item_colon' => __( 'Parent Product Category:' ),
    'edit_item'         => __( 'Edit Product Category' ), 
    'update_item'       => __( 'Update Product Category' ),
    'add_new_item'      => __( 'Add New Product Category' ),
    'new_item_name'     => __( 'New Product Category' ),
    'menu_name'         => __( 'Product Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'leagues', 'products', $args );
}
add_action( 'init', 'taxonomies_products_by_sajed', 0 );



function get_product_func( $atts ) 
{
	$category=$atts['cat'];
	$count=$atts['count'];
	$msg=$atts['msg'];
	if(empty($msg))
		$msg="Our pick";
	
	$args = array(  
        'post_type' => 'products',
        'post_status' => 'publish',
        'posts_per_page' => $count, 
        'orderby' => 'title', 
        'order' => 'ASC',
       // 'cat' => $category,
        'taxonomy_name' => $category,
    );
	
	$loop = new WP_Query( $args ); 
	$counter=0;
    $str="";    
    $str.="<div class='col-12' style='border: 8px solid #fc6c3f; padding: 10px; position: relative;' >";    
    $str.="<span style='background: #fc6c3f;font-weight: bold;color: #fff;padding: 6px;position: relative;top: -11px;left: -11px;'>$msg</span>";    
    while ( $loop->have_posts() ) : $loop->the_post(); $counter++;
       // $featured_img = wp_get_attachment_image_src( $post->ID );
	    $image_src = get_post_meta( get_the_ID(), 'image_src', true );
	    $product_link = get_post_meta( get_the_ID(), 'product_link', true );
	    $amazon_btn_src =get_template_directory_uri().'/images/amazon/amazon-button9.png';
        $str.= "<div class='row h-100' style='display:flex;'>";
        $str.="<div class='col col-12 col-sm-5 text-center  my-auto'><p>".$image_src ."</p></div>"; 
        $str.="<div class='col  col-sm-7 '><h4>".get_the_title()."</h4>"; 
        $str.=get_the_content()."<p class='pt-4 text-center'><a href='$product_link' target='_blank' style=''><img src='$amazon_btn_src'></a></p></div>"; 
         
		 $str.= "</div>";
		 if($counter!=$count)
		  $str.= "<hr/>"; 
    endwhile;
	$str.= "</div>";

    wp_reset_postdata();
	
	//return "{$atts['cat']}--"."--{$atts['count']}";
	return $str;
}
add_shortcode( 'get_product', 'get_product_func' );  
// how to call in post/page ------->  [get_product cat="test" count=4]

/*
element {

    border: 2px solid #fc6c3f;
    padding: 37px;
    position: relative;

}
element {

    background: #fc6c3f;
    color: #fff;
    width: 89px;
    padding: 6px;
    position: absolute;
    top: 0px;
    left: 320px;

}

*/

?>
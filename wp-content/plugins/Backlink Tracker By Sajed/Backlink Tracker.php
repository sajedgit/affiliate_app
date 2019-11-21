<?php

/*
Plugin Name: Backlink Tracker  
Plugin URI: 
Description: This plugin is used for track your backlink with Domain Authority, Page Authority and Spam Score. Also you can track the backlink type and which user created the backlink accordingly to the keywords.
Version: 1.0
Author: Md. Sajed Ahmed
Author URI: https://togetinspire.com/ 
License: GPLv2 or later
Text Domain:  Custom post type by Sajed
*/ 




function backlink_post_by_sajed() {
  $labels = array(
    'name'               => _x( 'Backlinks', 'Backlink type general name' ),
    'singular_name'      => _x( 'Backlink', 'Backlink type singular name' ),
    'add_new'            => _x( 'Add New', 'Backlink' ),
    'add_new_item'       => __( 'Add New Backlinks' ),
    'edit_item'          => __( 'Edit Backlink' ),
    'new_item'           => __( 'New Backlink' ),
    'all_items'          => __( 'All Backlinks' ),
    'view_item'          => __( 'View Backlink' ),
    'search_items'       => __( 'Search Backlinks' ),
    'not_found'          => __( 'No Backlink found' ),
    'not_found_in_trash' => __( 'No Backlink found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Backlinks'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds Backlinks and plan specific data',
    'public'        => true,
	'menu_position'       => 6,
	'menu_icon'           => 'dashicons-screenoptions',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => false,
    'supports'      => array( 'title', 'editor','custom-fields' ),
    'has_archive'   => true,
  );
  

  
  register_post_type( 'backlinks', $args ); 
}
add_action( 'init', 'backlink_post_by_sajed' );


// for custom category 

function taxonomies_backlinks_by_sajed() {
  $labels = array(
    'name'              => _x( 'Backlinks Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Backlink Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Backlink Categories' ),
    'all_items'         => __( 'All Backlinks Categories' ),
    'parent_item'       => __( 'Parent Backlink Category' ),
    'parent_item_colon' => __( 'Parent Backlink Category:' ),
    'edit_item'         => __( 'Edit Backlink Category' ), 
    'update_item'       => __( 'Update Backlink Category' ),
    'add_new_item'      => __( 'Add New Backlink Category' ),
    'new_item_name'     => __( 'New Backlink Category' ),
    'menu_name'         => __( 'Backlink Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'backlink_category', 'backlinks', $args );
}
add_action( 'init', 'taxonomies_backlinks_by_sajed', 0 );



function my_admin_custom_column( $columns ) {
    $columns = insertArrayAtPosition($columns, array('Link' => 'Link'), 2);  
    $columns = insertArrayAtPosition($columns, array('DA' => 'DA'), 3);  
    $columns = insertArrayAtPosition($columns, array('PA' => 'PA'), 4);  
    $columns = insertArrayAtPosition($columns, array('SS' => 'SS'), 5);  
    $columns = insertArrayAtPosition($columns, array('Keyword' => 'Keyword'), 6);  
    $columns = insertArrayAtPosition($columns, array('Type' => 'Type'), 7);   
    $columns = insertArrayAtPosition($columns, array('User' => 'User'), 8);   
    $columns = insertArrayAtPosition($columns, array('Category' => 'Category'), 9);   
    return $columns;
}
add_filter( 'manage_backlinks_posts_columns', 'my_admin_custom_column' );

function my_admin_custom_column_row( $column_name, $post_id ) {
    $custom_fields = get_post_custom( $post_id );
	//print_r($custom_fields);die();
	$author_id = get_post_field( 'post_author', $post_id );
    $author_name = get_the_author_meta('user_nicename', $author_id);
	
	$terms = get_the_terms($post_id , 'backlink_category');
	$no_of_category = count($terms);
	$category_name =array();
	foreach($terms as $obj): 
	   array_push($category_name,$obj->name);
	endforeach;
	$categories=implode(" , ",$category_name);

  

    switch ($column_name) {
       
        case 'Link' :
            echo (isset($custom_fields['Link'][0])) ? $custom_fields['Link'][0] : ' ';
            break;
		case 'DA' :
            echo (isset($custom_fields['DA'][0])) ? $custom_fields['DA'][0] : ' ';
            break;
		case 'PA' :
            echo (isset($custom_fields['PA'][0])) ? $custom_fields['PA'][0] : ' ';
            break;
		case 'SS' :
            echo (isset($custom_fields['SS'][0])) ? $custom_fields['SS'][0] : ' ';
            break;
		case 'Keyword' :
            echo (isset($custom_fields['Keyword'][0])) ? $custom_fields['Keyword'][0] : ' ';
            break;
		case 'Type' :
            echo (isset($custom_fields['Type'][0])) ? $custom_fields['Type'][0] : ' ';
            break;
		case 'User' :
		    echo (isset($custom_fields['_user'][0])) ? $custom_fields['_user'][0] : ' ';
            //echo (isset($author_name)) ? $author_name: ' ';
            break;
		case 'Category' :
		    echo (isset($custom_fields['_cat'][0])) ? $custom_fields['_cat'][0] : ' ';
            //echo (isset($categories)) ? $categories: ' ';
            break;
        default:
    }
}
add_action( 'manage_backlinks_posts_custom_column', 'my_admin_custom_column_row', 10, 2 );

function insertArrayAtPosition( $array, $insert, $position ) {
    //$array : The initial array i want to modify
    //$insert : the new array i want to add, eg array('key' => 'value') or array('value')
    //$position : the position where the new array will be inserted into. Please mind that arrays start at 0
    return array_slice($array, 0, $position, TRUE) + $insert + array_slice($array, $position, NULL, TRUE);
}



/**
 * Filter slugs
 * @since 1.1.0
 * @return void
 */
function backlink_filter_tracked() {
  global $typenow;
  global $wp_query;
    if ( $typenow == 'backlinks' ) { // Your custom post type slug
      $plugins = array( 'Link'=>'Link', 'DA'=>'DA', 'PA'=>'PA', 'SS'=>'SS', '_user'=>'User' ,'_cat'=>'Category' ); // Options for the filter select field
      $condition = array( '<=', '>=', '=', 'LIKE' ); // Options for the filter select condition
      $current_plugin = '';
      if( isset( $_GET['slug'] ) ) {
        $current_plugin = $_GET['slug']; // Check if option has been selected
      } ?>
      <select name="slug" id="slug">
        <option value="all" <?php selected( 'all', $current_plugin ); ?>><?php _e( 'All Condition', 'backlink-plugin' ); ?></option>
        <?php foreach( $plugins as $key=>$value ) { ?>
          <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $current_plugin ); ?>><?php echo esc_attr( $value ); ?></option>
        <?php } ?>
      </select>
	  
	  <select name="condition_slug" id="condition_slug">
        <option value="all" <?php selected( 'all', $current_plugin ); ?>><?php _e( 'Compare With', 'backlink-plugin-condition' ); ?></option>
        <?php foreach( $condition as $key ) { ?>
          <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $current_plugin ); ?>><?php echo esc_attr( $key ); ?></option>
        <?php } ?>
      </select>
	  
	  <input type="text" name="compare_value">
	  
  <?php }
}
add_action( 'restrict_manage_posts', 'backlink_filter_tracked' );


/**
 * Update query
 * @since 1.1.0
 * @return void
 */
function backlink_sort_by_slug( $query ) {
  global $pagenow;
  // Get the post type
  $post_type = isset( $_GET['post_type'] ) ? $_GET['post_type'] : '';
  if ( is_admin() && $pagenow=='edit.php' && $post_type == 'backlinks' && isset( $_GET['slug'] ) && $_GET['slug'] !='all' ) 
  {
  /*   $query->query_vars['meta_key'] = $_GET['slug'];
    $query->query_vars['meta_value'] = $_GET['compare_value'];
    $query->query_vars['meta_compare'] = $_GET['condition_slug']; */
	
 	$query->query_vars['meta_query'][] = array(
    'key'     => $_GET['slug'],
    'value'   => $_GET['compare_value'],
    'compare' => $_GET['condition_slug']
); 
	

	
  }
}
add_filter( 'parse_query', 'backlink_sort_by_slug' );


add_action( 'save_post', 'set_post_default_category', 10,2 );
 
function set_post_default_category( $post_id, $post ) {
	
	$author_id = get_post_field( 'post_author', $post_id );
    $author_name = get_the_author_meta('user_nicename', $author_id);
	
	$terms = get_the_terms($post_id , 'backlink_category');
	$no_of_category = count($terms);
	$category_name =array();
	foreach($terms as $obj): 
	   array_push($category_name,$obj->name);
	endforeach;
	$categories=implode(" , ",$category_name);
    
     
    // Only set for post_type = post!
    if ( 'backlinks' == $post->post_type ) 
	{
        if ( ! add_post_meta( $post_id, '_cat', $categories, true ) ) 
		{ 
			update_post_meta ( $post_id, '_cat', $categories );
		}
		
        if ( ! add_post_meta( $post_id, '_user', $author_name, true ) ) 
		{ 
			update_post_meta ( $post_id, '_user',$author_name );
		}
    } 
 
}

?>
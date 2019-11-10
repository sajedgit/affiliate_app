<?php
 
// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';




if ( ! function_exists( 'yummy_colorlib_setup' ) ) :
 
function yummy_colorlib_setup() {
	/*
	 
	 */
	load_theme_textdomain( 'yummy_colorlib' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	


	
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yummy_colorlib' ),
		'social'  => __( 'Footer Menu', 'yummy_colorlib' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	
		
		// This theme uses wp_nav_menu() in one location.
		
		add_theme_support( 'post-thumbnails' );   

	 
}
endif; // yummy_colorlib_setup
add_action( 'after_setup_theme', 'yummy_colorlib_setup' );

 
 
function yummy_colorlib_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'yummy_colorlib' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'yummy_colorlib' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s widget-title">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="text-center">',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'yummy_colorlib' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'yummy_colorlib' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'yummy_colorlib' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'yummy_colorlib' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yummy_colorlib_widgets_init' );
 
/**
 * Enqueue scripts and styles.
 */
function yummy_colorlib_scripts() {
	
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,null,'all');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive/responsive.css',false,null,'all'); 
	wp_enqueue_style( 'media_css', get_template_directory_uri() . '/css/responsive/media.css',false,null,'all'); 
	
	wp_register_script( 'jquery224', get_template_directory_uri() . '/js/jquery/jquery-2.2.4.min.js', false, null, false );
    wp_enqueue_script('jquery224'); 
    wp_register_script( 'popper', get_template_directory_uri() . '/js/bootstrap/popper.min.js', false, null, true );
    wp_enqueue_script('popper');
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js',false, null, true  );
    wp_enqueue_script('bootstrap');
	wp_register_script( 'plugins', get_template_directory_uri() . '/js/others/plugins.js',false, null, true  );
    wp_enqueue_script('plugins');
	wp_register_script( 'active', get_template_directory_uri() . '/js/active.js',false, null, true  );
    wp_enqueue_script('active');
}
add_action( 'wp_enqueue_scripts', 'yummy_colorlib_scripts' );

/*-- get post excerp by charecter limit --*/
function get_excerpt($limit, $source = null){

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'... <a class="read_more" href="'.get_permalink($post->ID).'">more</a>';
    return $excerpt;
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]>', $content);
  return $content;
}



/*-- get post view for popular post --*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

/*-- set post view for popular post --*/
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

	
add_action( 'after_setup_theme', 'custom_image_size_setup' );
function custom_image_size_setup() {
    add_image_size( 'mini-large', 750,500 ); 
	   
}


/*-- custom comment form  --*/

/**
 * Customize comment form default fields.
 * Move the comment_field below the author, email, and url fields.
 */
function sajed_update_comment_form_default_fields( $fields ) {
    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option( 'require_name_email' );
    $aria_req      = ( $req ? " aria-required='true'" : '' );
    $html_req      = ( $req ? " required='required'" : '' );
    $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

    $fields = [
        'author' => '<p class="comment-form-author">'.
                    '<input   placeholder="Name" class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p>',
        'email'  => '<p class="comment-form-email">' .
                    '<input    placeholder="Email" class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>',
        'url'    => '<p class="comment-form-url">'.
                    '<input   placeholder="Website" class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p>',
        'comment_field' => '<textarea    class="form-control" id="comment" name="comment" cols="30" rows="10" placeholder="Comment " maxlength="65525" aria-required="true" required="required"></textarea></p>',
    ];

    return $fields;
}
add_filter( 'comment_form_default_fields', 'sajed_update_comment_form_default_fields' );

/**
 * Remove the original comment field because we've added it to the default fields
 * using sajed_update_comment_form_default_fields(). If we don't do this, the comment
 * field will appear twice.
 */
function sajed_comment_form_defaults( $defaults ) {
    if ( isset( $defaults[ 'comment_field' ] ) ) {
        $defaults[ 'comment_field' ] = '';
    }

    return $defaults;
}
add_filter( 'comment_form_defaults', 'sajed_comment_form_defaults', 10, 1 );



/* Comment form validation on same page*/
function comment_validation_init() 
{
	if(is_single() && comments_open() ) 
	{ 
	?>
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('#commentform').validate({
		rules: {
		author: {
		required: true,
		minlength: 2
		},
		email: {
		required: true,
		email: true
		},
		comment: {
		required: true,
		//minlength: 20
		}
		},
		messages: {
		author: "Please enter your name",
		email: "Please enter a valid email address.",
		comment: "Please enter your comment"
		},
		errorElement: "div",
		errorPlacement: function(error, element) {
		element.after(error);
		}
		});
		});
		</script>
		<?php
	}
}
add_action('wp_footer', 'comment_validation_init');




/*-- end custom comment form  --*/










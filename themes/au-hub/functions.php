<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */



function au_setup() {

    //Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

    //Enable post formats
    add_theme_support( 'post-formats', array( 'video' , 'gallery', 'audio', 'chat' ) );
    
    //add Yoast Breadcrumbs
    add_theme_support( 'yoast-seo-breadcrumbs' );
    
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'    => __( 'Main Menu', 'au' ),
		'social' => __( 'Social Links Menu', 'au' ),
	) );

    //enable theme logo
    add_theme_support( 'custom-logo' );
    
    //custom image sizes
    add_image_size( 'six-by-four', 2000, 1334, TRUE ); 
    add_image_size( 'sixteen-by-nine', 2000, 1126, TRUE ); 
    add_image_size( 'square', 1000, 1000, TRUE ); 
    
    //move Yoast Metabox to bottom
    add_filter( 'wpseo_metabox_prio', function() { return 'low';});
        
}
add_action( 'after_setup_theme', 'au_setup' );


/**
 * Enqueue scripts and styles.
 */
function au_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'au', get_template_directory_uri(). '/style.css?'.rand() );
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array ( 'jquery' ), 1.0, true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.0, true);
    
    global $wp_query; 

}
add_action( 'wp_enqueue_scripts', 'au_scripts' );

/**
 * Allow SVG through WordPress Media Uploader
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Remove default editor in post and portfolio post types. ACF Fields are used instead
 */
function remove_editor_from_post_type() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'portfolio', 'editor' );
}

add_action('init', 'remove_editor_from_post_type');


add_action('admin_head', 'remove_content_editor');

/**
 * Remove the content editor from homepage as all content is created with ACF Fields or in the template
 */
function remove_content_editor()
{
    if((int) get_option('page_on_front')==get_the_ID())
    {
        remove_post_type_support('page', 'editor');
    }
}

add_action( 'admin_menu', 'admin_menu_page_removing',999 );
function admin_menu_page_removing() {
    remove_menu_page( 'edit.php?post_type=tcode_artist' );
}

if ( ! class_exists( 'ftChangeTaxonomyCheckboxlistOrder' ) ){
	
	class ftChangeTaxonomyCheckboxlistOrder {	
		
		function __construct(){
	
			function changeTaxonomyCheckboxlistOrder( $args, $post_id)
			{
				if ( isset( $args['taxonomy']))
		 			$args['checked_ontop'] = false;
    	   		return $args;
			}
	
		add_filter('wp_terms_checklist_args','changeTaxonomyCheckboxlistOrder',10,2);
	}
	
} // class ends here

$fttaxonomychangeorder = new ftChangeTaxonomyCheckboxlistOrder();

}// top most if condition ends here


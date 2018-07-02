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
    add_image_size( 'square', 800, 800, TRUE ); 
    
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

/**
 * Remove admin menu items
 */
function remove_menus(){
    remove_menu_page( 'edit-comments.php' ); //Comments
}
add_action( 'admin_menu', 'remove_menus' );


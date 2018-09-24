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
    add_image_size( 'six-by-four', 1000, 667, TRUE ); 
    add_image_size( 'sixteen-by-nine', 2000, 1126, TRUE ); 
    add_image_size( 'square', 800, 800, TRUE ); 
    add_image_size( 'medium', 300, 200, TRUE );
    add_image_size( 'large', 1000, 600, TRUE );
    
    //move Yoast Metabox to bottom
    add_filter( 'wpseo_metabox_prio', function() { return 'low';});
        
}
add_action( 'after_setup_theme', 'au_setup' );


/**
 * Enqueue scripts and styles.
 */
function au_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'au', get_template_directory_uri(). '/style.css' );
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    
    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/dev/plugins.js', array ( 'jquery' ), 1.0, true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/dev/main.js', array ( 'jquery' ), 1.0, true);
    //wp_enqueue_script( 'auhub', get_template_directory_uri() . '/js/auhub.js', array ( 'jquery' ), 1.0, true);
    
    global $wp_query; 

    wp_register_script( 'my_loadmore', get_template_directory_uri() . '/js/loadmore.js', array('jquery') );
    
	wp_localize_script( 'my_loadmore', 'athabascau_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => serialize( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
    
    wp_enqueue_script( 'my_loadmore' );
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
    remove_post_type_support( 'notification', 'editor' );
}

add_action('init', 'remove_editor_from_post_type');


add_action('admin_head', 'remove_content_editor');

/**
 * Remove the content editor from homepage as all content is created with ACF Fields or in the template
 */
function remove_content_editor() {
    if((int) get_option('page_on_front')==get_the_ID())
    {
        remove_post_type_support('page', 'editor');
    }
}

/**
 * Keeps category checkbox list in correct order on posts after saving
 */
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

/**
 * Remove "Category:" from category title
 */
function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

/**
 * Remove Administrator from add new user
 */
function wpse_40897_filter_get_editable_roles_for_new_user( $editable_roles ) {
    global $pagenow;
    if ( 'user-new.php' == $pagenow ) {
        unset( $editable_roles['administrator'] );
    }
    return $editable_roles;

}
add_filter( 'editable_roles', 'wpse_40897_filter_get_editable_roles_for_new_user' );

if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
/**
 * AJAX handler for loading more posts
 */
function athabascau_ajax_handler(){
 
	// prepare our arguments for the query
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	query_posts( $args );

    if ( have_posts() ) :
        while (have_posts()) : the_post(); 
             echo '<div class="col-sm-4">';			
                 get_template_part( 'template-parts/blog/blog', 'articles' ); 		
             echo '</div>';		
         endwhile;	
    endif; 
	die;
}
 
add_action('wp_ajax_loadmore', 'athabascau_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'athabascau_ajax_handler');
	
}

/**
 * Rename post formats
 */
function rename_post_formats($translation, $text, $context, $domain) {
    $names = array(
        'Audio'  => 'Podcast',
    );
    if ($context == 'Post format') {
        $translation = str_replace(array_keys($names), array_values($names), $text);
    }
    return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);

/**
 * Limit output words from ACF fields
 */
function limit_words($string, $word_limit) {
	$string = strip_tags($string);
	$words = explode(' ', strip_tags($string));
	$return = trim(implode(' ', array_slice($words, 0, $word_limit)));
	if(strlen($return) < strlen($string)){
	$return .= '...';
	}
	return $return;
}

/*
 * Function for post duplication. Dups appear as drafts. User is redirected to the edit screen - credit to https://www.hostinger.com/tutorials/how-to-duplicate-wordpress-page-post#Option-4-8211-Duplicating-WordPress-Page-or-Post-Without-Plugins
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}
 
	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	/*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );
 
	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;
 
	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {
 
		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);
 
		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );
 
		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}
 
		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		if (count($post_meta_infos)!=0) {
			$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			foreach ($post_meta_infos as $meta_info) {
				$meta_key = $meta_info->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_info->meta_value);
				$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
			}
			$sql_query.= implode(" UNION ALL ", $sql_query_sel);
			$wpdb->query($sql_query);
		}
 
 
		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}
add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );
 
/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}
 
add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

/*
 * Change the WordPress logo on the login screen
 */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/au-login-logo.svg);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


add_filter('tiny_mce_before_init','configure_tinymce');

/**
 * Customize TinyMCE's configuration
 *
 * @param   array
 * @return  array
 */
function configure_tinymce($in) {
  $in['paste_preprocess'] = "function(plugin, args){
    // Strip all HTML tags except those we have whitelisted
    var whitelist = 'p,span,b,strong,i,em,h3,h4,h5,h6,ul,li,ol';
    var stripped = jQuery('<div>' + args.content + '</div>');
    var els = stripped.find('*').not(whitelist);
    for (var i = els.length - 1; i >= 0; i--) {
      var e = els[i];
      jQuery(e).replaceWith(e.innerHTML);
    }
    // Strip all class and id attributes
    stripped.find('*').removeAttr('id').removeAttr('class');
    // Return the clean HTML
    args.content = stripped.html();
  }";
  return $in;
}

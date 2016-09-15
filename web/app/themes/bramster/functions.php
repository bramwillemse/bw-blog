<?php
/* 	============================================================================
   	Load Base functions
	==========================================================================*/

	include_once('inc/functions-base.php');


/* 	============================================================================
   	Load Custom Post Types
	==========================================================================*/

	include_once('inc/functions-post_types.php');


/* 	============================================================================
	Advanced Custom Fields
	==========================================================================*/

	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Contactgegevens',
			'menu_title'	=> 'Contactgegevens',
			'parent_slug'	=> 'options-general.php',
			'capability'	=> 'edit_posts'
		));		
	}


/* 	============================================================================
	Navigation
	==========================================================================*/

	if ( function_exists( 'add_theme_support' ) ) { 
		// Add support for custom menu's
		add_theme_support('menus');
		register_nav_menus( array(
			'nav-main' => 'Hoofdmenu',
			'nav-social' => 'Menu social media',
			'nav-mobile' => 'Menu voor mobile'
		) );	
	}

<<<<<<< HEAD
=======

>>>>>>> develop
/* 	============================================================================
	Images
	==========================================================================*/

	if ( function_exists( 'add_theme_support' ) ) { 
		// Add support for Post Thumbnails
		add_theme_support( 'post-thumbnails' ); 

		// Add support for selected post formats
		add_theme_support( 'post-formats', array( 'image', /*'gallery',*/ 'video' ) );

		// Add support for Custom header
		$defaults = array(
			'default-image'          => '',
			'random-default'         => true,
			'width'                  => 1200,
			'height'                 => 600,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $defaults );

	}

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'wide', 1280, 720, true ); // Single Header
		add_image_size( 'medium', 800, 450, true ); // Medium size
	}
	add_editor_style('custom-editor-styles.css');


/* 	============================================================================
	Sidebars
	==========================================================================*/

	// If Dynamic Sidebar Exists
	if(function_exists('register_sidebar')) {
	
		register_sidebar(array(
			'name' => 'Over mij',
			'id' => 'widgets-about',
			'class' => 'widgets-about',
			'before_widget' => '<aside class="column column-small widget widget-left">',
			'after_widget' => '</aside>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));

		register_sidebar(array(
			'name' => 'Portfolio',
			'id' => 'widgets-portfolio',
			'class' => 'widgets-portfolio',
			'before_widget' => '<aside class="column column-small widget widget-left nav nav-sidebar">',
			'after_widget' => '</aside>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));


		register_sidebar(array(
			'name' => 'Posts',
			'id' => 'widgets-single',
			'class' => 'widgets-single',
			'before_widget' => '<aside class="column column-small widget widget-left nav nav-sidebar">',
			'after_widget' => '</aside>',
			'beore_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar(array(
			'name' => 'Pages',
			'id' => 'widets-pages',
			'class' => 'widets-pages',
			'before_widget' => '<aside class="column column-small widget widget-left">',
			'after_widget' => '</aside>',
			'beore_title' => '<h2>',
			'after_title' => '</h2>',
		));

		register_sidebar(array(
			'name' => 'Archives',
			'id' => 'widgets-archives',
			'class' => 'widgets-archives',
			'before_widget' => '<aside class="column column-small widget widget-left nav nav-sidebar">',
			'after_widget' => '</aside>',
			'beore_title' => '<h2>',
			'after_title' => '</h2>',
		));		
	}
	// Include widget "Contact"
	include_once( rtrim( dirname( __FILE__ ), '/' ) . '/inc/widget-contact.php' );


/* 	============================================================================
   	WordPress front end tweaks
	==========================================================================*/
   
	// Protocol relative URLs for enqueued scripts/styles
	// function html5blank_protocol_relative($url) {
	// 	if(is_admin()) return $url;
	// 	return str_replace(array('http:','https:'), '', $url, $c=1);
	// }

	// Remove Injected classes, ID's and Page ID's from Navigation <li> items
	function my_css_attributes_filter($var) {
		return is_array($var) ? array() : '';
	}

	// Remove invalid rel attribute values in the categorylist
	function remove_category_rel_from_category_list($thelist){
	     return str_replace('rel="category tag"', 'rel="tag"', $thelist);
	}
	
	// Clear body classes
	function my_class_names($classes) {
	    return array();
	}

	// Add only page slug to body class, love this - Credit: Starkers Wordpress Theme
	function add_slug_to_body_class( $classes ) {
		global $post;
		if( is_page() || is_singular() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif( is_home() && get_post_type() == 'post'  || is_archive() && get_post_type() == 'post' ) {
			$classes[] = sanitize_html_class( 'blog' );
		} elseif( is_home() && get_post_type() == 'websites' || is_archive() && get_post_type() == 'websites' ) {
			$classes[] = sanitize_html_class( 'websites' );		};

		return $classes;
	}

		
	// Remove 'text/css' from our enqueued stylesheet
	function html5_style_remove($tag) {
		return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
	}


/* 	============================================================================
	Admin (dashboard tweaks)
	==========================================================================*/

	// Remove Links Manager
	add_action( 'admin_menu', 'my_remove_menu_pages' );
	function my_remove_menu_pages() {
		remove_menu_page('link-manager.php');
	}
	
	// Allow more HTML tags in the editor
	function fb_change_mce_options($initArray) {
		$ext = 'pre[id|name|class|style],iframe[align|longdesc| name|width|height|frameborder|scrolling|marginheight| marginwidth|src]';
	
		if ( isset( $initArray['extended_valid_elements'] ) ) {
			$initArray['extended_valid_elements'] .= ',' . $ext;
		} else {
			$initArray['extended_valid_elements'] = $ext;
		}
	
		return $initArray;
	}

	// Add & Remove contact information fields
	function ps_dm_user_contactmethods($user_contactmethods){
		$user_contactmethods['phone'] = 'Telefoon';
		unset($user_contactmethods['yim']);
		unset($user_contactmethods['aim']);
		unset($user_contactmethods['googleplus']);
		unset($user_contactmethods['jabber']);
		$user_contactmethods['twitter'] = 'Twitter';
		$user_contactmethods['facebook'] = 'Facebook';
		$user_contactmethods['user_title'] = 'Website Name';
		//$user_contactmethods['gplus'] = 'Google Plus';
		return $user_contactmethods;
	}
	// Use this code to embed in template:
	// echo get_user_meta(1, 'twitter', true);


/* 	============================================================================
	Oembed
	==========================================================================*/

	// based on this patch: http://core.trac.wordpress.org/attachment/ticket/10337/10337.10.patch
	function oembed_hotfix_delete_all_oembed_caches() { 
		// Based on delete_post_meta_by_key() 
		global $wpdb; 
		$post_ids = $wpdb->get_col( "SELECT DISTINCT post_id FROM $wpdb->postmeta WHERE meta_key LIKE '_oembed_%'" ); 
		if ( $post_ids ) { 
		      $postmetaids = $wpdb->get_col( "SELECT meta_id FROM $wpdb->postmeta WHERE meta_key LIKE '_oembed_%'" ); 
		      $in = implode( ',', array_fill( 1, count($postmetaids), '%d' ) );  
		      do_action( 'delete_postmeta', $postmetaids ); 
		        $wpdb->query( $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_id IN($in)", $postmetaids ) );  
		      do_action( 'deleted_postmeta', $postmetaids ); 
		      foreach ( $post_ids as $post_id ) 
		              wp_cache_delete( $post_id, 'post_meta' ); 
		      return true; 
		} 
		return false; 
	} 
	register_activation_hook( __FILE__, 'oembed_hotfix_delete_all_oembed_caches' );


/* =============================================================================
   Actions + Filters + ShortCodes
   ========================================================================== */

	// Add Actions
	add_action( 'init', 'html5wp_pagination' ); // Add our HTML5 Pagination
	// add_action( 'widgets_init', create_function('', 'return register_widget("ContactWidget");') );
	add_action( 'widgets_init', function(){ register_widget( 'ContactWidget' ); });	

	// Remove Actions
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head',10, 0 );
	remove_action( 'wp_head', 'rel_canonical');
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	
	// Add Filters

	add_filter('body_class','my_class_names'); // Clear body classes
	add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
	add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
	add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
	add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
	add_filter( 'user_contactmethods', 'ps_dm_user_contactmethods', 10, 1); // Add & remove certain contact information fields from user profile	
?>
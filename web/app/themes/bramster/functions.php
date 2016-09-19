<?php
/* 	============================================================================
   	Load Base functions
	==========================================================================*/

	include_once('inc/functions-base.php');


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


/* =============================================================================
   Actions + Filters + ShortCodes
   ========================================================================== */

	// Add Actions
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
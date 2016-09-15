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
			'id' => 'widgets-pages',
			'class' => 'widgets-pages',
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
	add_action( 'init', 'html5wp_pagination' ); // Add our HTML5 Pagination
	add_action( 'widgets_init', function(){ register_widget( 'ContactWidget' ); });	
	
	// Add Filters
	// add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
	// add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
?>
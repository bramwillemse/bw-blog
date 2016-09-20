<?php 
class themeSetup {

	/**
	 * Constructor
	 *
	 * @since  1.0
	 */
    public function __construct() {
	   	// Stylesheets
	   	add_action('wp_enqueue_scripts', array( &$this, 'load_stylesheet' ) ); // Add Theme Stylesheet	
		
	   	// Scripts
		// add_action( 'init', array( &$this, 'header_scripts' ) ) ; // Add Custom Scripts to wp_head
		add_action( 'wp_footer', array( &$this, 'footer_scripts')); // Add Custom Scripts to wp_footer
		add_filter( 'wp_default_scripts', array( &$this, 'dequeue_jquery_migrate' ) ); // Remove jQuery Migrate script
		add_filter( 'style_loader_src',  array( &$this, 't5_remove_version' )); // Remove version numbers from stylesheets
		add_filter( 'script_loader_src', array( &$this, 't5_remove_version' )); // Remove version numbers from scripts

		// WordPress UI
		// add_action('admin_menu', array( $this, 'remove_menus' )); // remove items from dashboard menu


		// WP backend
		// add_action( 'admin_menu', array( &$this, 'adjust_the_wp_menu'), 999 ); // Remove items admin submenu
		// add_filter( 'admin_footer_text', array( &$this, 'custom_admin_footer')); // Customize admin footer text

    }


	/* 	=============================================================================
	   	Stylesheets
	   	========================================================================== */

		// Theme Stylesheets using Enqueue
		public function load_stylesheet() {
			wp_register_style( 'stylesheet', get_template_directory_uri() . '/dist/css/main.min.css', array(), null, 'all');
			wp_enqueue_style( 'stylesheet' ); // Enqueue it!
		}


	/* 	=============================================================================
	   	Scripts
	   	========================================================================== */

		// Load header scripts (in <head>)
		// public function header_scripts() {
		//     if (!is_admin()) {
		// 		// registers script, stylesheet local path, no dependency, no version, loads in header
		//         wp_register_script('headerscripts', get_stylesheet_directory_uri() . '/dist/js/scripts-header.min.js', false, null, false ); // Header scripts
		//         wp_enqueue_script('headerscripts'); // Enqueue it!
		//     }
		// }

		// Load footer scripts (before </body>)
		public function footer_scripts() {
		    if (!is_admin()) {
				
				wp_enqueue_script('jquery',false, null, false); // Reregister WordPress jQuery in footer
						        
		        wp_register_script('footerscripts', get_template_directory_uri() . '/dist/js/scripts.min.js', array(), null); // Main scripts
		        wp_enqueue_script('footerscripts'); // Enqueue it!
		    }
		}

		// Remove jQuery Migrate script
		public function dequeue_jquery_migrate( &$scripts){
			if(!is_admin()){
				$scripts->remove( 'jquery');
				$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
			}
		}

		// Remove version numbers from static resources
		public function t5_remove_version( $url ) {
		    return remove_query_arg( 'ver', $url );
		}


		// remove jump to content in more-link
		public function remove_more_jump_link($link) { 
			$offset = strpos($link, '#more-');
			if ($offset) {
				$end = strpos($link, '"',$offset);
			}
			if ($end) {
				$link = substr_replace($link, '', $offset, $end-$offset);
			}
			return $link;
		}
		

	/* 	=============================================================================
	   	WordPress UI
	   	========================================================================== */

		// Remove items dashboard menu
		public function remove_menus () {
			global $menu;
			$restricted = array(
				// __('Dashboard'),
				// __('Posts'), 
				// __('Media'), 
				// __('Links'), 
				// __('Pages'), 
				// __('Appearance'), 
				// __('Tools'), 
				// __('Users'), 
				// __('Settings'),
				// __('Comments')
				// __('Plugins')
			);
			end ($menu);
			while (prev($menu)){
				$value = explode(' ',$menu[key($menu)][0]);
				if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
			}
		}

		// Remove items admin submenu
		// public function adjust_the_wp_menu() {
		// 	$page = remove_submenu_page( 'themes.php', 'widgets.php' );
		// 	// $page[0] is the menu title
		// 	// $page[1] is the minimum level or capability required
		// 	// $page[2] is the URL to the item's file
		// }




	
}
new themeSetup();



/* 	=============================================================================
   	Usable Functions
   	========================================================================== */

	/**
	 * Simple wrapper for native get_template_part()
	 * Allows you to pass in an array of parts and output them in your theme
	 * e.g. <?php get_template_parts(array('part-1', 'part-2')); ?>
	 *
	 * @param 	array 
	 * @return 	void
	 * @author 	Keir Whitaker
	 **/
	function get_template_parts( $parts = array() ) {
		foreach( $parts as $part ) {
			get_template_part( $part );
		};
	}

	// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
	function html5wp_pagination()
	{
	    global $wp_query;
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '?paged=%#%',
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages
	    ));
	}

	// Custom Excerpts
	function html5wp_index($length) { // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
	    return 33;
	}
	function html5wp_custom_post($length) { // Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
	    return 40;
	}

	// Create the Custom Excerpts callback
	function html5wp_excerpt($length_callback='', $more_callback='') {
	    global $post;
	    if(function_exists($length_callback)){
	        add_filter('excerpt_length', $length_callback);
	    }
	    if(function_exists($more_callback)){
	        add_filter('excerpt_more', $more_callback);
	    }
	    $output = get_the_excerpt();
	    $output = apply_filters('wptexturize', $output);
	    $output = apply_filters('convert_chars', $output);
	    $output = '<p>'.$output.'</p>';
	    echo $output;
	}


?>
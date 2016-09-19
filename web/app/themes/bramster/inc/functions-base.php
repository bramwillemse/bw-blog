<?php 
/*
Plugin Name: Theme Base
Plugin URI: http://www.bramwillemse.nl/
Description: Plugin implementing Bram Willemse's default collection of settings for WordPress.
Version: 0.2
Author: Bram Willemse
Author URI: http://www.bramwillemse.nl/
License: Copy paste as you like.
Copyright: Bram Willemse (contact@bramwillemse.nl)
*/
 
class themeBase {

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
		add_filter( 'style_loader_src',  array( &$this, 't5_remove_version' )); // Remove version numbers from stylesheets
		add_filter( 'script_loader_src', array( &$this, 't5_remove_version' )); // Remove version numbers from scripts

		// Images
		add_filter( 'upload_mimes', array( &$this, 'cc_mime_types' ) ); // Allow SVG upload

		// Oembed
		add_filter('oembed_dataparse', array( &$this, 'your_theme_embed_filter'), 90, 3 ); // Add box to Oembed video's and tweets for responsive support

		// WordPress UI
		// add_action('admin_menu', array( $this, 'remove_menus' )); // remove items from dashboard menu

		// WP frontend
		add_filter('excerpt_more', array( &$this, 'disable_more_link')); // Add 'View Article' button instead of [...] for Excerpts

		// WP backend
		// add_action( 'admin_menu', array( &$this, 'adjust_the_wp_menu'), 999 ); // Remove items admin submenu
		add_filter( 'admin_footer_text', array( &$this, 'custom_admin_footer')); // Customize admin footer text
		add_action( 'wp_before_admin_bar_render', array( &$this, 'remove_admin_bar_items'), 0 ); // Remove items from admin menu
		// add_action( 'admin_menu', array( &$this, 'remove_admin_menu_items')); // Remove items in admin menu
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


	/* 	=============================================================================
	   	Images
	   	========================================================================== */

		// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
		public function remove_thumbnail_dimensions( $html ){
		    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
		    return $html;
		}

		// Allow SVG upload
		public function cc_mime_types( $mimes ){
			$mimes['svg'] = 'image/svg+xml';
			return $mimes;
		}


	/* 	=============================================================================
	   	Oembed settings / add-ons
	   	========================================================================== */  
				
		// Add container to video's
		public function your_theme_embed_filter( $output, $data, $url ) {
			if ( $data->type == 'video' ) {
				$return = '<figure class="box box-video">'.$output.'</figure>';
				return $return;
			}
			if ( $data->provider_name == 'Twitter' ) {
				$return = '<figure class="box box-tweet">'.$output.'</figure>';
				return $return;		
				//echo print_r($data);
			}
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

		// Customize admin footer text
		public function custom_admin_footer() {
		        echo '<strong>Probleempje?</strong> Bel me direct op <a href="tel:+31628265381">(+31) (0)6 28 26 53 81</a> of mail me op <a href="mailto:contact@bramwillemse.nl">contact@bramwillemse.nl</a>';
		} 


	/* 	=============================================================================
	   	WordPress backend function tweaks
	   	========================================================================== */

		// Allow more HTML tags in the editor
		public function fb_change_mce_options($initArray) {
			$ext = 'pre[id|name|class|style],iframe[align|longdesc| name|width|height|frameborder|scrolling|marginheight| marginwidth|src]';
		
			if ( isset( $initArray['extended_valid_elements'] ) ) {
				$initArray['extended_valid_elements'] .= ',' . $ext;
			} else {
				$initArray['extended_valid_elements'] = $ext;
			}
		
			return $initArray;
		}

		// Remove items from admin menu
		public function remove_admin_bar_items() {
		        global $wp_admin_bar;
		       
		        $wp_admin_bar->remove_menu('wp-logo'); /* Remove WordPress Logo */
		        // $wp_admin_bar->remove_menu('comments'); /* Remove 'Add New > Posts' */
		        // $wp_admin_bar->remove_menu('new-post'); /* Remove 'Add New > Posts' */
		}

		// Remove items in admin menu
		public function remove_admin_menu_items() {
			// Remove 'Comments'
			// remove_menu_page('edit-comments.php');

			// Remove submenu item: 'Appearance > Customize'
			remove_submenu_page('themes.php', 'customize.php');

			// Conditional removals 
			if(!current_user_can('edit_themes')) { // Remove items for editors and below
				remove_menu_page('tools.php'); 
			}
			
		}

	   	// Deactivate dashboard widgets
		public function my_custom_dashboard_widgets() {
			global $wp_meta_boxes;
			 //Right Now - Comments, Posts, Pages at a glance
			// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
			//Recent Comments
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
			//Incoming Links
			// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
			//Plugins - Popular, New and Recently updated Wordpress Plugins
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

			//Wordpress Development Blog Feed
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
			//Other Wordpress News Feed
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
			//Quick Press Form
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
			//Recent Drafts List
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		}

		// remove extra CSS that 'Recent Comments' widget injects
		public function remove_recent_comments_style() {
		    global $wp_widget_factory;
		    remove_action('wp_head', array(
		        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		        'recent_comments_style'
		    ));
		}
	
}
new themeBase();

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

?>
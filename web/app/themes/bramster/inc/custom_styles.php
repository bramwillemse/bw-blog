<?php
/*
Plugin Name: Custom Styles
Plugin URI: http://www.speckygeek.com
Description: Add custom styles in your posts and pages content using TinyMCE WYSIWYG editor. The plugin adds a Styles dropdown menu in the visual post editor.
Based on TinyMCE Kit plug-in for WordPress
http://plugins.svn.wordpress.org/tinymce-advanced/branches/tinymce-kit/tinymce-kit.php
*/
/**
 * Apply styles to the visual editor
 */
add_filter('mce_css', 'tuts_mcekit_editor_style');
function tuts_mcekit_editor_style($url) {
    if ( !empty($url) )
        $url .= ',';
    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= trailingslashit( get_stylesheet_directory_uri() ) . '/editor-styles.css';
    return $url;
}
/**
 * Add "Styles" drop-down
 */
add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
function tuts_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
/**
 * Add styles/classes to the "Styles" drop-down
 * Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats 
 */

add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
function tuts_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title' => 'Introtekst',
            'selector' => 'p',
            'classes' => 'lead'
        ),
        array(
            'title' => 'Lees verder-link',
            'selector' => 'a',
            'classes' => 'more-link'
        ),
        array(
            'title' => 'Highlight',
            'selector' => 'a',
            'classes' => 'highlight'
        ),
        array(
            'title' => 'Highlight (callout)',
            'selector' => 'a',
            'classes' => 'highlight highlight-callout'
        ),
        array(
            'title' => 'Standard icons',
            'inline' => 'span',
            'classes' => 'ss-icon ss-standard'
        ),
        array(
            'title' => 'Social icons',
            'inline' => 'span',
            'classes' => 'ss-icon ss-social-regular'
        )
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}

/*
 * Add custom stylesheet to the website front-end with hook 'wp_enqueue_scripts'
 */
if ( is_admin() && is_user_logged_in() )  {
    add_action('admin_menu', 'tuts_mcekit_editor_enqueue');
}


/*
 * Enqueue stylesheet, if it exists.
 */
function tuts_mcekit_editor_enqueue() {
  $StyleUrl = get_stylesheet_directory_uri().'/editor-styles.css'; // Customstyle.css is relative to the current file
  wp_enqueue_style( 'myCustomStyles', $StyleUrl );
}
?>

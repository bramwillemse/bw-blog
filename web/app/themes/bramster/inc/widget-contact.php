<?php // Create widget "Contact"
class ContactWidget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'ContactWidget', // Base ID
			__( 'Contactgegevens', 'text_domain' ), // Name
			array( 
				'classname' => 'widget-contact', 
				'description' => __( 'Deze Widget geeft de "Contact", met interne link weer. Deze kun je bij "Opties" invullen.', 'text_domain' ), 
			) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
	
		//$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		
		if (!empty($title)) {
		  //echo $before_title . $title . $after_title;;
		}
		// WIDGET HTML GOES HERE
		?>
			<!-- Widget "contact" -->
			<aside class="widget widget-left widget-contact l-column l-column-small">
				<?php if ( function_exists('get_field') ) : ?>					
					<?php if ( get_field('widget-contact', 'options') ) : ?>
						<?php the_field('widget-contact', 'options'); ?>
					<?php endif; ?>
				<?php endif; ?>
			</aside>
		<?php
	}	 
	
	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */	
	function form($instance) {
		if ( function_exists('get_field') ) :
			if ( get_field('widget-contact', 'options') ) :
				the_field('widget-contact', 'options');
			endif;
		endif;
	}
	

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		return $instance;
	}
	

}
?>
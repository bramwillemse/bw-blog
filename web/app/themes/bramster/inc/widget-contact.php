<?php // Create widget "Contact"
class ContactWidget extends WP_Widget {
	function ContactWidget() {
		// description
		$widget_ops = array(
			'classname' => 'widget-contact', 
			'description' => 'Deze Widget geeft de "Contact", met interne link weer. Deze kun je bij "Opties" invullen.' 
		);
		// title
		$this->WP_Widget('ContactWidget', 'Contactgegevens', $widget_ops);
	}
	
	function form($instance) {
		if ( function_exists('get_field') ) :
			if ( get_field('widget-contact', 'options') ) :
				the_field('widget-contact', 'options');
			endif;
		endif;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		return $instance;
	}
	
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
}
?>
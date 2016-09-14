<?php $defaults = array(
	'theme_location'  => 'nav-main',
	'menu'            => 'nav-main', 

	// disable container
	'container'       => '', 
	'container_class' => false, 
	'container_id'    => '',

	// set classes & id
	'menu_class'      => 'nav nav-main column', 
	'menu_id'         => 'nav-main',

	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 1,
	'walker'          => ''
); ?>

<?php wp_nav_menu( $defaults ); ?>
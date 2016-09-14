<?php $defaults = array(
	'theme_location'  => 'nav-social',
	'menu'            => 'nav-social', 

	// disable container
	'container'       => '', 
	'container_class' => false, 
	'container_id'    => '',

	// set classes & id
	'menu_class'      => 'nav nav-social', 
	//'menu_id'         => '',

	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '<span class="screen-reader-text">',
	'link_after'      => '</span>',
	'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
	'depth'           => 2,
	'walker'          => ''
); ?>

<?php wp_nav_menu( $defaults ); ?>
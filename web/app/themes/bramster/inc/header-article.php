<?php

if( get_field('video-header') ) :
    get_template_part('inc/header-video');

elseif( has_post_thumbnail() ) :
    get_template_part('inc/header-image');

else :
    get_template_part('inc/header-title');

endif; ?>

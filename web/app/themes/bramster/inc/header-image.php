<?php
    $thumbid = get_post_thumbnail_id($post->ID);
    $img = wp_get_attachment_image_src( $thumbid, 'wide' );
    $headerimg = $img[0];
?>

<header class="header-image" style="background-image: url('<?php echo $headerimg; ?>');">
    <h1 class="l-column l-column-big"><?php the_title(); ?></h1>
</header>
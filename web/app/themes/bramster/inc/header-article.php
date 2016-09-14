<?php if( get_field('video-header') ) : ?>
	<header class="header header-video">
		<?php $videourl = get_field('video-url'); 
		echo wp_oembed_get( $videourl ); ?>
	</header>

    <h1 class="l-column l-column-big title-video"><?php the_title(); ?></h1>

<?php else : ?>
	<?php if( has_post_thumbnail() ) : ?>
	    <?php $thumbid = get_post_thumbnail_id($post->ID); ?>
	    <?php $img = wp_get_attachment_image_src( $thumbid, 'wide' ); ?>
	    <?php $headerimg = $img[0]; ?>
	
	<?php else : ?>
	    <?php $headerimg = get_header_image(); ?>
	
	<?php endif; ?>

	<header class="header header-article" style="background-image: url('<?php echo $headerimg; ?>');">
	    <h1 class="l-column l-column-big"><?php the_title(); ?></h1>
	</header><!-- /.post-header -->

<?php endif; ?>
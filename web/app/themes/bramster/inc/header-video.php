<header class="header header-video">
    <?php $videourl = get_field('video-url');
    echo wp_oembed_get( $videourl ); ?>
</header>

<h1 class="l-column l-column-big title-video"><?php the_title(); ?></h1>

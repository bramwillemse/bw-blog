<!DOCTYPE html>

<html lang="nl" itemscope itemtype="http://schema.org/Article">

<head>

    <!-- Typekit -->
    <script>
      (function(d) {
        var config = {
          kitId: 'dke5hva',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>

    <!-- Browser meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Content -->
    <?php
    $pageTitle;

    if ( is_single() ) {
        $pageTitle = wp_title('|', false, 'right') . get_bloginfo('name');
    } else {
        $pageTitle = get_bloginfo('name') . ' | ' . get_bloginfo('description');
    }
    ?>

    <title><?php echo $pageTitle; ?></title>

	<meta name="author" content="<?php bloginfo('name'); ?>">
	<meta name="copyright" content="<?php bloginfo('name'); ?> 2007-2016">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo $pageTitle; ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@bramwillemse">
    <meta name="twitter:title" content="<?php echo $pageTitle; ?>">
    <meta name="twitter:creator" content="@bramwillemse">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $pageTitle; ?>">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php the_permalink();?>" />
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">

    <!-- Image data -->
    <?php // Use featured image for social sharing
    global $post;
    if ( isset($post->ID) && has_post_thumbnail( $post->ID ) ) :
        $image_id = get_post_thumbnail_id($post->ID);
        $image_url = wp_get_attachment_image_src($image_id,'medium');
        $image_url = $image_url[0];
    ?>
        <link rel="image_src" href="<?php echo $image_url; ?>" >
        <meta name="twitter:image" content="<?php echo $image_url; ?>">
        <meta property="og:image" content="<?php echo $image_url; ?>" />
        <meta itemprop="image" content="<?php echo $image_url; ?>">
    <?php endif; ?>

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <!-- WP Head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php get_template_part('inc/toolbar'); ?>

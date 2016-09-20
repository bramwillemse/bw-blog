<!DOCTYPE html>

<html lang="nl">

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

	<meta charset="utf-8" >
				
	<meta name="author" content="Bram Willemse">
	<meta name="copyright" content="Creative Commons Bram Willemse 2013">

	<meta name="DC.title" content="<?php wp_title(''); ?>">
	<meta name="DC.subject" content="Design en communicatie">
	<meta name="DC.creator" content="Bram Willemse, bramwillemse.nl">
        
    <?php // Use post thumbnail for social sharing
    global $post;
    if ( isset($post->ID) && has_post_thumbnail( $post->ID ) ) : 
	    $image_id = get_post_thumbnail_id($post->ID);  
	    $image_url = wp_get_attachment_image_src($image_id,'large');  
	    $image_url = $image_url[0]; 
	?>    
		<link rel="image_src" href="<?php echo $image_url; ?>" >
	<?php endif; ?>
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

	
	<link rel="apple-touch-icon" href="">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <meta property="og:title" content="<?php wp_title(); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php wp_title('|', true, 'right') . bloginfo('name'); ?></title>
            
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="top" class="header header-toolbar">
    	<a href="<?php bloginfo('url'); ?>" class="logo column column-small">
    		<span class="logo-name"><?php bloginfo('name'); ?></span> 
        	<span class="logo-description"><?php bloginfo('description'); ?></span>
        </a>
		<?php get_template_part('inc/nav-mobile'); ?>
    	<?php get_template_part('inc/nav-main') ?>
	</header>
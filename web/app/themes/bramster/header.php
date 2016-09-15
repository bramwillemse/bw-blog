<!DOCTYPE html>

<html lang="nl">

<head>

	<script type="text/javascript">
	  (function() {
	    var config = {
	      kitId: 'dke5hva',
	      scriptTimeout: 0
	    };
	    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
	  })();
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
    
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/_/img/favicon.png">
	
	<link rel="apple-touch-icon" href="">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <meta property="og:title" content="<?php wp_title(); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title><?php wp_title(''); ?></title>
            
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

		<?php //get_template_part('inc/nav-social'); ?>

    	<?php get_template_part('inc/nav-main') ?>
	</header>
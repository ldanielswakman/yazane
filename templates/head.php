<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta name="description" content="<?php echo (function_exists('pll__')) ? pll__('tagline') : ''; ?>" />
	<meta name="keywords" content="" />
	<meta name="author" content="L Daniel Swakman, www.ldaniel.eu" />
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <style type="text/css">
    html, body, #map-canvas { height: 100%; margin: 0; padding: 0;}
  </style>

	<?php wp_head(); ?>

  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kreon:300,400,700" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic" />
	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <link rel="image_src" href="<?php echo get_template_directory_uri(); ?>/assets/img/background-working.jpg" / ><!--formatted-->

  <!-- Google Analytics tracking code -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-40452578-1', 'auto');
    ga('send', 'pageview');
  </script>

</head>

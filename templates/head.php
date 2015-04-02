<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta name="description" content="" />
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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" />

	<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.5.4/jquery.smooth-scroll.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.min.js"></script>

</head>

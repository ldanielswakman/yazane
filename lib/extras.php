<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip;';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

/**
 * Disable automatic paragraph tags
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Insert an image tag from the theme's assets directory
 */
function image_tag($image, $opts = array()) {
  echo '<img';
  echo ' src="' . get_template_directory_uri() . '/assets/img/' . $image . '"';
  foreach($opts as $key => $value) {
    echo ' ' . $key . '="' . addslashes($value) . '"';
  }
  echo ' />';
}

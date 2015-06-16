<?php
/**
 * Show a selection of coworkers by calling the template file
 */
function coworkers_preview_shortcode( $atts, $content = null ) {
  ob_start();
  get_template_part( 'templates/coworkers', 'preview' );
  return ob_get_clean();
}
add_shortcode('coworkers_preview', 'coworkers_preview_shortcode');

/**
 * Show all coworkers
 */
function coworkers_shortcode( $atts, $content = null ) {
  ob_start();
  get_template_part( 'templates/coworkers' );
  return ob_get_clean();
}
add_shortcode('coworkers', 'coworkers_shortcode');


/**
 * Show a selection of companies
 */
function companies_preview_shortcode( $atts, $content = null ) {
  ob_start();
  get_template_part( 'templates/companies', 'preview' );
  return ob_get_clean();
}
add_shortcode('companies_preview', 'companies_preview_shortcode');

/**
 * Show all companies
 */
function companies_shortcode( $atts, $content = null ) {
  ob_start();
  get_template_part( 'templates/companies' );
  return ob_get_clean();
}
add_shortcode('companies', 'companies_shortcode');

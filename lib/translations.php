<?php
// Theme string translations

if (function_exists('pll_register_string')) {
  // Main info
  pll_register_string('Tagline (meta tag)','tagline','yazane-theme');
  // Buttons & dialogs
  pll_register_string('Book a tour','book_a_tour','yazane-theme');
  pll_register_string('Book a tour dialog text','book_a_tour_dialog_text','yazane-theme');
  pll_register_string('Contact us','contact_us','yazane-theme');
  pll_register_string('Contact us dialog text','contact_us_dialog_text','yazane-theme');
  pll_register_string('Host an event','host_event','yazane-theme');
  pll_register_string('Host an event dialog text','host_event_dialog_text','yazane-theme');
  // Companies & Coworkers
  pll_register_string('Members','members','yazane-theme');
  pll_register_string('Members preview text','members_preview_text','yazane-theme');
  pll_register_string('Members preview action','members_preview_action','yazane-theme');
  pll_register_string('Name','name','yazane-theme');
  pll_register_string('Title','title','yazane-theme');
  pll_register_string('Description','description','yazane-theme');
  pll_register_string('Filter button all','filter_btn_all','yazane-theme');
  pll_register_string('Filter button current','filter_btn_current','yazane-theme');
  pll_register_string('Filter button past','filter_btn_past','yazane-theme');
  pll_register_string('Sort button random','sort_btn_random','yazane-theme');
  pll_register_string('Sort button by name','sort_btn_name','yazane-theme');
  pll_register_string('Sort button by title','sort_btn_title','yazane-theme');
  // Companies
  pll_register_string('Companies title','companies_title','yazane-theme');
  pll_register_string('Companies preview text','companies_preview_text','yazane-theme');
  pll_register_string('All companies button','all_companies_button','yazane-theme');
  // Newsletter signup block
  pll_register_string('Search','search','yazane-theme');
  pll_register_string('Newsletter title','newsletter_title','yazane-theme');
  pll_register_string('Newsletter text','newsletter_text','yazane-theme');
  // Footer
  pll_register_string('Colophon','colophon','yazane-theme');
  pll_register_string('Address title','address_title','yazane-theme');
  // Blog
  pll_register_string('Blog','blog','yazane-theme');
  pll_register_string('No blog posts','no_blog_posts_found','yazane-theme');
  pll_register_string('Read article','read_article','yazane-theme');
}

// Obtains a translated page for a given path
function getPageENtoPLL($string, $format = 'title') {
  // id of page page (EN), continue only if it exists
  $id = get_page_by_path($string)->ID;
  if (count($id) > 0) {
    // retrieve id & post object of translated page (EN)
    $translated_id = (function_exists('pll_get_post') && function_exists('pll_current_language')) ? pll_get_post($id, pll_current_language()) : $id;
    $translated_post = get_post($translated_id);

    if ($format == 'url') {
      // return permalink for translated post
      return post_permalink($translated_id);
    } else if ($format == 'id') {
      // return ID for translated post
      return $translated_post->ID;
    } else {
      // return title for translated post
      return $translated_post->post_title;
    }
  }
}

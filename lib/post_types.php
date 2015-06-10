<?php

add_action( 'init', 'create_post_types' );
function create_post_types() {
  register_post_type( 'homepage_sections',
    array(
      'labels' => array(
        'name' => __( 'Home Page Sections' ),
        'singular_name' => __( 'Home Page Section' ),
        'add_new_item' => __( 'Add New Home Page Section' ),
        'edit_item' => __( 'Edit Home Page Section' ),
      ),
      'menu_icon' => 'dashicons-editor-code',
      'public' => true,
      'supports' => array('title', 'editor', 'revisions', 'page-attributes'),
    )
  );
  register_post_type( 'coworkers',
    array(
      'labels' => array(
        'name' => __( 'Coworkers' ),
        'singular_name' => __( 'Coworker' ),
        'new_item' => __( 'New Coworker' ),
        'add_new_item' => __( 'Add New Coworker' ),
        'edit_item' => __( 'Edit Coworker' ),
        'search_items' => __( 'Search Coworkers' ),
        'not_found' => __( 'No Coworkers Found' ),
        'create' => __( 'Create Coworker' ),
      ),
      'menu_icon' => 'dashicons-id-alt',
      'public' => true,
      'supports' => array('title', 'thumbnail', 'revisions'),
      'register_meta_box_cb' => 'add_coworkers_metaboxes',
    )
  );
  register_post_type( 'companies',
    array(
      'labels' => array(
        'name' => __( 'Companies' ),
        'singular_name' => __( 'Company' ),
        'new_item' => __( 'New Company' ),
        'add_new_item' => __( 'Add New Company' ),
        'edit_item' => __( 'Edit Company' ),
        'search_items' => __( 'Search Companies' ),
        'not_found' => __( 'No Companies Found' ),
        'create' => __( 'Create Company' ),
      ),
      'menu_icon' => 'dashicons-groups',
      'public' => true,
      'supports' => array('title', 'thumbnail', 'revisions'),
      'register_meta_box_cb' => 'add_companies_metaboxes',
    )
  );
}

function add_coworkers_metaboxes( $post ) {
  add_meta_box( 'coworker_active', 'Active Member?',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_active', 'Active', 'yesno', 'yes' )
  );
  add_meta_box( 'coworker_job_title', 'Job Title',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_job_title', 'Job Title', 'text', '' )
  );
  add_meta_box( 'coworker_bio', 'Bio',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_bio', 'Bio', 'textarea', '' )
  );
  add_meta_box( 'coworker_linkedin', 'LinkedIn URL',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_linkedin', 'LinkedIn URL', 'text', '' )
  );
  add_meta_box( 'coworker_twitter', 'Twitter URL',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_twitter', 'Twitter URL', 'text', '' )
  );
  add_meta_box( 'coworker_facebook', 'Facebook URL',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_facebook', 'Facebook URL', 'text', '' )
  );
  add_meta_box( 'coworker_instagram', 'Instagram URL',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_instagram', 'Instagram URL', 'text', '' )
  );
  add_meta_box( 'coworker_website', 'Website URL',
                'meta_field_box', 'coworkers', 'normal', 'default',
                array( 'coworker_website', 'Website URL', 'text', '' )
  );
}

function add_companies_metaboxes( $post ) {
  add_meta_box( 'company_active', 'Active Member?',
                'meta_field_box', 'companies', 'normal', 'default',
                array( 'company_active', 'Active', 'yesno', 'yes' )
  );
  add_meta_box( 'company_description', 'Description',
                'meta_field_box', 'companies', 'normal', 'default',
                array( 'company_description', 'Description', 'text', '' )
  );
  add_meta_box( 'company_website', 'Website URL',
                'meta_field_box', 'companies', 'normal', 'default',
                array( 'company_website', 'Website URL', 'text', '' )
  );
}

function meta_field_box( $post, $metabox ) {
  $meta_key = $metabox['args'][0];
  $label = $metabox['args'][1];
  $type = $metabox['args'][2];
  $default = $metabox['args'][3];

  // Add an nonce field so we can check for it later.
  wp_nonce_field( $meta_key . '_box', $meta_key . '_box_nonce' );

  // Use get_post_meta to retrieve an existing value from the database.
  $value = get_post_meta( $post->ID, $meta_key, true );
  if ( '' == $value ) {
    $value = $default;
  }

  // Display the form, using the current value.
  echo '<label class="screen-reader-text" for="' . $meta_key . '">';
  echo esc_html($label) . '</label>';
  if ( 'text' == $type ){
    meta_field_text( $meta_key, $label, $value );
  } elseif ( 'textarea' == $type ) {
    meta_field_textarea( $meta_key, $label, $value );
  } elseif ( 'yesno' == $type ) {
    meta_field_yesno( $meta_key, $label, $value );
  }
}

function meta_field_text( $meta_key, $label, $value ) {
  echo '<input type="text" id="' . $meta_key . '" class="meta-field"';
  echo ' name="' . $meta_key . '" value="' . esc_attr( $value ) . '"';
  echo ' size="25" />';
}

function meta_field_textarea( $meta_key, $label, $value ) {
  echo '<textarea id="' . $meta_key . '" class="meta-field"';
  echo ' name="' . $meta_key . '" rows=12 cols=40>';
  echo esc_textarea( $value );
  echo '</textarea>';
}

function meta_field_yesno( $meta_key, $label, $value ) {
  echo '<label for="' . $meta_key . '_yes">';
  echo '<input type="radio" name="' . $meta_key . '"';
  echo ' id="' . $meta_key . '_yes" value="yes" ';
  checked( $value, 'yes' );
  echo ' />';
  echo 'Yes</label>';

  echo '<br />';

  echo '<label for="' . $meta_key . '_no">';
  echo '<input type="radio" name="' . $meta_key . '"';
  echo ' id="' . $meta_key . '_no" value="no" ';
  checked( $value, 'no' );
  echo ' />';
  echo 'No</label>';
}

// Save the metabox data for custom post types
function save_custom_post_meta($post_id, $post) {
  // Is the user allowed to edit the post or page?
  if ( !current_user_can( 'edit_post', $post->ID ))
    return;

  // Loop through meta keys and save each field
  $keys = array('coworkers' => array('coworker_active',
                                     'coworker_job_title',
                                     'coworker_bio',
                                     'coworker_linkedin',
                                     'coworker_twitter',
                                     'coworker_facebook',
                                     'coworker_instagram',
                                     'coworker_website'),
                'companies' => array('company_active',
                                     'company_description',
                                     'company_website'));

  if ( !array_key_exists( $post->post_type, $keys ) )
    return;

  foreach ($keys[$post->post_type] as $key) {
    save_meta($post, $key);
  }
}
add_action('save_post', 'save_custom_post_meta', 1, 2);

function save_meta($post, $meta_key) {
  // Verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times
  if ( !array_key_exists($meta_key . '_box_nonce', $_POST) ||
       !wp_verify_nonce($_POST[$meta_key . '_box_nonce'], $meta_key . '_box') )
    return;

  // Save the meta value to the database
  if ( $post->post_type == 'revision' )
    return; // Don't store custom data twice

  $value = $_POST[$meta_key];
  if (get_post_meta($post->ID, $meta_key, false)) {
    update_post_meta($post->ID, $meta_key, $value);
  } else {
    add_post_meta($post->ID, $meta_key, $value);
  }
  if(!$value) delete_post_meta($post->ID, $meta_key);
}

/**
 * Change the title placeholder in Coworker post types to say
 * "Enter full name here" instead of "Enter title"
 */
function change_default_title( $title ){
  $screen = get_current_screen();
  if ( 'coworkers' == $screen->post_type ){
    $title = 'Enter full name here';
  }
  return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );

/**
 * Disable WYSIWYG editor for home page sections
 */
add_filter('user_can_richedit', 'disable_wysiwyg_for_CPT');
function disable_wysiwyg_for_CPT($default) {
  global $post;
  if ('homepage_sections' == get_post_type($post))
    return false;
  return $default;
}

/**
 * Register a many-to-many relationship between coworkers and companies
 * using the Posts 2 Posts plugin
 */
function p2p_connection_types() {
  p2p_register_connection_type( array(
    'name' => 'coworkers_to_companies',
    'from' => 'coworkers',
    'to' => 'companies',
    'admin_box' => array(
      'show' => 'any',
      'context' => 'advanced'
    )
  ) );
}
add_action( 'p2p_init', 'p2p_connection_types' );

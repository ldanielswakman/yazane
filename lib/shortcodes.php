<?php
/**
 * Show a selection of coworkers
 */
function coworkers_preview_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'max' => 6,
    'status' => 'active',
  ), $atts );

  $posts = get_posts( array(
    'post_type' => 'coworkers',
    'orderby' => 'rand',
    'posts_per_page' => $a['max']
  ));

  $result = '';
  $result .= '<section id="coworkers" class="u-pv80">';
  $result .= '  <div class="row">';
  $result .= '    <div class="col-xs-12 u-mb40 u-aligncenter">';
  $result .= '      <h2>members</h2>';
  $result .= '      <p>a random selection of our members:</p>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row u-alignleft">';
  foreach($posts as $post) {
    $name = get_the_title( $post->ID );
    $image = get_the_post_thumbnail( $post->ID, array(80, 80) );
    $job_title = get_post_meta( $post->ID, 'coworker_job_title', true );

    $result .= '  <div class="coworker col-sm-4 col-xs-6 u-mv20">';
    $result .= '    <div class="coworker-image">' . $image . '</div>';
    $result .= '    <h4 class="u-mt20">' . $name . '</h4>';
    $result .= '    <p class="small">' . $job_title . '</p>';
    $result .= '  </div>';
  }
  $result .= '    <div class="col-xs-12 actions u-mt40 u-aligncenter">';
  $result .= '      <a href="/members/" class="btn u-ma5">see all members</a>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '</section>';

  return $result;
}
add_shortcode('coworkers_preview', 'coworkers_preview_shortcode');

/**
 * Show all coworkers
 */
function coworkers_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'max' => 8,
    'order' => 'lastname',
    'status' => 'active',
  ), $atts );

  $posts = get_posts( array(
    'post_type' => 'coworkers',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));

  $result = '';
  $result .= '<dialog id="coworker_detail" class="u-pv40">';
  $result .= '  <div class="row u-mb20">';
  $result .= '    <div class="col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">';
  $result .= '      <div class="coworker-image"><img src="" alt="" /></div>';
  $result .= '    </div>';
  $result .= '    <div class="col-sm-4 col-xs-12 u-mb20 u-alignleft">';
  $result .= '      <h4 class="coworker-name">name</h4>';
  $result .= '      <p class="coworker-title small">title</p>';
  $result .= '    </div>';
  $result .= '    <div class="coworker-links col-sm-4 col-xs-12 u-alignright">';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row">';
  $result .= '    <div class="col-sm-8 col-sm-offset-3 u-alignleft">';
  $result .= '      <p class="coworker-description small">description</p>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>';
  $result .= '</dialog>';

  $result .= '<section id="page-coworkers" class="page-coworkers u-pv60">';
  $result .= '  <div class="row u-aligncenter u-mb40">';
  $result .= '    <div class="col-xs-12 actions">';
  $result .= '      <span class="btn-group u-mr20 coworker-filtering">';
  $result .= '        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-filter="coworker">all</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-filter="current">current</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-filter="past">past</a>';
  $result .= '      </span>';
  $result .= '      <span class="btn-group u-mr20 coworker-sorting">';
  $result .= '        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-sort="random">random</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-sort="name">by name</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-sort="title">by title</a>';
  $result .= '      </span>';
  $result .= '      <span class="btn-group coworker-search">';
  $result .= '        <input type="search" id="coworkersearch" placeholder="SEARCH..." class="btn btn-sm" />';
  $result .= '      </span>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row u-aligncenter coworker-container">';

  foreach($posts as $post) {
    $name = get_the_title( $post->ID );
    $image = get_the_post_thumbnail( $post->ID, array(150, 150) );
    $active = get_post_meta( $post->ID, 'coworker_active', true );
    $current = ($active == 'yes') ? 'current' : 'past';
    $job_title = get_post_meta( $post->ID, 'coworker_job_title', true );
    $bio = get_post_meta( $post->ID, 'coworker_bio', true );
    $linkedin = get_post_meta( $post->ID, 'coworker_linkedin', true );
    $twitter = get_post_meta( $post->ID, 'coworker_twitter', true );
    $facebook = get_post_meta( $post->ID, 'coworker_facebook', true );
    $instagram = get_post_meta( $post->ID, 'coworker_instagram', true );
    $website = get_post_meta( $post->ID, 'coworker_website', true );

    $result .= '    <div class="coworker col-sm-3 col-xs-6 u-mv20 ' . $current . '">';
    $result .= '      <div class="coworker-image">' . $image . '</div>';
    $result .= '      <h4 class="coworker-name u-mt20">' . $name . '</h4>';
    $result .= '      <p class="coworker-title small">' . $job_title . '</p>';
    $result .= '      <p class="coworker-description small">' . $bio . '</p>';
    $result .= '      <div class="coworker-links">';
    if ($facebook != '')
      $result .= '      <a href="' . $facebook . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-facebook ion-15x"></i></a>';
    if ($twitter != '')
      $result .= '      <a href="' . $twitter . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-twitter ion-15x"></i></a>';
    if ($linkedin != '')
      $result .= '      <a href="' . $linkedin . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-linkedin ion-15x"></i></a>';
    if ($instagram != '')
      $result .= '      <a href="' . $instagram . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-instagram ion-15x"></i></a>';
    if ($website != '')
      $result .= '      <a href="' . $website . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-link ion-15x"></i></a>';
    $result .= '      </div>';
    $result .= '    </div>';
  }
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '</section>';

  return $result;
}
add_shortcode('coworkers', 'coworkers_shortcode');


/**
 * Show a selection of companies
 */
function companies_preview_shortcode( $atts, $content = null ) {
  $a = shortcode_atts( array(
    'max' => 6,
    'status' => 'active',
  ), $atts );

  $posts = get_posts( array(
    'post_type' => 'companies',
    'orderby' => 'rand',
    'posts_per_page' => $a['max']
  ));

  $result = '';
  $result .= '<section id="companies" class="u-pv80">';
  $result .= '  <div class="row">';
  $result .= '    <div class="col-xs-12 u-mb40 u-aligncenter">';
  $result .= '      <h2>companies</h2>';
  $result .= '      <p>a random selection of companies at Yazane:</p>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row u-alignleft">';
  foreach($posts as $post) {
    $name = get_the_title( $post->ID );
    $image = get_the_post_thumbnail( $post->ID, array(80, 80) );

    $result .= '  <div class="company col-sm-4 col-xs-6 u-mv20">';
    $result .= '    <div class="company-image">' . $image . '</div>';
    $result .= '    <h4 class="u-mt20">' . $name . '</h4>';
    $result .= '  </div>';
  }
  $result .= '    <div class="col-xs-12 actions u-mt40 u-aligncenter">';
  $result .= '      <a href="/members/" class="btn u-ma5">see all members</a>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '</section>';

  return $result;
}
add_shortcode('companies_preview', 'companies_preview_shortcode');

/**
 * Show all companies
 */
function companies_shortcode( $atts, $content = null ) {
  $posts = get_posts( array(
    'post_type' => 'companies',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));

  $result = '';
  $result .= '<dialog id="company_detail" class="u-pv40">';
  $result .= '  <div class="row u-mb20">';
  $result .= '    <div class="col-sm-4 col-xs-8 col-xs-offset-2 col-sm-offset-0">';
  $result .= '      <div class="company-image"><img src="" alt="" /></div>';
  $result .= '    </div>';
  $result .= '    <div class="col-sm-8 col-xs-12 u-mb20 u-alignleft">';
  $result .= '      <div class="company-links u-floatright">';
  $result .= '      </div>';
  $result .= '      <h4 class="company-name">name</h4>';
  $result .= '      <p class="company-title small">title</p>';
  $result .= '      <p class="company-description small u-mt20">description</p>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>';
  $result .= '</dialog>';

  $result .= '<section id="page-companies" class="page-companies u-pv60">';
  $result .= '  <div class="row u-mb40">';
  $result .= '    <div class="col-xs-12 u-aligncenter">';
  $result .= '      <h4>COMPANIES</h4>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row u-aligncenter u-mb40">';
  $result .= '    <div class="col-xs-12 actions">';
  $result .= '      <span class="btn-group u-mr20 company-filtering">';
  $result .= '        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-filter="company">all</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-filter="current">current</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-filter="past">past</a>';
  $result .= '      </span>';
  $result .= '      <span class="btn-group u-mr20 company-sorting">';
  $result .= '        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-sort="random">random</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-sort="name">by name</a>';
  $result .= '        <a href="javascript:void(0)" class="btn btn-sm" data-sort="title">by title</a>';
  $result .= '      </span>';
  $result .= '      <span class="btn-group company-search">';
  $result .= '        <input type="search" id="companysearch" placeholder="SEARCH..." class="btn btn-sm" />';
  $result .= '      </span>';
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '  <div class="row u-aligncenter company-container">';

  foreach($posts as $post) {
    $name = get_the_title( $post->ID );
    $image = get_the_post_thumbnail( $post->ID, 'medium' );
    $active = get_post_meta( $post->ID, 'company_active', true );
    $current = ($active == 'yes') ? 'current' : 'past';
    $description = get_post_meta( $post->ID, 'company_description', true );
    $website = get_post_meta( $post->ID, 'company_website', true );

    $result .= '    <div class="company col-sm-3 u-mv20 ' . $current . '">';
    $result .= '      <div class="company-image">' . $image . '</div>';
    $result .= '      <h4 class="company-name u-mt20">' . $name . '</h4>';
    $result .= '      <p class="company-description small">' . $description . '</p>';
    $result .= '      <div class="company-links">';
    if ($website != '')
      $result .= '      <a href="' . $website . '" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-link ion-15x"></i></a>';
    $result .= '      </div>';
    $result .= '    </div>';
  }
  $result .= '    </div>';
  $result .= '  </div>';
  $result .= '</section>';

  return $result;
}
add_shortcode('companies', 'companies_shortcode');

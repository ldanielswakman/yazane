<?php
// temporarily simplified attribute output, not customisable via shortcode

// $a = shortcode_atts( array(
//   'max' => 6,
//   'status' => 'active',
// ), $atts );

$args = array(
  'max' => 6,
  'status' => 'active',
);
$posts = get_posts( array(
  'post_type' => 'coworkers',
  'orderby' => 'rand',
  'posts_per_page' => $args['max'],
  'meta_query' => array(
    array(
     'key' => 'coworker_active',
     'value' => 'yes',
     'compare' => '='
    )
  )
));
?>

<section id="members" class="u-pv80">

  <div class="row">
    <div class="col-xs-12 u-mb40 u-aligncenter">
      <h2><?php echo (function_exists('pll__')) ? pll__('members') : __('Members'); ?></h2>
      <p><?php echo (function_exists('pll__')) ? pll__('members_preview_text') : __('members_preview_text'); ?>:</p>
    </div>
  </div>

  <div class="row u-aligncenter">
    <?php
    foreach($posts as $post):
      $name = get_the_title( $post->ID );
      $image = get_the_post_thumbnail( $post->ID, array(80, 80) );
      $job_title = get_post_meta( $post->ID, 'coworker_job_title', true );
      ?>

      <div class="coworker col-sm-4 col-xs-6 u-mv20">
        <div class="coworker-image"><?php echo (strlen($image) > 0) ? $image : '<i class="placeholder ion ion-ios-person"></i>' ?></div>
        <h4 class="u-mt20 u-truncate"><?php echo $name ?></h4>
        <p class="small u-truncate"><?php echo $job_title ?></p>
      </div>

    <?php endforeach; ?>

    <div class="col-xs-12 actions u-mt40 u-aligncenter">
      <?php 
      $id = get_page_by_path('members')->ID; // id of members page (EN)
      $translated_id = (function_exists('pll_get_post') && function_exists('pll_current_language')) ? pll_get_post($id, pll_current_language()) : $id; // id of translated page (EN)
      $url = post_permalink($translated_id); // get permalink for translated id
      ?>
      <a href="<?php echo $url ?>" class="btn u-ma5"><?php echo (function_exists('pll__')) ? strtoupper(pll__('members_preview_action')) : __('SEE ALL MEMBERS'); ?></a>
    </div>
  </div>

</section>

<?php wp_reset_query() ?>

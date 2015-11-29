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
  'post_type' => 'companies',
  'orderby' => 'rand',
  'posts_per_page' => $args['max'],
  'meta_query' => array(
    array(
     'key' => 'company_active',
     'value' => 'yes',
     'compare' => '='
    )
  )
));
?>

<section id="companies" class="u-pv80">

  <div class="row">
    <div class="col-xs-12 u-mb40 u-aligncenter">
      <h2><?php echo (function_exists('pll__')) ? pll__('companies_title') : __('Companies'); ?></h2>
      <p><?php echo (function_exists('pll__')) ? pll__('companies_preview_text') : __('companies_preview_text'); ?>:</p>
    </div>
  </div>
  <div class="row u-aligncenter">

    <?php
    foreach($posts as $post):
      $name = get_the_title( $post->ID );
      $image = get_the_post_thumbnail( $post->ID, array(80, 80) );
      ?>

      <div class="company col-sm-4 col-xs-6 u-mv20">
        <div class="company-image"><?php echo $image ?></div>
        <h4 class="u-mt20 u-truncate"><?php echo $name ?></h4>
      </div>

    <?php endforeach; ?>

    <div class="col-xs-12 actions u-mt40 u-aligncenter">
      <?php 
      $id = get_page_by_path('members')->ID; // id of members page (EN)
      $translated_id = (function_exists('pll_get_post') && function_exists('pll_current_language')) ? pll_get_post($id, pll_current_language()) : $id; // id of translated page (EN)
      $url = post_permalink($translated_id); // get permalink for translated id
      ?>
      <a href="<?php echo $url . '#page-companies' ?>" class="btn u-ma5"><?php echo (function_exists('pll__')) ? strtoupper(pll__('all_companies_button')) : __('SEE ALL COMPANIES'); ?></a>
    </div>

  </div>
</section>

<?php wp_reset_query(); ?>

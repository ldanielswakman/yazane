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
      <h2>companies</h2>
      <p>a random selection of companies at Yazane:</p>
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
      <a href="/members/" class="btn u-ma5">see all companies</a>
    </div>

  </div>
</section>

<?php wp_reset_query(); ?>

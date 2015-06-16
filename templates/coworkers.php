<?php
// temporarily simplified attribute output, not customisable via shortcode

// $a = shortcode_atts( array(
//   'max' => 8,
//   'order' => 'lastname',
//   'status' => 'active',
// ), $atts );

$posts = get_posts( array(
  'post_type' => 'coworkers',
  'order' => 'ASC',
  'posts_per_page' => -1
));
?>

<dialog id="coworker_detail" class="u-pv40">
  <div class="row u-mb20">
    <div class="col-sm-3 col-xs-6 col-xs-offset-3 col-sm-offset-0">
      <div class="coworker-image"><img src="" alt="" /></div>
    </div>
    <div class="col-sm-4 col-xs-12 u-mb20 u-alignleft">
      <h4 class="coworker-name">name</h4>
      <p class="coworker-title small">title</p>
    </div>
    <div class="coworker-links col-sm-4 col-xs-12 u-alignright">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-8 col-sm-offset-3 u-alignleft">
      <p class="coworker-description small">description</p>
    </div>
  </div>
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
</dialog>

<section id="page-coworkers" class="page-coworkers u-pv60">
  <div class="row u-aligncenter u-mb40">
    <div class="col-xs-12 actions">
      <span class="btn-group u-mr20 coworker-filtering">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-filter="coworker">all</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-filter="current">current</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-filter="past">past</a>
      </span>
      <span class="btn-group u-mr20 coworker-sorting">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-sort="random">random</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-sort="name">by name</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-sort="title">by title</a>
      </span>
      <span class="btn-group coworker-search">
        <input type="search" id="coworkersearch" placeholder="SEARCH..." class="btn btn-sm" />
      </span>
    </div>
  </div>
  <div class="row u-aligncenter coworker-container">

    <?php
    foreach($posts as $post):
      $name = get_the_title( $post->ID );
      $image = get_the_post_thumbnail( $post->ID, array(150, 150) );
      $active = get_post_meta( $post->ID, 'coworker_active', true );
      $current = ($active == 'yes') ? ' current' : ' past';
      $job_title = get_post_meta( $post->ID, 'coworker_job_title', true );
      $bio = get_post_meta( $post->ID, 'coworker_bio', true );
      $linkedin = get_post_meta( $post->ID, 'coworker_linkedin', true );
      $twitter = get_post_meta( $post->ID, 'coworker_twitter', true );
      $facebook = get_post_meta( $post->ID, 'coworker_facebook', true );
      $instagram = get_post_meta( $post->ID, 'coworker_instagram', true );
      $website = get_post_meta( $post->ID, 'coworker_website', true );
      ?>

      <div class="coworker col-sm-3 col-xs-6 u-mv20<?php echo $current ?>">
        <div class="coworker-image"><?php echo $image ?></div>
        <h4 class="coworker-name u-mt20"><?php echo $name ?></h4>
        <p class="coworker-title small"><?php echo $job_title ?></p>
        <p class="coworker-description small u-hidden"><?php echo $bio ?></p>

        <div class="coworker-links u-hidden">
          <?php if ($facebook != ''): ?>
            <a href="<?php echo $facebook ?>" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-facebook ion-15x"></i></a>
          <?php endif; ?>
          <?php if ($twitter != ''): ?>
            <a href="<?php echo $twitter ?>" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-twitter ion-15x"></i></a>
          <?php endif; ?>
          <?php if ($linkedin != ''): ?>
            <a href="<?php echo $linkedin ?>" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-linkedin ion-15x"></i></a>
          <?php endif; ?>
          <?php if ($instagram != ''): ?>
            <a href="<?php echo $instagram ?>" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-social-instagram ion-15x"></i></a>
          <?php endif; ?>
          <?php if ($website != ''): ?>
            <a href="<?php echo $website ?>" target="_blank" class="btn btn-circle btn-sm u-aligncenter"><i class="ion ion-link ion-15x"></i></a>
          <?php endif; ?>
        </div>
        
      </div>
    <?php endforeach; ?>

  </div>
</section>
<?php wp_reset_query(); ?>

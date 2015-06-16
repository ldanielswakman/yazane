<?php
$posts = get_posts( array(
  'post_type' => 'companies',
  'order' => 'ASC',
  'posts_per_page' => -1
));
?>

<dialog id="company_detail" class="u-pv40">
  <div class="row u-mb20">
    <div class="col-sm-4 col-xs-8 col-xs-offset-2 col-sm-offset-0">
      <div class="company-image"><img src="" alt="" /></div>
    </div>
    <div class="col-sm-8 col-xs-12 u-mb20 u-alignleft">
      <div class="company-links u-floatright">
      </div>
      <h4 class="company-name">name</h4>
      <p class="company-title small">title</p>
      <p class="company-description small u-mt20">description</p>
    </div>
  </div>
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
</dialog>

<section id="page-companies" class="page-companies u-pv60">
  <div class="row u-mb40">
    <div class="col-xs-12 u-aligncenter">
      <h4>COMPANIES</h4>
    </div>
  </div>
  <div class="row u-aligncenter u-mb40">
    <div class="col-xs-12 actions">
      <span class="btn-group u-mr20 company-filtering">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-filter="company">all</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-filter="current">current</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-filter="past">past</a>
      </span>
      <span class="btn-group u-mr20 company-sorting">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" data-sort="random">random</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-sort="name">by name</a>
        <a href="javascript:void(0)" class="btn btn-sm" data-sort="title">by title</a>
      </span>
      <span class="btn-group company-search">
        <input type="search" id="companysearch" placeholder="SEARCH..." class="btn btn-sm" />
      </span>
    </div>
  </div>
  <div class="row u-aligncenter company-container">

    <?php 
    foreach($posts as $post):
      $name = get_the_title( $post->ID );
      $image = get_the_post_thumbnail( $post->ID, 'medium' );
      $active = get_post_meta( $post->ID, 'company_active', true );
      $current = ($active == 'yes') ? ' current' : ' past';
      $description = get_post_meta( $post->ID, 'company_description', true );
      $linkedin = get_post_meta( $post->ID, 'company_linkedin', true );
      $twitter = get_post_meta( $post->ID, 'company_twitter', true );
      $facebook = get_post_meta( $post->ID, 'company_facebook', true );
      $instagram = get_post_meta( $post->ID, 'company_instagram', true );
      $website = get_post_meta( $post->ID, 'company_website', true );
      ?>

      <div class="company col-sm-3 u-mv20<?php echo $current ?>">
        <div class="company-image"><?php echo $image ?></div>
        <h4 class="company-name u-mt20 u-hidden"><?php echo $name ?></h4>
        <p class="company-description small u-hidden"><?php echo $description ?></p>

        <div class="company-links u-hidden">
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

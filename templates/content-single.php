<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>

    <section id="page-hero" class="parallax" style="background-image: url('/wp-content/themes/yazane/assets/img/background-woodpanels.jpg');">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 u-pv80 u-aligncenter">
          <h3 class="u-mb20"><?php echo function_exists('pll__') ? pll__('blog') : 'BLOG'; ?></h3>
          <blockquote><?php the_title(); ?></blockquote>
        </div>
      </div>
    </section>

    <section class="u-pt40 u-pb60">

      <div class="row">
        <div class="col-xs-6 col-sm-4 col-sm-offset-1 c-light u-pb30">
          <?php // get_template_part('templates/entry-meta'); ?>
          <?php the_author() ?>
          &middot;
          <?php the_date(); ?>
        </div>
        <div class="col-xs-6 col-sm-6 u-pb30 u-alignright">
          <a href="#" class="btn btn-sm btn-share-twitter"><i class="ion ion-social-twitter ion-15x"></i></a>
          <a href="#" class="btn btn-sm btn-share-facebook"><i class="ion ion-social-facebook ion-15x u-mh5"></i></a>
          <a href="#" class="btn btn-sm btn-share-linkedin"><i class="ion ion-social-linkedin ion-15x"></i></a>
        </div>
      </div>
    
      <div class="blog-article row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
          <?php echo wpautop(get_the_content()); ?>
        </div>
      </div>


      <div class="row u-mt60">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 c-light">
          <div class="tags"><?php the_tags('', ''); ?></div>
        </div>
        <div class="col-xs-12">
          <hr class="hr--blog">
        </div>
      </div>

      <div class="row u-mt60">
        <div class="col-xs-6 col-sm-5 col-sm-offset-1">
          <a href="<?php echo get_permalink( get_page_by_title('Blog')) ?>"><i class="ion ion-chevron-left u-mr5"></i> <?php echo function_exists('pll__') ? pll__('blog') : 'BLOG'; ?></a>
        </div>
        <div class="col-xs-6 col-sm-5 u-alignright">
          <?php next_post_link(); ?>
        </div>
      </div>

    </section>

    <!-- <footer>
      <?php // wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer> -->
    <?php // comments_template('/templates/comments.php'); ?>
  </article>

  <?php get_template_part('templates/footer', 'page'); ?>

<?php endwhile; ?>

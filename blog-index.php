<?php
/*
Template Name: Blog Index
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>

  <?php
  // list all blog posts here
  $args = array(
    'post_type' => 'post',
    'post_parent' => '0',
    'order' => 'ASC',
    'posts_per_page' => '-1'
  );
  $posts_query = new WP_Query($args);
  ?>

  <?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>

    <article class="u-pv60 <?php echo ($posts_query->current_post > 0) ? 'u-bordertop' : ''; ?>">
      <div class="row">
        <div class="col-xs-1 col-md-2">
          <!-- <i class="ion ion-ios-compose-outline ion-3x c-light"></i> -->
        </div>
        <div class="col-xs-11 col-sm-10 col-md-8">

          <a href="<?php the_permalink() ?>" class="u-block">
            <?php // print "(" . ($posts_query->current_post+1) ." of ". $posts_query->post_count . ")"; ?>
            <h4><big><?php the_title() ?></big></h4>
            <p class="c-light u-mb20 u-mt0"><small><?php the_author() ?> &middot; <?php the_date('d F Y') ?></small></p>
            <p style="line-height: 1.25em;"><small class="c-medium"><?php the_excerpt('') ?></small></p>
          </a>

          <a href="<?php the_permalink() ?>" class="btn btn-sm u-mt20"><?php echo function_exists('pll__') ? pll__('read_article') : 'Read article'; ?></a>

        </div>
      </div>
    </article>

  <?php endwhile ?>

  <?php if ($posts_query->post_count == 0) :?>
    <div class="u-pv60">
      <div class="row">
        <div class="col-xs-1 col-md-2">
        </div>
        <div class="col-xs-11 col-sm-10 col-md-8">
          <?php echo function_exists('pll__') ? pll__('no_blog_posts_found') : 'No posts'; ?>
          <!-- There are no blog posts to display at the moment... -->
        </div>
      </div>
    </div>
  <? endif ?>

  <?php
  // Reset Query
  wp_reset_query();
  ?>

  <?php get_template_part('templates/footer', 'page'); ?>

<?php endwhile; ?>

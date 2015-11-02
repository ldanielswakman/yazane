<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/nav'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
  <?php get_template_part('templates/footer', 'page'); ?>
<?php endwhile; ?>

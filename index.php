<main>

  <?php
  // outputs homepage sections
  $homepage_posts = new WP_Query( array(
    'post_type' => 'homepage_sections',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));
  while ( $homepage_posts->have_posts() ) : $homepage_posts->the_post();
    the_content();
  endwhile;  
  ?>

</main>


<?php
// outputs in-page nav menu
$sections_for_nav = new WP_Query( array(
  'post_type' => 'homepage_sections',
  'order' => 'ASC',
  'posts_per_page' => -1
));
if ($sections_for_nav->have_posts()):
  echo '<aside><ul id="page-menu">';

  while ( $sections_for_nav->have_posts() ) : $sections_for_nav->the_post();
    $visible = get_post_meta( $post->ID, 'section_nav_visible', true );
    if ($visible != 'no'):
      echo '<li><a href="#' . sanitize_title(get_the_title()) . '"' . $class . '><span class="descr">' . strtolower(get_the_title()) . '</span></a></li>';
    endif;
  endwhile;

  echo '</ul></aside>';
endif;
?>

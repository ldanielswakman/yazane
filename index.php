<main>

  <?php
  // outputs homepage sections
  $homepage_posts = new WP_Query( array(
    'post_type' => 'homepage_sections',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));
  while ( $homepage_posts->have_posts() ) : $homepage_posts->the_post();
    echo "<section id=" . $post->post_name . ">";
    the_content();
    echo "</section>";
  endwhile;  
  ?>

</main>

<?php
// outputs in-page nav menu
echo '<aside><ul id="page-menu">';
while ( $homepage_posts->have_posts() ) : $homepage_posts->the_post();
  $visible = get_post_meta( $post->ID, 'section_nav_visible', true );
  if ($visible != 'no'):
    echo '<li><a href="#' . $post->post_name . '"' . $class . '><span class="descr">' . strtolower(get_the_title()) . '</span></a></li>';
  endif;
endwhile;
echo '</ul></aside>';
?>

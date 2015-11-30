<main>

  <?php
  // outputs homepage sections
  $homepage_posts = new WP_Query( array(
    'post_type' => 'homepage_sections',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));
  $visiblepages = [];
  while ( $homepage_posts->have_posts() ) : $homepage_posts->the_post();
    // adding visible sections to array
    $visible = get_post_meta( $post->ID, 'section_nav_visible', true );
    if ($visible != 'no') { array_push($visiblepages, $post->ID); }
    the_content();
  endwhile;  
  ?>

</main>

<?php
// outputs in-page nav menu
if(!empty($visiblepages)) {
  echo '<aside><ul id="page-menu">';
  foreach ($visiblepages as $visiblepage) {
    echo '<li><a href="#' . sanitize_title(get_the_title($visiblepage)) . '"' . $class . '><span class="descr">' . strtolower(get_the_title($visiblepage)) . '</span></a></li>';
  }
  echo '</ul></aside>';
}
?>

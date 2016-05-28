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

<aside class="aside-pagination"><ul id="page-menu">
  <?php
  // outputs in-page nav menu
  while ( $homepage_posts->have_posts() ) : $homepage_posts->the_post();
    $visible = get_post_meta( $post->ID, 'section_nav_visible', true );
    if ($visible != 'no'):
      echo '<li><a href="#' . $post->post_name . '"' . $class . '><span class="descr">' . strtolower(get_the_title()) . '</span></a></li>';
    endif;
  endwhile;
  ?>
</ul></aside>

<aside class="floatingaction u-fixed-bottomright isHidden" data-appear-ypos="500" data-disappear-ypos="3000">
  <a href="https://facebook.com/YazaneIstanbul" target="_blank" class="btn btn-primary btn-lg" style="background-color: #3b5999;">
    <i class="ion ion-social-facebook u-mr10"></i>
    Like us on Facebook!
    <i class="ion ion-chevron-right u-ml10"></i>
  </a>
</aside>
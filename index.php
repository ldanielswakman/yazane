	<aside>
		<ul id="page-menu">
			<li><a href="#intro" class="active"><span class="descr">intro</span></a></li>
			<li><a href="#about"><span class="descr">about</span></a></li>
			<li><a href="#calendars"><span class="descr">calendars</span></a></li>
			<li><a href="#coworkers"><span class="descr">members</span></a></li>
			<li><a href="#mailing_list"><span class="descr">mailing list</span></a></li>
			<li><a href="#contact"><span class="descr">contact</span></a></li>
		</ul>
	</aside>

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

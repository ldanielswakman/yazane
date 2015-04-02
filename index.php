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

    <?php $posts = get_posts( array(
        'post_type' => 'homepage_sections',
        'order' => 'ASC',
        'posts_per_page' => -1
      ));
      foreach($posts as $post) {
        echo apply_filters('the_content', $post->post_content) . "\n\n";
      }
    ?>

	</main>

<? $site_status = 'farewell'; ?>

<main>

  <?
  // Farewell content
  if($site_status == 'farewell') :
  ?>

  <div class="parallax u-relative" data-prlx-offset="150" style="min-height: 200px; height: 60vh; background-image: url('<?= get_template_directory_uri() ?>/assets/img/background-pencils.jpg');">
    <div class="u-pinned-topright">
      <? // (function_exists('pll_current_language') && function_exists('pll_default_language') && pll_current_language() !== 'en') ?
      // site_url('/');
      if (function_exists('pll_current_language')) {
        if (pll_current_language() == 'tr') {
          echo '<a href="' . site_url('en') . '" class="btn btn-white">EN</a>';
        } else {
          echo '<a href="' . site_url() . '" class="btn btn-white">TR</a>';
        }
      }
      // if (function_exists('pll_current_language') && function_exists('pll_default_language')) {
      //   $pll_lang = (pll_current_language() != pll_default_language()) ? '/' . pll_current_language() : '';
      // }
      ?>
    </div>
  </div>

  <div class="u-relative" style="margin-top: -30vh;">

    <div style="height: 30vh; background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1)); background: -moz-linear-gradient(top, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1)); background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));"></div>

      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 u-pv40">

          <blockquote>
            <? if (pll_current_language() == 'en') : ?>

              <p>Dear friends,</p>

              <p>As the <b>Yazane Coworking Space</b> family, we are proud to look back on a period of almost three years that has led to the formation of coworking mood in Turkey, as well as a place where many friendships and partnerships began. With joy, excitement, energy, and of course with your support we were able to foster a different working environment, albeit for a short while.</p>

              <p>With the hope that we might meet again in the future in a new location, we are ending the adventure of Yazane Coworking that ran from May 2013 until 1 September 2016.<p>

              <p>We are thanking all our members that shared our story with us, and our friends.</p>

            <? else : ?>

              <p>Değerli dostlarımız,</p>

              <p><b>Yazane Coworking Space</b> ailesi olarak geride bıraktığımız üç sene içinde Türkiye'de coworking ruhunun oluşumuna öncülük etmiş olmanın yanı sıra bir sürü arkadaşlığın ve ortaklığın başladığı bir mekan olmanın gururunu taşıyoruz. Sevinci, heyecanı, enerjisi ve elbette sizlerin desteği ile farklı bir çalışma ortamını bir süreliğine de olsa ayakta tutabildik.</p>

              <p>İleride belki yeni bir mekanda tekrar buluşuruz ümidiyle 2013 yılı Mayıs ayında başlayan Yazane Coworking maceramızı 1 Eylül itibariyle sonlandırıyoruz.</p>

              <p>Hikayemizde payı olan tüm üyelerimize, dostlarımıza teşekkür ederiz.</p>

            <? endif ?>
          </blockquote>

        </div>
      </div>

      <div class="u-aligncenter u-pv30">
        <img src="<?= get_template_directory_uri() ?>/assets/img/pricing/flex.png" style="width: 70px;" alt="" />
      </div>

  </div>

  <div class="u-aligncenter u-pv30">


    <a href="mailto:info@yazane.com.tr" target="_blank" class="btn u-mt20 u-mr10"> <!-- toggle_contact_us  -->
      <i class="ion ion-email ion-15x u-mr10"></i>
      <?php echo function_exists('pll__') ? pll__('contact_us') : 'Contact us'; ?>
    </a>

    <a href="https://facebook.com/YazaneIstanbul" target="_blank" class="btn u-mt20 u-mr10">
      <i class="ion ion-social-facebook ion-15x u-mr10"></i>
      Facebook
    </a>

  </div>

  <? endif ?>


  <?php
  // Regular homepage content
  if($site_status != 'farewell') :
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
  endif; 
  ?>

</main>

<?php if($site_status != 'farewell') : ?>
<aside class="aside-pagination"><ul id="page-menu">
  <?
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
    <?php echo (function_exists('pll__')) ? pll__('fb_follow_us') : __('fb_follow_us'); ?>
    <i class="ion ion-chevron-right u-ml10"></i>
  </a>
</aside>
<? endif ?>

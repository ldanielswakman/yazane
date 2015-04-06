<!-- Contact forms -->
<a href="javascript:void(0)" id="book_a_tour_dialog_mask" class="dialog_mask"></a>
<dialog id="book_a_tour" class="row u-pv60 u-mh40">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="col-xs-8 col-xs-offset-2">
    <h3>BOOK A TOUR</h3>
    <p>Do you want to use one of Yazane's excellent spaces for one of your events,  inquire here for more information.</p>
  </div>
  <div class="col-xs-12 u-mt40">
    <?php echo do_shortcode( '[contact-form-7 id="32" title="Book A Tour"]' ); ?>

  </div>
</dialog>

<a href="javascript:void(0)" id="contact_us_dialog_mask" class="dialog_mask"></a>
<dialog id="contact_us" class="row u-pv60 u-mh40">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="col-xs-8 col-xs-offset-2">
    <h3>CONTACT US</h3>
    <p>Are you interested in more info about Yazane, or want to join us as a coworker? Contact us here.</p>
  </div>
  <div class="col-xs-12">
    <?php echo do_shortcode( '[contact-form-7 id="139" title="Contact Us"]' ); ?>
  </div>
</dialog>

<a href="javascript:void(0)" id="host_an_event_dialog_mask" class="dialog_mask"></a>
<dialog id="host_an_event" class="row u-pv60 u-mh40">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="col-xs-8 col-xs-offset-2">
    <h3>HOST AN EVENT</h3>
    <p>Do you want to use one of Yazane's excellent spaces for one of your events? Inquire here for more information.</p>
  </div>
  <div class="col-xs-12">
    <?php echo do_shortcode( '[contact-form-7 id="154" title="Host an Event"]' ); ?>
  </div>
</dialog>

<nav>
  <a href="javascript:void(0)" id="nav-menu-toggle">
    <i class="ion-navicon ion-2x"></i>
    <i class="ion-close"></i>
  </a>
  <div class="logo"><?php image_tag("logo.png"); ?></div>

  <?php wp_nav_menu() ?>

  <div class="actions">
    <a href="#" class="toggle_book_a_tour btn u-ml30 u-mt20"><i class="ion ion-calendar ion-15x u-mr20"></i>BOOK A TOUR</a><br />
    <a href="#" class="toggle_contact_us btn u-ml30 u-mt20"><i class="ion ion-email ion-15x u-mr20"></i>CONTACT US</a>
  </div>
  <a href="javascript:void(0)" id="mask"></a>
</nav>

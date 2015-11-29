<nav>
  <a href="javascript:void(0)" id="nav-menu-toggle">
    <i class="ion-navicon ion-2x"></i>
    <i class="ion-close"></i>
  </a>
  <? 
  $pll_lang = (pll_current_language() != pll_default_language()) ? '/' . pll_current_language() : '';
  ?>
  <a href="<?php echo site_url( $pll_lang ) ?>"><div class="logo"><?php image_tag("logo.png"); ?></div></a>

  <?php wp_nav_menu() ?>

  <div class="actions">
    <a href="#" class="toggle_book_a_tour btn u-ml30 u-mt20"><i class="ion ion-calendar ion-15x u-mr20"></i><?php pll_e('book_a_tour'); ?></a><br />
    <a href="#" class="toggle_contact_us btn u-ml30 u-mt20"><i class="ion ion-email ion-15x u-mr20"></i><?php pll_e('contact_us'); ?></a>
  </div>
  <a href="javascript:void(0)" id="mask"></a>
</nav>

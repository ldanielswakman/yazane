<footer id="contact">
  <div class="row u-pt60 u-pb80 u-aligncenter">
    <div class="col-sm-4">
      <?php image_tag('logo_negative.png',
        array('width' => '250px', 'class' => 'u-mv20')); 
      ?>
      <br />
      <br />
      <?php 
      // shows terms and conditions link if such a page exists
      $tnc_page = get_page_by_path( 'terms-and-conditions' );
      if ($tnc_page->ID != 0):
      ?>
      <a href="<?php echo get_permalink( get_page_by_path( 'terms-and-conditions' ) ) ?>"><?php echo get_page_by_path( 'terms-and-conditions' )->post_title ?></a>
      <?php endif; ?>
    </div>
    <div class="col-sm-4">
      <h4><?php echo (function_exists('pll__')) ? pll__('address_title') : __('address_title'); ?></h4>
      <h5>
        Tophane-İskele Cad. no:12 k:1 Karaköy<br />
        t: 0212 293 79 00<br />
        e:
        <script>
          // Obfuscated email address
          document.write(
            'i'+'n'+'f'+'&'+'#'+'1'+'1'+'1'+';'+'&'+'#'+'6'+'4'+';'+'y'+'a'+'z'+
            'a'+'n'+'e'+'&'+'#'+'4'+'6'+';'+'c'+'&'+'#'+'1'+'1'+'1'+';'+'m'+'&'+
            '#'+'4'+'6'+';'+'t'+'r');
        </script>
        <noscript>[Turn on JavaScript to see the email address]</noscript>
      </h5>
      <a href="#" class="toggle_contact_us btn u-mt20"><i class="ion ion-email ion-15x u-mr10"></i><?php echo (function_exists('pll__')) ? pll__('contact_us') : __('contact_us'); ?></a>
    </div>
    <div class="col-sm-4 u-pv20">
      <a href="https://twitter.com/yazanecowork" class="btn btn-circle btn-white u-mr10" target="_blank"><i class="ion-social-twitter ion-fw ion-2x"></i></a>
      <a href="https://facebook.com/YazaneIstanbul" class="btn btn-circle btn-white u-mr10" target="_blank"><i class="ion-social-facebook ion-fw ion-2x"></i></a>
      <a href="http://instagram.com/yazanecowork" class="btn btn-circle btn-white" target="_blank"><i class="ion-social-instagram ion-fw ion-2x"></i></a>

    </div>
  </div>
</footer>

<footer id="colophon">
  <div class="row u-pv40 u-aligncenter">
    <div class="col-xs-10 col-xs-offset-1">
      <?php
      $credit1 = '<a href="http://www.ldaniel.eu/" target="_blank">L. Daniel Swakman</a>';
      $credit2 = '<a href="http://logicleague.com/" target="_blank">Jay McAliley</a>';
      $credit3 = '<a href="http://www.wordpress.org/" target="_blank">Wordpress</a>';
      if (function_exists('pll__')) {
        printf( pll__('colophon'), $credit1, $credit2, $credit3 );
      } else {
        echo 'Colophon goes here';
      }
      ?>
    </div>
  </div>

</footer>
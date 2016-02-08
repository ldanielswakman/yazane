<section id="mailing-list">
  <div class="row u-pv100 u-aligncenter">
    <div class="col-xs-12">
      <h2 class="u-mt40"><?php echo (function_exists('pll__')) ? pll__('newsletter_title') : __('newsletter_title'); ?></h2>
      <p class="u-mt20"><?php echo (function_exists('pll__')) ? pll__('newsletter_text') : __('newsletter_text'); ?></p>
      <?php echo do_shortcode( '[mc4wp_form]' ); ?>
    </div>
  </div>
</section>

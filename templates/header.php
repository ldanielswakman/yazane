<?php
$lang = (function_exists('pll_current_language')) ? pll_current_language() : null;
?>

<!-- Contact forms -->
<a href="javascript:void(0)" id="book_a_tour_dialog_mask" class="dialog_mask"></a>
<dialog id="book_a_tour">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="dialog-content">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <h3><?php echo (function_exists('pll__')) ? pll__('book_a_tour') : __('book_a_tour'); ?></h3>
        <p><?php echo (function_exists('pll__')) ? pll__('book_a_tour_dialog_text') : __('book_a_tour_dialog_text'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 u-mt20">
        <?php
        $form_id = ($lang == 'tr') ? '454' : '32';
        echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ); 
        ?>
      </div>
    </div>
  </div>
</dialog>

<a href="javascript:void(0)" id="contact_us_dialog_mask" class="dialog_mask"></a>
<dialog id="contact_us">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="dialog-content">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <h3><?php echo (function_exists('pll__')) ? pll__('contact_us') : __('contact_us'); ?></h3>
        <p><?php echo (function_exists('pll__')) ? pll__('contact_us_dialog_text') : __('contact_us_dialog_text'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 u-mt20">
        <?php
        $form_id = ($lang == 'tr') ? '455' : '139';
        echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ); 
        ?>
      </div>
    </div>
  </div>
</dialog>

<a href="javascript:void(0)" id="host_an_event_dialog_mask" class="dialog_mask"></a>
<dialog id="host_an_event">
  <a href="javascript:void(0)" id="closeDialog" class="u-pinned-topright"><i class="ion ion-ios-close-empty ion-3x u-mr10"></i></a>
  <div class="dialog-content">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <h3><?php echo (function_exists('pll__')) ? pll__('host_event') : __('host_event'); ?></h3>
        <p><?php echo (function_exists('pll__')) ? pll__('host_event_dialog_text') : __('host_event_dialog_text'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 u-mt20">
        <?php
        $form_id = ($lang == 'tr') ? '456' : '154';
        echo do_shortcode( '[contact-form-7 id="' . $form_id . '"]' ); 
        ?>
      </div>
    </div>
  </div>
</dialog>

<?php get_template_part('templates/nav'); ?>

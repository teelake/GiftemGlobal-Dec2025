<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$tabs = $this->get_settings_for_display('tabs');
$settings = $this->get_settings();
$id_int = rand(10, 100);

$align = $settings['align'];

$this->add_render_attribute('icon-back');
?>

<div class="iq-faq">
  <?php
  $i = 1;
  foreach ($tabs as $index => $item) {
    if ($i == 1) {
      $show = "show";
      $style = "style=display:block";
      $adactive = "iq-active";
      $i++;
    } else {
      $style = "";
      $show = "";
      $adactive = "";
    }
  ?>
  
    <div class="iq-faq-block <?php echo esc_attr($adactive); ?>">
      <div class="iq-faq-title <?php echo esc_attr($adactive); ?>" id="heading<?php echo $index . $id_int; ?>">
        <div class="position-relative">
          <?php if (!empty($item['selected_icon'])) { ?>
            <?php echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($item['selected_icon']['value'])); ?>
          <?php } ?>
          <h5 class="mb-0">
            <?php echo esc_html__($item['tab_title']); ?>
          </h5>
        </div>
      </div>
      <div class="iq-faq-details">
        <?php echo $this->parse_text_editor($item['tab_content']); ?>
      </div>
    </div>
  <?php } ?>
</div>
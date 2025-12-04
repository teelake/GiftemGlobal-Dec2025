<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$image_background_effect = $this->get_settings_for_display('image_background_effect');
$settings = $this->get_settings();
$id_int = rand(10, 100);

$align = $settings['align'];

$image_html = '';

if (!empty($settings['image']['url'])) {
  $this->add_render_attribute('image', 'src', $settings['image']['url']);
  $this->add_render_attribute('image', 'srcset', $settings['image']['url']);
  $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
  $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
  $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}
?>
<div class="iq_background_list_wrapper <?php echo esc_attr($align); ?>">
  <?php
  $i = 1;

  foreach ($image_background_effect  as $item) {
    if ($i == 1) {
      $hover_class = "hover";
    } else {
      $hover_class = "";
    }
  ?>
    <div class="iq_background_list_column <?php echo esc_attr($hover_class); ?>">
      <div class="iq_background_list_content">
        <?php if (!empty($item['title'])) { ?>
          <div class="iq_background_list_title">
            <?php echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($item['selected_icon']['value'])); ?>
            <h4 class="title-color">
              <?php echo sprintf('%1$s', esc_html($item['title'])); ?>
            </h4>
          </div>
        <?php } ?>

        <?php if (!empty($item['content'])) { ?>
          <div class="iq_background_list_link">
            <div class="iq_background_list_desc">
              <?php echo $this->parse_text_editor($item['content']); ?>
            </div>
          </div>
        <?php } ?>

      </div>
      <?php if (!empty($item['section_title'])) { ?>
        <?php echo sprintf('<a class="button" href="%1$s">%2$s</a>', esc_url($item['link']['url']), esc_html($item['section_title'])); ?>
      <?php } ?>
    </div>
    <?php
    if (!empty($item['image']['url'])) {
      $hover_fig_class = '';
      if (!empty($hover_class)) {
        $hover_fig_class = 'hover';
      }
    ?>
      <figure class="iq_background_img <?php echo esc_attr($hover_fig_class); ?>">
        <div class="iq_background_list_overlay"></div>
        <img src="<?php echo esc_attr($item['image']['url']); ?>" alt="<?php esc_attr_e("enerzee-image",'enerzee-extensions')?>" />
      </figure>
  <?php
    }
    $i++;
  }
  ?>
</div>
<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';
$settings = $this->get_settings_for_display();

$image_html = '';
$image_html_1 = '';

$custom_css = "";
wp_add_inline_style('enerzee-style', $custom_css);

wp_enqueue_script('enerzee-style');

if (!empty($settings['image']['url'])) {
    $this->add_render_attribute('image', 'src', $settings['image']['url']);
    $this->add_render_attribute('image', 'srcset', $settings['image']['url']);
    $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
    $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
    $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}

if (!empty($settings['image_1']['url'])) {
    $this->add_render_attribute('image_1', 'src', $settings['image_1']['url']);
    $this->add_render_attribute('image_1', 'srcset', $settings['image_1']['url']);
    $this->add_render_attribute('image_1', 'alt', Control_Media::get_image_alt($settings['image_1']));
    $this->add_render_attribute('image_1', 'title', Control_Media::get_image_title($settings['image_1']));
    $image_html_1 = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail_1', 'image_1');
}
?>

<div class="iq-image-overlay  <?php echo esc_attr($settings['position_x']); ?> <?php echo $settings['position_y']; ?> iq-fadebounce style-<?php echo $settings['overlay_style']; ?>">

    <span class="iq-objects-01">
        <?php
        if (!empty($settings['image']['url'])) {
        ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php esc_attr_e("image",'enerzee-extensions')?>" />
        <?php } ?>
    </span>


    <span class="iq-objects-02">
        <?php
        if (!empty($settings['image_1']['url'])) {
        ?>
            <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="<?php esc_attr_e("image",'enerzee-extensions')?>" />
        <?php } ?>
    </span>
</div>
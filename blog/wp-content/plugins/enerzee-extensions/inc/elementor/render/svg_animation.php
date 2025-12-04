<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';
$settings = $this->get_settings_for_display();

$image_html = '';

if (!empty($settings['image']['url'])) {
    $this->add_render_attribute('image', 'src', esc_url($settings['image']['url']));
}
?>

<div class="bodymovin" data-bm-path="<?php echo esc_url($settings['image']['url']); ?>" data-bm-renderer="svg" data-bm-autoplay="true" data-bm-loop="true"></div>
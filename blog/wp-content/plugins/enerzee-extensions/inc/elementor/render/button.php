<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';
$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];

?>

<div class="iq-button <?php echo esc_attr($align); ?>">
	<?php echo sprintf('<a class="button" href="%1$s">%2$s</a>', esc_url($settings['link']['url']), esc_html($settings['section_title'])); ?>
</div>
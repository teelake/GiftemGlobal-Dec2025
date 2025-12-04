<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';

$progress_bar = $this->get_settings_for_display('progress_bar');
$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

?>
<div class="iq-progressbar-box">
	<?php foreach ($progress_bar as $index => $item) {
	?>
		<div class="iq-progressbar-content">
			<span><?php echo sprintf('%1$s', esc_html($item['section_title'])); ?></span>

			<div class="iq-progress-bar">
				<span data-percent="<?php echo esc_attr($item['tab_score']['size']); ?>"></span>
			</div>
			<span class="progress-value">
				<?php
				echo esc_html($item['tab_score']['size']);
				echo esc_html($item['tab_score']['unit']); ?>
			</span>
		</div>
	<?php	} ?>
</div>
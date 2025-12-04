<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];
$image_html = '';
$video_url = '';

$icon = sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($settings['selected_icon']['value']));
if ($settings['video_type'] == 'hosted') {
	$video_url = $settings['hosted_url']['url'];
}
if ($settings['video_type'] == 'video_link') {
	$video_url = $settings['link_url'];
}

?>

<div class="iq-popup-video">
	<div class="iq-video-img position-relative">
		<?php
		if (!empty($settings['image']['url'])) {
		?>
			<img class="img-fluid" src="<?php echo esc_url($settings['image']['url']); ?>" alt="' . esc_attr__('drive10', 'enerzee-extension') . '">
		<?php
		}
		?>

		<div class="iq-video-icon wow FadeIn">
			<a href="<?php echo esc_url($video_url); ?>" class="iq-video popup-youtube">
				<?php echo $icon; ?>
			</a>
			<div class="iq-waves">
				<div class="waves wave-1"></div>
				<div class="waves wave-2"></div>
				<div class="waves wave-3"></div>
			</div>
		</div>
	</div>
</div>
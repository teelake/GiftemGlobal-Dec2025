<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];

$this->add_render_attribute('icon-back', 'style', 'color:' . $settings['title_color'] . '');
if (!empty($settings['image']['url'])) {
	$this->add_render_attribute('image', 'src', $settings['image']['url']);
	$this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
	$this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
	$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}

?>

<div class="iq-timer <?php echo esc_attr($align); ?>">
	<?php
	if (!empty($settings['selected_icon']['value'])) {
		echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($settings['selected_icon']['value']));
	}
	?>
	<div class="timer-details">
		<span class="timer" data-to="<?php echo  sprintf('%1$s', esc_attr($settings['content'])); ?>" data-speed="5000">
			<?php echo sprintf('%1$s', esc_html($settings['content'])); ?>
		</span>
		<i class="fa fa-plus" aria-hidden="true"></i>
		<p><?php echo sprintf('%1$s', esc_html($settings['section_title'])); ?></p>
	</div>
</div>
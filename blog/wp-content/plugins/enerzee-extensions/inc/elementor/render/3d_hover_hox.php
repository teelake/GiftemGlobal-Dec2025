<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];

$title = $settings['title'];

$image_html = '';
if (!empty($settings['image']['url'])) {
	$this->add_render_attribute('image', 'src', $settings['image']['url']);
	$this->add_render_attribute('image', 'srcset', $settings['image']['url']);
	$this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
	$this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
	$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}

if (!empty($settings['background_image']['url'])) {
	$this->add_render_attribute('background_image', 'src', $settings['background_image']['url']);
	$this->add_render_attribute('background_image', 'srcset', $settings['background_image']['url']);
	$this->add_render_attribute('background_image', 'alt', Control_Media::get_image_alt($settings['background_image']));
	$this->add_render_attribute('background_image', 'title', Control_Media::get_image_title($settings['background_image']));
	$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'background_image');
}

if (!empty($settings['background_hover_image']['url'])) {
	$this->add_render_attribute('background_hover_image', 'src', $settings['background_hover_image']['url']);
	$this->add_render_attribute('background_hover_image', 'srcset', $settings['background_hover_image']['url']);
	$this->add_render_attribute('background_hover_image', 'alt', Control_Media::get_image_alt($settings['background_hover_image']));
	$this->add_render_attribute('background_hover_image', 'title', Control_Media::get_image_title($settings['background_hover_image']));
	$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'background_hover_image');
}
?>

<div class="feature-flip-box flip-<?php echo sprintf('%1$s', esc_html($settings['flip_style'])); ?> wow fadeInUp  <?php echo esc_attr($align); ?> " data-wow-delay="<?php echo sprintf('%1$s', esc_html($settings['delay_time'])); ?>s">
	<div class="flipbox-wrapper">	
		<div class="front-side" style="background-image: url(<?php echo esc_attr($settings['background_image']['url']); ?>);">
			<div class="flip-icon">
				<?php
				if ($settings['icon_img'] === 'icon') {
				?>
					<?php if (!empty($settings['selected_icon'])) { ?>
					<?php echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($settings['selected_icon']['value']));
					} ?>
				<?php } ?>
				<?php
				if ($settings['icon_img'] === 'image') {
				?>
					<?php
					if (!empty($settings['image']['url'])) {
					?>
						<div class="img-effect  mb-4 ">
							<img src="<?php echo esc_attr($settings['image']['url']); ?>" alt="<?php esc_attr_e("enerzee-image",'enerzee-extensions')?>" />
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			<<?php echo sprintf('%1$s', esc_html($settings['title_size'])); ?> class="flipbox-title">
				<?php echo sprintf('%1$s', esc_html($settings['title'])); ?>
			</<?php echo sprintf('%1$s', esc_html($settings['title_size'])); ?>>
			<div class="flipbox-details"><?php echo sprintf('%1$s', esc_html($settings['description'])); ?>.</div>
		</div>
		<div class="back-side" style="background-image: url(<?php echo esc_attr($settings['background_hover_image']['url']); ?>);">
			<div class="flipbox-content">
				<?php echo sprintf('<a class="blue-btn button" href="%1$s">%2$s</a>', esc_html($settings['link']['url']), esc_html($settings['button_title'])); ?>
			</div>
		</div>
	</div>
</div>
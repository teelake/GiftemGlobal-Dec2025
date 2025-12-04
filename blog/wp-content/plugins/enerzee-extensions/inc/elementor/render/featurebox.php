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

if ($settings['featurebox_style'] === '1') {
	if ($settings['shadow'] === 'yes') {
?>
		<div class="feature-box-effect box-effect shadow-effect   wow fadeInUp <?php echo esc_attr($align); ?>">
		<?php
	} else {
		?>
			<div class="feature-box-effect box-effect wow fadeInUp <?php echo esc_attr($align); ?>">
			<?php
		}
			?>
			<div class="icon-box">

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
				<<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?> class="link-color mb-2">
					<?php echo sprintf('%1$s', esc_html($settings['title'])); ?>
				</<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?>>
				<p class="mb-0"><?php echo sprintf('%1$s', esc_html($settings['description'])); ?></p>
			</div>
			</div>
		<?php
	}
	if ($settings['featurebox_style'] === '2') {
		?>
			<div class="feature-box-effect box-effect  wow fadeInUp <?php echo esc_attr($align); ?>">
				<div class="iq-icon mb-4">
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
				<div class="feature-info">
					<<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?> class="mb-2">
						<?php echo sprintf('%1$s', esc_html($settings['title'])); ?>
					</<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?>>
					<p class="mb-0"><?php echo sprintf('%1$s', esc_html($settings['description'])); ?></p>
				</div>
			</div>
		<?php
	}
		?>
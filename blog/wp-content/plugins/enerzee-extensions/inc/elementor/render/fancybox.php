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
?>
<?php
if ($settings['shadow'] === 'yes') {
?>
	<div class="iq-style-one-services iq-box-shadow  <?php echo esc_attr($align); ?>">
	<?php } else { ?>
		<div class="iq-style-one-services <?php echo esc_attr($align); ?>">
		<?php
	}
		?>
		<?php
		if (!empty($settings['image']['url'])) {
		?>
			<img class="hover-img" src="<?php echo esc_attr($settings['image']['url']); ?>" alt="<?php esc_attr_e("fancybox-image",'enerzee-extensions')?>" />
		<?php } ?>
		<div class="services-detail">
			<div class="iq-service-icon">
				<?php echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($settings['selected_icon']['value'])); ?>
			</div>
			<<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?> class="title-color mb-3">
				<?php echo sprintf('%1$s', esc_html($settings['title'])); ?>
			</<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?>>
			<p class="mb-0"><?php echo sprintf('%1$s', esc_html($settings['description'])); ?></p>
			<?php if (!empty($settings['button_title'])) {
				echo sprintf('<a class="bttn-link mt-3" href="%1$s">%2$s<span class="link-arrow"><i aria-hidden="true" class="ion-ios-arrow-thin-right"></i></span></a>', esc_url($settings['link']['url']), esc_html($settings['button_title']));
			} ?>
	</div>
	</div>
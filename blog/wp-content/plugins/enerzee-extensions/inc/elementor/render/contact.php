<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;
$html = '';

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];
if (!empty($settings['image']['url'])) {
	$this->add_render_attribute('image', 'src', $settings['image']['url']);
	$this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
	$this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
	$image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}
$enerzee_option = get_option('enerzee_options');
?>

<div class="contact-box <?php echo esc_attr($align); ?>">
	<div class="iq-icon">
		<?php
		if (!empty($settings['selected_icon']['value'])) { ?>
			<i aria-hidden="true" <?php echo sprintf(' class="%1$s"', esc_attr($settings['selected_icon']['value'])); ?> <?php echo $this->get_render_attribute_string('icon-back'); ?>></i>
		<?php  }
		if (!empty($image_html)) {
			echo sprintf($image_html);
		} ?>
	</div>
	<div class="contact-detail">
		<h4 class=""><?php echo sprintf('%1$s', esc_html($settings['section_title'])); ?></h4>
		<?php
		switch ($settings['contact_type']) {
			case 1:
		?><ul class="list-inline mb-0">
					<?php
					if (!empty($enerzee_option['email'])) {
					?>
						<li>
							<a href="mailto:<?php echo esc_url($enerzee_option['email']); ?>">
								<?php echo  esc_html($enerzee_option['email']) ?>
							</a>
						</li>
					<?php	}
					if (!empty($enerzee_option['second_email'])) {
					?>
						<li>
							<a href="mailto:<?php echo esc_url($enerzee_option['second_email']); ?>">
								<?php echo esc_html($enerzee_option['second_email']) ?>
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php
				break;
			case 2:
			?>
				<ul class="list-inline mb-0">
					<?php
					if (!empty($enerzee_option['phone'])) {
					?>
						<li>
							<a href="tel:<?php echo str_replace(str_split('(),-" '), '', $enerzee_option['phone']) ?>">
								<?php echo  esc_html($enerzee_option['phone']) ?>
							</a>
						</li>
					<?php }
					if (!empty($enerzee_option['second_phone'])) { ?>
						<li>
							<a href="tel:<?php echo str_replace(str_split('(),-" '), '', $enerzee_option['second_phone']) ?> ">
								<?php echo esc_html($enerzee_option['second_phone']) ?>
							</a>
						</li>
					<?php
					}
					?>
				</ul>
				<?php break;

			case 3:
				if (!empty($enerzee_option['address'])) {
				?>
					<p class="mb-0"><?php echo  esc_attr($enerzee_option['address']) ?></p>
				<?php
				}
				break;

			case 4:

				$data = $enerzee_option['social-media-iq'];
				?>
				<ul>
					<?php
					foreach ($data as $key => $options) {

						if ($options) {
					?>
							<li class="d-inline">
								<a href="<?php echo $options ?>">
									<i class="fa fa-<?php echo $key ?>"></i>
								</a>
							</li>
					<?php
						}
					}
					?>
				</ul>
		<?php
				break;
		}

		?>
	</div>
</div>
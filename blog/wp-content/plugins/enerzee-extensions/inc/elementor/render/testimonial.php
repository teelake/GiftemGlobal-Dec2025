<?php

namespace Elementor;

use Elementor\Plugin;

if (!defined('ABSPATH')) exit;


$settings = $this->get_settings();
$align = $settings['align'];
$args = array(
	'post_type'         => 'testimonial',
	'post_status'       => 'publish',
	'posts_per_page'    => -1,
	'order'             => $settings['order'],
	'suppress_filters'  => 0
);
$wp_query = new \WP_Query($args);

$out = '';
global $post;
?>
<div class="testimonial-slider <?php echo esc_attr($align);  ?>">
	<?php
	if ($settings['blog_style'] === "1") {
	?>
		<div class="container">
			<div class="row mb-5">

				<div class="col-sm-12">
					<div class="slider slider-nav center">
						<?php
						if ($wp_query->have_posts()) {

							while ($wp_query->have_posts()) {
								$wp_query->the_post();
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");
						?>
								<div class="iq-slider">
									<?php echo sprintf('<img src="%1$s" class="rounded-circle mb-3" alt="' . esc_attr__('enerzee-user', 'enerzee-extension') . '"/>', esc_url($full_image[0])); ?>
									<h5><?php echo sprintf("%s", esc_html__(get_the_title($wp_query->ID))); ?></h5>
								</div>
						<?php
							}
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-sm-6">
					<div class="slider slider-for center">
						<?php
						if ($wp_query->have_posts()) {
							while ($wp_query->have_posts()) {
								$wp_query->the_post();
								$designation  = get_post_meta($post->ID, 'enerzee_testimonial_designation', true);
								$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");
						?>
								<div class="text-center">
									<p><?php echo sprintf("%s", get_the_content($wp_query->ID)); ?></p>
									<h6 class="iq-testimonial-user">
										<span class="iq-designation"><?php echo  sprintf("%s", esc_html($designation)); ?></span>
									</h6>
								</div>
						<?php
							}
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php } else {
		echo '<div class="row">';
		if ($settings['blog_style'] === "2") {
			$col = 'col-lg-8';
		}
		if ($settings['blog_style'] === "3") {
			$col = 'col-lg-6';
		}
		if ($settings['blog_style'] === "4") {
			$col = 'col-lg-4';
		}
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");
				$designation  = get_post_meta($post->ID, 'enerzee_testimonial_designation', true);
				$company  = get_post_meta($post->ID, 'enerzee_testimonial_company', true);

		?>
				<div class="<?php echo esc_attr__($col) ?>">
					<div class="iq-testimonial-img">
						<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('enerzee-user', 'enerzee-extension') . '""/>', esc_url($full_image[0], 'enerzee-extensions')); ?>
					</div>
					<div class="iq-testimonial-info">
						<h3><?php echo sprintf("%s", esc_html__(get_the_title($wp_query->ID))); ?></h3>
						<p><?php echo sprintf("%s", get_the_content($wp_query->ID)); ?></p>
						<span><?php echo  sprintf("%s", esc_html($designation)); ?></span><i>,</i>
						<span><?php echo  sprintf("%s", esc_html($company)); ?> </span>
					</div>
				</div>

	<?php 	}
			wp_reset_postdata();
		}

		echo '</div>    ';
	}
	?>

</div>
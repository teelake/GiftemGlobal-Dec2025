<?php

namespace Elementor;

$html = '';
if (!defined('ABSPATH')) exit;


$settings = $this->get_settings_for_display();
$settings = $this->get_settings();
$args = array(
	'post_type'         => 'enerzeeteam',
	'post_status'       => 'publish',

);

$wp_query = new \WP_Query($args);

global $post;

$style = $settings['team_style'];
$desk = $settings['desk_number'];
$lap = $settings['lap_number'];
$tab = $settings['tab_number'];
$mob = $settings['mob_number'];

$this->add_render_attribute('slider', 'data-dots', $settings['dots']);
$this->add_render_attribute('slider', 'data-nav', $settings['nav-arrow']);
$this->add_render_attribute('slider', 'data-items', $settings['desk_number']);
$this->add_render_attribute('slider', 'data-items-laptop', $settings['lap_number']);
$this->add_render_attribute('slider', 'data-items-tab', $settings['tab_number']);
$this->add_render_attribute('slider', 'data-items-mobile', $settings['mob_number']);
$this->add_render_attribute('slider', 'data-items-mobile-sm', $settings['mob_number']);
$this->add_render_attribute('slider', 'data-autoplay', $settings['autoplay']);
$this->add_render_attribute('slider', 'data-loop', $settings['loop']);
$this->add_render_attribute('slider', 'data-margin', $settings['margin']['size']);

if ($style == '1') {
?>
	<div class="iq-team-slider" id="iq-slider">
		<div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>

			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");

					$designation   = get_post_meta($post->ID, 'enerzee_team_designation', true);
					$twitter   = get_post_meta($post->ID, 'enerzee_team_twitter', true);

					$facebook   = get_post_meta($post->ID, 'enerzee_team_facebook', true);
					$google   = get_post_meta($post->ID, 'enerzee_team_google', true);
					$github     = get_post_meta($post->ID, 'enerzee_team_github', true);
					$insta     = get_post_meta($post->ID, 'enerzee_team_insta', true);


			?>
					<div class="iq-team">
						<div class="iq-team-img">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('team-member', 'enerzee-extension') . '" />', esc_url($full_image[0])); ?>
							<div class="share">
								<ul>
									<?php if ($facebook != '') { ?>
										<li><?php echo sprintf('<a href="%s"><i class="fa fa-facebook"></i></a>', esc_url($facebook)); ?></li>
									<?php } ?>
									<?php if ($twitter != '') { ?>
										<li><?php echo sprintf('<a href="%s"><i class="fa fa-twitter"></i></a>', esc_url($twitter)); ?></li>
									<?php } ?>
									<?php if ($google != '') { ?>
										<li><?php echo sprintf('<a href="%s"><i class="fa fa-google"></i></a>', esc_url($google)); ?></li>
									<?php } ?>
									<?php if ($github != '') { ?>
										<li><?php echo sprintf('<a href="%s"><i class="fa fa-github"></i></a>', esc_url($github)); ?></li>
									<?php } ?>
									<?php if ($insta != '') { ?>
										<li><?php echo sprintf('<a href="%s"><i class="fa fa-instagram"></i></a>', esc_url($insta)); ?></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="iq-team-info">

							<h5><?php echo sprintf("%s", esc_html(get_the_title($post->ID), 'enerzee-extensions')); ?></h5>
							<span class="team-post"><?php echo sprintf("%s", esc_html($designation)); ?></span>

						</div>
					</div>

			<?php

				}
				wp_reset_postdata();
			}
			?>

		</div>
	</div>

<?php }

if ($style == '2') {

?>
	<div class="row">
		<?php
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");

				$designation   = get_post_meta($post->ID, 'enerzee_team_designation', true);
				$twitter   = get_post_meta($post->ID, 'enerzee_team_twitter', true);

				$facebook   = get_post_meta($post->ID, 'enerzee_team_facebook', true);
				$google   = get_post_meta($post->ID, 'enerzee_team_google', true);
				$github     = get_post_meta($post->ID, 'enerzee_team_github', true);
				$insta     = get_post_meta($post->ID, 'enerzee_team_insta', true);


		?>
				<div class="col-sm-12">
					<div class="iq-team">
						<div class="iq-team-img">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('team-member', 'enerzee-extension') . '" />', esc_url($full_image[0])); ?>
							<div class="share">
								<ul>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-facebook"></i></a>', esc_url($facebook)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-twitter"></i></a>', esc_url($twitter)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-google"></i></a>', esc_url($google)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-github"></i></a>', esc_url($github)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-instagram"></i></a>', esc_url($insta)); ?></li>

								</ul>
							</div>
						</div>
						<div class="iq-team-info">
							<h5><?php echo sprintf("%s", esc_html(get_the_title($post->ID))); ?></h5>
							<span class="team-post"><?php echo sprintf("%s", esc_html($designation)); ?></span>
						</div>
					</div>
				</div>
		<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>

<?php }

?>

<?php

if ($style == '3') {

?>
	<div class="row">
		<?php
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");

				$designation   = get_post_meta($post->ID, 'enerzee_team_designation', true);
				$twitter   = get_post_meta($post->ID, 'enerzee_team_twitter', true);

				$facebook   = get_post_meta($post->ID, 'enerzee_team_facebook', true);
				$google   = get_post_meta($post->ID, 'enerzee_team_google', true);
				$github     = get_post_meta($post->ID, 'enerzee_team_github', true);
				$insta     = get_post_meta($post->ID, 'enerzee_team_insta', true);


		?>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="iq-team">
						<div class="iq-team-img">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('team-member', 'enerzee-extension') . '" />', esc_url($full_image[0])); ?>
							<div class="share">
								<ul>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-facebook"></i></a>', esc_url($facebook)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-twitter"></i></a>', esc_url($twitter)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-google"></i></a>', esc_url($google)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-github"></i></a>', esc_url($github)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-instagram"></i></a>', esc_url($insta)); ?></li>

								</ul>
							</div>
						</div>
						<div class="iq-team-info">
							<h5><?php echo sprintf("%s", esc_html(get_the_title($post->ID))); ?></h5>
							<span class="team-post"><?php echo sprintf("%s", esc_html($designation)); ?></span>


						</div>

					</div>

				</div>

		<?php

			}
			wp_reset_postdata();
		}
		?>
	</div>

<?php }

?>

<?php

if ($style == '4') {

?>
	<div class="row">
		<?php
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");

				$designation   = get_post_meta($post->ID, 'enerzee_team_designation', true);
				$twitter   = get_post_meta($post->ID, 'enerzee_team_twitter', true);

				$facebook   = get_post_meta($post->ID, 'enerzee_team_facebook', true);
				$google   = get_post_meta($post->ID, 'enerzee_team_google', true);
				$github     = get_post_meta($post->ID, 'enerzee_team_github', true);
				$insta     = get_post_meta($post->ID, 'enerzee_team_insta', true);


		?>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="iq-team">
						<div class="iq-team-img">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('team-member', 'enerzee-extension') . '" />', esc_url($full_image[0])); ?>
							<div class="share">
								<ul>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-facebook"></i></a>', esc_url($facebook)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-twitter"></i></a>', esc_url($twitter)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-google"></i></a>', esc_url($google)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-github"></i></a>', esc_url($github)); ?></li>
									<li><?php echo sprintf('<a href="%s"><i class="fa fa-instagram"></i></a>', esc_url($insta)); ?></li>

								</ul>
							</div>
						</div>
						<div class="iq-team-info">
							<h5><?php echo sprintf("%s", esc_html(get_the_title($post->ID))); ?></h5>
							<span class="team-post"><?php echo sprintf("%s", esc_html($designation)); ?></span>


						</div>

					</div>

				</div>

		<?php

			}
			wp_reset_postdata();
		}
		?>
	</div>

<?php }

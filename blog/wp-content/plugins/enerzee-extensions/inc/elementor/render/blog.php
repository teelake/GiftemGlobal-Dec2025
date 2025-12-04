<?php

namespace Elementor;

use Elementor\Plugin;

if (!defined('ABSPATH')) exit;


$settings = $this->get_settings();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
	'post_type'         => 'post',
	'post_status'       => 'publish',
	'paged'             => $paged,
	'category'          => '',
	'suppress_filters'  => 0
);

$align = $settings['align'];

global $post;

$wp_query = new \WP_Query($args);
?>
<div class=" <?php echo esc_attr($align) ?>">
	<?php
	if ($settings['blog_style'] === '1') {
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
	?>
		<div class="blog-carousel owl-carousel" <?php echo $this->get_render_attribute_string('slider') ?>>
			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");
			?>
					<div class="iq-blog-box">
						<div class="iq-blog-image">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('enerzee-blog', 'enerzee-extension') . '"/>', esc_url($full_image[0], 'enerzee-extensions')); ?>

							<div class="iq-blog-meta">
								<ul class="list-inline">
									<li class="list-inline-item">
										<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
										<?php echo sprintf("%s", enerzee_time_link()); ?>
									</li>

									<li class="list-inline-item">
										<a href="<?php echo  sprintf("%s", get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')), 'enerzee-extensions'); ?>" class="iq-user">
											<i class="fa fa-user mr-2" aria-hidden="true"></i>
											<?php echo  sprintf("%s ", get_the_author(), 'enerzee-extensions'); ?>
										</a>
									</li>

									<?php if (is_single()) {
										$comment_count = $post->comment_count; ?>
										<li class="list-inline-item">
											<a href="<?php if ($comment_count > 0) {
															echo sprintf("%s", comments_link(), 'enerzee-extensions');
														} else {
															echo sprintf("%s", esc_html__('javascript:void(0)'));
														} ?>">
												<i class="fa fa-comments mr-2" aria-hidden="true"></i>
												<?php echo sprintf("%s", esc_html($comment_count), 'enerzee-extensions'); ?>
											</a>
										</li>
									<?php
									}
									?>
								</ul>
							</div>
						</div>
						<div class="iq-blog-detail">
							<div class="blog-title	"><a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
									<h5><?php echo sprintf("%s", esc_html(get_the_title($wp_query->ID))); ?></h5>
								</a></div>
							<p><?php echo sprintf("%s", get_the_excerpt($wp_query->ID)); ?></p>
							<div class="blog-button">
								<?php
								if (!empty($enerzee_option['blog_btn'])) {
								?>
									<a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<?php echo sprintf("%s", esc_attr($enerzee_option['blog_btn'])); ?>
										<i class="ion-ios-arrow-right" aria-hidden="true"></i>
									</a>
								<?php
								} else { ?>
									<a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<?php echo sprintf("%s", esc_html__('Read More', 'enerzee-extensions')); ?>
										<i class="ion-ios-arrow-right" aria-hidden="true"></i>
									</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
			<?php
				}
			}
			wp_reset_postdata();
			?>
		</div>

		<?php } else {
		echo '<div class="row">';
		if ($settings['blog_style'] === "2") {
			$col = 'col-lg-12';
		}
		if ($settings['blog_style'] === "3") {
			$col = 'col-lg-6 col-md-6 ';
		}
		if ($settings['blog_style'] === "4") {
			$col = 'col-lg-4 col-md-6';
		}
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");

		?>
				<div class="<?php echo esc_attr__($col, 'enerzee-extensions') ?>">
					<div class="iq-blog-box">
						<div class="iq-blog-image">
							<?php echo sprintf('<img src="%1$s" alt="' . esc_attr__('enerzee-blog', 'enerzee-extension') . '"/>', esc_url($full_image[0], 'enerzee-extensions')); ?>

							<div class="iq-blog-meta">
								<ul class="list-inline">
									<li class="list-inline-item">
										<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
										<?php echo sprintf("%s", enerzee_time_link()); ?>
									</li>
									<li class="list-inline-item">
										<a href="<?php echo  sprintf("%s", get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')), 'enerzee-extensions'); ?>" class="iq-user">
											<i class="fa fa-user mr-2" aria-hidden="true"></i>
											<?php echo  sprintf("%s ", get_the_author(), 'enerzee-extensions'); ?>
										</a>
									</li>

									<?php if (is_single()) {
									?>
										<?php
										$comment_count = $post->comment_count; ?>
										<li class="list-inline-item">
											<a href="<?php if ($comment_count > 0) {
															echo sprintf("%s", comments_link(), 'enerzee-extensions');
														} else {
															echo sprintf("%s", esc_html__('javascript:void(0)', 'enerzee-extensions'));
														} ?>">
												<i class="fa fa-comments mr-2" aria-hidden="true"></i>
												<?php echo sprintf("%s", esc_html($comment_count), 'enerzee-extensions'); ?>
											</a>
										</li>
									<?php
									}
									?>

								</ul>
							</div>

						</div>

						<div class="iq-blog-detail">
							<div class="blog-title	">
								<a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
									<h5><?php echo sprintf("%s", esc_html__(get_the_title($wp_query->ID), 'enerzee-extensions')); ?></h5>
								</a>
							</div>
							<p><?php echo sprintf("%s", get_the_excerpt($wp_query->ID)); ?></p>
							<div class="blog-button">
								<?php
								if (!empty($enerzee_option['blog_btn'])) {
								?>
									<a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<?php echo sprintf("%s", esc_attr($enerzee_option['blog_btn'])); ?>
										<i class="ion-ios-arrow-right" aria-hidden="true"></i>
									</a>
								<?php
								} else { ?>
									<a class="button-link" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<?php echo sprintf("%s", esc_html__('Read More', 'enerzee-extensions')); ?>
										<i class="ion-ios-arrow-right" aria-hidden="true"></i>
									</a>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>

	<?php 		}
		}
		wp_reset_postdata();
		echo '</div>';
	} ?>
</div>
<?php
$tot = $wp_query->found_posts;
if ($settings['blog_style'] != '1') {
	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1) {
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'type'            => 'list',
			'prev_text'       => wp_kses('<span aria-hidden="true">' . __('Previous page', 'enerzee-extensions') . '</span>', 'enerzee-extensions'),
			'next_text'       => wp_kses('<span aria-hidden="true">' . __('Next page', 'enerzee-extensions') . '</span>', 'enerzee-extensions'),
		));
	}
}
?>
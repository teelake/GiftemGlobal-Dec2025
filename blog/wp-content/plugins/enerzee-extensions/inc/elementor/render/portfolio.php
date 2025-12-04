<?php

namespace Elementor;

use Elementor\Plugin;

if (!defined('ABSPATH')) exit;

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$args = array(
	'post_type'         => 'portfolio',
	'post_status'       => 'publish',
	'posts_per_page'    => $settings['number_post'],
	'order'             => $settings['order'],
);

$wp_query = new \WP_Query($args);
global $post;
?>

<div class="iq-masonry-block ">
	<?php if ($settings['dis_tabs'] == 'yes') {
	} else {
	?>
		<div class="isotope-filters isotope-tooltip">
			<?php $terms = get_terms(array('taxonomy' => 'portfolio-categories',)); ?>
			<button data-filter="" class="active">
			<?php echo esc_html__('All','enerzee-extensions'); ?><span class="post_no"><?php echo esc_html($wp_query->post_count); ?></span></button>
			<?php foreach ($terms as $term) { ?>
				<button data-filter=".<?php echo esc_attr($term->slug); ?>">
					<?php echo esc_html($term->name); ?><span class="post_no"><?php echo esc_html($term->count); ?></span>
				</button>
			<?php } ?>
		</div>
	<?php
	}
	?>
	<?php if ($settings['space'] == 'yes') { ?>
		<div class=" iq-masonry iq-columns-<?php echo $settings['portfolio_style']; ?> no-padding">
		<?php } else { ?>
			<div class=" iq-masonry iq-columns-<?php echo $settings['portfolio_style']; ?>">
			<?php
		}
			?>
			<?php
			$args = array('post_type' => 'portfolio', 'posts_per_page' => $settings['number_post'], 'order' => $settings['order']);

			$loop = new \WP_Query($args);

			while ($loop->have_posts()) : $loop->the_post();
				$wp_query->the_post();
				$term_list = wp_get_post_terms(get_the_ID(), 'portfolio-categories');

				$slugs = array();
				foreach ($term_list as $term)
					$slugs[] = $term->slug;
				$full_image = wp_get_attachment_image_src(get_post_thumbnail_id($wp_query->ID), "full");
			?>
				<div class="iq-masonry-item <?php echo implode(' ', $slugs); ?>">
					<div class="iq-portfolio">
									<a href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>" class="iq-portfolio-img">
								<?php if (is_array($full_image)) {
									 echo sprintf('<img src="%1$s" alt="' . esc_attr__('enerzee-portfolio', 'enerzee-extension') . '"/>', esc_url($full_image[0]));
								 }  ?>
							</a>
						
						<div class="iq-portfolio-content">
							<div class="details-box clearfix">
								<div class="consult-details">
									<p class="mb-0 link-color"><?php echo $term->name; ?></p>
									<a href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?> class="link-color">
											<?php echo sprintf("%s", esc_html__(get_the_title($wp_query->ID))); ?>
										</<?php echo sprintf('%1$s', esc_attr($settings['title_size'])); ?>>
									</a>
									<a class="link-color button" href="<?php echo sprintf("%s", esc_url(get_permalink($wp_query->ID))); ?>">
										<?php echo esc_html($settings['button_title']); ?>
									</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
			</div>
		</div>
<?php

function enerzee_recent_post_widgets()
{
	register_widget('iq_subscribe');
}
add_action('widgets_init', 'enerzee_recent_post_widgets');

/*-------------------------------------------
		iqonic Contact Information widget
--------------------------------------------*/
class iq_subscribe extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'iq_subscribe',

			// Widget name will appear in UI
			esc_html('Enerzee Recent Post', 'enerzee-extensions'),

			// Widget description
			array('description' => esc_html('Enerzee most recent Posts. ', 'enerzee-extensions'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{
		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		$title = (!empty($instance['title'])) ? $instance['title'] : false;

		$tag = (!empty($instance['tag'])) ? $instance['tag'] : false;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		$number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
		if (!$number) {
			$number = 5;
		}
		$show_date = isset($instance['show_date']) ? $instance['show_date'] : false;


		//$args['after_widget'];

		/* here add extra display item  */


		$iq_image = isset($instance['iq-contact']) ? $instance['iq-contact'] : '';

?>

		<div class="iq-widget-menu widget">
			<?php if ($title) {
				echo ($args['before_title'] . $title . $args['after_title']);
			} ?>
			<div class="list-inline iq-widget-menu">
				<ul class="iq-post">
					<?php
					$args = array('post_type' => 'post', 'posts_per_page' => $number,);
					$loop = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post();
					?>
						<li>
							<?php
							if ($iq_image) {
								foreach ($iq_image as $iq_images) {
							?>
									<div class="post-img">
										<?php
										if ($iq_images == "image") {
										?>
											<?php the_post_thumbnail('thumbnail'); ?>
										<?php
										}
										?>
										<div class="post-blog">
											<div class="blog-box">
												<a class="new-link" href="<?php echo esc_url(get_permalink($loop->ID)); ?>">
													<<?php echo esc_attr($tag); ?> class="link-color">
														<?php the_title(); ?>
													</<?php echo esc_attr($tag); ?>>
												</a>
												<ul class="list-inline">
													<?php

													$archive_year  = get_the_time('Y');
													$archive_month = get_the_time('m');
													$archive_day   = get_the_time('d');
													if ($show_date) : ?>
														<li class="list-inline-item  mr-3"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>">
																<i class="fa fa-calendar mr-2" aria-hidden="true"></i>
																<span class=""><?php echo get_the_date();  ?></span>
															</a></li>
													<?php endif; ?>
												</ul>
											</div>
										</div>
									</div>
							<?php
								}
							}
							?>
						</li>
					<?php
					endwhile;
					wp_reset_postdata();
				?>
				</ul>
			</div>
		</div>
	<?php

	}

	// Widget Backend
	public function form($instance)
	{
		$title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$tag     = isset($instance['tag']) ? esc_attr($instance['tag']) : 'h2';
		$number    = isset($instance['number']) ? absint($instance['number']) : 5;
		$show_date = isset($instance['show_date']) ? (bool) $instance['show_date'] : false;

		if (isset($instance['iq-contact'])) {
			$iq_image = $instance['iq-contact'];
			foreach ($iq_image as $iq_images) {

				if ($iq_images == "image") {
					$ch_image = "checked";
				}
			}
		}

	?>

		<p><label for="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>"><?php esc_html_e('Title:', 'enerzee-extensions'); ?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('title', 'enerzee-extensions')); ?>" type="text" value="<?php echo esc_html($title, 'enerzee-extensions'); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Tag:
				<select class='widefat' id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text">
					<option value='h2' <?php echo ($tag == 'h2') ? 'selected' : ''; ?>>
						h2
					</option>
					<option value='h3' <?php echo ($tag == 'h3') ? 'selected' : ''; ?>>
						h3
					</option>
					<option value='h4' <?php echo ($tag == 'h4') ? 'selected' : ''; ?>>
						h4
					</option>
					<option value='h5' <?php echo ($tag == 'h5') ? 'selected' : ''; ?>>
						h5
					</option>
					<option value='h6' <?php echo ($tag == 'h6') ? 'selected' : ''; ?>>
						h6
					</option>
				</select>
			</label>
		</p>

		<p><label for="<?php echo esc_html($this->get_field_id('number', 'enerzee-extensions')); ?>"><?php esc_html_e('Number of posts to show:', 'enerzee-extensions'); ?></label>
			<input class="tiny-text" id="<?php echo esc_html($this->get_field_id('number', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('number', 'enerzee-extensions')); ?>" type="number" step="1" min="1" value="<?php echo esc_html($number, 'enerzee-extensions'); ?>" size="3" />
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked($show_date); ?> id="<?php echo esc_html($this->get_field_id('show_date', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('show_date', 'enerzee-extensions')); ?>" />
			<label for="<?php echo esc_html($this->get_field_id('show_date', 'enerzee-extensions')); ?>"><?php esc_html_e('Display post Date?', 'enerzee-extensions'); ?></label>
		</p>

		<p>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id('iq-contact', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('iq-contact[]', 'enerzee-extensions')); ?>" value="image" <?php if (isset($ch_image)) echo esc_html($ch_image, 'enerzee-extensions'); ?>>
			<label for="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>"><?php echo esc_html('Image', 'enerzee-extensions'); ?></label></br />
		</p>
<?php

	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['tag'] = sanitize_text_field($new_instance['tag']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset($new_instance['show_date']) ? (bool) $new_instance['show_date'] : false;
		$instance['iq-contact'] = $new_instance['iq-contact'];
		return $instance;
	}
}
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/
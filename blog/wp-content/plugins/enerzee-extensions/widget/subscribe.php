<?php
function enerzee_subscribe_widgets()
{
	register_widget('iq_contact_info');
}
add_action('widgets_init', 'enerzee_subscribe_widgets');

/*-------------------------------------------
		iqonic Contact Information widget
--------------------------------------------*/
class iq_contact_info extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'iq_contact_info',

			// Widget name will appear in UI
			esc_html('Enerzee Subscribe', 'enerzee-extensions'),

			// Widget description
			array('description' => esc_html('Enerzee subscribe. ', 'enerzee-extensions'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{
		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		$title = (!empty($instance['title'])) ? $instance['title'] : false;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		$number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
		if (!$number) {
			$number = 5;
		}

?>
		<div class="widget subscribe-bottum">
			<div class="container">
				<div class="row  align-items-center enerzee-subscribe">
					<div class="col-lg-5   col-sm-12 title-fancy mb-5 mb-lg-0">
						<?php
						if ($title) {
							echo ($args['before_title'] . $title . $args['after_title']);
						}
						?>
						<?php
						$enerzee_option = get_option('enerzee_options');
						if (!empty($enerzee_option['enerzee_subscribe_contant'])) {
						?>
							<p class="mb-0"><?php echo html_entity_decode($enerzee_option['enerzee_subscribe_contant']); ?></p>
						<?php
						}
						?>
					</div>
					<div class="col-lg-7 col-sm-12 text-center">
						<?php
						$enerzee_option = get_option('enerzee_options');
						if (isset($enerzee_option['enerzee_subscribe'])) {
							$enerzee_subscribe = $enerzee_option['enerzee_subscribe'];
						}
						echo do_shortcode($enerzee_subscribe);
						?>
					</div>
				</div>
			</div>
		</div>
	<?php

	}

	// Widget Backend
	public function form($instance)
	{
		$title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
	?>

		<p><label for="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>"><?php esc_html_e('Title:', 'enerzee-extensions'); ?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('title', 'enerzee-extensions')); ?>" type="text" value="<?php echo esc_html($title, 'enerzee-extensions'); ?>" />
		</p>

<?php

	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = sanitize_text_field($new_instance['title']);
		return $instance;
	}
}
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/
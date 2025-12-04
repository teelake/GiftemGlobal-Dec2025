<?php
function enerzee_social_media_widgets()
{
	register_widget('iq_socail_media');
}
add_action('widgets_init', 'enerzee_social_media_widgets');

/*-------------------------------------------
		enerzee Contact Information widget 
--------------------------------------------*/
class iq_socail_media extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'iq_socail_media',

			// Widget name will appear in UI
			esc_html('Enerzee Social Media', 'enerzee-extensions'),

			// Widget description
			array('description' => esc_html('Enerzee social media. ', 'enerzee-extensions'),)
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



		/* here add extra display item  */

		$enerzee_option = get_option('enerzee_options');
		if (isset($enerzee_option['social-media-iq'])) {
			$top_social = $enerzee_option['social-media-iq'];
?>
			<span class="text-white d-inline"><?php esc_html("Follow Us :"); ?></span>
			<ul class="info-share d-inline">
				<?php
				$i = 1;
				foreach ($top_social as $key => $value) {
					if ($i < 9) {
						if ($value) {
							echo '<li><a href="' . $value . '"><i class="fa fa-' . $key . '"></i></a></li>';
						}
						$i++;
					}
				}
				?>
			</ul>

		<?php
		}
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

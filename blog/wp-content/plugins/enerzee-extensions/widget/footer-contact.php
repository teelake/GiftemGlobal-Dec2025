<?php
function enerzee_contact_info()
{
	register_widget('iq_contact');
}
add_action('widgets_init', 'enerzee_contact_info');

/*-------------------------------------------
		enerzee Contact Information widget 
--------------------------------------------*/
class iq_contact extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'iq_contact',

			// Widget name will appear in UI
			esc_html('Enerzee Contact', 'enerzee-extensions'),

			// Widget description
			array('description' => esc_html('Enerzee Contact. ', 'enerzee-extensions'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{

		global $wp_registered_sidebars;
		$enerzee_option = get_option('enerzee_options');

		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		$title = (!empty($instance['title'])) ? $instance['title'] : false;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		$phone = isset($instance['phone']) ? $instance['phone'] : false;
		$email = isset($instance['email']) ? $instance['email'] : false;
		$address = isset($instance['address']) ? $instance['address'] : false;


		/* here add extra display item  */
?>
		<div class="widget">
			<?php if ($title) {
				echo ($args['before_title'] . $title . $args['after_title']);
			} ?>
			<div class="row">
				<div class="col-sm-12">
					<ul class="iq-contact">
						<?php
						if ($phone) :
						?>
							<li>
								<a href="tel:<?php echo str_replace(str_split('(),-" '), '', $enerzee_option['phone']); ?>">
									<i class="fa fa-phone"></i>
									<span><?php echo esc_attr($enerzee_option['phone']); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php
						if ($email) :
						?>
							<li>
								<a href="mailto:<?php echo esc_html($enerzee_option['email']); ?>">
									<i class="fa fa-envelope"></i>
									<span><?php echo esc_attr($enerzee_option['email']); ?></span>
								</a>
							</li>
						<?php endif; ?>
						<?php
						if ($address) :
						?>
							<li>
								<p>
									<i class="fa fa-map-marker"></i>
									<span>
										<?php
										$address = $enerzee_option['address'];
										echo esc_attr($address); ?>
									</span>
								</p>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	<?php
	}

	// Widget Backend 
	public function form($instance)
	{
		$title     = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$phone    = isset($instance['phone']) ? (bool) $instance['phone'] : false;
		$email = isset($instance['email']) ? (bool) $instance['email'] : false;
		$address = isset($instance['address']) ? (bool) $instance['address'] : false;
	?>

		<p><label for="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>"><?php esc_html_e('Title:', 'enerzee-extensions'); ?></label>
			<input class="widefat" id="<?php echo esc_html($this->get_field_id('title', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('title', 'enerzee-extensions')); ?>" type="text" value="<?php echo esc_html($title, 'enerzee-extensions'); ?>" />
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked($phone); ?> id="<?php echo esc_html($this->get_field_id('phone', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('phone', 'enerzee-extensions')); ?>" />
			<label for="<?php echo esc_html($this->get_field_id('phone', 'enerzee-extensions')); ?>"><?php esc_html_e('Display Phone Number?', 'enerzee-extensions'); ?></label>
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked($email); ?> id="<?php echo esc_html($this->get_field_id('email', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('email', 'enerzee-extensions')); ?>" />
			<label for="<?php echo esc_html($this->get_field_id('email', 'enerzee-extensions')); ?>"><?php esc_html_e('Display Email?', 'enerzee-extensions'); ?></label>
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked($address); ?> id="<?php echo esc_html($this->get_field_id('address', 'enerzee-extensions')); ?>" name="<?php echo esc_html($this->get_field_name('address', 'enerzee-extensions')); ?>" />
			<label for="<?php echo esc_html($this->get_field_id('address', 'enerzee-extensions')); ?>"><?php esc_html_e('Display Address?', 'enerzee-extensions'); ?></label>
		</p>

<?php
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['phone'] = isset($new_instance['phone']) ? (bool) $new_instance['phone'] : false;
		$instance['email'] = isset($new_instance['email']) ? (bool) $new_instance['email'] : false;
		$instance['address'] = isset($new_instance['address']) ? (bool) $new_instance['address'] : false;
		$instance['iq-contact'] = $new_instance['iq-contact'];
		return $instance;
	}
} 
/*---------------------------------------
		Class wpb_widget ends here
----------------------------------------*/

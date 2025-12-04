<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_portfolio extends Widget_Base
{

	public function get_name()
	{
		return __('portfolio', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Portfolio', 'enerzee-extensions');
	}

	public function get_categories()
	{
		return ['enerzee-extensions'];
	}



	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-image';
	}



	protected function register_controls()
	{

		$this->start_controls_section(
			'Section_Portfolio',
			[
				'label' => __('Portfolio Post', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'portfolio_style',
			[
				'label'      => __('Portfolio Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'options'    => [
					'2'          => __('Portfolio 2 Columns', 'enerzee-extensions'),
					'3'          => __('Portfolio 3 Columns', 'enerzee-extensions'),
					'4'          => __('Portfolio 4 Columns', 'enerzee-extensions'),
					'5'          => __('Portfolio 5 Columns', 'enerzee-extensions'),
				],
				'default'    => '2',
			]
		);

		$this->add_control(
			'number_post',
			[
				'label' => __('Number Of Portfolio', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label' => __('HTML Tag', 'enerzee-extensions'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'dis_tabs',
			[
				'label' => __('Disable Tab', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __('yes', 'enerzee-extensions'),
				'no' => __('no', 'enerzee-extensions'),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'space',
			[
				'label' => __('Space', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __('yes', 'enerzee-extensions'),
				'no' => __('no', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'button_title',
			[
				'label' => __('Button Text', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('+', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __('Order By', 'enerzee-extensions'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'DESC' => esc_html__('Descending', 'enerzee-extensions'),
					'ASC' => esc_html__('Ascending', 'enerzee-extensions')
				],

			]
		);

		$this->end_controls_section();
	}


	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/portfolio.php';
		if (Plugin::$instance->editor->is_edit_mode()) :
?>
			<script>
				/*------------------------
		Isotope
		--------------------------*/
				jQuery('.isotope').isotope({
					itemSelector: '.iq-grid-item',
				});

				/*------------------------------
				filter items on button click
				-------------------------------*/
				jQuery('.isotope-filters').on('click', 'button', function() {
					var filterValue = jQuery(this).attr('data-filter');
					jQuery('.isotope').isotope({
						resizable: true,
						filter: filterValue
					});
					jQuery('.isotope-filters button').removeClass('active');
					jQuery(this).addClass('active');
				});


				/*------------------------
				Masonry
				--------------------------*/
				var jQuerymsnry = jQuery('.iq-masonry-block .iq-masonry');
				if (jQuerymsnry) {
					var jQueryfilter = jQuery('.iq-masonry-block .isotope-filters');
					jQuerymsnry.isotope({
						percentPosition: true,
						resizable: true,
						itemSelector: '.iq-masonry-block .iq-masonry-item',
						masonry: {
							gutterWidth: 0
						}
					});
					// bind filter button click
					jQueryfilter.on('click', 'button', function() {
						var filterValue = jQuery(this).attr('data-filter');
						jQuerymsnry.isotope({
							filter: filterValue
						});
					});

					jQueryfilter.each(function(i, buttonGroup) {
						var jQuerybuttonGroup = jQuery(buttonGroup);
						jQuerybuttonGroup.on('click', 'button', function() {
							jQuerybuttonGroup.find('.active').removeClass('active');
							jQuery(this).addClass('active');
						});
					});
				}
			</script>

<?php endif;
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_portfolio());

<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Team extends Widget_Base
{

	public function get_name()
	{
		return __('team', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Team', 'enerzee-extensions');
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
		return 'eicon-person';
	}



	protected function register_controls()
	{
		$this->start_controls_section(
			'section_Team',
			[
				'label' => __('Team Post', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'team_style',
			[
				'label'      => __('Team Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					'none'       => __('None', 'enerzee-extensions'),
					'1'          => __('Team Slider', 'enerzee-extensions'),
					'2'          => __('Team 1 Columns', 'enerzee-extensions'),
					'3'          => __('Team 2 Columns', 'enerzee-extensions'),
					'4'          => __('Team 3 Columns', 'enerzee-extensions'),
				],
			]
		);

		$this->add_control(
			'desk_number',
			[
				'label' => __('Desktop view', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
				],
				'label_block' => true,
				'default' => '3'
			]
		);

		$this->add_control(
			'lap_number',
			[
				'label' => __('Laptop view', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
				],
				'label_block' => true,
				'default' => '3'
			]
		);

		$this->add_control(
			'tab_number',
			[
				'label' => __('Tablet view', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
				],
				'label_block' => true,
				'default' => '2'
			]
		);

		$this->add_control(
			'mob_number',
			[
				'label' => __('Mobile view', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'team_style' => '1',
				],
				'label_block' => true,
				'default' => '1'
			]
		);

		$this->add_control(
			'loop',
			[
				'label'      => __('Loop', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __('True', 'enerzee-extensions'),
					'false'      => __('False', 'enerzee-extensions'),

				],
				'condition' => [
					'team_style' => '1',
				]
			]
		);
		$this->add_control(
			'autoplay',
			[
				'label'      => __('Autoplay', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __('True', 'enerzee-extensions'),
					'false'      => __('False', 'enerzee-extensions'),

				],
				'condition' => [
					'blog_style' => '1',
				]
			]
		);

		$this->add_control(
			'dots',
			[
				'label'      => __('Dots', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __('True', 'enerzee-extensions'),
					'false'      => __('False', 'enerzee-extensions'),

				],
				'condition' => [
					'team_style' => '1',
				]
			]
		);

		$this->add_control(
			'nav-arrow',
			[
				'label'      => __('Arrow', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'true',
				'options'    => [
					'true'       => __('True', 'enerzee-extensions'),
					'false'      => __('False', 'enerzee-extensions'),

				],
				'condition' => [
					'team_style' => '1',
				]
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => __('Margin', 'enerzee-extensions'),
				'type' => Controls_Manager::SLIDER,

				'condition' => [
					'team_style' => '1',
				]

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
		require  enerzee_TH_ROOT . '/inc/elementor/render/team.php';
		if (Plugin::$instance->editor->is_edit_mode()) : ?>



			<script>
				jQuery('.owl-carousel').each(function() {

					var jQuerycarousel = jQuery(this);
					jQuerycarousel.owlCarousel({
						items: jQuerycarousel.data("items"),
						loop: jQuerycarousel.data("loop"),
						margin: jQuerycarousel.data("margin"),
						nav: jQuerycarousel.data("nav"),
						dots: jQuerycarousel.data("dots"),
						autoplay: jQuerycarousel.data("autoplay"),
						autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
						navText: ["<i class='fa fa-angle-left fa-2x'></i>", "<i class='fa fa-angle-right fa-2x'></i>"],
						responsiveClass: true,
						responsive: {
							// breakpoint from 0 up
							0: {
								items: jQuerycarousel.data("items-mobile-sm"),
								nav: false,
								dots: true
							},
							// breakpoint from 480 up
							480: {
								items: jQuerycarousel.data("items-mobile"),
								nav: false,
								dots: true
							},
							// breakpoint from 786 up
							786: {
								items: jQuerycarousel.data("items-tab")
							},
							// breakpoint from 1023 up
							1023: {
								items: jQuerycarousel.data("items-laptop")
							},
							1199: {
								items: jQuerycarousel.data("items")
							}
						}
					});
				});
			</script>

<?php endif;
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Team());

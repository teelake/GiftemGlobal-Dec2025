<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Price extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_price', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Pricing Plan', 'enerzee-extensions');
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
		return 'eicon-price-table';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Pricing Plan', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'pricing_style',
			[
				'label'      => __('FancyBox Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [

					'1'          => __('Style 1', 'enerzee-extensions'),
					'2'          => __('Style 2', 'enerzee-extensions'),
					'3'          => __('Style 3', 'enerzee-extensions'),
				],
			]
		);


		$this->add_control(
			'price',
			[
				'label' => __('Price', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Your Title Here', 'enerzee-extensions'),

			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],

				'label_block' => true,
				'default' => __('Your Sub Title Here', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => _x('Background Image', 'Background Control', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'condition' => [
					'pricing_style' => '3',
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);


		$this->add_control(
			'description',
			[
				'label' => __('Description', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Enter your title', 'enerzee-extensions'),
				'default' => __('Add Your Description Text Here', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'active',
			[
				'label' => __('Is Active?', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __('yes', 'enerzee-extensions'),
				'no' => __('no', 'enerzee-extensions'),
			]
		);



		$repeater = new Repeater();
		$repeater->add_control(
			'tab_title',
			[
				'label' => __('Plan info List', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('List Item', 'enerzee-extensions'),
				'placeholder' => __('List Item', 'enerzee-extensions'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'hide_title',
			[
				'label' => __('Enable/disable', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'enerzee-extensions'),
				'label_off' => __('Hide', 'enerzee-extensions'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);





		$this->add_control(
			'tabs',
			[
				'label' => __('List Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __('Tab #1', 'enerzee-extensions'),
						'hide_title' => __('Show', 'enerzee-extensions'),


					]

				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __('Button Text', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Read More', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __('Link', 'enerzee-extensions'),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('https://your-link.com', 'enerzee-extensions'),
				'default' => [
					'url' => '#',
				],
			]
		);


		$this->add_responsive_control(
			'align',
			[
				'label' => __('Alignment', 'enerzee-extensions'),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __('Left', 'enerzee-extensions'),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __('Center', 'enerzee-extensions'),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __('Right', 'enerzee-extensions'),
						'icon' => 'eicon-text-align-right',
					],
					'text-justify' => [
						'title' => __('Justified', 'enerzee-extensions'),
						'icon' => 'eicon-text-align-justify',
					],
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/price.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Price());

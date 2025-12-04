<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Advance_Price extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_advance_price', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Advance Price', 'enerzee-extensions');
	}

	public function get_categories()
	{
		return ['enerzee-extensions'];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Advance_Price widget icon.
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
				'label' => __('Advance Price', 'enerzee-extensions'),
			]
		);
		$this->add_control(
			'section_title',
			[
				'label' => __('Section Title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' => __('Section Sub Title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __('Description', 'enerzee-extensions'),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Enter your title', 'enerzee-extensions'),
				'default' => __('Add Your Heading Text Here', 'enerzee-extensions'),
			]
		);
		$this->add_responsive_control(
			'title_align',
			[
				'label' => __('Title Alignment', 'enerzee-extensions'),
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

		$repeater = new Repeater();
		$repeater->add_control(
			'tab_title',
			[
				'label' => __('Time Period', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Monthly', 'enerzee-extensions'),
				'placeholder' => __('Tab Title', 'enerzee-extensions'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'price',
			[
				'label' => __('Price', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('100', 'enerzee-extensions'),

			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => __('Label', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Pro', 'enerzee-extensions'),
			]
		);

		$repeater->add_control(
			'description',
			[
				'label' => __('Description', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,

				'default' => __('Per Month', 'enerzee-extensions'),
			]
		);

		$repeater->add_control(
			'active',
			[
				'label' => __('Is Active?', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __('yes', 'enerzee-extensions'),
				'no' => __('no', 'enerzee-extensions'),
			]
		);

		$repeater->add_control(
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

		$repeater->add_control(
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

		$repeater->add_control(
			'currency',
			[
				'label' => __('Currency', 'enerzee-extensions'),
				'default' => __('$', 'enerzee-extensions'),
				'placeholder' => __('$', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'service_list',
			[
				'label' => __('Service List', 'enerzee-extensions'),
				'default' => __('<ul><li>Service 1</li></ul>', 'enerzee-extensions'),
				'placeholder' => __('Tab Content', 'enerzee-extensions'),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => __('Advance Price Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					'tab_title' =>  __('Monthly', 'enerzee-extensions'),

				],
				'title_field' => '{{{ tab_title }}}',
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
		require  enerzee_TH_ROOT . '/inc/elementor/render/advance_price.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Advance_Price());

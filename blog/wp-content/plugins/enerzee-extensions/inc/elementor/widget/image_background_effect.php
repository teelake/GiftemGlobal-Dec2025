<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class image_background_effect extends Widget_Base
{

	public function get_name()
	{
		return __('image_background_effect', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Image Background Effect', 'enerzee-extensions');
	}

	public function get_categories()
	{
		return ['enerzee-extensions'];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve tabs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-tabs';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Tabs', 'enerzee-extensions'),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => __('title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('What is Lorem Ipsum?', 'enerzee-extensions'),
				'placeholder' => __('Tab Title', 'enerzee-extensions'),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'content',
			[
				'label' => __('Description', 'enerzee-extensions'),
				'default' => __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'enerzee-extensions'),
				'placeholder' => __('Tab Content', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label' => __('Icon', 'enerzee-extensions'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star'

				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => _x('Image', 'Background Control', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .slick-slide-bg' => 'background-image: url({{URL}})',
				],
			]
		);

		$repeater->add_control(
			'section_title',
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


		$this->add_control(
			'image_background_effect',
			[
				'label' => __('Tabs Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => __('Tab #1', 'enerzee-extensions'),
						'tab_content' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'enerzee-extensions'),
						'selected_icon' => __('fas fa-star', 'enerzee-extensions'),
					]

				],
				'title_field' => '{{{ title }}}',
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

		$this->add_control(
			'hover_color',
			[
				'label' => __('Hover Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,

				'selectors' => [
					'{{WRAPPER}} .iq_background_list_wrapper .iq_background_list_column.hover' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/image_background_effect.php';
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\image_background_effect());

<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Tabs extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_Tabs', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Tabs', 'enerzee-extensions');
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
			'tab_title',
			[
				'label' => __('Title & Description', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Tab Title', 'enerzee-extensions'),
				'placeholder' => __('Tab Title', 'enerzee-extensions'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon_img',
			[
				'label' => __('Select Image/Icon', 'enerzee-extensions'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon' => 'Icon',
					'image' => 'Image',
				],
				'default' => 'icon',
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label' => __('Icon', 'enerzee-extensions'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition' => [
					'icon_img' => 'icon',
				],
				'default' => [
					'value' => 'fas fa-star'
				],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __('Choose Image', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'icon_img' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __('Content', 'enerzee-extensions'),
				'default' => __('Tab Content', 'enerzee-extensions'),
				'placeholder' => __('Tab Content', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
		);


		$this->add_control(
			'tabs',
			[
				'label' => __('Tabs Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __('Tab #1', 'enerzee-extensions'),
						'tab_content' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'enerzee-extensions'),
						'selected_icon' => __('fas fa-star', 'enerzee-extensions'),
					]

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
		require  enerzee_TH_ROOT . '/inc/elementor/render/tabs.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Tabs());

<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Faq extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_faq', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Faq', 'enerzee-extensions');
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
		return 'eicon-help-o';
	}

	public function __construct($data = [], $args = null)
	{
		parent::__construct($data, $args);

		wp_register_script('enerzee-custom', ABSPATH . 'path/to/file.js', ['elementor-frontend'], '1.0.0', true);
	}



	public function get_script_depends()
	{
		return ['enerzee-custom'];
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('FAQ', 'enerzee-extensions'),
			]
		);



		$repeater = new Repeater();

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
			'tab_title',
			[
				'label' => __('Question', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('What is Lorem Ipsum?', 'enerzee-extensions'),
				'placeholder' => __('Tab Title', 'enerzee-extensions'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => __('Answer', 'enerzee-extensions'),
				'default' => __('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'enerzee-extensions'),
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
						'selected_icon' => __('icon', 'enerzee-extensions'),
						'tab_title' => __('Tab #1', 'enerzee-extensions'),
						'tab_content' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'enerzee-extensions'),

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
		require  enerzee_TH_ROOT . '/inc/elementor/render/faq.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Faq());

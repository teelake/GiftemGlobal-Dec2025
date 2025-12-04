<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Lists extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_lists', 'enerzee-extensions');
	}

	public function get_title()
	{

		return __('Lists', 'enerzee-extensions');
	}

	public function get_categories()
	{
		return ['enerzee-extensions'];
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Lists widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-bullet-list';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Lists', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'list_style',
			[
				'label'      => __('List Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'one',
				'options'    => [

					'one'          => __('1 column', 'enerzee-extensions'),
					'two'          => __('2 column', 'enerzee-extensions'),
					'three'          => __('3 column', 'enerzee-extensions'),
					'four'          => __('4 column', 'enerzee-extensions'),

				],
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
			'title_color',
			[
				'label' => __('Title Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
			]
		);



		$this->add_control(
			'tabs',
			[
				'label' => __('Lists Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __('List Items', 'enerzee-extensions'),

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

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __('Title', 'enerzee-extensions'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __('Icon Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-enerzee-list ul li i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Title Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-enerzee-list ul li span' => 'color: {{VALUE}};',
				],
			]
		);
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/list.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Lists());

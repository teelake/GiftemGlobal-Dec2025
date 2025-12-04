<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Title extends Widget_Base
{

	public function get_name()
	{
		return __('section_title', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Title', 'enerzee-extensions');
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
		return 'eicon-site-title';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Section Title Post', 'enerzee-extensions'),
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
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __('Enter your title', 'enerzee-extensions'),
				'default' => __('Add Your Heading Text Here', 'enerzee-extensions'),
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
			'title_color',
			[
				'label' => __('Title Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .title-box .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __('Sub Title Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .title-box span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .title-box span:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => __('Description Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .title-box p' => 'color: {{VALUE}};',
				],
			]
		);
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/section_title.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Title());

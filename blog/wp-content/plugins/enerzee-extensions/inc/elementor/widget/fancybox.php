<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_FancyBox extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_fancybox', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('FancyBox', 'enerzee-extensions');
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
		return 'eicon-icon-box';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('FancyBox', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Infobox Title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Financial Planning', 'enerzee-extensions'),
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

		$this->add_control(
			'image',
			[
				'label' => _x('Image', 'Background Control', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
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

		$this->add_control(
			'shadow',
			[
				'label' => __('Shadow', 'enerzee-extensions'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'yes' => 'Yes',
					'no' => 'No',
				],
				'default' => 'no',
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
					'{{WRAPPER}} .iq-style-one-services .iq-service-icon i' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .iq-style-one-services .title-color' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .iq-style-one-services p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __('Button Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-style-one-services a.bttn-link, .iq-style-one-services a.bttn-link i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => __('Icon Hover Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-style-one-services:hover .iq-service-icon i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __('Title Hover Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-style-one-services:hover .title-color' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'description_hover_color',
			[
				'label' => __('Description Hover Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-style-one-services:hover p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __('Button Hover Color', 'enerzee-extensions'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					// Stronger selector to avoid section style from overwriting
					'{{WRAPPER}} .iq-style-one-services:hover a.bttn-link, .iq-style-one-services:hover a.bttn-link i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/fancybox.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_FancyBox());

<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Contact extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_contact', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Contact', 'enerzee-extensions');
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
		return 'eicon-map-pin';
	}


	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('enerzee_Contact', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' => __('Title', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __('Add Your Title Text Here', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'contact_style',
			[
				'label'      => __('Select Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					'1'          => __('Icon', 'enerzee-extensions'),
					'2'          => __('Image', 'enerzee-extensions'),
				],
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => __('Icon', 'enerzee-extensions'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition' => [
					'contact_style' => '1',
				],

			]
		);
		$this->add_control(
			'image',
			[
				'label' => __('Choose Image', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'contact_style' => '2',
				],

			]
		);
		$this->add_control(
			'contact_type',
			[
				'label'      => __('Select Contact Type', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [

					'1'          => __('Email', 'enerzee-extensions'),
					'2'          => __('Phone', 'enerzee-extensions'),
					'3'          => __('Address', 'enerzee-extensions'),
					'4'          => __('Social Media', 'enerzee-extensions'),
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


		$this->start_controls_section(
			'section_contactboxicon',
			[
				'label' => __('ContactBox Icon', 'enerzee-extensions'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->start_controls_tabs('Iconbox_tabs');
		$this->start_controls_tab(
			'tabscontactbox',
			[
				'label' => __('Normal', 'enerzee-extensions'),
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'iq_iconbox_background',
				'label' => __('Background', 'enerzee-extensions'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .contact-box i ',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabscontactboxhover',
			[
				'label' => __('Hover', 'enerzee-extensions'),
			]
		);


		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'iq_iconbox_hover_background',
				'label' => __('Hover Background', 'enerzee-extensions'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .contact-box:hover i,{{WRAPPER}} .contact-box.acitve i',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();


		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/contact.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Contact());

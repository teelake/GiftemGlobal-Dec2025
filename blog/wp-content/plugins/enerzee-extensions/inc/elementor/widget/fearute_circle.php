<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Feature_Circle extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_Feature_Circle', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Feature Circle', 'enerzee-extensions');
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
		return 'eicon-circle-o';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('enerzee Feature Circle', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Choose Logo', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,

				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'tab_no',
			[
				'label' => __('Number', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'default' => __('Tab Title', 'enerzee-extensions'),
				'placeholder' => __('Tab Title', 'enerzee-extensions'),
				'label_block' => true,
			]
		);

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

		$this->add_control(
			'tabs',
			[
				'label' => __('Tabs Items', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_no' => __('3X', 'enerzee-extensions'),
						'tab_title' => __('Tab #1', 'enerzee-extensions'),
					]
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{

		require  enerzee_TH_ROOT . '/inc/elementor/render/fearute_circle.php';
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Feature_Circle());

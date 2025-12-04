<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Image_Overlay extends Widget_Base
{

	public function get_name()
	{
		return __('image_overlay', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Image Overlay', 'enerzee-extensions');
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
		return 'eicon-image-rollover';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Image Overlay', 'enerzee-extensions'),
			]
		);


		$this->add_control(
			'overlay_style',
			[
				'label'      => __('Overlay Style', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					'1'          => __('Style 1', 'enerzee-extensions'),
					'2'          => __('Style 2', 'enerzee-extensions'),

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

		$this->add_control(
			'image_1',
			[
				'label' => __('Choose Image', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'overlay_style' => '2',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail_1', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'overlay_style' => '2',
				],
			]


		);

		$this->add_control(
			'position_x',
			[
				'label' => __('Image Position Horizontal', 'enerzee-extensions'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [
					'left' => [
						'title' => __('Left', 'enerzee-extensions'),
						'icon' => 'eicon-h-align-left',
					],

					'right' => [
						'title' => __('Right', 'enerzee-extensions'),
						'icon' => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,

			]
		);

		$this->add_control(
			'position_y',
			[
				'label' => __('Image Position Vertical', 'enerzee-extensions'),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'top',
				'options' => [

					'top' => [
						'title' => __('Top', 'enerzee-extensions'),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => __('Bottom', 'enerzee-extensions'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'prefix_class' => 'elementor-position-',
				'toggle' => false,
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/image_overlay.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Image_Overlay());

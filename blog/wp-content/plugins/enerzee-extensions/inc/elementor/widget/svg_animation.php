<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Svg_Animation extends Widget_Base
{

	public function get_name()
	{
		return __('svg_animation', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Svg Animation', 'enerzee-extensions');
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
				'label' => __('Svg Animation', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Choose Json', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,

				],
				'media_type' => '*/',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/svg_animation.php';
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Svg_Animation());

<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class enerzee_Progressbar extends Widget_Base
{

	public function get_name()
	{
		return __('enerzee_progressbar', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Progressbar', 'enerzee-extensions');
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
		return 'eicon-skill-bar';
	}



	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Progressbar', 'enerzee-extensions'),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
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

		$repeater->add_control(
			'tab_score',
			[
				'label' => __('Score out of 100', 'enerzee-extensions'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'progress_bar',
			[
				'label' => __('Add Progress Bar', 'enerzee-extensions'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'section_title' => __('List Items', 'enerzee-extensions'),
						'tab_score' => __('50', 'enerzee-extensions'),

					]

				],
				'title_field' => '{{{ section_title }}}',
				'figure_field' => '{{{ tab_score }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/progressbar.php';
?>
		<script type="text/javascript">
			jQuery('.iq-progress-bar > span').each(function() {
				var jQuerythis = jQuery(this);
				var width = jQuery(this).data('percent');
				jQuerythis.css({
					'transition': 'width 2s'
				});
				setTimeout(function() {
					jQuerythis.appear(function() {
						jQuerythis.css('width', width + '%');
					});
				}, 500);
			});
		</script>
<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\enerzee_Progressbar());

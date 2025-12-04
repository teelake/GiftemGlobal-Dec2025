<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

class Iq_Video_Popup extends Widget_Base
{

	public function get_name()
	{
		return __('popup_video', 'enerzee-extensions');
	}

	public function get_title()
	{
		return __('Popup Video', 'enerzee-extensions');
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
		return 'eicon-video-camera';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section',
			[
				'label' => __('Popup Video', 'enerzee-extensions'),
			]
		);

		$this->add_control(
			'video_type',
			[
				'label' => __('Source', 'enerzee-extensions'),
				'type' => Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'video_link' => __('Link', 'enerzee-extensions'),
					'hosted' => __('Self Hosted', 'enerzee-extensions'),
				],
			]
		);

		$this->add_control(
			'hosted_url',
			[
				'label' => __('Choose File', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,

				'media_type' => 'video',
				'condition' => [
					'video_type' => 'hosted',
				],
			]
		);

		$this->add_control(
			'link_url',
			[
				'label' => __('Link', 'enerzee-extensions'),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __('Enter your URL', 'enerzee-extensions'),
				'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				'label_block' => true,
				'condition' => [
					'video_type' => 'video_link',
				],
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __('Play Icon', 'enerzee-extensions'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',

				'default' => [
					'value' => 'fas fa-star'

				],
				'skin' => 'inline',
				'label_block' => false,


			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Poster Image', 'enerzee-extensions'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],

				'default' => [
					'url' => Utils::get_placeholder_image_src(),
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
					]
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/video_popup.php';

		if (Plugin::$instance->editor->is_edit_mode()) {
?>
			<script type="text/javascript">
				jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
					disableOn: 700,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});
			</script>
<?php
		}
	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Iq_Video_Popup());

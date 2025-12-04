<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;

class enerzee_Testimonial extends Widget_Base {

	public function get_name() {
		return __( 'testimonial', 'enerzee-extensions' );
	}

	public function get_title() {
		return __( 'Testimonial', 'enerzee-extensions' );
	}

	public function get_categories() {
		return [ 'enerzee-extensions' ];
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
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}



	protected function register_controls() {
		$this->start_controls_section(
			'section_Testimonial',
			[
				'label' => __( 'Testimonial Post', 'enerzee-extensions' ),
			]
		);

        $this->add_control(
			'blog_style',
			[
				'label'      => __( 'Testimonial Style', 'enerzee-extensions' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [

					'1'          => __( 'Testimonial Slider', 'enerzee-extensions' ),
					'2'          => __( 'Testimonial Gride 1 Columns', 'enerzee-extensions' ),
					'3'          => __( 'Testimonial Gride 2 Columns', 'enerzee-extensions' ),
					'4'          => __( 'Testimonial Gride 3 Columns', 'enerzee-extensions' ),
				],
			]
		);


		$this->add_control(
			'order',
			[
				'label'   => __( 'Order By', 'enerzee-extensions' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
						'DESC' => esc_html__('Descending', 'enerzee-extensions'),
						'ASC' => esc_html__('Ascending', 'enerzee-extensions')
				],

			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'enerzee-extensions' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'enerzee-extensions' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'enerzee-extensions' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'enerzee-extensions' ),
						'icon' => 'eicon-text-align-right',
					]

				]
			]
		);

        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		require  enerzee_TH_ROOT . '/inc/elementor/render/testimonial.php';
		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
		<script>
		 /*------------------------
			Slick Slider
		--------------------------*/
			jQuery('.slider.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                centerMode: true,
                focusOnSelect: true,
                asNavFor: '.slider-nav',

            });
            jQuery('.slider.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                arrows: true,
                centerMode: true,
                focusOnSelect: true,
                 responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '30',
                    slidesToShow: 3
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '15',
                    slidesToShow: 1
                }
            }],
            });
		</script>

		<?php endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\enerzee_Testimonial() );
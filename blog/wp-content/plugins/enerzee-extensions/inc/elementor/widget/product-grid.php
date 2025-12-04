<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */

class Woo_Product_Grid extends Widget_Base
{

	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */

	public function get_name()
	{
		return __('Woo_Product_Grid', 'enerzee-extensions');
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */

	public function get_title()
	{
		return __('WooCommerce Product Grid', 'enerzee-extensions');
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */

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
		return 'eicon-slider-push';
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */

	protected function register_controls()
	{
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __('Product Grid', 'enerzee-extensions'),

			]
		);

		$this->add_control(
			'product_type',
			[
				'label'      => __('Select Product', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'products',
				'options'    => [

					'featured_products' => __('Feature Product', 'enerzee-extensions'),
					'recent_products' => __('Recent Product', 'enerzee-extensions'),
					'sale_products'   => __('Sale Product', 'enerzee-extensions'),
					'best_selling_products' => __('Best Selling Product', 'enerzee-extensions'),
					'top_rated_products'    => __('Top Rated Product', 'enerzee-extensions'),
					'products'          => __('All Products', 'enerzee-extensions'),
				],
			]
		);

		$this->add_control(
			'woo_column',
			[
				'label'      => __('Column', 'enerzee-extensions'),
				'type'       => Controls_Manager::SELECT,

				'options'    => [
					'1'          => __('1 Columns', 'enerzee-extensions'),
					'2'          => __('2 Columns', 'enerzee-extensions'),
					'3'          => __('3 Columns', 'enerzee-extensions'),
					'4'          => __('4 Columns', 'enerzee-extensions'),
					'5'          => __('5 Columns', 'enerzee-extensions'),
					'6'          => __('6 Columns', 'enerzee-extensions'),
				],
				'default'    => '1',
			]
		);



		$this->add_control(
			'woo_order',
			[
				'label'   => __('Order By', 'enerzee-extensions'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'DESC' => esc_html__('Descending', 'enerzee-extensions'),
					'ASC' => esc_html__('Ascending', 'enerzee-extensions')
				],

			]
		);

		$this->add_control(
			'woo_per_page',
			[
				'label' => __('Per Page', 'enerzee-extensions'),
				'type' => Controls_Manager::NUMBER,
				'min' => -1,

				'step' => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'show_pagination',
			[
				'label' => __('Show Pagination', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'enerzee-extensions'),
				'label_off' => __('Hide', 'enerzee-extensions'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_catalog',
			[
				'label' => __('Show Catalog ordering', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'enerzee-extensions'),
				'label_off' => __('Hide', 'enerzee-extensions'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_result_count',
			[
				'label' => __('Show Result Count', 'enerzee-extensions'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Show', 'enerzee-extensions'),
				'label_off' => __('Hide', 'enerzee-extensions'),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$array = [];
		$categories = iqonic_get_category();
		if (!empty($categories)) {
			foreach ($categories as $cat) {
				$array[$cat->slug] = $cat->slug;
			}
		}

		$this->add_control(
			'woo_category',
			[
				'label' => __('Display Product From Specific Category', 'enerzee-extensions'),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $array,

			]
		);

		$this->end_controls_section();
	}
	/**
	 * Render Blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */

	protected function render()
	{

		require  enerzee_TH_ROOT . '/inc/elementor/render/product-grid.php';;

	}
}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Woo_Product_Grid());
?>
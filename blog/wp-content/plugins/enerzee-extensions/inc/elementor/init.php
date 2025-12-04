<?php 

add_action( 'elementor/widgets/widgets_registered', 'register_elementor_widgets' );
function register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {
		
		require  enerzee_TH_ROOT . '/inc/elementor/widget/blog.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/button.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/client.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/counter.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/contact.php';	
		require  enerzee_TH_ROOT . '/inc/elementor/widget/fancybox.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/faq.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/fearute_circle.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/featurebox.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/image_background_effect.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/image_overlay.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/list.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/price.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/progressbar.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/portfolio.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/section_title.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/svg_animation.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/team.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/tabs.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/testimonial.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/video_popup.php';
		require  enerzee_TH_ROOT . '/inc/elementor/widget/3d_hover_hox.php';
		if ( class_exists( 'WooCommerce' ) ){
			require  enerzee_TH_ROOT . '/inc/elementor/widget/product-grid.php';
		}	
 	}
}

add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'enerzee-extensions',
		[
			'title' => esc_html__( 'enerzee-extensions', 'enerzee-extensions' ),
			'icon' => 'fa fa-plug',
		]
	);
});

// Add Custom Icon 

require  enerzee_TH_ROOT . '/inc/elementor/icon/custom-icon.php';

add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_script('lottie', enerzee_TH_URL .'/assest/js/lottie.js', array(), '1.0.0' , true);
});


function iqonic_get_category()
{
    $taxonomy = 'product_cat';
    $orderby = 'name';
    $show_count = 0; // 1 for yes, 0 for no
    $pad_counts = 0; // 1 for yes, 0 for no
    $hierarchical = 1; // 1 for yes, 0 for no
    $title = '';
    $empty = 0;

    $args = array(
        'taxonomy' => $taxonomy,
        'orderby' => $orderby,
        'show_count' => $show_count,
        'pad_counts' => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li' => $title,
        'hide_empty' => $empty,
        'parent' => 0
    );
    $array = get_categories($args);
  	return $array;
}


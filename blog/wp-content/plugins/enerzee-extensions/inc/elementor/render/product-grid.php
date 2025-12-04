<?php

namespace Elementor;

use Elementor\Plugin;

if (!defined('ABSPATH')) exit;

$settings = $this->get_settings();
$category = '';
if (!empty($settings['woo_category'])) {
	foreach ($settings['woo_category'] as $element) {
		$category .= $element . ",";
	}
	$category = "category=" . '"' . rtrim($category, ",") . '"';
}

if ($settings['show_pagination'] == 'yes') {
	$pagination = 'paginate="true"';
} else {
	$pagination = 'paginate="false"';
}

if (!$settings['show_catalog']) {

	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
}

if (!$settings['show_result_count']) {
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
}

echo do_shortcode('[' . $settings['product_type'] . ' per_page="' . $settings['woo_per_page'] . '" columns="' . $settings['woo_column'] . '" ' . $category . ' order="' . $settings['woo_order'] . '" ' . $pagination . ' ]');

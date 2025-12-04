<?php 
add_filter( 'elementor/icons_manager/additional_tabs', function(){
	return [
		'ion-ionicons' => [
			'name' => 'ion-ionicons',
			'label' => __( 'Ionic Custom', 'enerzee-extensions' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'ion-',
			'displayPrefix' => 'ion',
			'labelIcon' => 'ion ion-android-add',
			'ver' => '1.0',
			'fetchJson' => enerzee_TH_URL.'/assest/js/ionicons.js',
			'native' => true,
        ],
        'typ-typicons' => [
			'name' => 'typ-typicons',
			'label' => __( 'Typicons', 'enerzee-extensions' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'typcn-',
			'displayPrefix' => 'typcn',
			'labelIcon' => 'typcn typcn-anchor',
			'ver' => '1.0',
			'fetchJson' => enerzee_TH_URL.'/assest/js/typicons.js',
			'native' => true,
		],
		'typ-flaticon' => [
			'name' => 'typ-flaticon',
			'label' => __( 'Flaticon', 'enerzee-extensions' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'flaticon-',
			'displayPrefix' => 'flaticon',
			'labelIcon' => 'flaticon flaticon-052-light-bulb',
			'ver' => '1.0',
			'fetchJson' => enerzee_TH_URL.'/assest/js/flaticon.js',
			'native' => true,
		],
	];
}
);


add_action('elementor/editor/before_enqueue_scripts', function() {
	wp_enqueue_style('ionicons', enerzee_TH_URL.'/assest/css/ionicons.min.css',array(), '2.0.0', 'all');
	wp_enqueue_style('typicon', enerzee_TH_URL.'/assest/css/typicon.min.css',array(), '2.0.9', 'all');
	wp_enqueue_style('flaticon', enerzee_TH_URL.'/assest/css/flaticon.css',array(), '1.0.0', 'all');
});

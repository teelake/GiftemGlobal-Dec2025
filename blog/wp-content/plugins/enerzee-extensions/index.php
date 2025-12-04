<?php
/*
Plugin Name: Enerzee Extensions	
Plugin URI: https://iqonic.design/
Description: enerzee plugin provides custom team post type, gallery post type with related functionality.
Author: Iqonic Design
Version: 1.5.2
Author URI: https://iqonic.design/
Text Domain: enerzee-extensions
Domain Path: /languages/
*/

if (!defined('enerzee_TH_ROOT'))
	define('enerzee_TH_ROOT', plugin_dir_path(__FILE__));

if (!defined('enerzee_TH_URL'))
	define('enerzee_TH_URL', plugins_url('', __FILE__));

if (!defined('enerzee_NAME'))
	define('enerzee_NAME', 'enerzee-extensions');


// Register Team Member custom post type
add_action('init', 'enerzee_team');
function enerzee_team()
{
	$labels = array(
		'name'                  => esc_html__('Team Member', 'enerzee-extensions'),
		'singular_name'         => esc_html__('Team Member', 'enerzee-extensions'),
		'featured_image'        => esc_html__('Team Member Photo', 'enerzee-extensions'),
		'set_featured_image'    => esc_html__('Set Team Member Photo', 'enerzee-extensions'),
		'remove_featured_image' => esc_html__('Remove Team Member Photo', 'enerzee-extensions'),
		'use_featured_image'    => esc_html__('Use as Team Member Photo', 'enerzee-extensions'),
		'menu_name'             => esc_html__('Our Team', 'admin menu', 'enerzee-extensions'),
		'name_admin_bar'        => esc_html__('Team Member', 'enerzee-extensions'),
		'add_new'               => esc_html__('Add New', 'Team Member', 'enerzee-extensions'),
		'add_new_item'          => esc_html__('Add New Team Member', 'enerzee-extensions'),
		'new_item'              => esc_html__('New Team Member', 'enerzee-extensions'),
		'edit_item'             => esc_html__('Edit Team Member', 'enerzee-extensions'),
		'view_item'             => esc_html__('View Team Member', 'enerzee-extensions'),
		'all_items'             => esc_html__('All Team Members', 'enerzee-extensions'),
		'search_items'          => esc_html__('Search Team Member', 'enerzee-extensions'),
		'parent_item_colon'     => esc_html__('Parent Team Member:', 'enerzee-extensions'),
		'not_found'             => esc_html__('No Classs found.', 'enerzee-extensions'),
		'not_found_in_trash'    => esc_html__('No Classs found in Trash.', 'enerzee-extensions')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'enerzeeteam'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-businessman',
		'supports'           => array('title', 'thumbnail')
	);

	register_post_type('enerzeeteam', $args);
}

// Register Portfolio custom post type
add_action('init', 'enerzee_portfolio');
function enerzee_portfolio()
{
	$labels = array(
		'name'                  => esc_html__('Portfolio', 'enerzee-extensions'),
		'singular_name'         => esc_html__('Portfolio', 'enerzee-extensions'),
		'featured_image'        => esc_html__('Portfolio Photo', 'enerzee-extensions'),
		'set_featured_image'    => esc_html__('Set Portfolio Photo', 'enerzee-extensions'),
		'remove_featured_image' => esc_html__('Remove Portfolio Photo', 'enerzee-extensions'),
		'use_featured_image'    => esc_html__('Use as Portfolio Photo', 'enerzee-extensions'),
		'menu_name'             => esc_html__('Portfolio', 'enerzee-extensions'),
		'name_admin_bar'        => esc_html__('Portfolio', 'enerzee-extensions'),
		'add_new'               => esc_html__('Add New', 'Portfolio', 'enerzee-extensions'),
		'add_new_item'          => esc_html__('Add New Portfolio', 'enerzee-extensions'),
		'new_item'              => esc_html__('New Portfolio', 'enerzee-extensions'),
		'edit_item'             => esc_html__('Edit Portfolio', 'enerzee-extensions'),
		'view_item'             => esc_html__('View Portfolio', 'enerzee-extensions'),
		'all_items'             => esc_html__('All Portfolio', 'enerzee-extensions'),
		'search_items'          => esc_html__('Search Portfolio', 'enerzee-extensions'),
		'parent_item_colon'     => esc_html__('Parent Portfolio :', 'enerzee-extensions'),
		'not_found'             => esc_html__('No Classs found.', 'enerzee-extensions'),
		'not_found_in_trash'    => esc_html__('No Classs found in Trash.', 'enerzee-extensions')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'show_in_nav_menus'   => TRUE,
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-category',
		'supports'           => array('title', 'editor', 'thumbnail', 'category', 'tag')
	);

	register_post_type('portfolio', $args);
}


// Custom taxonomy
add_action('after_setup_theme', 'enerzee_custom_taxonomy');
function enerzee_custom_taxonomy()
{
	$labels = '';
	register_taxonomy(
		'portfolio-categories',
		'portfolio',
		array(
			'label' => esc_html__('Portfolio Category', 'enerzee-extensions'),
			'rewrite' => true,
			'hierarchical' => true,
		)
	);
	register_taxonomy('portfolio-tag', 'portfolio', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'tag'),
	));
}

// Register Testimonial type custom post
add_action('init', 'enerzee_testimonial_gallery');
function enerzee_testimonial_gallery()
{
	$labels = array(
		'name'               => esc_html__('Testimonial', 'enerzee-extensions'),
		'singular_name'      => esc_html__('Testimonial', 'enerzee-extensions'),
		'featured_image'        => esc_html__('Photo', 'enerzee-extensions'),
		'set_featured_image'    => esc_html__('Set Photo', 'enerzee-extensions'),
		'remove_featured_image' => esc_html__('Remove Photo', 'enerzee-extensions'),
		'use_featured_image'    => esc_html__('Use as Photo', 'enerzee-extensions'),
		'menu_name'          => esc_html__('Testimonial', 'enerzee-extensions'),
		'name_admin_bar'     => esc_html__('Testimonial', 'enerzee-extensions'),
		'add_new'            => esc_html__('Add New', 'enerzee-extensions'),
		'add_new_item'       => esc_html__('Add New Testimonial', 'enerzee-extensions'),
		'new_item'           => esc_html__('New Testimonial', 'enerzee-extensions'),
		'edit_item'          => esc_html__('Edit Testimonial', 'enerzee-extensions'),
		'view_item'          => esc_html__('View Testimonial', 'enerzee-extensions'),
		'all_items'          => esc_html__('All Testimonial', 'enerzee-extensions'),
		'search_items'       => esc_html__('Search Testimonial', 'enerzee-extensions'),
		'parent_item_colon'  => esc_html__('Parent Testimonial:', 'enerzee-extensions'),
		'not_found'          => esc_html__('No Testimonial found.', 'enerzee-extensions'),
		'not_found_in_trash' => esc_html__('No Testimonial found in Trash.', 'enerzee-extensions')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'testimonial'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-format-gallery',
		'supports'           => array('title', 'editor', 'thumbnail')
	);

	register_post_type('testimonial', $args);
}

// Register Team Member custom post type
add_action('init', 'enerzee_client');
function enerzee_client()
{
	$labels = array(
		'name'                  => esc_html__('Client Member', 'enerzee-extensions'),
		'singular_name'         => esc_html__('Client Member', 'enerzee-extensions'),
		'featured_image'        => esc_html__('Client Member Photo', 'enerzee-extensions'),
		'set_featured_image'    => esc_html__('Set Client Member Photo', 'enerzee-extensions'),
		'remove_featured_image' => esc_html__('Remove Client Member Photo', 'enerzee-extensions'),
		'use_featured_image'    => esc_html__('Use as Client Member Photo', 'enerzee-extensions'),
		'menu_name'             => esc_html__('Our Client', 'enerzee-extensions'),
		'name_admin_bar'        => esc_html__('Client Member', 'enerzee-extensions'),
		'add_new'               => esc_html__('Add New', 'enerzee-extensions'),
		'add_new_item'          => esc_html__('Add New Client Member', 'enerzee-extensions'),
		'new_item'              => esc_html__('New Client Member', 'enerzee-extensions'),
		'edit_item'             => esc_html__('Edit Client Member', 'enerzee-extensions'),
		'view_item'             => esc_html__('View Client Member', 'enerzee-extensions'),
		'all_items'             => esc_html__('All Client Members', 'enerzee-extensions'),
		'search_items'          => esc_html__('Search Client Member', 'enerzee-extensions'),
		'parent_item_colon'     => esc_html__('Parent Client Member:', 'enerzee-extensions'),
		'not_found'             => esc_html__('No Classs found.', 'enerzee-extensions'),
		'not_found_in_trash'    => esc_html__('No Classs found in Trash.', 'enerzee-extensions')
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'client'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'			 => 'dashicons-businessman',
		'supports'           => array('title', 'thumbnail')
	);

	register_post_type('client', $args);
}

require_once(enerzee_TH_ROOT . 'widget/footer-contact.php');

require_once(enerzee_TH_ROOT . 'widget/subscribe.php');

require_once(enerzee_TH_ROOT . 'widget/social_media.php');

require_once(enerzee_TH_ROOT . 'widget/recent-post.php');

require_once(enerzee_TH_ROOT . 'inc/elementor/init.php');


/*---------------------------------------
		enerzee admin enque
---------------------------------------*/
function enerzee_enqueue_custom_admin_style()
{
	wp_enqueue_script('lottie', enerzee_TH_URL . '/assest/js/lottie.js', array(), '1.0.0', true);
	wp_register_style('enerzee_wp_admin_css', enerzee_TH_URL . '/extensions/assets/css/enerzee.min.css', false, '1.0.0');
	wp_enqueue_style('enerzee_wp_admin_css');
}
add_action('admin_enqueue_scripts', 'enerzee_enqueue_custom_admin_style');

function enerzee_plugin_script()
{
	wp_enqueue_script('lottie', enerzee_TH_URL . '/assest/js/lottie.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'enerzee_plugin_script');


if (!defined('ALLOW_UNFILTERED_UPLOADS')) {
	define('ALLOW_UNFILTERED_UPLOADS', true);
}
add_action('admin_enqueue_scripts', 'enerzee_enqueue_custom_admin_style');

function enerzee_cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	$mimes['json'] = 'application/json';
	return $mimes;
}
add_filter('upload_mimes', 'enerzee_cc_mime_types');

function iqonic_load_plugin_textdomain() {
    load_plugin_textdomain( 'enerzee-extensions', false, basename( __DIR__ ) . '/languages/' );
}

add_action( 'plugins_loaded', 'iqonic_load_plugin_textdomain' );

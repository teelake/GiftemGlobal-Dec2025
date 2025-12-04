<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$settings = $this->get_settings_for_display();
$settings = $this->get_settings();

$align = $settings['align'];
$this->add_render_attribute('iq-section', 'class', $align);
$this->add_render_attribute('iq-section', 'class', 'title-box');

$this->add_inline_editing_attributes('section_title');
$this->add_inline_editing_attributes('sub_title');

$html = '';

$html .= sprintf('<div %1$s>', $this->get_render_attribute_string('iq-section'));
if (!empty($settings['sub_title'])) {
	$html .= sprintf('<span>%1$s</span>', esc_html($settings['sub_title']));
}
$html .= sprintf('<h2 class="title">%1$s</h2>', esc_html($settings['section_title']));

if (!empty($settings['description'])) {

	$html .= sprintf('<p>%1$s</p>', $this->parse_text_editor($settings['description']));
}

$html .= '</div>';


echo $html;

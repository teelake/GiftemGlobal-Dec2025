<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$settings = $this->get_settings();
$tabs = $this->get_settings_for_display('tabs');
$align = $settings['align'];

$image_html = '';

if (!empty($settings['image']['url'])) {
    $this->add_render_attribute('image', 'src', $settings['image']['url']);
    $this->add_render_attribute('image', 'srcset', $settings['image']['url']);
    $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
    $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
    $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}

$active = $settings['active'];
if ($active === "yes") {
    $align .= ' active';
}

if ($settings['pricing_style'] == 1) {

    $html .= '<div  class="iq-enerzee-price ' . \esc_attr__($align) . '">
                    
                  <div class="iq-price-info">
                    ' . sprintf('<p class="title">%1$s</p>', esc_html($settings['title'])) . '
                    ' . sprintf('<h2 class="price">%1$s</h2>', esc_html($settings['price'])) . '
                    ' . sprintf('<p class="sub-title">%1$s</p>', esc_html($settings['description'])) . '
                  </div>  
                ';
    $html .= '<ul class="iq-enerzee-price-info">';
    foreach ($tabs as $index => $item) {

        $html .= '<li class="">
                                                                                        
                                <span>' . esc_html__($item['tab_title']) . '</span>';
        if ($item['hide_title'] == 'yes') {
            $html .= '<i class="ion-ios-checkmark-empty enable"></i>';
        } else {
            $html .= '<i class="ion-ios-close-empty disable"></i>';
        }

        $html .= '</li>';
    }
    $html .= '</ul>';

    $html .= '
                    ' . sprintf('<a class="button" href="%1$s">%2$s</a>', esc_html($settings['link']['url']), esc_html($settings['button_text'])) . '	
        
                        ';

    $html .= '</div>';

    echo $html;
}
if ($settings['pricing_style'] == 2) {

    $html .= '<div  class="iq-enerzee-price-2 ' . \esc_attr__($align) . '">
                    
                  <div class="iq-price-info">
                    ' . sprintf('<h4 class="title">%1$s</h4>', esc_html($settings['title'])) . '
                    ' . sprintf('<h2 class="price">%1$s</h2>', esc_html($settings['price'])) . '
                    ' . sprintf('<p class="sub-title">%1$s</p>', esc_html($settings['description'])) . '
                  </div>  
                ';
    $html .= '<ul class="iq-enerzee-price-info">';
    foreach ($tabs as $index => $item) {


        $html .= '<li class="">
                    <span>' . esc_html__($item['tab_title']) . '</span>';
        if ($item['hide_title'] == 'yes') {
            $html .= '<i class="ion-ios-checkmark-empty enable"></i>';
        } else {
            $html .= '<i class="ion-ios-close-empty disable"></i>';
        }

        $html .= '</li>';
    }
    $html .= '</ul>';

    $html .= '
                    ' . sprintf('<a class="button" href="%1$s">%2$s</a>', esc_html($settings['link']['url']), esc_html($settings['button_text'])) . '   
                        ';
    $html .= '</div>';

    echo $html;
}
if ($settings['pricing_style'] == 3) {
    $html .= '<div  class="iq-enerzee-price style-three ' . \esc_attr__($align) . '">';

    $html .= '<div class="iq-price-info">';
    $html .= '' . sprintf('<p class="title">%1$s</p>', esc_html($settings['title'])) . '';
    $html .= '' . sprintf('<h2 class="price">%1$s</h2>', esc_html($settings['price'])) . '';
    $html .= '' . sprintf('<p class="sub-title">%1$s</p>', esc_html($settings['description'])) . '';
    if (!empty($settings['image']['url'])) {
        $html .= '<div class="img-effect  mb-4 ">
                            <img src="' . esc_attr($settings['image']['url']) . '" alt="' . esc_attr__('enerzee-image', 'enerzee-extension') . '" />
                        </div>';
    }
    $html .= ' </div>  ';

    $html .= '<ul class="iq-enerzee-price-info">';
    foreach ($tabs as $index => $item) {

        $html .= '<li class="">
                                                                                
                        <span>' . esc_html__($item['tab_title']) . '</span>';
        if ($item['hide_title'] == 'yes') {
            $html .= '<i class="ion-ios-checkmark-empty enable"></i>';
        } else {
            $html .= '<i class="ion-ios-close-empty disable"></i>';
        }

        $html .= '</li>';
    }
    $html .= '</ul>';

    $html .= '
            ' . sprintf('<a class="button" href="%1$s">%2$s</a>', esc_html($settings['link']['url']), esc_html($settings['button_text'])) . '	

                ';
    $html .= '</div>';

    echo $html;
}

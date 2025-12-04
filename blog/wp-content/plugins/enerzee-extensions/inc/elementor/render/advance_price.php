<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$settings = $this->get_settings();
$tabs = $this->get_settings_for_display('tabs');

$align = $settings['align'];
$title_align = $settings['title_align'];
$this->add_render_attribute('iq-section', 'class', $title_align);
$this->add_render_attribute('iq-section', 'class', 'title-box');
$id_int = rand(10, 100);
?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <input type="hidden" id="previous_active">
            <?php
            echo sprintf('<div %1$s>', $this->get_render_attribute_string('iq-section'));
            echo sprintf('<span>%1$s</span>', esc_html($settings['sub_title']));
            echo sprintf('<h3 class="title">%1$s</h3>', esc_html($settings['section_title']));

            if (!empty($settings['description'])) {

                echo sprintf('<p>%1$s</p>', $this->parse_text_editor($settings['description']));
            }
            echo '</div>';
            ?>
            <ul class="nav nav-tabs pricing-tab" role="tablist">
                <?php
                $i = 0;
                foreach ($tabs as $index => $item) {
                    if ($i == 0) {
                        $class = "active show";
                    } else {
                        $class = "";
                    }
                ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo esc_attr($class); ?>" data-toggle="tab" href="#tabs-<?php echo $index . $id_int; ?>" role="tab">
                            <?php echo esc_html($item['tab_title']); ?>
                        </a>
                    </li>
                <?php
                    $i++;
                }
                ?>
            </ul>
        </div>
        <div class="col-lg-6">
            <div id="iq-enerzee-price" class=" <?php echo esc_attr($align); ?>">
                <div class="tab-content">

                    <?php
                    $i = 0;
                    foreach ($tabs as $index => $item) {
                        if ($i == 0) {
                            $class = "active show";
                        } else {
                            $class = "";
                        }
                    ?>
                        <div class="tab-pane <?php echo esc_attr($class); ?>" id="tabs-<?php echo $index . $id_int; ?>" role="tabpanel">
                            <div class="iq-enerzee-price">
                                <div class="iq-price-info">
                                    <?php echo sprintf('<p class="title">%1$s</p>', esc_html($item['label'])); ?>
                                    <?php echo sprintf('<h2 class="price">%1$s%2$s</h2>', esc_html($item['price']), esc_html($item['currency'])); ?>
                                    <?php echo sprintf('<p class="sub-title">%1$s</p>', esc_html($item['description'])); ?>
                                </div>
                                <?php echo $this->parse_text_editor($item['service_list']); ?>
                                <?php echo sprintf('<a class="button" href="%1$s">%2$s</a>', esc_html($item['link']['url']), esc_html($item['button_text'])); ?>
                            </div>
                        </div>
                    <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
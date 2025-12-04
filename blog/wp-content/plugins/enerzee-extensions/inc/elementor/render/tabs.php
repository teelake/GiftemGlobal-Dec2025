<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$tabs = $this->get_settings_for_display('tabs');
$settings = $this->get_settings();
$id_int = rand(10, 100);

$align = $settings['align'];

$image_html = '';

if (!empty($settings['image']['url'])) {
    $this->add_render_attribute('image', 'src', $settings['image']['url']);
    $this->add_render_attribute('image', 'srcset', $settings['image']['url']);
    $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
    $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
    $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}

?>

<ul class="nav nav-pills mb-3 tab-style-one <?php echo esc_attr($align); ?>" id="pills-tab" role="tablist">

    <?php
    $i = 0;
    foreach ($tabs as $index => $item) {

        if ($index == 0) {
            $class = "active";
        } else {
            $class = "";
        }
    ?>
        <?php if (!empty($item['tab_title'])) { ?>
            <li class="nav-item">
            <?php } else { ?>
            <li class="nav-item iq-icon">
            <?php } ?>
            <a class="nav-link <?php echo esc_attr($class); ?>" data-toggle="tab" href="#tabs-<?php echo esc_attr($index . $id_int); ?>" role="tab">
                <?php
                if ($item['icon_img'] === 'icon') {
                ?>
                    <?php if (!empty($item['selected_icon'])) { ?>
                    <?php echo sprintf('<i aria-hidden="true" class="%1$s"></i>', esc_attr($item['selected_icon']['value']));
                    } ?>
                <?php } ?>
                <?php
                if ($item['icon_img'] === 'image') {
                ?>
                    <?php
                    if (!empty($item['image']['url'])) {
                    ?>
                        <img src="<?php echo esc_attr($item['image']['url']); ?>" alt="' . esc_attr__('enerzee-image', 'enerzee-extension') . '" />
                    <?php } ?>
                <?php } ?>
                <?php if (!empty($item['tab_title'])) { ?>
                    <span><?php echo esc_html__($item['tab_title']); ?> </span>
                <?php } ?>
            </a>
            </li>
        <?php
    }
        ?>

</ul>


<div class="tab-content">
    <?php
    foreach ($tabs as $index => $item) {
        if ($index == 0) {
            $class = "active content-current";
        } else {
            $class = "";
        }
    ?>
        <div class="tab-pane <?php echo esc_attr__($class); ?>" id="tabs-<?php echo esc_attr($index . $id_int); ?>" role="tabpanel">
            <p><?php echo $this->parse_text_editor($item['tab_content']); ?></p>
        </div>
    <?php
    }
    ?>
</div>
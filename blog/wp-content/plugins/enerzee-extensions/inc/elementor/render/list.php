<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$tabs = $this->get_settings_for_display('tabs');
$align = $settings['align'];
$col = $settings['list_style'];
?>
<div class="iq-enerzee-list <?php echo esc_attr($align); ?>">
    <ul class="list-column-<?php echo esc_attr($col); ?>">
        <?php
        foreach ($tabs as $index => $item) {
        ?>
            <li>
                <i class="<?php echo esc_attr($item['selected_icon']['value']); ?> icon-text"></i>
                <span><?php echo esc_html($item['tab_title']); ?></span>
            </li>

        <?php }  ?>
    </ul>
</div>
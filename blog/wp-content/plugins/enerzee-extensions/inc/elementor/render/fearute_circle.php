<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

$html = '';

$settings = $this->get_settings();
$tabs = $this->get_settings_for_display('tabs');

$image_html = '';

if (!empty($settings['image']['url'])) {
   $this->add_render_attribute('image', 'src', $settings['image']['url']);
   $this->add_render_attribute('image', 'srcset', $settings['image']['url']);
   $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
}
?>
<div class="iq-feature-circle">
   <div class="iq-img">
      <ul class="list-inline mb-0">
         <?php
         foreach ($tabs as $key => $val) {
         ?>
            <li class="list-inline-item">
               <div class="feature-info">
                  <div class="circle-info">
                     <h6><?php echo esc_html($val['tab_no']); ?></h6>
                     <h6><?php echo esc_html($val['tab_title']); ?></h6>
                  </div>
               </div>
            </li>
         <?php } ?>
      </ul>
      <div class="dot-circle">
         <div class="effect-circle"></div>
      </div>
      <div class="main-circle">
         <div class="circle-bg">
            <?php
            if (!empty($settings['image']['url'])) {
            ?>
               <img src="<?php echo esc_url($settings['image']['url']) ?>" alt="<?php esc_attr_e("enerzee-image",'enerzee-extensions')?>">
            <?php
            }
            ?>
         </div>
      </div>
   </div>
</div>
<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

//add_action( 'admin_enqueue_scripts', 'hit_ads_javascripts' );
add_action('wp_footer', 'hit_ads_modal_main_shop_content',99);

function hit_ads_modal_main_shop_content()
{
  $plugin_settings_data = get_option('hit_product_modal_setting_field_values');
  if(!isset($plugin_settings_data['hit_modal_enabale_product_modal']) || $plugin_settings_data['hit_modal_enabale_product_modal'] !='yes')
  {

  }else{

  if(isset($plugin_settings_data['enabale_product_modal_page_shop']) && $plugin_settings_data['enabale_product_modal_page_shop'] ==='yes')
  {
    if(is_shop())
    {
      hit_get_html_data_modal($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_modal_page_cat']) && $plugin_settings_data['enabale_product_modal_page_cat'] ==='yes')
  {
    if( is_product_category())
    {
      hit_get_html_data_modal($plugin_settings_data);  
    }
    
  }
  
  if(isset($plugin_settings_data['enabale_product_modal_page_product']) && $plugin_settings_data['enabale_product_modal_page_product'] ==='yes')
  {
    if( is_product())
    {
      hit_get_html_data_modal($plugin_settings_data);  
    }
    
  }
}
}

function hit_get_html_data_modal($get_plugin_data)
{
  ?>

  <style>
@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

.hit_page-wrapper {
  width: 100%;
  height: 100%;
  background: url(https://goo.gl/OeVhun) center no-repeat;
  background-size: cover;
}

.hit_blur-it {
  filter: blur(4px);
}

a.hit_btn {
  width: 200px;
  padding: 18px 0;
  position: absolute;
  top: 50%; 
  left: 50%;
  transform: translate(-50%, -50%);
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  font-weight: 700;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  color: #fff;
  border-radius: 0;
  background: #e2525c;
}

.hit_modal-wrapper {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0; 
  left: 0;
  z-index:  1111111;
  background: rgb(211,211,211);
  visibility: hidden;
  opacity: 0;
  transition: all 0.25s ease-in-out;
}

.hit_modal-wrapper.open {
  opacity: 1;
  visibility: visible;
}

.hit_modal {
  width: 600px;
  height: 400px;
  display: block;
  margin: 50% 0 0 -300px;
  position: relative;
  top: 50%; 
  left: 50%;
  background: #fff;
  opacity: 0;
  transition: all 0.5s ease-in-out;
}

.hit_modal-wrapper.open .hit_modal {
  margin-top: -200px;
  opacity: 1;
}

.hit_head { 
  width: 90%;
  height: 32px;
  padding: 12px 30px;
  overflow: hidden;
  background: #e2525c;
}

.hit_btn-close {
  font-size: 28px;
  display: block;
  float: right;
  color: #fff;
}

.hit_content {
  padding: 10%;
}

.hit_good-job {
  text-align: center;
  font-family: 'Montserrat', Arial,       Helvetica, sans-serif;
  color: #e2525c;
}
.hit_good-job .fa-thumbs-o-up {
  font-size: 60px;
}
.hit_good-job h1 {
  font-size: 45px;
}
</style>
<!-- Button -->


<!-- Modal -->
<div class="hit_modal-wrapper">
  <div class="hit_modal">
    <div class="hit_head">
      <a class="hit_btn-close trigger" href="#">
        <i class="fa fa-times" aria-hidden="true"></i>
      </a>
    </div>
    <div class="hit_content">
        <div class="hit_good-job">
          <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
          <h1>Good Job!</h1>
        </div>
    </div>
  </div>
</div>
<script>
jQuery( document ).ready(function() {
  jQuery('.trigger').on('click', function() {
     jQuery('.hit_modal-wrapper').toggleClass('open');
    jQuery('.hit_page-wrapper').toggleClass('hit_blur-it');
     return false;
  });
  jQuery( window ).on( "load", function() {
        jQuery('.hit_modal-wrapper').toggleClass('open');
    jQuery('.hit_page-wrapper').toggleClass('hit_blur-it');
    });
 
});
</script>
  <?php

}
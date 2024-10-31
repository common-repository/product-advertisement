<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

add_action( 'woocommerce_before_main_content', 'hit_banner_section', 1);

function hit_banner_section()
{

  $plugin_settings_data = get_option('hit_product_banner_setting_field_values');
  if(!isset($plugin_settings_data['hit_enabale_product_ads']) || $plugin_settings_data['hit_enabale_product_ads'] !='yes')
  {

  }else{

  if(isset($plugin_settings_data['enabale_product_ads_page_shop']) && $plugin_settings_data['enabale_product_ads_page_shop'] ==='yes')
  {
    if(is_shop())
    {
      hit_get_banner_html_data($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_ads_page_cat']) && $plugin_settings_data['enabale_product_ads_page_cat'] ==='yes')
  {
    if( is_product_category())
    {
      hit_get_banner_html_data($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_ads_page_product']) && $plugin_settings_data['enabale_product_ads_page_product'] ==='yes')
  {
    if( is_product())
    {
      hit_get_banner_html_data($plugin_settings_data);  
    }
    
  }
}
}

function hit_get_banner_html_data($get_plugin_data)
{
   ?>

  <style>
* {box-sizing:border-box}
body {font-family: Verdana,sans-serif;}

/* first_slideshow container */
.hit_main_first_slideshow-container {
  position: relative;
  width:100%;
  margin: auto;
  border:1px solid lightgray;
  box-shadow:1px 1px 10px lightgray;

}

/* Caption text */
.hit_main_text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* The hit_main_dots/bullets/indicators */
.hit_main_dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.hide_main_active {
  background-color: #717171;
}

/* Fading animation */
.hit_main_fade {
  -webkit-animation-name: hit_main_fade;
  -webkit-animation-duration: 1.5s;
  animation-name: hit_main_fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes hit_main_fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes hit_main_fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}

</style>
<div class="hit_main_first_slideshow-container" id="first_slideshow">
<?php 
  $product1_url = $get_plugin_data['product_ads_product1'];
  if(!empty($product1_url))
  {
    echo '<div class="hit_main_myfirst_slides hit_main_fade">';
    $product1_click =  $get_plugin_data['product_ads_click1'];
    echo '<a href="'.((empty($product1_click)) ? '#' : $product1_click) .'" target="_blank" >';
    echo '<img style="width:100%;" src="'.$product1_url.'" alt>';
    $product1_caption =  $get_plugin_data['product_ads_caption1'];
    if(!empty($product1_caption))
    {
      echo '<figcaption class="hit_main_text">'.$product1_caption.'</figcaption>';
    }
    echo '</a>';
    echo '</div>';

  }
    $product2_url = $get_plugin_data['product_ads_product2'];
  if(!empty($product2_url))
  {
    echo '<div class="hit_main_myfirst_slides hit_main_fade">';
    $product2_click =  $get_plugin_data['product_ads_click2'];
    echo '<a href="'.((empty($product2_click)) ? '#' : $product2_click) .'" target="_blank" >';
    echo '<img style="width:100%;" src="'.$product2_url.'" alt>';
    $product2_caption =  $get_plugin_data['product_ads_caption2'];
    if(!empty($product2_caption))
    {
      echo '<figcaption class="hit_main_text">'.$product2_caption.'</figcaption>';
    }
    echo '</a>';
    echo '</div>';

  }
    $product3_url = $get_plugin_data['product_ads_product3'];
  if(!empty($product3_url))
  {
    echo '<div class="hit_main_myfirst_slides hit_main_fade">';
    $product3_click =  $get_plugin_data['product_ads_click3'];
    echo '<a href="'.((empty($product3_click)) ? '#' : $product3_click) .'" target="_blank" >';
    echo '<img style="width:100%;" src="'.$product3_url.'" alt>';
    $product3_caption =  $get_plugin_data['product_ads_caption3'];
    if(!empty($product3_caption))
    {
      echo '<figcaption class="hit_main_text">'.$product3_caption.'</figcaption>';
    }
    echo '</a>';
    echo '</div>';

  }
    $product4_url = $get_plugin_data['product_ads_product4'];
  if(!empty($product4_url))
  {
    echo '<div class="hit_main_myfirst_slides hit_main_fade">';
    $product4_click =  $get_plugin_data['product_ads_click4'];
    echo '<a href="'.((empty($product4_click)) ? '#' : $product4_click) .'" target="_blank" >';
    echo '<img style="width:100%;" src="'.$product4_url.'" alt>';
    $product4_caption =  $get_plugin_data['product_ads_caption4'];
    if(!empty($product4_caption))
    {
      echo '<figcaption class="hit_main_text">'.$product4_caption.'</figcaption>';
    }
    echo '</a>';
    echo '</div>';
  }

?>
</div>
<div style="text-align:center;">
<?php echo (!empty($product1_url)) ? '<span class="hit_main_dot"></span>' : ''; ?>
<?php echo (!empty($product2_url)) ? '<span class="hit_main_dot"></span>' : ''; ?>
<?php echo (!empty($product3_url)) ? '<span class="hit_main_dot"></span>' : ''; ?>
<?php echo (!empty($product4_url)) ? '<span class="hit_main_dot"></span>' : ''; ?>
</div>

<script>
var first_slides_slideIndex = 0;
hit_image_showfirst_slides();

function hit_image_showfirst_slides() {
    var i;
    var first_slides = document.getElementsByClassName("hit_main_myfirst_slides");
    var hit_main_dots = document.getElementsByClassName("hit_main_dot");
    for (i = 0; i < first_slides.length; i++) {
       first_slides[i].style.display = "none";  
    }
    first_slides_slideIndex++;
    if (first_slides_slideIndex> first_slides.length) {first_slides_slideIndex = 1}    
    for (i = 0; i < hit_main_dots.length; i++) {
        hit_main_dots[i].className = hit_main_dots[i].className.replace(" hide_main_active", "");
    }
    first_slides[first_slides_slideIndex-1].style.display = "block";  
    hit_main_dots[first_slides_slideIndex-1].className += " hide_main_active";
    setTimeout(hit_image_showfirst_slides, 3000); // Change image every 2 seconds
}

</script>
   <?php
}

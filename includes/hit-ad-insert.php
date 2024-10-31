<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

//add_action( 'admin_enqueue_scripts', 'hit_ads_javascripts' );
add_action('wp_footer', 'hit_ads_main_shop_content',99);

function hit_ads_main_shop_content()
{
  $plugin_settings_data = get_option('hit_product_ads_setting_field_values');
  if(!isset($plugin_settings_data['hit_enabale_product_ads']) || $plugin_settings_data['hit_enabale_product_ads'] !='yes')
  {

  }else{

  if(isset($plugin_settings_data['enabale_product_ads_page_shop']) && $plugin_settings_data['enabale_product_ads_page_shop'] ==='yes')
  {
    if(is_shop())
    {
      hit_get_html_data($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_ads_page_cat']) && $plugin_settings_data['enabale_product_ads_page_cat'] ==='yes')
  {
    if( is_product_category())
    {
      hit_get_html_data($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_ads_page_cart']) && $plugin_settings_data['enabale_product_ads_page_cart'] ==='yes')
  {
    if( is_cart())
    {
      hit_get_html_data($plugin_settings_data);  
    }
    
  }
   if(isset($plugin_settings_data['enabale_product_ads_page_checkout']) && $plugin_settings_data['enabale_product_ads_page_checkout'] ==='yes')
  {
    if( is_checkout())
    {
      hit_get_html_data($plugin_settings_data);  
    }
    
  }
  if(isset($plugin_settings_data['enabale_product_ads_page_product']) && $plugin_settings_data['enabale_product_ads_page_product'] ==='yes')
  {
    if( is_product())
    {
      hit_get_html_data($plugin_settings_data);  
    }
    
  }
}
}

function hit_get_html_data($get_plugin_data)
{
  ?>

  <style>

.hit_hide_ads_mySlides {display:none}

/* Slideshow container */
.hit_hide_ads_slideshow-container {
  max-width: 1000px;
  position: fixed;
  bottom:20px;
  <?php echo $get_plugin_data['hit_enabale_product_ads_alignments']; ?>: 10px;
  width:30%;
  margin: auto;
  border:1px solid lightgray;
  box-shadow:1px 1px 10px lightgray;

}


/* The hit_hide_ads_dots/bullets/indicators */
.hit_hide_ads_dot {
  height: 13px;
  width: 13px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.hit_hide_ads_active {
  background-color: #717171;
}

/* Fading animation */
.hit_hide_ads_fade {
  -webkit-animation-name: hit_hide_ads_fade;
  -webkit-animation-duration: 1.5s;
  animation-name: hit_hide_ads_fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes hit_hide_ads_fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes hit_hide_ads_fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .hit_hide_ads_slideshow-container{display:none;}
}
@media only screen and (max-width: 767px) {
  .hit_hide_ads_slideshow-container{display:none;}
}



/* The hit_hide_ads_close Button */
.hit_hide_ads_close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.hit_hide_ads_close:hover,
.hit_hide_ads_close:focus {
    color: red;
    text-decoration: none;
    cursor: pointer;
}
.hide_ads_logocover{
  color:lightgray;
}
.hide_ads_logocover:hover,
.hide_ads_logocover:focus
{
  color:gray;
}
.hit_sale_butun
{
  border-color: #6d6d6d;
  border: 1px solid;
    border-color: #43454b;
    color: #43454b;
    padding: .202em .6180469716em;
    font-size: .875em;
    text-transform: uppercase;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 1em;
    border-radius: 3px;
}
.hit_div_allignment {
    display: inline; /* Or inline-block */
}

</style>

<?php
$products = array();
$products = explode('|',$get_plugin_data['hit_enabale_product_ads_product']);
 ?>

<div class="hit_hide_ads_slideshow-container" id="hit_image_slideshow">
<?php 

  foreach ($products as $key => $value) {
     $product = wc_get_product($value);
      
      $attachment_url = '#';
      if (has_post_thumbnail($value)) {
          $attachment_ids[0] = get_post_thumbnail_id($value);
          $attachment = wp_get_attachment_image_src($attachment_ids[0], 'full');
          $attachment_url = $attachment[0];
      }

    echo '<a href="'.get_permalink($value).'" style="color:unset;text-decoration:none;""><div class="hit_hide_ads_mySlides hit_hide_ads_fade">
  
<table style="padding:unset;margin:unset;height:100px;"><tr><td style="width: 25%;border-radius: 10px;"><img src="'. $attachment_url.'" style="width:70px;height:70px"></td><td><small>'.$product->get_name(). ' <br>'.$product->get_price_html().' </small>  <a href="'. get_permalink($value) .'" class="hit_sale_butun" style="margin-left: 10px;" >Buy Now</a></td></tr></table>
</div></a>';

  }
?>

<div style="position:fixed;bottom:50px;cursor: pointer;font-size: 20px;">
<span id='hit_close_button' class="hide_ads_logocover" ><span class="dashicons dashicons-dismiss " ></span></span>
</div>
</div>
<br>

<div style="text-align:center;display: none;">
<?php 
foreach ($products as $key => $value) {
  echo '<span class="hit_hide_ads_dot"></span> ';
}
?>
  
</div>

<script>
var hide_ads_slideIndex = 0;
hide_ads_showSlides();

function hide_ads_showSlides() {
    var i;
    var slides = document.getElementsByClassName("hit_hide_ads_mySlides");
    var hit_hide_ads_dots = document.getElementsByClassName("hit_hide_ads_dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    hide_ads_slideIndex++;
    if (hide_ads_slideIndex> slides.length) {hide_ads_slideIndex = 1}    
    for (i = 0; i < hit_hide_ads_dots.length; i++) {
        hit_hide_ads_dots[i].className = hit_hide_ads_dots[i].className.replace(" hit_hide_ads_active", "");
    }
    slides[hide_ads_slideIndex-1].style.display = "block";  
    hit_hide_ads_dots[hide_ads_slideIndex-1].className += " hit_hide_ads_active";
    setTimeout(hide_ads_showSlides, 3000); // Change image every 2 seconds
}

var button = document.getElementById('hit_close_button');

button.onclick = function() {
    var div = document.getElementById('hit_image_slideshow');
    if (div.style.display !== 'none') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
};

</script>
  <?php

}
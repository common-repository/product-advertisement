<?php
/*
Plugin Name: Product Advertisement
Plugin URI: https://wordpress.org/plugins/product-advertisement/
Description: Advertise your best products to shop visitors.
Version: 1.1.2
Author: HIT Tech Market
Author URI: https://profiles.wordpress.org/hittechmarket
domain : hit-tech-market-product-add
*/

// to check wether accessed directly
if (!defined('ABSPATH')) {
	exit;
}

if(!defined('HIT_ADS_NET_DIR_PATH'))
{
  define('HIT_ADS_NET_DIR_PATH', plugin_dir_path(__FILE__));
}
if(!defined('HIT_ADS_NET_PLUGIN_PATH'))
{
  define('HIT_ADS_NET_PLUGIN_PATH', plugin_dir_url(__FILE__));
}
if(!class_exists('Hit_Product_Advertisment_Main_Class'))
{
  class Hit_Product_Advertisment_Main_Class
  {
    function __construct()
    {
     add_action('init', array($this, 'hit_product_ads_load_plugin_text_domain'));
     add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'hit_product_ads_action_links'));
     add_action('admin_menu', array($this, 'hit_products_ads_menu'));
     add_action('admin_enqueue_scripts', array($this, 'hit_admin_escripts_enque'));
    
     include_once('includes/hit-ad-insert.php');
     include_once('includes/hit-top-ad-insert.php');
   }
   function hit_admin_escripts_enque()
   {
      wp_enqueue_script("jquery");
      wp_enqueue_script('wc-enhanced-select');
      wp_enqueue_style('woocommerce_admin_styles');
   }
   function hit_product_ads_load_plugin_text_domain()
   {
    load_plugin_textdomain('hit-tech-market-product-add', false, HIT_ADS_NET_DIR_PATH . '/wpml');
  }
  function hit_product_ads_action_links($links)
  {
    $plugin_links = array(
      '<a href="' . admin_url('admin.php?page=hit-tech-market-product-add') . '" style="color:blue;">' . __('Setup', 'hit-tech-market-product-add') . '</a>',
      '<a href="https://wordpress.org/support/plugin/product-advertisement" style="color:blue;">' . __('Support', 'hit-tech-market-product-add') . '</a>',
      );
    return array_merge($plugin_links, $links);
  }
  function hit_products_ads_menu()
  {
    add_submenu_page('woocommerce', __('Product Ads', 'hit-tech-market-product-add'), __('Product Ads', 'hit-tech-market-product-add'), 'manage_woocommerce', 'hit-tech-market-product-add', array($this, 'hit_product_ads_settings_page'));

  }
  function hit_product_ads_settings_page()
  {

    $tab = (!empty($_GET['subtab'])) ? esc_attr($_GET['subtab']) : 'ads_box';
                echo '<hr>
<center>
  <h1 > '.__('Product Advertisement - Settings','hit-tech-market-product-add').' </h1>
  
</center>

<hr>
<style type="text/css">
  .alert {
    padding: 13px;
    background-color: #4CAF50; /* Green */
    color: white;
    margin: 10px;
    font-size: 15px;
  }
  
</style>';
                echo '
                <div class="wrap">
                    <style>
                        .woocommerce-help-tip{color:darkgray !important;}
                        
                    </style>
                    <hr class="wp-header-end">';
                $this->hit_tab_content_fetch($tab);
                switch ($tab) {
                    case "ads_box":
                        echo '<div class="table-box table-box-main" id="available_offers_section" style="margin-top: 0px;
    border: 1px solid #ccc;border-top: unset !important;padding: 5px;">';
                        require_once('includes/hit-ad-settings-page.php');
                        echo '</div>';
                        break;
                    case "ads_banner":
                        echo '<div class="table-box table-box-main" id="available_offers_section" style="margin-top: 0px;
    border: 1px solid #ccc;border-top: unset !important;padding: 5px;">';
                        require_once('includes/hit-banner-settings-page.php');
                        echo '</div>';
                        break;
                    
                }
                echo '
                </div>';
                echo '<small style="font-size: 10px;float:left;padding-left: 10px;padding-right: 10px;">'. __('plugin by','hit-tech-market-product-add') .' <a href="#">HIT Tech Market</a></small>
<small style="font-size: 10px;float:right;padding-right: 30px;padding-left: 10px;">'. __('For our service','hit-tech-market-product-add').'<a href="#">Review</a>
</small>
<hr>';


       }
       function hit_tab_content_fetch($current = 'ads_box')
       {
        $tabs = array(
                    'ads_box' => __("HIT Ads Box", 'hit-tech-market-product-add'),
                    'ads_banner' => __("HIT Ads Banner", 'hit-tech-market-product-add')
                    
                );
                $html = '<h2 class="nav-tab-wrapper">';
                foreach ($tabs as $tab => $name) {
                    $class = ($tab == $current) ? 'nav-tab-active' : '';
                    $style = ($tab == $current) ? 'border-bottom: 1px solid transparent !important;' : '';
                    $html .= '<a style="text-decoration:none !important;' . $style . '" class="nav-tab ' . $class . '" href="?page=hit-tech-market-product-add&subtab=' . $tab . '">' . $name . '</a>';
                }
                $html .= '</h2>';
                echo $html;
            }
    
}

}

function hit_main_clsss_call() {
      new Hit_Product_Advertisment_Main_Class();
   }

 add_action("init", 'hit_main_clsss_call', 99);


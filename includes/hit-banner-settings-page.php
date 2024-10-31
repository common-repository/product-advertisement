<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
$plugin_settings_data = array();
if(isset($_POST['hit_product_ads_settings_save']))
{
	$plugin_settings_data['hit_enabale_product_ads'] = isset($_POST['hit_enabale_product_ads']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_ads_page_shop'] = isset($_POST['enabale_product_ads_page_shop']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_ads_page_cat'] = isset($_POST['enabale_product_ads_page_cat']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_ads_page_product'] = isset($_POST['enabale_product_ads_page_product']) ? 'yes' : 'no';
	$plugin_settings_data['product_ads_product1'] = sanitize_text_field($_POST['hit_product_ads_product1']);
	$plugin_settings_data['product_ads_product2'] = sanitize_text_field($_POST['hit_product_ads_product2']);
	$plugin_settings_data['product_ads_product3'] = sanitize_text_field($_POST['hit_product_ads_product3']);
	$plugin_settings_data['product_ads_product4'] = sanitize_text_field($_POST['hit_product_ads_product4']);
	$plugin_settings_data['product_ads_caption1'] = sanitize_text_field($_POST['hit_product_ads_caption1']);
	$plugin_settings_data['product_ads_caption2'] = sanitize_text_field($_POST['hit_product_ads_caption2']);
	$plugin_settings_data['product_ads_caption3'] = sanitize_text_field($_POST['hit_product_ads_caption3']);
	$plugin_settings_data['product_ads_caption4'] = sanitize_text_field($_POST['hit_product_ads_caption4']);
	$plugin_settings_data['product_ads_click1'] = sanitize_text_field($_POST['hit_product_ads_click1']);
	$plugin_settings_data['product_ads_click2'] = sanitize_text_field($_POST['hit_product_ads_click2']);
	$plugin_settings_data['product_ads_click3'] = sanitize_text_field($_POST['hit_product_ads_click3']);
	$plugin_settings_data['product_ads_click4'] = sanitize_text_field($_POST['hit_product_ads_click4']);
	
	update_option('hit_product_banner_setting_field_values',$plugin_settings_data);
	echo '<div class="alert">'.__('Settings saved Sucessfully. ( Thanks for beign Customer with us - For more Bussinus upsell plugins, Get Touch with Us )','hit-tech-market-product-add'). '</div>';
}

$plugin_settings_data = get_option('hit_product_banner_setting_field_values');
?>

<div style="width:100%;">
	<form method="post">
		<h3>Settings</h3>
		<table style="width:80%;font-size: 13px;">
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads"><?php _e('HIT banner - Advertisement','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<input class="input-text regular-input " type="checkbox" name="hit_enabale_product_ads" id="hit_enabale_product_ads" style="" value="yes" <?php echo (isset($plugin_settings_data['hit_enabale_product_ads']) && $plugin_settings_data['hit_enabale_product_ads'] !='no') ? 'checked' : '' ?> placeholder=""> <?php _e('Use this Option!','hit-tech-market-product-add'); ?>
					</fieldset>
				</td>
			</tr>
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads_pages"><?php _e('Show / hide Advertisement','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" name="hit_enabale_product_ads_pages" class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_shop" id="enabale_product_ads_page_shop" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_shop']) && $plugin_settings_data['enabale_product_ads_page_shop'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Shop Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_cat" id="enabale_product_ads_page_cat" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_cat']) && $plugin_settings_data['enabale_product_ads_page_cat'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Catogery Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_product" id="enabale_product_ads_page_product" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_product']) && $plugin_settings_data['enabale_product_ads_page_product'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Single Product Page','hit-tech-market-product-add'); ?>
					</fieldset>
				</td>
				<td></td>
			</tr>
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads_pages"><?php _e('Image URL (Copy/Paste) & Caption','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" name="hit_enabale_product_ads_pages" class="titledesc" style="margin-bottom: 20px;margin-top: 3px;">

					<fieldset style="padding:3px;">
					Banner 1 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_product1" id="hit_product_ads_product1" style="" value="<?php echo (isset($plugin_settings_data['product_ads_product1'])) ? $plugin_settings_data['product_ads_product1'] : ''; ?>" placeholder="image url of 1st banner"><br/>
					Banner 2 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_product2" id="hit_product_ads_product2" style="" value="<?php echo (isset($plugin_settings_data['product_ads_product2'])) ? $plugin_settings_data['product_ads_product2'] : ''; ?>" placeholder="image url of 2nd banner"><br/>
					Banner 3 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_product3" id="hit_product_ads_product3" style="" value="<?php echo (isset($plugin_settings_data['product_ads_product3'])) ? $plugin_settings_data['product_ads_product3'] : ''; ?>" placeholder="image url of 3rd banner"><br/> 
					Banner 4 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_product4" id="hit_product_ads_product4" style="" value="<?php echo (isset($plugin_settings_data['product_ads_product4'])) ? $plugin_settings_data['product_ads_product4'] : ''; ?>" placeholder="image url of 4th banner">
					</fieldset>
				</td>
				<td scope="row" name="hit_enabale_product_ads_pages" class="titledesc" style="margin-bottom: 20px;margin-top: 3px;">

					<fieldset style="padding:3px;">
					Caption 1<br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_caption1" id="hit_product_ads_caption1" style="" value="<?php echo (isset($plugin_settings_data['product_ads_caption1'])) ? $plugin_settings_data['product_ads_caption1'] : ''; ?>" placeholder=""><br/>
					Caption 2<br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_caption2" id="hit_product_ads_caption2" style="" value="<?php echo (isset($plugin_settings_data['product_ads_caption2'])) ? $plugin_settings_data['product_ads_caption2'] : ''; ?>" placeholder=""><br/>
					Caption 3<br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_caption3" id="hit_product_ads_caption3" style="" value="<?php echo (isset($plugin_settings_data['product_ads_caption3'])) ? $plugin_settings_data['product_ads_caption3'] : ''; ?>" placeholder=""><br/> 
					Caption 4<br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_caption4" id="hit_product_ads_caption4" style="" value="<?php echo (isset($plugin_settings_data['product_ads_caption4'])) ? $plugin_settings_data['product_ads_caption4'] : ''; ?>" placeholder="">
					</fieldset>
				</td>
				<td scope="row" name="hit_enabale_product_ads_pages" class="titledesc" style="margin-bottom: 20px;margin-top: 3px;">

					<fieldset style="padding:3px;">
					Click Action 1 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_click1" id="hit_product_ads_click1" style="" value="<?php echo (isset($plugin_settings_data['product_ads_click1'])) ? $plugin_settings_data['product_ads_click1'] : ''; ?>" placeholder="redirect url"><br/>
					Click Action 2 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_click2" id="hit_product_ads_click2" style="" value="<?php echo (isset($plugin_settings_data['product_ads_click2'])) ? $plugin_settings_data['product_ads_click2'] : ''; ?>" placeholder="redirect url"><br/>
					Click Banner 3 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_click3" id="hit_product_ads_click3" style="" value="<?php echo (isset($plugin_settings_data['product_ads_click3'])) ? $plugin_settings_data['product_ads_click3'] : ''; ?>" placeholder="redirect url"><br/> 
					Click Banner 4 <br/>
					<input class="input-text regular-input " type="text" name="hit_product_ads_click4" id="hit_product_ads_click4" style="" value="<?php echo (isset($plugin_settings_data['product_ads_click4'])) ? $plugin_settings_data['product_ads_click4'] : ''; ?>" placeholder="redirect url">
					</fieldset>
				</td>
			</tr>
			
			<tr valign="top" ">
				<td style="text-align: right;padding-right: 10px;" colspan="3">
					<button type='submit' name="hit_product_ads_settings_save" class="button button-primary"><?php _e('Save and Go Live !','hit-tech-market-product-add'); ?></button>
				</td>
				
			</tr>
		</table>
		
	</form>
</div>
<br/>
<center><?php _e('If your bussinus is happy with our plugin!','hit-tech-market-product-add'); ?> <a href="https://paypal.me/ponthilagan" target="_blank"><?php _e('Donate us','hit-tech-market-product-add'); ?></a><br/></center>

<?php 

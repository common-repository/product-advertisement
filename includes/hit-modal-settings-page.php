<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php
$plugin_settings_data = array();
if(isset($_POST['hit_product_modal_settings_save']))
{
	$plugin_settings_data['hit_modal_enabale_product_modal'] = isset($_POST['hit_modal_enabale_product_modal']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_modal_page_shop'] = isset($_POST['enabale_product_modal_page_shop']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_modal_page_cat'] = isset($_POST['enabale_product_modal_page_cat']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_modal_page_product'] = isset($_POST['enabale_product_modal_page_product']) ? 'yes' : 'no';

	
	update_option('hit_product_modal_setting_field_values',$plugin_settings_data);
	echo '<div class="alert">'.__('Settings saved Sucessfully. ( Thanks for beign Customer with us - For more Bussinus upsell plugins, Get Touch with Us )','hit-tech-market-product-add'). '</div>';
}

$plugin_settings_data = get_option('hit_product_modal_setting_field_values');
?>

<div style="width:100%;">
	<form method="post">
		<h3>Settings</h3>
		<table style="width:80%;font-size: 13px;">
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_modal_enabale_product_modal"><?php _e('HIT Modal - Advertisement','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<input class="input-text regular-input " type="checkbox" name="hit_modal_enabale_product_modal" id="hit_modal_enabale_product_modal" style="" value="yes" <?php echo (isset($plugin_settings_data['hit_modal_enabale_product_modal']) && $plugin_settings_data['hit_modal_enabale_product_modal'] !='no') ? 'checked' : '' ?> placeholder=""> <?php _e('Use this Option!','hit-tech-market-product-add'); ?>
					</fieldset>
				</td>
			</tr>
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_modal_enabale_product_modal_pages"><?php _e('Show / hide Advertisement','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" name="hit_modal_enabale_product_modal_pages" class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<input class="input-text regular-input " type="checkbox" name="enabale_product_modal_page_shop" id="enabale_product_modal_page_shop" <?php echo (isset($plugin_settings_data['enabale_product_modal_page_shop']) && $plugin_settings_data['enabale_product_modal_page_shop'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Shop Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_modal_page_cat" id="enabale_product_modal_page_cat" <?php echo (isset($plugin_settings_data['enabale_product_modal_page_cat']) && $plugin_settings_data['enabale_product_modal_page_cat'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Catogery Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_modal_page_product" id="enabale_product_modal_page_product" <?php echo (isset($plugin_settings_data['enabale_product_modal_page_product']) && $plugin_settings_data['enabale_product_modal_page_product'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Single Product Page','hit-tech-market-product-add'); ?>
					</fieldset>
				</td>
				<td></td>
			</tr>
			
			<tr valign="top" ">
				<td style="text-align: right;padding-right: 10px;" colspan="3">
					<button type='submit' name="hit_product_modal_settings_save" class="button button-primary"><?php _e('Save and Go Live !','hit-tech-market-product-add'); ?></button>
				</td>
				
			</tr>
		</table>
		
	</form>
</div>
<br/>
<center><?php _e('If your bussinus is happy with our plugin!','hit-tech-market-product-add'); ?> <a href="https://paypal.me/ponthilagan" target="_blank"><?php _e('Donate us','hit-tech-market-product-add'); ?></a><br/></center>

<?php 

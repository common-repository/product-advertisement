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
	$plugin_settings_data['enabale_product_ads_page_cart'] = isset($_POST['enabale_product_ads_page_cart']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_ads_page_checkout'] = isset($_POST['enabale_product_ads_page_checkout']) ? 'yes' : 'no';
	$plugin_settings_data['enabale_product_ads_page_product'] = isset($_POST['enabale_product_ads_page_product']) ? 'yes' : 'no';
	
	$plugin_settings_data['hit_enabale_product_ads_alignments'] = isset($_POST['hit_enabale_product_ads_alignments']) ? sanitize_text_field($_POST['hit_enabale_product_ads_alignments']) : '';

	$plugin_settings_data['hit_enabale_product_ads_product'] = implode('|',$_POST['hit_enabale_product_ads_product']);

	update_option('hit_product_ads_setting_field_values',$plugin_settings_data);
	echo '<div class="alert">'.__('Settings saved Sucessfully. ( Thanks for beign Customer with us - For more Bussinus upsell plugins, Get Touch with Us )','hit-tech-market-product-add'). '</div>';
}

$plugin_settings_data = get_option('hit_product_ads_setting_field_values');
?>

<div style="width:100%;">
	<form method="post">
		<h3>Settings</h3>
		<table style="width:80%;font-size: 13px;">
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads"><?php _e('HIT Box - Advertisement','hit-tech-market-product-add'); ?></label>
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
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_cart" id="enabale_product_ads_page_cart" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_cart']) && $plugin_settings_data['enabale_product_ads_page_cart'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Cart Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_checkout" id="enabale_product_ads_page_checkout" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_checkout']) && $plugin_settings_data['enabale_product_ads_page_checkout'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Checkout Page','hit-tech-market-product-add'); ?><br/>
						<input class="input-text regular-input " type="checkbox" name="enabale_product_ads_page_product" id="enabale_product_ads_page_product" <?php echo (isset($plugin_settings_data['enabale_product_ads_page_product']) && $plugin_settings_data['enabale_product_ads_page_product'] !='no') ? 'checked' : '' ?> value="yes" placeholder=""> <?php _e('Single Product Page','hit-tech-market-product-add'); ?>
					</fieldset>
				</td>
			</tr>
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads_alignments"><?php _e('Alignment','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row" class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<?php if(isset($plugin_settings_data['hit_enabale_product_ads_alignments']) && $plugin_settings_data['hit_enabale_product_ads_alignments'] ==='left')
						{
							echo '<input class="input-text regular-input " checked type="radio" name="hit_enabale_product_ads_alignments" id="hit_enabale_product_ads_alignments" style="" value="left" placeholder=""> Left
							<input class="input-text regular-input "  type="radio" name="hit_enabale_product_ads_alignments" id="hit_enabale_product_ads_alignments" style="" value="right" placeholder=""> Right';
						}
						else
						{
							echo '<input class="input-text regular-input "  type="radio" name="hit_enabale_product_ads_alignments" id="hit_enabale_product_ads_alignments" style="" value="left" placeholder=""> Left
							<input class="input-text regular-input " checked type="radio" name="hit_enabale_product_ads_alignments" id="hit_enabale_product_ads_alignments" style="" value="right" placeholder=""> Right';
						}
						?>
					</fieldset>
				</td>
			</tr>
			<tr valign="top" ">
				<td style="width:40%;font-weight:800;">
					<label for="hit_enabale_product_ads_product"><?php _e('Select Products','hit-tech-market-product-add'); ?></label>
				</td>
				<td scope="row"  class="titledesc" style="display: block;margin-bottom: 20px;margin-top: 3px;">
					<fieldset style="padding:3px;">
						<?php
						if(WC()->version<"2.7.0")
						{
							?>
							<input type="hidden" class="wc-product-search" data-multiple="true" required="true" style="width:70%;"  id="hit_enabale_product_ads_product" name="hit_enabale_product_ads_product[]" data-placeholder="Search for a product" data-action="woocommerce_json_search_products_and_variations" style="width: 50%;" data-selected="<?php echo $plugin_settings_data['hit_enabale_product_ads_product'] ?>" />
							<?php
						}
						else
						{
							?>
							<select id="hit_enabale_product_ads_product" class="wc-product-search" required="true" name="hit_enabale_product_ads_product[]" multiple="multiple" style="width: 70%;" data-placeholder="Search for a product" data-action="woocommerce_json_search_products_and_variations">
								<?php
								$on_ids = explode('|', $plugin_settings_data['hit_enabale_product_ads_product']);

								foreach ( $on_ids as $product_id ) {
									$product = wc_get_product( $product_id );
									if ( is_object( $product ) ) {
										echo '<option value="' . esc_attr( $product_id ) . '"' . str_replace("'",'"',selected( true, true, false )) . '>' . wp_kses_post( $product->get_formatted_name() ) . '</option>';
									}
								}

								?>
							</select>
							<?php
						}
						?>
					</fieldset>
				</td>
			</tr>
			
			<tr valign="top" ">
				<td style="text-align: right;padding-right: 10px;" colspan="2">
					<button type='submit' name="hit_product_ads_settings_save" class="button button-primary"><?php _e('Save and Go Live !','hit-tech-market-product-add'); ?></button>
				</td>
				
			</tr>
		</table>
		
	</form>
</div>
<br/>
<center><?php _e('If your bussinus is happy with our plugin!','hit-tech-market-product-add'); ?> <a href="https://paypal.me/ponthilagan" target="_blank"><?php _e('Donate us','hit-tech-market-product-add'); ?></a><br/></center>

<?php 

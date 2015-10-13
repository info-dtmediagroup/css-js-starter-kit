<?php

/**
 * Misc
 *
 *
 *
 * @link       adesignr.com
 * @since      1.0.0
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/admin/partials
 */
?>

<div id="misc-settings" class="wrap metabox-holder css-js-starter-metaboxes hidden">

	<h2><?php _e('Miscellaneous', $this->plugin_name);?></h2>
	<p><?php _e('Check the options you need to enqueue the libraries.', $this->plugin_name);?></p>

	<!-- remove some meta and generators from the <head> -->
    <fieldset>
        <legend class="screen-reader-text">
            <span><?php _e('Clean WordPress head section', $this->plugin_name);?></span>
        </legend>
			<label for="<?php echo $this->plugin_name; ?>-cleanup">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-cleanup" name="<?php echo $this->plugin_name; ?>[cleanup]" value="1" <?php checked($cleanup, 1); ?> />
				<span><?php esc_attr_e('Clean up the head section', $this->plugin_name); ?></span>
			</label>
	</fieldset>
		
	<fieldset>
		<legend class="screen-reader-text"><span><?php _e('Remove CSS and JS files query string versions', $this->plugin_name);?></span></legend>
		<label for="<?php echo $this->plugin_name;?>-css_js_versions">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-css_js_versions" name="<?php echo $this->plugin_name;?>[css_js_versions]" value="1" <?php checked($css_js_versions, 1);?>/>
			<span><?php esc_attr_e('Remove CSS and JS versions (uncheck for dev)', $this->plugin_name);?></span>
		</label>
	</fieldset>
	
	<fieldset>
		<legend class="screen-reader-text"><span><?php _e('Add responsive Menu', $this->plugin_name);?></span></legend>
		<label for="<?php echo $this->plugin_name;?>-mobile_menu">
			<input type="checkbox" id="<?php echo $this->plugin_name;?>-mobile_menu" name="<?php echo $this->plugin_name;?>[mobile_menu]" value="1" <?php checked($mobile_menu, 1);?>/>
			<span><?php esc_attr_e('Add a mobile Slideout Menu (only works with Divi)', $this->plugin_name);?></span>
		</label>
	</fieldset>
		
</div>
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
		
</div>
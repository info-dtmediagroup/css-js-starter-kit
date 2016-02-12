<?php

/**
 * JS Snippets
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

<div id="js-settings" class="wrap metabox-holder css-js-starter-metaboxes hidden">

	<h2><?php _e('JS Snippets', $this->plugin_name);?></h2>
	<p><?php _e('Check the options you need to enqueue the libraries.', $this->plugin_name);?></p>

		<!-- Add Wow.js -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add wow.js', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-wow_js">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-wow_js" name="<?php echo $this->plugin_name; ?>[wow_js]" value="1" <?php checked($wow_js, 1); ?>/>
                <span><?php esc_attr_e('Add Wow.js to Footer', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		
		<!-- Add Greensock -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add GreenSock Animation Platform', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-gsap_js">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-gsap_js" name="<?php echo $this->plugin_name; ?>[gsap_js]" value="1" <?php checked($gsap_js, 1); ?>/>
                <span><?php esc_attr_e('Add GreenSock Animation Platform to Footer', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        
        <!-- load jQuery from CDN -->
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Load jQuery from CDN instead of the basic wordpress script', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-jquery_cdn">
				<input type="checkbox" class="show-child-if-checked" id="<?php echo $this->plugin_name;?>-jquery_cdn" name="<?php echo $this->plugin_name;?>[jquery_cdn]" value="1" <?php checked($jquery_cdn, 1);?>/>
				<span><?php esc_attr_e('Load jQuery from CDN', $this->plugin_name);?></span>
			</label>
            <fieldset class="<?php if( '1' != $jquery_cdn ) echo 'hidden';?>" >
                <p><?php _e('You can choose your own cdn provider and jQuery version (default will be Google Cdn and version 1.11.1) - Recommended CDN are <a href="https://cdnjs.com/libraries/jquery">CDNjs</a>, <a href="https://code.jquery.com/jquery/">jQuery official CDN</a>, <a href="https://developers.google.com/speed/libraries/#jquery">Google CDN</a> and <a href="http://www.asp.net/ajax/cdn#jQuery_Releases_on_the_CDN_0">Microsoft CDN</a>', $this->plugin_name);?></p>
                    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name);?></span></legend>
                    <input type="url" class="regular-text" id="<?php echo $this->plugin_name;?>-cdn_provider" name="<?php echo $this->plugin_name;?>[cdn_provider]" value="<?php if(!empty($cdn_provider)) echo $cdn_provider;?>"/>
            </fieldset>
		</fieldset>
		
		<!-- Remove Emoji -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Remove Emoji', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-remove_emoji">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-remove_emoji" name="<?php echo $this->plugin_name; ?>[remove_emoji]" value="1" <?php checked($remove_emoji, 1); ?>/>
                <span><?php esc_attr_e('Remove Emoji', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		
		<!-- Fullscreen Slider -->
		<fieldset>
            <legend class="screen-reader-text"><span><?php _e('Make Slider Fullscreen', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-fullscreen_slider">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-fullscreen_slider" name="<?php echo $this->plugin_name; ?>[fullscreen_slider]" value="1" <?php checked($fullscreen_slider, 1); ?>/>
                <span><?php esc_attr_e('Make Slider Fullscreen (you have to add the Class "fullscreenslider" in the divi editor)', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		
		<!-- Fullscreen Slider -->
		<fieldset>
            <legend class="screen-reader-text"><span><?php _e('Fix Fullwidth Text/Image', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-fwimage">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-fwimage" name="<?php echo $this->plugin_name; ?>[fwimage]" value="1" <?php checked($fwimage, 1); ?>/>
                <span><?php esc_attr_e('Fixes the Images on Mobile and the Image height on Desktop when using a text module and an image next to each other (needs class fullwidth and the infotext module)', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		
</div>

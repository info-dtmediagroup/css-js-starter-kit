<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       adesignr.com
 * @since      1.0.0
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    
    

		<form method="post" name="cleanup_options" action="options.php">

			<?php
			//Grab all options
			$options = get_option($this->plugin_name);

			// CSS
			$cleanup = $options['cleanup'];
			$animate_css = $options['animate_css'];
			$fawesome_css = $options['fawesome_css'];

			
			// Javascript
			$wow_js = $options['wow_js'];
			$jquery_cdn = $options['jquery_cdn'];
			$cdn_provider = $options['cdn_provider'];
			

		
			settings_fields($this->plugin_name);
			do_settings_sections($this->plugin_name);
			?>
		
		<h2 class="nav-tab-wrapper"><?php _e('CSS Snippets', $this->plugin_name);?></h2>
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
    
        <!-- Add Animate.css -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add Animate.css', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-animate_css">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-animate_css" name="<?php echo $this->plugin_name; ?>[animate_css]" value="1" <?php checked($animate_css, 1); ?>/>
                <span><?php esc_attr_e('Add Animate.css to Head', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <!-- Add Fontawesome -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add Font Awesome', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-fawesome_css">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-fawesome_css" name="<?php echo $this->plugin_name; ?>[fawesome_css]" value="1" <?php checked($fawesome_css, 1); ?>/>
                <span><?php esc_attr_e('Add Font Awesome to Head', $this->plugin_name); ?></span>
            </label>
        </fieldset>
		
	
	<!-------------- Javascript Part ------>
	
	<h2 class="nav-tab-wrapper"><?php _e('JS Snippets', $this->plugin_name);?></h2>
	<p><?php _e('Check the options you need to enqueue the libraries.', $this->plugin_name);?></p>

		<!-- Add Wow.js -->
        <fieldset>
            <legend class="screen-reader-text"><span><?php _e('Add wow.js', $this->plugin_name);?></span></legend>
            <label for="<?php echo $this->plugin_name; ?>-wow_js">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-wow_js" name="<?php echo $this->plugin_name; ?>[wow_js]" value="1" <?php checked($wow_js, 1); ?>/>
                <span><?php esc_attr_e('Add Wow.js to Footer', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        
        <!-- load jQuery from CDN -->
		<fieldset>
        <legend class="screen-reader-text"><span><?php _e('Load jQuery from CDN instead of the basic wordpress script', $this->plugin_name);?></span></legend>
        <label for="<?php echo $this->plugin_name;?>-jquery_cdn">
            <input type="checkbox"  id="<?php echo $this->plugin_name;?>-jquery_cdn" name="<?php echo $this->plugin_name;?>[jquery_cdn]" value="1" <?php checked($jquery_cdn,1);?>/>
            <span><?php esc_attr_e('Load jQuery from CDN', $this->plugin_name);?></span>
        </label>
                <fieldset class="<?php if(1 != $jquery_cdn) echo 'hidden';?>">
                    <p>You can choose your own cdn provider and jQuery version(default will be Google Cdn and version 1.11.1)-Recommended CDN are <a href="https://cdnjs.com/libraries/jquery">CDNjs</a>, <a href="https://code.jquery.com/jquery/">jQuery official CDN</a>, <a href="https://developers.google.com/speed/libraries/#jquery">Google CDN</a> and <a href="http://www.asp.net/ajax/cdn#jQuery_Releases_on_the_CDN_0">Microsoft CDN</a></p>
                    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name);?></span></legend>
                    <input type="url" class="regular-text" id="<?php echo $this->plugin_name;?>-cdn_provider" name="<?php echo $this->plugin_name;?>[cdn_provider]" value="<?php if(!empty($cdn_provider)) echo $cdn_provider;?>"/>
                </fieldset>
    </fieldset>

    <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>
	
    </form>

</div>
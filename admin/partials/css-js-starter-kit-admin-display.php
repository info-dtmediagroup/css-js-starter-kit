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
    
    

		<form method="post" name="css_js_starter_options" action="options.php">
		
		<h2 class="nav-tab-wrapper">
            <a href="#css-settings" class="nav-tab nav-tab-active"><?php _e('CSS Snippets', $this->plugin_name);?></a>
            <a href="#js-settings" class="nav-tab"><?php _e('JS Snippets', $this->plugin_name);?></a>
            <a href="#misc-settings" class="nav-tab"><?php _e('Miscellaneous', $this->plugin_name);?></a>
		</h2>

			<?php
			//Grab all options
			$options = get_option($this->plugin_name);

			// CSS
			$animate_css = $options['animate_css'];
			$fawesome_css = $options['fawesome_css'];
			$floating_header_css = $options['floating_header_css'];
			$header_background_color = $options['header_background_color'];

			
			// Javascript
			$wow_js = $options['wow_js'];
			$jquery_cdn = $options['jquery_cdn'];
			$cdn_provider = $options['cdn_provider'];
			$remove_emoji = $options['remove_emoji'];
			$gsap_js = $options['gsap_js'];
			$fullscreen_slider = $options['fullscreen_slider'];
			
			//Miscellaneous
			$cleanup = $options['cleanup'];
			$css_js_versions = $options['css_js_versions'];
			$mobile_menu = $options['mobile_menu'];
			
			
			

		
			settings_fields($this->plugin_name);
			do_settings_sections($this->plugin_name);
			
			require_once('css-js-starter-kit-css_settings.php');
			require_once('css-js-starter-kit-js_settings.php');
			require_once('css-js-starter-kit-misc_settings.php');?>

    <?php submit_button(__('Save all changes', $this->plugin_name), 'primary','submit', TRUE); ?>
	
    </form>

</div>
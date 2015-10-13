<?php

/**
 * CSS Snippets
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

<div id="css-settings" class="wrap metabox-holder css-js-starter-metaboxes">

	<h2><?php esc_attr_e( 'CSS Snippets', $this->plugin_name ); ?></h2>

	<p><?php _e('Check the options you need to enqueue the libraries.', $this->plugin_name);?></p>
    
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
		
		<!-- Floating Header -->
		<fieldset>
			<legend class="screen-reader-text"><span><?php _e('Create a floating Header', $this->plugin_name);?></span></legend>
			<label for="<?php echo $this->plugin_name;?>-floating_header_css">
				<input type="checkbox" class="show-child-if-checked" id="<?php echo $this->plugin_name;?>-floating_header_css" name="<?php echo $this->plugin_name;?>[floating_header_css]" value="1" <?php checked($floating_header_css, 1);?>/>
				<span><?php esc_attr_e('Activate floating Header', $this->plugin_name);?></span>
			</label>
            <fieldset class="<?php if( '1' != $floating_header_css ) echo 'hidden';?>" >
                <p><?php _e('Choose the navigation bar Color', $this->plugin_name);?></p>
                    <legend class="screen-reader-text"><span><?php _e('Choose the navigation bar Color', $this->plugin_name);?></span></legend>
					<input type="text" class="<?php echo $this->plugin_name;?>-color-picker" id="<?php echo $this->plugin_name;?>-header_background_color" name="<?php echo $this->plugin_name;?>[header_background_color]"  value="<?php echo $header_background_color;?>"  />    
			</fieldset>
		</fieldset>		
		
</div>

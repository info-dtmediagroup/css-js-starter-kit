<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       adesignr.com
 * @since      1.0.0
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Css_Js_Starter_Kit
 * @subpackage Css_Js_Starter_Kit/admin
 * @author     Alex <alex@adesignr.com>
 */
class Css_Js_Starter_Kit_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	
	//Add Page & Menu
	public function add_plugin_admin_menu() {
		add_options_page(
			'CSS & JS Starter Kit',
			'CSS & JS Starter Kit',
			'manage_options',
			$this->plugin_name,
			array($this, 'display_plugin_setup_page')
		);
	}
	
	
	//Link to Plugin Settings
	public function add_action_links( $links ) {
		$settings_link = array(
				'<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge( $settings_link, $links );
	}
	
	//Render page
	public function display_plugin_setup_page() {
		include_once( 'partials/css-js-starter-kit-admin-display.php' );
	}
	
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}
	
	public function validate($input) {
		// All checkboxes inputs        
		$valid = array();

		//CSS_JS Starter Kit
		$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;
		$valid['animate_css'] = (isset($input['animate_css']) && !empty($input['animate_css'])) ? 1: 0;
		$valid['fawesome_css'] = (isset($input['fawesome_css']) && !empty($input['fawesome_css'])) ? 1 : 0;
		$valid['wow_js'] = (isset($input['wow_js']) && !empty($input['wow_js'])) ? 1 : 0;
		$valid['jquery_cdn'] = (isset($input['jquery_cdn']) && !empty($input['jquery_cdn'])) ? 1 : 0;
		$valid['cdn_provider'] = esc_url($input['cdn_provider']);
    
    return $valid;
	}

}

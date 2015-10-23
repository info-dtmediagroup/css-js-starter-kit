<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              adesignr.com
 * @since             1.2.0
 * @package           Css_Js_Starter_Kit
 *
 * @wordpress-plugin
 * Plugin Name:       CSS & JS Starter Kit
 * Plugin URI:        adesignr.com
 * Description:       Plugin um nützliche CSS & JS Snippets einzubinden.
 * Version:           1.7.6
 * Author:            Alex
 * Author URI:        adesignr.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       css-js-starter-kit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-css-js-starter-kit-activator.php
 */
function activate_css_js_starter_kit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-js-starter-kit-activator.php';
	Css_Js_Starter_Kit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-css-js-starter-kit-deactivator.php
 */
function deactivate_css_js_starter_kit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-js-starter-kit-deactivator.php';
	Css_Js_Starter_Kit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_css_js_starter_kit' );
register_deactivation_hook( __FILE__, 'deactivate_css_js_starter_kit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-css-js-starter-kit.php';


	/* Plugin Updater old
	add_action( 'init', 'custom_github_updater' );
	function custom_github_updater() {

	include_once 'updater.php';

	define( 'WP_GITHUB_FORCE_UPDATE', true );

	if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

		$config = array(
			'slug' => plugin_basename( __FILE__ ),
			'proper_folder_name' => 'css-js-starter-kit',
			'api_url' => 'https://api.github.com/repos/DTMediaGroup/css-js-starter-kit',
			'raw_url' => 'https://raw.github.com/DTMediaGroup/css-js-starter-kit/develop',
			'github_url' => 'https://github.com/DTMediaGroup/css-js-starter-kit/',
			'zip_url' => 'https://github.com/DTMediaGroup/css-js-starter-kit/archive/develop.zip',
			'sslverify' => true,
			'requires' => '3.0',
			'tested' => '3.3',
			'readme' => 'README.txt',
			'access_token' => '',
		);

		new WP_GitHub_Updater( $config );

	}

}*/


/* New Updater */

require 'plugin-update-checker/plugin-update-checker.php';
$className = PucFactory::getLatestClassVersion('PucGitHubChecker');
$myUpdateChecker = new $className(
    'https://github.com/DTMediaGroup/css-js-starter-kit/',
    __FILE__,
    'develop'
);

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_css_js_starter_kit() {

	$plugin = new Css_Js_Starter_Kit();
	$plugin->run();

}
run_css_js_starter_kit();

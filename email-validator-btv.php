<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://btvmarketing,com
 * @since             1.0.0
 * @package           Email_Validator_Btv
 *
 * @wordpress-plugin
 * Plugin Name:       Email Validator
 * Plugin URI:        https://btvmarketing.com
 * Description:       This plugin uses the Email List Verify API to validate emails.
 * Version:           1.0.0
 * Author:            Kirt Perez
 * Author URI:        https://btvmarketing,com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       email-validator-btv
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EMAIL_VALIDATOR_BTV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-email-validator-btv-activator.php
 */
function activate_email_validator_btv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-email-validator-btv-activator.php';
	Email_Validator_Btv_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-email-validator-btv-deactivator.php
 */
function deactivate_email_validator_btv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-email-validator-btv-deactivator.php';
	Email_Validator_Btv_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_email_validator_btv' );
register_deactivation_hook( __FILE__, 'deactivate_email_validator_btv' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-email-validator-btv.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_email_validator_btv() {

	$plugin = new Email_Validator_Btv();
	$plugin->run();

}
run_email_validator_btv();

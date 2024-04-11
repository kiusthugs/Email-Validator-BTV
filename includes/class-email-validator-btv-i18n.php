<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://btvmarketing,com
 * @since      1.0.0
 *
 * @package    Email_Validator_Btv
 * @subpackage Email_Validator_Btv/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Email_Validator_Btv
 * @subpackage Email_Validator_Btv/includes
 * @author     Kirt Perez <kperez@btvmarketing.com>
 */
class Email_Validator_Btv_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'email-validator-btv',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

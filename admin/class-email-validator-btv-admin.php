<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://btvmarketing,com
 * @since      1.0.0
 *
 * @package    Email_Validator_Btv
 * @subpackage Email_Validator_Btv/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Email_Validator_Btv
 * @subpackage Email_Validator_Btv/admin
 * @author     Kirt Perez <kperez@btvmarketing.com>
 */
class Email_Validator_Btv_Admin {

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

		add_action('admin_menu', array($this, 'create_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Email_Validator_Btv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Email_Validator_Btv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/email-validator-btv-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Email_Validator_Btv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Email_Validator_Btv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/email-validator-btv-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_settings_page() {
		add_options_page(
			'Email Validator Btv Settings',
			'Email Validator Btv',
			'manage_options',
			'email-validator-btv-settings',
			array($this, 'render_settings_page')
		);
	}
	
	// Add a method to render the settings page content.
	public function render_settings_page() {
		?>
		<div class="wrap">
			<h2>Email Validator Btv Settings</h2>
			<form method="post" action="options.php">
				<?php settings_fields('email_validator_btv_settings_group'); ?>
				<?php do_settings_sections('email-validator-btv-settings'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	// Add a method to register the settings and API key field.
public function register_settings() {
    register_setting(
        'email_validator_btv_settings_group',
        'email_validator_btv_api_key'
    );

    add_settings_section(
        'email_validator_btv_settings_section',
        'API Key Settings',
        array($this, 'settings_section_callback'),
        'email-validator-btv-settings'
    );

    add_settings_field(
        'email_validator_btv_api_key',
        'API Key',
        array($this, 'api_key_field_callback'),
        'email-validator-btv-settings',
        'email_validator_btv_settings_section'
    );
}

// Callback function for the settings section.
public function settings_section_callback() {
    echo '<p>Enter your API key below:</p>';
}

// Callback function for the API key field.
public function api_key_field_callback() {
    $api_key = get_option('email_validator_btv_api_key');
    echo '<input type="text" id="email_validator_btv_api_key" name="email_validator_btv_api_key" value="' . esc_attr($api_key) . '" />';
}

}

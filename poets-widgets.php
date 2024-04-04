<?php
/**
 * Football Poets Widgets
 *
 * Plugin Name: Football Poets Widgets
 * Description: Provides a set of custom widgets for the Football Poets website.
 * Plugin URI:  https://github.com/football-poets/poets-widgets
 * Version:     0.2.1a
 * Author:      Christian Wach
 * Author URI:  https://haystack.co.uk
 * Text Domain: poets-widgets
 * Domain Path: /languages
 *
 * @package Poets_Widgets
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set our version here.
define( 'POETS_WIDGETS_VERSION', '0.2.1a' );

// Store reference to this file.
if ( ! defined( 'POETS_WIDGETS_FILE' ) ) {
	define( 'POETS_WIDGETS_FILE', __FILE__ );
}

// Store URL to this plugin's directory.
if ( ! defined( 'POETS_WIDGETS_URL' ) ) {
	define( 'POETS_WIDGETS_URL', plugin_dir_url( POETS_WIDGETS_FILE ) );
}

// Store PATH to this plugin's directory.
if ( ! defined( 'POETS_WIDGETS_PATH' ) ) {
	define( 'POETS_WIDGETS_PATH', plugin_dir_path( POETS_WIDGETS_FILE ) );
}

/**
 * Football Poets Widgets Class.
 *
 * A class that encapsulates plugin functionality.
 *
 * @package Poets_Widgets
 */
class Poets_Widgets {

	/**
	 * Constructor.
	 *
	 * @since 0.1
	 */
	public function __construct() {

		// Register hooks.
		$this->register_hooks();

	}

	/**
	 * Register WordPress hooks.
	 *
	 * @since 0.1
	 */
	public function register_hooks() {

		// Use translation.
		add_action( 'plugins_loaded', [ $this, 'translation' ] );

		// Add widgets.
		add_action( 'widgets_init', [ $this, 'register_widgets' ] );

	}

	/**
	 * Load translation if present.
	 *
	 * @since 0.1
	 */
	public function translation() {

		// Allow translations to be added.
		// phpcs:ignore WordPress.WP.DeprecatedParameters.Load_plugin_textdomainParam2Found
		load_plugin_textdomain(
			'poets-widgets', // Unique name.
			false, // Deprecated argument.
			dirname( plugin_basename( POETS_WIDGETS_FILE ) ) . '/languages/' // Path.
		);

	}

	/**
	 * Register widgets for this plugin.
	 *
	 * @since 0.1
	 */
	public function register_widgets() {

		// Include widgets.
		require_once POETS_WIDGETS_PATH . 'widgets/poets-widgets-butler.php';
		require_once POETS_WIDGETS_PATH . 'widgets/poets-widgets-clik.php';
		require_once POETS_WIDGETS_PATH . 'widgets/poets-widgets-crispin.php';
		require_once POETS_WIDGETS_PATH . 'widgets/poets-widgets-in-memoriam.php';
		require_once POETS_WIDGETS_PATH . 'widgets/poets-widgets-kick-it.php';

	}

}

/**
 * Plugin reference getter.
 *
 * @since 0.1
 *
 * @return Poets_Widgets $poets_widgets The plugin object.
 */
function poets_widgets() {
	static $poets_widgets;
	if ( ! isset( $poets_widgets ) ) {
		$poets_widgets = new Poets_Widgets();
	}
	return $poets_widgets;
}

// Bootstrap plugin.
poets_widgets();

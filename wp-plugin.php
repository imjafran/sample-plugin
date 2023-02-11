<?php
/**
 * Plugin Name:     WP Plugin
 * Plugin URI:      https://github.com/imjafran/sample-plugin
 * Description:     Clean WordPress plugin starter pack
 * Version:         1.0.0
 * Author:          imjafran
 * Author URI:      https://github.com/imjafran
 * License:         MIT
 * Text Domain:     sample-plugin
 *
 * @package SamplePlugin
 * @since   1.0.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit();


if ( ! defined( 'SAMPLE_PLUGIN_FILE' ) ) {

	// Defining root handler.
	define( 'SAMPLE_PLUGIN_FILE', __FILE__ );

	// Defining version.
	define( 'SAMPLE_PLUGIN_VERSION', '1.0.0' );

	// Load Bootstrap file.
	require_once __DIR__ . '/includes/class-boot.php';
}


/**
 * The main function responsible for returning the one true SamplePlugin
 */

<?php
/**
 *
 * Plugin Name: WP Plugin
 * Plugin URI: https://github.com/imjafran/wp-plugin
 * Description: Clean WordPress plugin starter pack
 * Version: 1.0.0
 * Author: imjafran
 * Author URI: https://github.com/imjafran
 * License: MIT
 * Text Domain: wp-plugin
 *
 * @package WP_Plugin
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit();


// Defining root handler.
define( 'SAMPLE_PLUGIN', __FILE__ );

// Load Bootstrap file.
require_once __DIR__ . '/includes/boot.php';

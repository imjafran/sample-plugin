<?php

/**
 * Abstract Base Class
 *
 * @package WP_Plugin
 * @since 1.0.0
 */

// Namespace.
namespace WP_Plugin\Base;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Controller' ) ) {

	/**
	 * Base abstract class of the plugin, contains all the common methods
	 */
	abstract class Controller {
		/**
		 * Contains instance of the static class
		 *
		 * @var self
		 */
		public static $instance = null;

		/**
		 * Returns singleton instance of the Class
		 *
		 * @return self
		 */
		public static function Instance() { // phpcs:ignore WordPress.NamingConventions.ValidFunctionName.MethodNameInvalid
			if ( ! static::$instance ) {
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * Returns the plugin slug for the plugin file
		 *
		 * @return string
		 */
		public function get_plugin_slug() {
			return basename( dirname( dirname( SAMPLE_PLUGIN ) ) );
		}
	}
}
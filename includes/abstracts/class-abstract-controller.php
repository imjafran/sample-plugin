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
defined( 'ABSPATH' ) || exit(1);

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
		public static function get_instance() {
			if ( ! static::$instance ) {
				static::$instance = new static();
			}
			return static::$instance;
		}

		/**
		 * Initializes the class
		 *
		 * @return void
		 */
		public function init() {
			$instance = static::get_instance();
			$instance->register_hooks();
		}

		/**
		 * Registers all the hooks
		 *
		 * @return void
		 */
		abstract public function register_hooks();

		/**
		 * Adds all the action hooks
		 *
		 * @return void
		 */
		abstract public function add_actions();

		/**
		 * Adds all the filter hooks
		 *
		 * @return void
		 */
		abstract public function add_filters();

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
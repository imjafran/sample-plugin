<?php

/**
 * Abstract Base Class
 *
 * @package SamplePlugin
 * @since   1.0.0
 */

// Namespace.
namespace SamplePlugin\Base;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit( 1 );

if ( ! class_exists( __NAMESPACE__ . '\Controller' ) ) {

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
		public static function init() {
			$instance = static::get_instance();
			$instance->register_hooks();
		}

		/**
		 * Registers all the hooks
		 *
		 * @return void
		 */
		public function register_hooks() {
			$this->add_actions();
			$this->add_filters();
		}

		/**
		 * Adds all the action hooks
		 *
		 * @return void
		 */
		public function add_actions() {

		}

		/**
		 * Adds all the filter hooks
		 *
		 * @return void
		 */
		public function add_filters() {

		}
	}
}
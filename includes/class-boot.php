<?php
/**
 * WP Plugin Bootstrap
 * Loads all the requires files, classes and functions of WP Plugin.
 *
 * @package SamplePlugin
 * @since   1.0.0
 */

// Namespace.
namespace SamplePlugin\Base;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

if ( ! class_exists( __NAMESPACE__ . '\'Boot') ) {
	/**
	 * Loads all the requires files, classes and functions of WP Plugin.
	 */
	class Boot {

		/**
		 * Instance of this class.
		 *
		 * @var self
		 */
		protected static $instance = null;

		/**
		 * Instance of this class.
		 *
		 * @return self
		 */
		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->includes();
			$this->init();
		}

		/**
		 * Includes all the required files.
		 *
		 * @return void
		 */
		public function includes() {
			// Loading composer files.
			if ( file_exists(__DIR__ . '/vendor/autoload.php') ) {
				include_once __DIR__ . '/vendor/autoload.php';
			}

			// Core functions.
			if ( file_exists(__DIR__ . '/other/functions.php') ) {
				include_once __DIR__ . '/other/functions.php';
			}

			// Core traits.
			if ( file_exists(__DIR__ . '/includes/traits/traits-app.php') ) {
				include_once __DIR__ . '/includes/traits/traits-app.php';
			}

			$this->include_admin_files();
			$this->include_files();
		}

		/**
		 * Includes all the admin files.
		 *
		 * @return void
		 */
		public function include_admin_files() {
			if ( ! is_admin() ) {
				return;
			}

			// Admin files.
			if ( file_exists(__DIR__ . '/admin/class-admin.php') ) {
				include_once __DIR__ . '/admin/class-admin.php';
			}
		}

		/**
		 * Includes all the files.
		 *
		 * @return void
		 */
		public function include_files() {
			// Loads ajax when it's an ajax request.
			if ( file_exists(__DIR__ . '/includes/classes/class-ajax.php') && wp_doing_ajax() ) {
				include_once __DIR__ . '/includes/classes/class-ajax.php';
			}

			// Loads.
		}

		/**
		 * Initializes the plugin.
		 *
		 * @return void
		 */
		public function init() {
			// Initialize the plugin.
		}
	}

	// Initialize the plugin.
	Boot::instance();

}
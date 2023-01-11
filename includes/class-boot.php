<?php
/**
 * WP Plugin Bootstrap
 * Loads all the requires files, classes and functions of WP Plugin.
 *
 * @package WP_Plugin
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_Plugin_Boot' ) ) {
	/**
	 * Summary of WP_Plugin_Base.
	 */
	class WP_Plugin_Boot {
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
				require_once __DIR__ . '/vendor/autoload.php';
			}

			// Core functions.
			if ( file_exists( __DIR__ . '/functions.php' ) ) {
				require_once __DIR__ . '/functions.php';
			}

			// Core traits.
			if ( file_exists( __DIR__ . '/includes/traits/traits-app.php' ) ) {
				require_once __DIR__ . '/includes/traits/traits-app.php';
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
			if ( file_exists( __DIR__ . '/admin/class-admin.php' ) ) {
				require_once __DIR__ . '/admin/class-admin.php';
			}
		}

		/**
		 * Includes all the files.
		 *
		 * @return void
		 */
		public function include_files() {
			// Loads ajax when it's an ajax request.
			if ( file_exists( __DIR__ . '/includes/classes/class-ajax.php' ) && wp_doing_ajax() ) {
				require_once __DIR__ . '/includes/classes/class-ajax.php';
			}
		}
	}

	// Initialize the plugin.
	WP_Plugin_Boot::instance();

}
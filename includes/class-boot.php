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
		 * Initialize the class.
		 *
		 * @return void
		 */
		public static function init() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			self::$instance->defines();
			self::$instance->includes();
			self::$instance->main();
		}


		/**
		 * Defines all the constants.
		 *
		 * @return void
		 */
		public function defines() {
			// Cores.
			define( 'SAMPLE_PLUGIN_PATH', plugin_dir_path( SAMPLE_PLUGIN_FILE ) );
			define( 'SAMPLE_PLUGIN_URL', plugin_dir_url( SAMPLE_PLUGIN_FILE ) );

			// Shortcuts.
			define( 'SAMPLE_PLUGIN_ASSETS', SAMPLE_PLUGIN_URL . 'assets/' );
			define( 'SAMPLE_PLUGIN_TEMPLATES', SAMPLE_PLUGIN_PATH . 'templates/' );
			define( 'SAMPLE_PLUGIN_INCLUDES', SAMPLE_PLUGIN_PATH . 'includes/' );
		}

		/**
		 * Includes all the required files.
		 *
		 * @return void
		 */
		public function includes() {
			$this->include_common_files();
			$this->include_admin_files();
			$this->include_public_files();
		}

		/**
		 * Includes all the common files.
		 *
		 * @return void
		 */
		public function include_common_files() {
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
		 * Includes all the public files.
		 *
		 * @return void
		 */
		public function include_public_files() {
			// Loads ajax when it's an ajax request.
			if ( file_exists(__DIR__ . '/includes/classes/class-ajax.php') && wp_doing_ajax() ) {
				include_once __DIR__ . '/includes/classes/class-ajax.php';
			}

			// Loads.
		}

		/**
		 * Main function.
		 *
		 * @return void
		 */
		public function main() {
			// Initialize the plugin.
		}
	}

	// Initialize the plugin.
	Boot::init();
}
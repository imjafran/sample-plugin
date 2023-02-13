<?php

/**
 * Handles installation and uninstallation of the plugin
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


// Use base controller.
use SamplePlugin\Base\Controller as Controller;


if ( ! class_exists( __NAMESPACE__ . '\Install' ) ) {
	/**
	 * Handles installation and un-installation of the plugin
	 */
	class Install extends Controller {

		/**
		 * Registers all the ajax hooks
		 *
		 * @return void
		 */
		public function register_hooks() {
			register_activation_hook(SAMPLE_PLUGIN_FILE, [ $this, 'install' ]);
			register_deactivation_hook(SAMPLE_PLUGIN_FILE, [ $this, 'uninstall' ]);
		}

		/**
		 * Runs on plugin activation
		 *
		 * @return void
		 */
		public function install() {
			// Do something on plugin activation.
		}

		/**
		 * Runs on plugin deactivation
		 *
		 * @return void
		 */
		public function uninstall() {
			// Do something on plugin deactivation.
		}

	}

	// Initialize the class.
	Install::init();
}

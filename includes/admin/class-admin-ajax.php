<?php

/**
 * Handles all the ajax requests for admin
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Admin;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


// Use base controller.
use SamplePlugin\Base\Controller as Controller;


if ( ! class_exists( __NAMESPACE__ . '\Ajax' ) ) {
	/**
	 * Handles all the ajax requests for admin
	 */
	class Ajax extends Controller {

		// Use utilities trait.
		use \SamplePlugin\Traits\Utilities;

		/**
		 * Registers all the ajax hooks
		 *
		 * @return void
		 */
		public function register_hooks() {

			// Return if not admin.
			if ( ! is_admin() ) {
				return;
			}

			// Register ajax action.
			add_action('wp_ajax_wp_plugin_first_ajax', [ $this, 'first_ajax_callback' ]);
		}

		/**
		 * Ajax action hook starts here
		 */
		public function first_ajax_callback() {
			// Checks nonce.
			check_ajax_referer('wp_plugin_first_ajax', 'nonce');

			// Checks if the user has the capability to do this.
			if ( ! current_user_can('manage_options') ) {
				$this->response->json_error('You do not have the permission to do this');
			}

			$this->response->json_success('Ajax request successful');
		}
	}

	// Initialize the class.
	Ajax::init();
}

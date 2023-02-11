<?php

/**
 * Handles all the ajax requests
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use SamplePlugin\Base\Controller as Controller;

if ( ! class_exists( __NAMESPACE__ . '\Ajax' ) ) {
	/**
	 * Handles all the ajax requests
	 */
	final class Ajax extends Controller {

		// Use utilities trait.
		use \SamplePlugin\Traits\Utilities;

		/**
		 * Registers all the ajax hooks
		 *
		 * @return void
		 */
		public function register_hooks() {
			// Register ajax action.
			add_action('wp_ajax_wp_plugin_first_ajax', [ $this, 'first_ajax_callback' ]);
			add_action('wp_ajax_nopriv_wp_plugin_first_ajax', [ $this, 'first_ajax_callback' ]);
		}

		/**
		 * Ajax action hook starts here
		 */
		public function first_ajax_callback() {
			// Check nonce.
			check_ajax_referer('wp_plugin_first_ajax', 'nonce');

			$this->response->json_success('Ajax request successful');
		}
	}

	// Initialize the class.
	Ajax::init();
}

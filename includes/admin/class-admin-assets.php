<?php

/**
 * Admin Assets Class File.
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Admin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use WP_Plugin\Base\Controller as Controller;

if ( ! class_exists( __NAMESPACE__ . '\Assets' ) ) {
	/**
	 * Admin Assets class.
	 */
	final class Assets extends Controller {

		/**
		 * Registers enqueues all the assets
		 *
		 * @return void
		 */
		public function register_hooks() {
			add_action('admin_enqueue_scripts', [ $this, 'enqueue_assets' ]);
		}

		/**
		 * Enqueues all the assets
		 */
		public function enqueue_assets() {

		}
	}

	// Initialize the class.
	Assets::init();
}

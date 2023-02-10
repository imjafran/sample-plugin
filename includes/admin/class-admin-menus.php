<?php

/**
 * Admin Menus Class File.
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Admin\Menus;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use WP_Plugin\Base\Controller as Controller;

if ( ! class_exists( __NAMESPACE__ . '\Assets' ) ) {
	/**
	 * Admin Menus class.
	 */
	final class Menus extends Controller {

		/**
		 * Registers menus
		 *
		 * @return void
		 */
		public function register_hooks() {
			add_action('admin_enqueue_scripts', [ $this, 'enqueue_assets' ]);
		}

	}

	// Initialize the class.
	Menus::init();
}

<?php

/**
 * Admin Menus Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Admin\Menus;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


// Use base controller.
use SamplePlugin\Base\Controller as Controller;


if ( ! class_exists( __NAMESPACE__ . '\Assets' ) ) {
	/**
	 * Admin Menus class.
	 */
	class Menus extends Controller {

		/**
		 * Registers menus
		 *
		 * @return void
		 */
		public function register_hooks() {
			add_action('admin_menu', [ $this, 'register_menus' ]);
		}

		/**
		 * Registers all the menus
		 *
		 * @return void
		 */
		public function register_menus() {

		}


	}

	// Initialize the class.
	Menus::init();
}

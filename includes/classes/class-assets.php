<?php

/**
 * Frontend Assets Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


// Use base controller.
use SamplePlugin\Base\Controller as Controller;


if ( ! class_exists( __NAMESPACE__ . '\Assets' ) ) {
	/**
	 * Frontend Assets class.
	 */
	class Assets extends Controller {

		/**
		 * Registers enqueues all the assets
		 *
		 * @return void
		 */
		public function register_hooks() {
			add_action('wp_enqueue_scripts', [ $this, 'enqueue_assets' ]);
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

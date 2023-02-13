<?php

/**
 * Shortcode Sample Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Shortcodes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


// Use base controller.
use SamplePlugin\Base\Controller as Controller;


if ( ! class_exists( __NAMESPACE__ . '\Sample' ) ) {
	/**
	 * Sample Shortcode class.
	 */
	class Sample extends Controller {

		/**
		 * Registers shortcode
		 *
		 * @return void
		 */
		public function register_hooks() {
			add_shortcode('wp_plugin_sample_shortcode', [ $this, 'sample_shortcode' ]);
		}

		/**
		 * Sample shortcode function.
		 */
		public function sample_shortcode() {
			return 'Sample shortcode';
		}
	}

	// Initialize the class.
	Sample::init();
}

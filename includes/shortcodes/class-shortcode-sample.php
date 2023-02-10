<?php

/**
 * Shortcode Sample Class File.
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Shortcodes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use WP_Plugin\Base\Controller as Controller;

if ( ! class_exists( __NAMESPACE__ . '\Sample' ) ) {
	/**
	 * Sample Shortcode class.
	 */
	final class Sample extends Controller {

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

<?php
/** Handles all the ajax requests
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Classes;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Use base controller.
use WP_Plugin\Base\Controller as Controller;


if ( ! class_exists('Ajax') ) {
	/**
	 * Handles all the ajax requests
	 */
	final class Ajax extends Controller {


		use \WP_Plugin\Traits\Utilities;

		/**
		 * Returns all the ajax hooks
		 *
		 * @return array
		 */
		public function get_hooks() {
			$hooks = [
				'wp_plugin_first_ajax' => 'first_ajax_callback',
			];

			return $hooks;
		}

		/**
		 * Registers all the ajax hooks
		 *
		 * @return void
		 */
		public function register_hooks() {
			$hooks = $this->get_hooks();

			foreach ( $hooks as $hook => $callback ) {
				add_action( "wp_ajax_{$hook}", [ $this, $callback ] );
				add_action( "wp_ajax_nopriv_{$hook}", [ $this, $callback ] );
			}
		}

		/**
		 * Ajax action hook starts here
		 */
		public function first_ajax_callback() {
			// Check nonce.
			check_ajax_referer( 'wp_plugin_first_ajax', 'nonce' );

			$this->response()->json_success( 'Ajax request successful' );
		}
	}
}
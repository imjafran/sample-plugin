<?php
/** Handles all the REST API requests
 *
 * @package WP_Plugin
 * @since 1.0.0
 */

// Namespace.
namespace WP_Plugin\Base;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit(1);

// Use base controller.
use WP_Plugin\Base\Controller as Controller;
use \WP_REST_Request;


if ( ! class_exists('REST_API') ) {
	/**
	 * Handles all the REST API requests
	 */
	abstract class REST_API extends Controller {


		use \WP_Plugin\Traits\Utilities;

		/**
		 * Namespace of the REST API
		 *
		 * @var string
		 */
		protected $namespace = 'wp-plugin/v1';

		/**
		 * Checks permission for the REST API request
		 *
		 * @return boolean
		 */
		public function is_allowed() {
			return true;
		}

		/**
		 * Returns all the REST API endpoints
		 *
		 * @return array
		 */
		public function get_endpoints() {
			$endpoints = [
				[
					'route'     => '/first-endpoint',
					'methods'   => 'GET',
					'callback'  => [ $this, 'first_endpoint_callback' ],
				],
			];

			return $endpoints;
		}

		/**
		 * Initializes the REST API child class
		 *
		 * @return void
		 */
		public static function Init() {
			$static = new static();
			add_action( 'rest_api_init', [ $static, 'register_rest_endpoints' ] );
		}

		/**
		 * Registers all the REST API endpoints
		 *
		 * @return void
		 */
		public function register_rest_endpoints() {
			$endpoints = $this->get_endpoints();

			foreach ( $endpoints as $endpoint ) {
				register_rest_route( $this->namespace, $endpoint['route'], [
					'methods'  => $endpoint['methods'],
					'callback' => $endpoint['callback'],
					'permission_callback' => [ $this, 'is_allowed' ],
				] );
			}
		}
	}

}
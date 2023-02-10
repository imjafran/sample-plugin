<?php
/**
 * Handles all the REST API requests for V1
 *
 * @package WP_Plugin
 * @since   1.0.0
 * @version v1
 */

// Namespace.
namespace WP_Plugin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use WP_Plugin\Base\REST_API as REST_API;
use \WP_REST_Request;


if ( ! class_exists('API_V1') ) {
	/**
	 * Handles all the ajax requests
	 */
	final class API_V1 extends REST_API {

		/**
		 * Returns all the REST API endpoints
		 *
		 * @return array
		 */
		public function endpoints() {
			$endpoints = [
				'first' => [ $this, 'get_first_endpoint' ],
			];

			return $endpoints;
		}

		/**
		 * Callback for the first endpoint
		 *
		 * @param WP_REST_Request $request The request object.
		 */
		public function get_first_endpoint( $request ) {
			// Get params.
			$params = $request->get_params();

			// Do something.

			// Return response.
			return $this->response()->rest_success('Success');
		}
	}

	// Instantiate.
	API_V1::Init();
}
<?php

namespace SamplePlugin;

defined('ABSPATH') or die('Direct Script not Allowed');

if ( ! class_exists('\SamplePlugin\API') ) {
	class API {


		// Singleton pattern
		private static $instance = null;

		public static function instance() {
			if ( self::$instance == null ) {
				self::$instance = new self();
			}

			return self::$instance;
		}


		// init REST API
		function init() {
			add_action('rest_api_init', [ $this, 'enable_cors_origin' ], 0);
			add_action('rest_pre_serve_request', [ $this, 'enable_cors_origin' ], 0);
			add_action('rest_api_init', [ $this, 'register_custom_endpoints' ], 0);
		}

		// enable CORS
		function enable_cors_origin() {
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: *');
			header('Access-Control-Allow-Credentials: true');
			header('Content-Type: *');
			header('Access-Control-Allow-Headers: Origin, Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With');
		}

		// register endpoints
		function register_custom_endpoints() {
			$routes = [
				// ROUTE,    METHODS,            CALLBACK,
				[ 'test', [ 'GET', 'POST' ], 'test_rest_callback' ],
			];

			foreach ( $routes as $route ) {
				register_rest_route('sample/v1', $route[0], [
					'methods'  => $route[1],
					'callback' => [ $this, $route[2] ],
				]);
			}
		}

		public function test_rest_callback() {
			return new \WP_REST_Response([
				'success' => true,
				'data' => 'It works!',
			]);
		}

	}

	// singleton instance
	API::instance()->init();

}

<?php

/**
 * Handles all the REST API requests
 *
 * @package WP_Plugin
 * @since   1.0.0
 */

// Namespace.
namespace WP_Plugin\Base;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use base controller.
use WP_Plugin\Base\Controller as Controller;

if ( ! class_exists( __NAMESPACE__ . '\REST_API' ) ) {
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
		 * Sets the namespace of the REST API
		 *
		 * @param  string $namespace Namespace of the REST API.
		 * @return self
		 */
		public function set_namespace( $namespace = '' ) {
			$this->namespace = $namespace;

			return $this;
		}

		/**
		 * Returns the namespace of the REST API
		 *
		 * @return string
		 */
		public function get_namespace() {
			return trim($this->namespace, '/');
		}

		/**
		 * Checks permission for the REST API request
		 *
		 * @return boolean
		 */
		public function is_allowed() {
			return true;
		}

		/**
		 * Returns endpoints
		 *
		 * @return array
		 */
		public function endpoints() {
			$endpoints = [
				'first_endpoint' => 'first_endpoint_callback',
				[
					'route'    => '/second-endpoint',
					'methods'  => 'GET',
					'callback' => [ $this, 'second_endpoint_callback' ],
				],
			];

			return $endpoints;
		}

		/**
		 * Returns all the REST API endpoints formatted for registering
		 *
		 * @return array
		 */
		protected function get_endpoints() {
			$endpoints = $this->endpoints();

			// Format if needed.
			foreach ( $endpoints as $key => $value ) {
				if ( is_string($value) ) {
					$endpoints[] = [
						'route'               => '/' . trim( $key, '/' ),
						'methods'             => 'GET',
						'permission_callback' => [ $this, 'is_allowed' ],
						'callback'            => [ $this, $value ],
					];
				} elseif ( is_array($value) ) {

					if ( ! is_callable( $value) ) {
						$endpoints[] = [
							'route'               => isset($value['route'])
								? $value['route']
								: '/' . trim($key, '/'),
							'methods'             => isset($value['methods'])
								? $value['methods']
								: 'GET',
							'permission_callback' => isset(
								$value['permission_callback']
							)
								? $value['permission_callback']
								: [ $this, 'is_allowed' ],
							'callback'            =>
							isset($value['callback']) &&
								is_callable($value['callback'])
								? $value['callback']
								: [ $this, $key . '_callback' ],
						];
					} else {
						$endpoints[] = [
							'route'               => isset( $key )
								? '/' . trim( $key, '/' )
								: '/',
							'methods'             => isset( $value['methods'] )
								? $value['methods']
								: 'GET',
							'permission_callback' => isset( $value['permission_callback'] )
								? $value['permission_callback']
								: [ $this, 'is_allowed' ],
							'callback'            => $value,
						];
					}
				}
			}

			return $endpoints;
		}

		/**
		 * Initializes the REST API child class
		 *
		 * @return void
		 */
		public function add_actions() {
			add_action('rest_api_init', [ $this, 'register_rest_endpoints' ]);
		}

		/**
		 * Registers all the REST API endpoints
		 *
		 * @return void
		 */
		public function register_rest_endpoints() {
			$endpoints = $this->get_endpoints();

			foreach ( $endpoints as $endpoint ) {
				register_rest_route($this->namespace, $endpoint['route'], [
					'methods'             => $endpoint['methods'],
					'callback'            => $endpoint['callback'],
					'permission_callback' => $endpoint['permission_callback'],
				]);
			}
		}
	}
}

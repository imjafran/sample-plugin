<?php
/**
 * Response Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Helper\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

if ( ! class_exists( __NAMESPACE__ . '\Response') ) {

	/**
	 * Response class for sending response.
	 */
	final class Response {

		/**
		 * Sends json response.
		 *
		 * @param  bool   $success Success status.
		 * @param  string $data    Data to send.
		 * @return void
		 */
		public function json( $success, $data = null ) {
			$response = [
				'success' => $success,
			];

			if ( $data ) {
				if ( is_array($data) || is_object($data) ) {
					$response['data'] = $data;
				} else {
					$response['message'] = $data;
				}
			}

			wp_send_json($response, 200);
			wp_die();
		}

		/**
		 * Sends json success response.
		 *
		 * @param  string $data Data to send.
		 * @return void
		 */
		public function json_success( $data = null ) {
			$this->json(true, $data);
		}

		/**
		 * Sends json error response.
		 *
		 * @param  string $data Data to send.
		 * @return void
		 */
		public function json_error( $data = null ) {
			$this->json(false, $data);
		}

		/**
		 * Returns WP REST Response
		 *
		 * @param  bool   $success Success status.
		 * @param  string $data    Data to send.
		 * @return \WP_REST_Response
		 */
		public function rest( $success, $data = null ) {
			$response = [
				'success' => $success,
			];

			if ( $data ) {
				if ( is_array($data) || is_object($data) ) {
					$response['data'] = $data;
				} else {
					$response['message'] = $data;
				}
			}

			return new \WP_REST_Response($response, 200);
		}

		/**
		 * Returns WP REST success response
		 *
		 * @param  string $data Data to send.
		 * @return \WP_REST_Response
		 */
		public function rest_success( $data = null ) {
			return $this->rest(true, $data);
		}

		/**
		 * Returns WP REST error response
		 *
		 * @param  string $data Data to send.
		 * @return \WP_REST_Response
		 */
		public function rest_error( $data = null ) {
			return $this->rest(false, $data);
		}
	}
}
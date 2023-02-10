<?php
/**
 * Input Class File.
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

if ( ! class_exists('Input') ) {
	/**
	 * Input class.
	 */
	final class Input {

		/**
		 * Get all input data.
		 *
		 * @access protected
		 * @return mixed
		 */
		protected function all() {
			$inputs = wp_remote_get('php://input');
			if ( ! is_wp_error($inputs) ) {
				$inputs = json_decode(sanitize_text_field(wp_unslash($inputs['body'])), true);

				if ( ! empty($inputs) ) {
					return $inputs;
				}
			}

			return $_REQUEST; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Nonce checked where it's used.
		}

		/**
		 * Sanitized mixed data recursively.
		 *
		 * @param  mixed $array Data to sanitize.
		 * @return mixed
		 */
		public function sanitize( $array = [] ) {
			if ( is_array($array) ) {
				foreach ( $array as $key => $value ) {
					$array[ $key ] = $this->sanitize($value);
				}
			} else {
				$array = sanitize_text_field($array);
			}

			return $array;
		}

		/**
		 * Get input data.
		 *
		 * @param  string $key     Key to get.
		 * @param  string $default Default value.
		 * @return mixed
		 */
		public function get( $key, $default = '' ) {
			$inputs = $this->all();

			if ( isset($inputs[ $key ]) ) {
				return $this->sanitize($inputs[ $key ]);
			}

			return $this->sanitize($default);
		}
	}
}
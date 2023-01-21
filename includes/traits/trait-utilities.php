<?php

/**
 * Abstract Base Class
 *
 * @package WP_Plugin
 * @since 1.2.2
 */

// Namespace.
namespace WP_Plugin\Traits;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Use classes.
use WP_Plugin\Classes\Input as Input;
use WP_Plugin\Classes\Options as Options;
use WP_Plugin\Classes\Response as Response;


if ( ! trait_exists( 'Utilities' ) ) {

	/**
	 * Base abstract class of the plugin, contains all the common methods
	 */
	trait Utilities {

		/**
		 * Input class instance
		 *
		 * @return Input
		 */
		public function input() {
			if ( ! $this->input ) {
				$this->input = new Input();
			}
			return $this->input;
		}

		/**
		 * Response class instance
		 *
		 * @return Response
		 */
		public function response() {
			if ( ! $this->response ) {
				$this->response = new Response();
			}
			return $this->response;
		}

		/**
		 * Options class instance
		 *
		 * @return Options
		 */
		public function options() {
			if ( ! $this->options ) {
				$this->options = new Options();
			}
			return $this->options;
		}
	}
}
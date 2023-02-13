<?php

/**
 * Abstract Base Class
 *
 * @package SamplePlugin
 * @since   1.2.2
 */

// Namespace.
namespace SamplePlugin\Traits;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

// Use classes.
use SamplePlugin\Helper\Classes\Input as Input;
use SamplePlugin\Helper\Classes\Response as Response;
use SamplePlugin\Helper\Classes\Options as Options;
use SamplePlugin\Helper\Classes\Plugin as Plugin;

if ( ! trait_exists('Utilities') ) {

	/**
	 * Base abstract class of the plugin, contains all the common methods
	 */
	trait Utilities {

		/**
		 * Input class instance
		 *
		 * @var Input
		 */
		public $input;

		/**
		 * Response class instance
		 *
		 * @var Response
		 */
		public $response;

		/**
		 * Options class instance
		 *
		 * @var Options
		 */
		public $options;

		/**
		 * Plugin class instance
		 *
		 * @var Plugin
		 */
		public $plugin;

		/**
		 * Constructor
		 */
		public function __construct() {
			$this->input    = new Input();
			$this->response = new Response();
			$this->options  = new Options();
			$this->plugin   = new Plugin();
		}
	}
}
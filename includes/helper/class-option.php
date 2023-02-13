<?php

/**
 * Options Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Helper\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);


if ( ! class_exists( __NAMESPACE__ . '\Option') ) {
	/**
	 * Options class.
	 */
	final class Option {

		/**
		 * Prefix of the option.
		 *
		 * @var string
		 */
		private $prefix = 'sample_plugin_';

		/**
		 * Set prefix of the option.
		 *
		 * @param string $prefix Prefix of the option.
		 * @return self
		 */
		public function set_prefix( $prefix ) {
			$this->prefix = $prefix;

			return $this;
		}

		/**
		 * Get prefix of the option.
		 *
		 * @return string
		 */
		public function get_prefix() {
			return $this->prefix;
		}

		/**
		 * Default options for Stock Sync With Google Sheet For WooCommerce.
		 *
		 * @var array
		 */
		protected $options = [];

		/**
		 * Returns default options.
		 *
		 * @return array
		 */
		public function defaults() {
			return apply_filters($this->get_prefix() . 'defaults', $this->options);
		}

		/**
		 * Gets option keys
		 *
		 * @return array
		 */
		public function get_keys() {
			return array_keys($this->defaults());
		}

		/**
		 * Gets option value.
		 *
		 * @param  string $key     Key to get.
		 * @param  mixed  $default Default value.
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( empty($default) ) {
				$default = $this->defaults();
				$default = isset($default[ $key ]) ? $default[ $key ] : '';
			}

			$option = get_option($this->get_prefix() . $key, $default);

			if ( empty($option) ) {
				$option = $default;
			}

			return $option;
		}

		/**
		 * Gets all options.
		 *
		 * @return array
		 */
		public function get_all() {
			$defaults = $this->defaults();
			$options  = [];

			foreach ( $defaults as $key => $value ) {
				$options[ $key ] = $this->get($key, $value);
			}

			return $options;
		}

		/**
		 * Updates/Sets option value.
		 *
		 * @param  string $key   Key to update.
		 * @param  mixed  $value Value to update.
		 * @return bool
		 */
		public function set( $key, $value ) {
			return update_option($this->get_prefix() . $key, $value);
		}

		/**
		 * Adds option value.
		 *
		 * @param  string $key   Key to add.
		 * @param  mixed  $value Value to add.
		 * @return bool
		 */
		public function add( $key, $value ) {
			return add_option($this->get_prefix() . $key, $value);
		}

		/**
		 * Deletes option value.
		 *
		 * @param  string $key Key to delete.
		 * @return bool
		 */
		public function delete( $key ) {
			return delete_option($this->get_prefix() . $key);
		}

		/**
		 * Resets options.
		 *
		 * @return void
		 */
		public function reset() {
			$defaults = $this->defaults();
			foreach ( $defaults as $key => $value ) {
				$this->set($key, $value);
			}
		}
	}
}

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

if ( ! class_exists( __NAMESPACE__ . '\Options') ) {
	/**
	 * Options class.
	 */
	final class Options {

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
		public function default_options() {
			return apply_filters($this->get_prefix() . 'default_options', $this->options);
		}

		/**
		 * Get option keys
		 *
		 * @return array
		 */
		public function get_keys() {
			return array_keys($this->default_options());
		}

		/**
		 * Get option value.
		 *
		 * @param  string $key     Key to get.
		 * @param  mixed  $default Default value.
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( empty($default) ) {
				$default = $this->default_options();
				$default = isset($default[ $key ]) ? $default[ $key ] : '';
			}

			$option = get_option($this->get_prefix() . $key, $default);

			if ( empty($option) ) {
				$option = $default;
			}

			return $option;
		}

		/**
		 * Get all options.
		 *
		 * @return array
		 */
		public function get_all() {
			$default_options = $this->default_options();
			$options         = [];

			foreach ( $default_options as $key => $value ) {
				$options[ $key ] = $this->get($key, $value);
			}

			return $options;
		}

		/**
		 * Update option value.
		 *
		 * @param  string $key   Key to update.
		 * @param  mixed  $value Value to update.
		 * @return bool
		 */
		public function update( $key, $value ) {
			return update_option($this->prefix . $key, $value);
		}

		/**
		 * Delete option value.
		 *
		 * @param  string $key Key to delete.
		 * @return bool
		 */
		public function delete( $key ) {
			return delete_option($this->prefix . $key);
		}

		/**
		 * Reset options.
		 *
		 * @return void
		 */
		public function reset() {
			$default_options = $this->default_options();
			foreach ( $default_options as $key => $value ) {
				$this->update($key, $value);
			}
		}
	}
}

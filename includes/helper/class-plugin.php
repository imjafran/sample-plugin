<?php
/**
 * Plugin Class File.
 *
 * @package SamplePlugin
 */

// Namespace.
namespace SamplePlugin\Helper\Classes;

// Exit if accessed directly.
defined('ABSPATH') || exit(1);

if ( ! class_exists( __NAMESPACE__ . '\Plugin') ) {
	/**
	 * Plugin class.
	 */
	class Plugin {

		/**
		 * Plugin file.
		 *
		 * @var string
		 */
		public $file;

		/**
		 * Constructor.
		 *
		 * @param string $file Plugin file.
		 */
		public function __construct( $file = null ) {
			$this->file = isset( $file ) ? $file : __FILE__;
		}

		/**
		 * Get plugin file.
		 *
		 * @return string
		 */
		public function get_file() {
			return $this->file;
		}

		/**
		 * Get plugin directory.
		 *
		 * @return string
		 */
		public function get_dir() {
			return plugin_dir_path($this->get_file());
		}

		/**
		 * Get plugin path.
		 *
		 * @param  string $append Append to path.
		 * @return string
		 */
		public function get_path( $append = '' ) {
			return $this->get_dir() . trim($append, '/');
		}

		/**
		 * Get plugin URL.
		 *
		 * @param  string $append Append to URL.
		 * @return string
		 */
		public function get_url( $append = '' ) {
			return plugin_dir_url($this->get_file()) . trim($append, '/');
		}

		/**
		 * Get plugin basename.
		 *
		 * @return string
		 */
		public function get_basename() {
			return plugin_basename($this->get_file());
		}

		/**
		 * Get plugin slug.
		 *
		 * @return string
		 */
		public function get_slug() {
			return dirname($this->get_basename());
		}

		/**
		 * Get plugin data.
		 *
		 * @param  string $key Key to get.
		 * @return string
		 */
		public function get_data( $key = null ) {
			$data = get_file_data(
				$this->get_file(), [
					'name'        => 'Plugin Name',
					'version'     => 'Version',
					'description' => 'Description',
					'author'      => 'Author',
					'author_uri'  => 'Author URI',
					'text_domain' => 'Text Domain',
					'domain_path' => 'Domain Path',
					'network'     => 'Network',
				]
			);

			if ( isset( $key ) ) {
				return isset( $data[ $key ] ) ? $data[ $key ] : '';
			}

			return $data;
		}

	}
}
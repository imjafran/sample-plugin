<?php
/**
 * Plugin Class File.
 *
 * @package WP_Plugin
 */

// Namespace.
namespace WP_Plugin\Classes;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit(1);

if ( ! class_exists('Plugin') ) {
	/**
	 * Plugin class.
	 */
	final class Plugin {

		/**
		 * Plugin file.
		 *
		 * @var string
		 */
		public $file;

		/**
		 * Constructor.
		 */
		public function __construct( $file = null) {
			$this->file = $file ? $file : __FILE__;
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
		 * @param string $append Append to directory.
		 * @return string
		 */
		public function get_dir( $append = '' ) {
			return plugin_dir_path ( $this->get_file() ) . $append;
		}

		/**
		 * Get plugin URL.
		 *
		 * @param string $append Append to URL.
		 * @return string
		 */
		public function get_url( $append = '' ) {
			return plugin_dir_url ( $this->get_file() ) . $append;
		}

		/**
		 * Get plugin basename.
		 *
		 * @return string
		 */
		public function get_basename() {
			return plugin_basename( $this->get_file() );
		}

		/**
		 * Get plugin slug.
		 *
		 * @return string
		 */
		public function get_slug() {
			return dirname( $this->get_basename() );
		}

		/**
		 * Get plugin data.
		 *
		 * @return string
		 */
		public function get_data() {
			return get_file_data( $this->get_file(), [
				'name'        => 'Plugin Name',
				'version'     => 'Version',
				'description' => 'Description',
				'author'      => 'Author',
				'author_uri'  => 'Author URI',
				'text_domain' => 'Text Domain',
				'domain_path' => 'Domain Path',
				'network'     => 'Network',
			] );
		}
		
	}
}
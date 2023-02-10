<?php

/**
 * Trait Plugin - Contains all the common methods 
 *
 * @package WP_Plugin
 * @since 1.2.2
 */

// Namespace.
namespace WP_Plugin\Traits;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit(1);


if ( ! trait_exists( 'Plugin' ) ) {

	/**
	 * Base abstract class of the plugin, contains all the common methods
	 */
	trait Plugin {

	}
}
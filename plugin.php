<?php
/**
 *
 * Plugin Name: Sample Plugin
 * Plugin URI: https://github.com/imjafran/wp-plugin-boilerplate
 * Description: Clean WordPress plugin starter pack
 * Version: 1.0.0
 * Author: imjafran
 * Author URI: https://github.com/imjafran
 * License: MIT
 * Text Domain: sample-plugin
 */

# Exit if accessed directly.
defined('ABSPATH') or die('Direct Script not Allowed');


# defining root handler
define('PLUGIN_HANDLER', __FILE__);

# loader 
require_once __DIR__ . '/includes/load.php';

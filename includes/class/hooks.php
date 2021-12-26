<?php

namespace SamplePlugin;

defined('ABSPATH') or die('Direct Script not Allowed');

# Action and Filter Hooks
if(!class_exists("\SamplePlugin\Hooks")) {
    class Hooks
    {
        # Singleton pattern
        private static $instance = null; 
        
        public static function instance() {
            if (self::$instance == null) self::$instance = new self; 

            return self::$instance;
        } 

        # Hooks Register 
        function init()
        { 
            /**
             * Activation and Deactivation Hooks
             */
            register_activation_hook(PLUGIN_HANDLER, [$this, 'plugin_activated']);
            register_deactivation_hook(PLUGIN_HANDLER, [$this, 'plugin_deactivated']);

            self::$instance->register_hooks();
        }

        /**
         * Register Hooks
         */
        function register_hooks()
        {
 
            /**
             * Predefined WordPress hooks
             */ 
            add_action("admin_menu", [$this, 'register_admin_menu']);
            add_action("admin_enqueue_scripts", [$this, 'admin_enqueue_scripts']); 
            add_action("wp_enqueue_scripts", [$this, 'wp_enqueue_scripts']); 

        }

        /**
         * When plugin activated
         */
        function plugin_activated()
        {
            # code yourself
        }

        /**
         * Plugin deacivation
         */
        function plugin_deactivated()
        {
            # code yourself 
        }


        
        # load admin script
        function admin_enqueue_scripts( $hook )
        {  
            $admin_footer_script = [
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'sample_admin' )
            ];

            wp_register_script('sample_admin_localize', '');
            wp_localize_script('sample_admin_localize', 'sample_admin', $admin_footer_script);
            wp_enqueue_script('sample_admin_localize');

            wp_enqueue_script('sample_admin', plugin_dir_url(PLUGIN_HANDLER) . 'public/js/admin.min.js', ['jquery'], microtime(), true);
            wp_enqueue_style('dashicons');
            wp_enqueue_style('sample_admin', plugin_dir_url(PLUGIN_HANDLER) . 'public/css/admin.min.css');
        }


        # load frontend script
        function wp_enqueue_scripts( $hook )
        {  
            $frontend_footer_script = [
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'nonce' => wp_create_nonce( 'sample_plugin' )
            ];

            wp_register_script('sample_frontend_localize', '');
            wp_localize_script('sample_frontend_localize', 'sample_frontend', $frontend_footer_script);
            wp_enqueue_script('sample_frontend_localize');

            wp_enqueue_script('sample_frontend', plugin_dir_url(PLUGIN_HANDLER) . 'public/js/frontend.min.js', ['jquery'], microtime(), true);
            wp_enqueue_style('dashicons');
            wp_enqueue_style('sample_frontend', plugin_dir_url(PLUGIN_HANDLER) . 'public/css/frontend.min.css');
        }

        # admin menu
        function register_admin_menu()
        {
            add_menu_page("Sample Plugin", "Sample Plugin", "edit_posts", "sample-plugin",  function () {
                include_once __DIR__ . '../templates/admin.php';
            });
        }
 

    }

    # Singleton instance
    Hooks::instance()->init();
}

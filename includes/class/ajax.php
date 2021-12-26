<?php

namespace SameplPlugin;

defined('ABSPATH') or die('Direct Script not Allowed');
 
if(!class_exists("\SameplPlugin\Ajax")){

    class Ajax {

        # Singleton pattern
        private static $instance = null; 
        public static function instance() {
            if (self::$instance == null) self::$instance = new self; 

            return self::$instance;
        } 

        # init ajax
        function init()
        {             
            $this->verify_nonce();
            $this->register_hooks();
        }        

        # hooks register 
        function register_hooks()
        {  
            add_action('wp_ajax_sample_ajax_action', [$this, 'sample_ajax_action']); 
        }

        # restrict for only admin
        function admin_only()
        {
            if ( !current_user_can( 'manage_options' ) ) {
               wp_die("Invalid request");
            }
        }

        # verify nonce
        function verify_nonce()
        {
            $inputs =  App::inputs();

            $nonce = sanitize_text_field( $inputs->nonce ?? $_REQUEST['nonce'] );

            if ( ! wp_verify_nonce( $nonce, 'sample_plugin' ) ) {
                wp_die ( 'No naughty business');
            }
        }

        # ajax callback
        public function sample_ajax_action()
        {
            wp_send_json( 'Works' );
        }
 
    } 
    # load only when it's an ajax call
    if(wp_doing_ajax()) {
        Ajax::instance()->init();
    }
}

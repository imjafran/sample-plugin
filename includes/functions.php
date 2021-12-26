<?php
defined('ABSPATH') or die('Direct Script not Allowed');


# writting logs 
if (!function_exists('write_log')) {

    function write_log($log) {  

        try {
            if(!defined('WP_DEBUG') || WP_DEBUG != true) return false; # Requires WP Debug is TRUE   

            if (is_array($log) || is_object($log)) $log = json_encode($log); # Encode as JSON

            $file = plugin_dir_path( PLUGIN_HANDLER ) . "/logs.txt"; # target file

            $myfile = fopen($file, "a");
            # Write logs to file
            fwrite($myfile, $log . "\n"); 
            fclose($myfile); 
        } catch(\Exception $e) {
            # do nothing 
        }
    }

}
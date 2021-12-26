<?php

namespace SamplePlugin;

defined('ABSPATH') or die('Direct Script not Allowed');

/** 
 * Core Hooks 
 */

final class App
{

    # Singleton pattern
    private static $instance = null; 
    
    public static function instance() {
        if (self::$instance == null) self::$instance = new self; 

        return self::$instance;
    }  

    # inputs 
    static function inputs()
    {            
        try {
            $json = file_get_contents('php://input');
            $request = json_decode(sanitize_text_field($json));
        } catch(\Exception $e) {
            
        }

        if(!$request || empty($request)) {
            $request =  $_REQUEST;
        }  

        return (object) $request;
    }
 
}

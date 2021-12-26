<?php
defined('ABSPATH') or die('Direct Script not Allowed');

if(file_exists(__DIR__ . '/vendor/autoload.php'))
    require_once __DIR__ . '/vendor/autoload.php';

// loading classes 
# Custom Functions
require_once __DIR__ . '/functions.php';  

# Core app
require_once __DIR__ . '/class/app.php'; 

# Action and Filter Hooks
require_once __DIR__ . '/class/hooks.php'; 

# Ajax operations for admin panel 
require_once __DIR__ . '/class/ajax.php'; 

# API callbacks for Client-plugin
require_once __DIR__ . '/class/api.php'; 
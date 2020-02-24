<?php

    ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    function dd($arg) {
        echo "<pre>";
        print_r($arg);
        die;
    }

    require_once( 'App/Library/initializing.php' );

    new \App\Library\Request();




<?php

/*
 * Levi Miller
 * January 2024
 * https://levimiller.greenriverdev.com/328/diner/
 * this is my controller for the Diner app
 */



// turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);


//require the autoload file
require_once ('vendor/autoload.php');

//instantiate Fat-Free framework
$f3 = Base::instance();

//define default route
$f3 ->route('GET /',function(){
    echo "My Diner";
});
//run fat free
$f3->run();



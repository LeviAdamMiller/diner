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
$f3 ->route('GET /breakfast',function(){
   //echo "Breakfast";

    //display views page
    $view = new template();
    echo $view->render('views/breakfast-menu.html');
});
//run fat free
$f3->run();



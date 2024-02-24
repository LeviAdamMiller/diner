<?php
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

// Test my order class
/*
$order = new order("pizza", "lunch", "sriracha");
var_dump($order);
*/

// Test my DataLayer class
//var_dump( DataLayer::getMeals() );
//var_dump( DataLayer::getCondiments() );

// Test Validate class
//echo Validate::validMeal('aloo gobi');

// Instantiate Fat-Free framework (F3)
$f3 = Base::instance(); //static method
$con = new Controller($f3);

//Instantiate the data-layer
$datalayer = new DataLayer();

//Test DataLayer class
//echo "<pre>";
//var_dump($datalayer->getOrders());
//echo "<pre>";

// Define a default route
$f3->route('GET /', function() {
$GLOBALS['con']->home();
});

// Define a breakfast route
$f3->route('GET /breakfast', function() {
//echo "Breakfast";

// Display a view page
$view = new Template();
echo $view->render('views/breakfast-menu.html');
});

// Define a order form 1 route
$f3->route('GET|POST /order1', function($f3) {
$GLOBALS['con']->order1();
});

// Define a order form 2 route
$f3->route('GET|POST /order2', function($f3) {
$GLOBALS['con']->order2();
});

// Define an order summary route
$f3->route('GET /summary', function() {
$GLOBALS['con']->summary();
});

// Define a order form 2 route
$f3->route('GET|POST /view-orders', function() {
    $GLOBALS['con']->view();
});


// Run Fat-Free
$f3->run(); //instance method
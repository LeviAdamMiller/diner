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
require_once ('model/data-layer.php');

//instantiate Fat-Free framework
$f3 = Base::instance();

//define route
$f3 ->route('GET /',function(){
    //display views page
    $view = new Template();
    echo $view->render('views/home.html');
});

//define breakfast route
$f3 ->route('GET /breakfast',function(){
    // display views page
     $view = new Template();
     echo $view->render('views/breakfast-menu.html');
});

// Define a order form 1 route
$f3->route('GET|POST /order1', function($f3) {

    // If the form has been posted
   if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Validate the data
        $food = $_POST['food'];
        $meal = $_POST['meal'];

        // Put the data in the session array
        $f3->set('SESSION.food', $food);
        $f3->set('SESSION.meal', $meal);

        // Redirect to order2 route
       $f3->reroute('order2');
   }

// Add date to F3 "hive"
   $f3->set('meals', getMeals());

    // Display a view page
    $view = new Template();
    echo $view->render('views/order-form-1.html');
});

    // Define a order form 2 route
    $f3->route('GET|POST /order2', function($f3) {
     //echo "Order Form Part II";

     // If the form has been posted
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Validate the data
        if (isset($_POST['conds'])){
          $conds = implode(", ", $_POST['conds']);
       }
       else {
           $conds = "None selected";
      }

       // Put the data in the session array
          $f3->set('SESSION.conds', $conds);

       // Redirect to summary route
       $f3->reroute('summary');

    }

        // Add date to F3 "hive"
        $f3->set('condiments', getCondiments());
    // Display a view page
   $view = new Template();
   echo $view->render('views/order-form-2.html');

});

// Define an order summary route
   $f3->route('GET /summary', function() {
    //echo "Thank you for your order!";

    // Display a view page
   $view = new Template();
  echo $view->render('views/order-summary.html');
});

$f3->run();



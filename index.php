<?php

//This is my controller

//Turn on error reporting
ini_set('display errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate F3 Base class
$f3 = Base::instance();

//Define a default route (328/diner)
$f3->route('GET /', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/diner-home.html");
});

//Define a breakfast route (328/diner/breakfast)
$f3->route('GET /breakfast', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/breakfast.html");
});

//Define a breakfast route (328/diner/lunch)
$f3->route('GET /lunch', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/lunch.html");
});

//Define a breakfast route (328/order form)
$f3->route('GET|POST /order1', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//        $valid = true;
//
//        //if the data is valid
//        if ($valid) {
            //Move data from POST array to SESSION array
            $_SESSION['food'] = $_POST['food'];
            $_SESSION['meal'] = $_POST['meal'];

            //Redirect to summary page
            $f3->reroute('summary');
//        }
    }

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/order1.html");
});

////Define a breakfast route (328/order form)
//$f3->route('GET /order2', function() {
//
//    //Instantiate a view
//    $view = new Template();
//    echo $view->render("views/order2.html");
//});

//Define a breakfast route (328/order form)
$f3->route('GET /summary', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/summary.html");
});

//Run Fat Free
$f3->run();
<?php
require_once "controllers/wallcontroller.php";
require_once "controllers/usercontroller.php";
require_once "controllers/homecontroller.php";
require_once "controllers/authcontroller.php";


//$requestURI = explode("/", parse_url(trim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));
session_start();
$requestURI = explode("/", strtolower($_SERVER["REQUEST_URI"]));

$controller = "authcontroller";
$action = "indexAction";

if(!empty($requestURI[2])) {
    $controller = $requestURI[2] . "controller";
}

if(!empty($requestURI[3])) {
    $action = $requestURI[3] . "Action";
}

if(method_exists($controller, $action)){
    $obj = new $controller;
    $obj->$action();
}
else{
    //echo "404" . $controller ." " . $action;
    require_once "views/404.php";
}

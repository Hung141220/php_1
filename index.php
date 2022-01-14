<?php
session_start();
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'employee';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$fullController = ucfirst($controller) . "Controller";
require("./Controllers/$fullController.php");
$controllerInstance = new $fullController();
$controllerInstance->$action();
?>
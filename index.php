<?php
session_start();
define('APP', 1);
require_once "lib/dbmanager.php";

$option = $_GET['option'] ?? 'home';
$task = $_GET['task'] ?? 'display';

$controllerName = "Controller" . ucfirst(strtolower($option));
$controllerFile = "controllers/$controllerName.php";

if (file_exists($controllerFile)) {
  require_once $controllerFile;
  $controller = new $controllerName();
  if (method_exists($controller, $task)) {
    $controller->$task();
  } else {
    $controller->display();
  }
} else {
  die("Controller non trovato");
}
